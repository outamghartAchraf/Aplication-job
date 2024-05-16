@extends('layouts.admin.dash_admin')


@section('title',"Your a Job")
@section("content")

<div class="jobs_table">
    <div class="info_jobs_table">
        <h1>USERS</h1>
        <a href=" " class="btn_jobs"><i class="fa-solid fa-plus"></i> Add a user</a>
    </div>
    <div class="jobs_search">
        <div>
          
        </div>
        <div>
            <form action="{{route('jobs.index')}}" method="GET">@csrf
                <input class="inpseach" name="search" type="text" value="{{ request('search') }}" placeholder="Search">
                <button class="btn_search"><i class="fa-solid fa-magnifying-glass"></i></button>

            </form>
        </div>
    </div>
    <table class="table_jobs">

        <thead>
            <tr>
                <th>Title</th>
                <th>Created on</th>
                <th>Job Edit</th>
                <th>Job Delete</th>
            </tr>

        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->created_at->format('Y-m-d')}}</td>
                <td>
                    <a class="btn_edit" href=" "><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                </td>
                <td>
                       ><i class="fa-solid fa-trash-can"></i> Delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

 
</div>


@endsection

@section('filescript')
<script>
        function showModal(deleteUrl) {
            var modal = document.getElementById('confirmationModal');
            var form = document.getElementById('formde');
            form.action = deleteUrl;
            modal.style.display = 'block';
        }

        function hideModal() {
            var modal = document.getElementById('confirmationModal');
            modal.style.display = 'none';
        }
    </script>

@endsection