@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Section</div>

                    <div class="card-body">
                        <form action="{{ route('sections.update', $section->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $section->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="class_group_id">Class Group</label>
                                <select name="class_group_id" id="class_group_id" class="form-control" required>
                                    @foreach ($classGroups as $classGroup)
                                        <option value="{{ $classGroup->id }}" {{ $classGroup->id == $section->class_group_id ? 'selected' : '' }}>
                                            {{ $classGroup->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
