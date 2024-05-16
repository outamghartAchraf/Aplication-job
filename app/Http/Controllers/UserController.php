<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Models\Listeng;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const job_seeker = 'seeker';
    const job_poster = 'employer';


    public function index()
    {

        return view('users.register_seeker');
    }

    public function EmployerCompany()
    {
        return view('users.register_employerCompany');
    }

    public function storeSeeker(RegisterFormRequest $request)
    {

        $user =  User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
            'user_type' => self::job_seeker

        ]);
        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return response()->json("success");

        // return redirect()->route('verification.notice')->with([
        //     'successRegister' => 'your acount was create'
        // ]);

    }


    public function StoreEmployerCompany(RegisterFormRequest $request)
    {

        $user =  User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
            'user_type' => self::job_poster,
            'user_trial' => now()->addWeek()

        ]);
        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return response()->json("success");

        // return redirect()->route('verification.notice')->with([
        //     'successRegister' => 'your acount was create'
        // ]);

    }



    public function login()
    {
        return view('users.login');
    }

    public function StoreLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {

            if (auth()->user()->user_type === "employer") {
                return redirect()->to('dashboard');
            }elseif(auth()->user()->user_type === "admin"){
                return redirect()->to('admin');

            }else {
                return redirect()->to('/');
            }
        } else {
            return 'wrong email and password';
        }
    }




    public function logout()
    {

        auth()->logout();
        return redirect()->route('login');
    }


    public function profile()
    {

        return view('profile.index');
    }

    public function SeekerProfile()
    {
        return view('seekre.profile');
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'current_password' => "required",
            'password' => "required|min:8|confirmed",

        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {

            return back()->with([
                'error' => "the wrong in your  password current"
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with([
            'success' => "the password chanched seccussFully"
        ]);
    }

    public function uploadResum(Request $request)
    {

        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx'
        ]);

        if ($request->hasFile("resume")) {
            $path = $request->file('resume')->store('resume', 'public');
            User::find(auth()->user()->id)->update(['resume' => $path]);
        }

        return back()->with([
            'success' => 'Resume update SuccessFully'
        ]);
    }

    public function UpdateProfile(Request $request)
    {

        if ($request->hasFile('profile_pic')) {

            $path = $request->file('profile_pic')->store('profile', 'public');
            User::find(auth()->user()->id)->update(['profile_pic' => $path]);
        }

        User::find(auth()->user()->id)->update($request->except('profile_pic'));

        return back()->with([
            'success' => 'profile update seccussFully'
        ]);
    }

    public function jobApply()
    {


        $jobs =  User::with('listengs')->where('id', auth()->user()->id)->first();
        return view('seekre.job_apply', compact('jobs'));
    }

    public function AnullerApply($id)
    {
        $user = auth()->user();
        $user->listengs()->detach($id);

        return back()->with([
            'success' => 'Application canceled successfully'
        ]);
    }
}
