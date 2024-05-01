@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endpush

@push('js')
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $('#classTable').dataTable();
    </script>
@endpush


@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    {{-- <div class="container"> --}}
        {{-- <h1>Assign Subjects</h1> --}}


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Assign Subject List</h4>
                    <a href="{{ route('assign_subjects.create') }}" class="btn btn-success ">Assign Subject</a>
            <div class="table-responsive mt-3">


        <table class="table mt-3 table-hover display" id="classTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Teacher</th>
                    <th>Class Group</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignSubjects as $assignSubject)
                    <tr>
                        <td>{{ $assignSubject->id }}</td>
                        <td>{{ $assignSubject->teacher->name }}</td>
                        <td>{{ $assignSubject->classGroup->name }}</td>
                        <td>{{ $assignSubject->section->name }}</td>
                        <td>{{ $assignSubject->subject->name }}</td>
                        <td>
                            <a href="{{ route('assign_subjects.edit', $assignSubject->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('assign_subjects.destroy', $assignSubject->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


            </div>

        </div>

    </div>

</div>

</div>

    </div>


@endsection
