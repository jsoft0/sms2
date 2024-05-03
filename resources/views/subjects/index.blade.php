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
                    <h4 class="card-title"> Subject List</h4>
                    <a href="{{ route('subjects.create') }}" class="btn btn-success">Add Subject</a>

                    <div class="table-responsive mt-3">

                        <table class="table" id="classTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Class Group</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->classGroup->name}}</td>
                                        {{-- <td>{{ optional($subject->classGroup)->name }}</td> --}}

                                        <td>
                                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
