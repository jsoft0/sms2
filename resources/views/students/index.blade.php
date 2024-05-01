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

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Student</h4>
                    <a href="{{ route('students.create') }}" class="btn btn-success ">Add Student</a>

                    <div class="table-responsive mt-3">

                        <table class="table table-striped" id="classTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Registration Number</th>
                                    <th>Roll Number</th>
                                    <th>Date of Birth</th>
                                    <th>Class Group</th>
                                    <th>Section</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->reg_no }}</td>
                                        <td>{{ $student->roll_no }}</td>
                                        <td>{{ $student->date_of_birth }}</td>
                                        <td>{{ $student->classGroup->name }}</td>
                                        <td>{{ $student->section->name }}</td>
                                        <td>
                                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
@endsection
