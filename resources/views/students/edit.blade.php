@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper ">
        <div class="row grid-margin stretch-card">
        <div class="col-md-12 ">
    {{-- <h1>Edit Student</h1> --}}

    <div class="card">
        <div class="card-header">
            <h2>Edit Student</h2>
        </div>
        <div class="card-body">

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="reg_no">Registration Number</label>
            <input type="text" name="reg_no" id="reg_no" class="form-control @error('reg_no') is-invalid @enderror" value="{{ old('reg_no', $student->reg_no) }}" required>
            @error('reg_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="roll_no">Roll Number</label>
            <input type="text" name="roll_no" id="roll_no" class="form-control @error('roll_no') is-invalid @enderror" value="{{ old('roll_no', $student->roll_no) }}" required>
            @error('roll_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $student->name) }}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
            @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="class_group_id">Class Group</label>
            <select name="class_group_id" id="class_group_id" class="form-control @error('class_group_id') is-invalid @enderror" required>
                <option value="">Select Class Group</option>
                @foreach($classGroups as $classGroup)
                    <option value="{{ $classGroup->id }}" {{ old('class_group_id', $student->class_group_id) == $classGroup->id ? 'selected' : '' }}>{{ $classGroup->name }}</option>
                @endforeach
            </select>
            @error('class_group_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="section_id">Section</label>
            <select name="section_id" id="section_id" class="form-control @error('section_id') is-invalid @enderror" required>
                <option value="">Select Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ old('section_id', $student->section_id) == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                @endforeach
            </select>
            @error('section_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control-file @error('picture') is-invalid @enderror">
            @error('picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <img src="{{ asset($student->picture) }}" alt="Student Picture" class="img-thumbnail mt-2" style="max-width: 200px;">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

        </div>
    </div>

</div>

        </div>
    </div>

@endsection
