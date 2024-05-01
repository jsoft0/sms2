@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="row grid-margin stretch-card">
            <div class="col-md-12 ">
                {{-- <h1>Edit Subject</h1> --}}

                <div class="card">
                    <div class="card-header">
                        <h2>Edit Subject</h2>
                    </div>
                    <div class="card-body">

                <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $subject->name }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="class_group_id">Class</label>
                        <select name="class_group_id" id="class_group_id" class="form-control @error('class_group_id') is-invalid @enderror" required>
                            @foreach($classGroups as $classGroup)
                                <option value="{{ $classGroup->id }}" {{ $subject->class_group_id == $classGroup->id ? 'selected' : '' }}>
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
