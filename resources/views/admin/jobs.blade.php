@extends('layouts.admin.dash_admin')


@section('title',"Your a Job")
@section("content")

<div class="jobs_table">
    <div class="info_jobs_table">
        <h1>Jobs</h1>
        <a href="{{route('jobs.create')}}" class="btn_jobs"><i class="fa-solid fa-plus"></i> Add a Job</a>
    </div>
    <div class="jobs_search">
        <div>
            <h4>All Job</h4>
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
            @foreach($jobs as $job)
            <tr>
                <td>{{$job->title}}</td>
                <td>{{$job->created_at->format('Y-m-d')}}</td>
                <td>
                    <a class="btn_edit" href="{{route('jobs.edit',$job->id)}}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                </td>
                <td>
                    <a class="btn_delete" href="#"onclick="showModal('{{ htmlspecialchars(route('jobs.destroy', $job->id), ENT_QUOTES, 'UTF-8') }}')"
                      ><i class="fa-solid fa-trash-can"></i> Delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h3>Confirmation delete a job</h3>
            <div class="modal_div">
            <form id="formde" method="POST">
                @csrf
                @method('DELETE')
                <button class="deleteform" type="submit">Delete</button>
            </form>
            <button class="hideform" onclick="hideModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>
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