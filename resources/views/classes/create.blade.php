@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">

        <div class="row grid-margin stretch-card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Add Class</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('classes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter class name" required>
                                @error('name')
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

        </div>

@endsection
