@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">



        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Class</h4>
                        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">


                                <div class="col-md-6">

                                    <label for="t_name">Teacher Name *</label>
                                    <input id="t_name" name="name" type="text" class="form-control"
                                        placeholder="Teacher Name" value="{{ $teacher->name }}">

                                </div>


                                <div class="col-md-6">

                                    <label for="phone">Teacher Phone *</label>
                                    <input id="phone" name="phone" type="number" class="form-control"
                                        placeholder="Teacher Phone" value="{{ $teacher->phone }}">

                                </div>


                                <div class="col-md-6">

                                    <label for="email">Teacher Email *</label>
                                    <input id="email" name="email" type="email" class="form-control"
                                        placeholder="Teacher Email" value="{{ $teacher->email }}">

                                </div>
                                <div class="col-md-6">

                                    <label for="qualification">Teacher qualification *</label>
                                    <input id="qualification" name="qualification" type="text" class="form-control"
                                        placeholder="Teacher qualification" value="{{ $teacher->qualification }}">

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
