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

          <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Section List</h4>
                        <a href="{{ route('sections.create') }}" class="btn btn-success">Add Subject</a>
                        {{-- @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif --}}

                    <table class="table-responsive mt-3">
                        <table class="table table-striped" id="classTable">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>section</th>
                                    <th>Class</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        {{-- <td>{{ $section->id }}</td> --}}
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->classGroup->name }}</td>
                                        {{-- <td>{{ $section->name }}</td> --}}
                                        <td>
                                            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" >Delete</button>
                                                <!--onclick="return confirm('Are you sure?')"-->
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </table>
                    </div>
                </div>




</div>

    {{-- <div class="container">
        <div class="row justify-content-center grid-margin">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sections</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Class Group</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->classGroup->name }}</td>
                                        <td>
                                            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display: inline;">
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
    </div> --}}
@endsection
