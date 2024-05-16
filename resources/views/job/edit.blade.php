@extends('layouts.admin.dash_admin')


@section('title',"Edit a Job")
@section("content")

<div class="form_create_job">

    <form method="POST" action="{{ route('jobs.update', $listeng->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Edit a Job</h1>

        <div>
            <label for="name">Feature image:</label>
            <input type="file" name="feature_image" value="{{$listeng->feature_image}}" id="feature_image">
        </div>
        @if($errors->has('feature_image'))
        <div style="color: red;" class="messageErour">{{$errors->first('feature_image')}}</div>

        @endif
        <div>
            <label for="name">Title:</label>
            <input type="text" name="title" value="{{$listeng->title}}" id="title" placeholder="Title">
        </div>

        @if($errors->has('title'))
        <div style="color: red;" class="messageErour">{{$errors->first('title')}}</div>

        @endif

        <div>
            <label for="description">description:</label>
            <textarea id="description" name="description" placeholder="description" class="summernote">{{$listeng->description}}</textarea>

        </div>

        @if($errors->has('description'))
        <div style="color: red;" class="messageErour">{{$errors->first('description')}}</div>

        @endif

        <div>
            <label for="roles">Roles and Responsibily:</label>
            <textarea name="roles" id="roles" placeholder="Roles and Responsibily" class="summernote">{{$listeng->roles}}</textarea>
        </div>

        @if($errors->has('roles'))
        <div style="color: red;" class="messageErour">{{$errors->first('roles')}}</div>

        @endif


        <label for="message">Job Type</label>

        <label class="radio-label">
            <input type="radio" name="job_type" id="Fulltime" value="Fulltime" {{$listeng->job_type === "Fulltime" ? "checked":""}}>
            <span class="checkmark"></span>
            Fulltime
        </label>
        <label class="radio-label">
            <input type="radio" name="job_type" id="Parttime" value="Parttime" {{$listeng->job_type === "Parttime" ? "checked":""}}>
            <span class="checkmark"></span>
            Parttime
        </label>

        <label class="radio-label">
            <input type="radio" name="job_type" id="Casual" value="Casual" {{$listeng->job_type === "Casual" ? "checked":""}}>
            <span class="checkmark"></span>
            Casual
        </label>

        <label class="radio-label">
            <input type="radio" name="job_type" id="Contract" value="Contract" {{$listeng->job_type === "Contract" ? "checked":""}}>
            <span class="checkmark"></span>
            Contract
        </label>

        @if($errors->has('job_type'))
        <div style="color: red;" class="messageErour">{{$errors->first('job_type')}}</div>

        @endif

        <div>
            <label for="salary">Salary:</label>
            <input type="text" name="salary" value=" {{$listeng->salary}}" placeholder="salary">
        </div>

        @if($errors->has('salary'))
        <div style="color: red;" class="messageErour">{{$errors->first('salary')}}</div>

        @endif

        <div>
            <label for="adresse">Adresse:</label>
            <input type="text" value="{{$listeng->adresse}}" name="adresse" placeholder="Adresse">
        </div>

        @if($errors->has('adresse'))
        <div style="color: red;" class="messageErour">{{$errors->first('adresse')}}</div>

        @endif

        <div>
            <label for="date">Application Closing date:</label>
            <input type="date" name="date" value="{{$listeng->application_close_date}}" placeholder="Roles and Responsibily">
        </div>


        @if($errors->has('date'))
        <div style="color: red;" class="messageErour">{{$errors->first('date')}}</div>

        @endif

        <button class="btn_inset" type="submit">Update</button>
    </form>




</div>


@endsection