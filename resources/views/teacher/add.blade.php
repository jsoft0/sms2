@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">

    <div class="row grid-margin stretch-card">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h2>Add Teacher</h2>
                </div>
                <div class="card-body">
                    {{-- <h4 class="card-title">Add Teacher</h4> --}}
                    <form action="{{ route('teacher.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="t_name">Name</label>
                                    <input id="t_name" name="name" type="text" class="form-control"
                                        placeholder="Teacher Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="phone">Teacher Phone</label>
                                    <input id="phone" name="phone" type="number" class="form-control"
                                        placeholder="Teacher Phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="email">Teacher Email</label>
                                    <input id="email" name="email" type="email" class="form-control"
                                        placeholder="Teacher Email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="password">Teacher password</label>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Teacher password" value="Pa$$w0rd!" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="qualification">Teacher Qualification</label>
                                    <input id="qualification" name="qualification" type="text" class="form-control"
                                        placeholder="Teacher qualification">
                                    @error('qualification')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
