@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">



        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Student</h4>
                        <form action="{{ route('teacher.store') }}" method="POST">
                            @csrf
                            <div class="row">



                                <div class="col-md-6">

                                    <label for="s_id">Student ID *</label>
                                    <input id="s_id" name="student_id" type="text" class="form-control"
                                        placeholder="Student ID">

                                </div>

                                <div class="col-md-6">

                                    <label for="s_name">Student Name *</label>
                                    <input id="s_name" name="name" type="text" class="form-control"
                                        placeholder="Student Name">

                                </div>

                                <div class="col-md-6 mt-3">

                                    <label for="f_name">Father Name *</label>
                                    <input id="f_name" name="f_name" type="text" class="form-control"
                                        placeholder="Father Name">

                                </div>

                                <div class="col-md-6 mt-3">

                                    <label for="dob">DOB *</label>
                                    <input id="dob" name="dob" type="date" class="form-control"
                                        placeholder="Date Of Birth">

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

                                    <label for="section">Section *</label>
                                    <select name="section" id="section" class="form-control">
                                        <option>Default select</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>

                                    </select>
                                </div>

                                <div class="col-md-6 mt-3">

                                    <label for="address">Address *</label>
                                    <input id="address" name="address" type="text" class="form-control"
                                        placeholder="Address">

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
