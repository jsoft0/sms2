@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="row  grid-margin stretch-card">
            <div class="col-md-12">
                <h1>Subject Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $subject->name }}</h5>
                        <p class="card-text">Class Group: {{ $subject->classGroup->name }}</p>
                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
