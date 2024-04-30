@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Class</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('classes.update', $classGroup->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $classGroup->name }}" required>
                        @error('name')
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
@endsection
