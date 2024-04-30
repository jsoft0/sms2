@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="row  grid-margin stretch-card">
            <div class="col-md-12">
                <h1>Add Subject</h1>
                <form action="{{ route('subjects.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
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
                                <option value="{{ $classGroup->id }}" {{ old('class_group_id') == $classGroup->id ? 'selected' : '' }}>
                                    {{ $classGroup->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('class_group_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
