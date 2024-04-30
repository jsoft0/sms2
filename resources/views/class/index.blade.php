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
                    <h4 class="card-title"> Class List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover display" id="classTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Teacher ID</th>
                                    <th>Teacher Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subject</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classGroups as $classGroup)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $classGroup->teacher_id }}</td>
                                        <td>{{ $classGroup->name }}</td>
                                        <td>{{ $classGroup->class }}</td>
                                        <td>{{ $classGroup->section }}</td>
                                        <td>{{ $classGroup->subject }}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn" type="button" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>


                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('class.edit', $classGroup->id) }}">Edit</a>

                                                    <a class="dropdown-item" href="#">

                                                        <form action="{{ route('class.destroy', $classGroup->id) }}"
                                                            method="POST">
                                                            @csrf()
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete</button>

                                                        </form>
                                                    </a>

                                                </div>
                                            </div>


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
