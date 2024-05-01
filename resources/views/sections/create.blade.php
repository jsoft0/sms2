@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">

        <div class="row grid-margin stretch-card">
            <div class="col-md-12">
                {{-- <h3>Add Section</h3> --}}

                <div class="card">
                    <div class="card-header">
                        <h2>Add Section</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('sections.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="class_group_id">Class Group</label>
                                <select name="class_group_id" id="class_group_id" class="form-control" required>
                                    @foreach ($classGroups as $classGroup)
                                        <option value="{{ $classGroup->id }}">{{ $classGroup->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>

                    </div>
                </div>

                    </div>




    </div>

@endsection
