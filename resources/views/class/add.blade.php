@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">



        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Class</h4>
                        <form action="{{ route('class.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <label for="t_name">Teacher ID *</label>
                                    <input id="t_name" name="teacher_id" type="text" class="form-control"
                                        placeholder="Teacher Id">

                                </div>

                                <div class="col-md-6">

                                    <label for="t_name">Teacher Name *</label>
                                    <input id="t_name" name="name" type="text" class="form-control"
                                        placeholder="Teacher Id">

                                </div>


                                <div class="col-md-6 mt-3 ">
                                    <label for="name">Class *</label>
                                    <select name="class" class="form-control">
                                        <option value="none">Default select</option>
                                        <option value="Prep">Prep</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="One">One</option>
                                        <option value="Two">Two</option>
                                        <option value="Three">Three</option>
                                        <option value="Four">Four</option>
                                        <option value="Five">Five</option>

                                    </select>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label  for="section">Section *</label>
                                    <select name="section" id="section" class="form-control">
                                        <option>Default select</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>

                                    </select>
                                </div>


                                <div class="col-md-6 mt-3">
                                    <label for="subject">Subject *</label>
                                    <select name="subject" class="form-control">
                                        <option>Default select</option>
                                        <option>English</option>
                                        <option>Math</option>
                                        <option>General Science</option>

                                    </select>
                                </div>


                                <div class="col-12 mt-3">

                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
