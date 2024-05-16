@extends('layouts.app')
@section('filecss')

@endsection

@section('title','Home')
@section('content')

<section class="show_jobs_listeng  ">
    <div class="box_show_image">
        <img src="{{Storage::url($listeng->feature_image)}}" alt="image jobs">

    </div>

    <div class="company_profile">
        <div class="box_company_frofile_del">
          <a href="{{route('details_profile_company',$listeng->profile->id)}}">
           <img src="{{Storage::url($listeng->profile->profile_pic)}}"/>

          </a>
        </div>
        <b class="">{{$listeng->profile->name}}</b>
    </div>
    <h2>{{$listeng->job_type}}</h2>
    <h1>{{$listeng->title}}</h1>

    <h3>Description :</h3>
    <p>{!!$listeng->description!!}</p>

    <h3>Roles :</h3>
    <p>{!!$listeng->roles!!}</p>

    <h4>Application closing date : {{$listeng->application_close_date}}</h4>

    @if(Auth::check())
    @if(auth()->user()->resume)
    <div>
        <form action="{{route('applicant.submit',$listeng->id)}}" method="POST">@csrf
            <button href="#" class="btn btn-dark btn-lg mt-3">Apply Now</button>
        </form>
    </div>
    @else
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Apply
        </button>
    </div>
    @endif

    @else
    <div class="alert alert-danger">please login an acount</div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form method="POST" action="{{route('applicant.submit',$listeng->id)}}">@csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Upload CV Or Resume </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="file" id="filevalue" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnApply" disabled class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>



@endsection


@section('filejs')
<script>
    const inputElement = document.querySelector('input[type="file"]');
    const pond = FilePond.create(inputElement);
    pond.setOptions({
        server: {
            url: '/upload/file',
            process: {
                method: 'POST',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                ondata: (formData) => {
                    formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file.name)

                    return formData
                },
                onload: (response) => {
                    document.getElementById('btnApply').removeAttribute('disabled')
                },
                onerror: (response) => {
                    console.log('error while uploading....', response)
                },

            },
        },
    });
</script>

@endsection