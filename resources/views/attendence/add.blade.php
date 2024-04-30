@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">



        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Attendence</h4>
                        <form action="{{ route('attendence.store') }}" method="POST">
                            @csrf
                            <div class="row">



                                <div class="col-md-6">

                                    <label for="r_no">Reg No *</label>
                                    <input id="r_no" name="r_no" type="text" class="form-control"
                                        placeholder="Reg No">

                                </div>

                                <div class="col-md-6">

                                    <label for="roll_no">Roll No *</label>
                                    <input id="roll_no" name="roll_no" type="text" class="form-control"
                                        placeholder="Roll No">

                                </div>

                                <div class="col-md-6 mt-3">

                                    <label for="st_name">Student Name *</label>
                                    <input id="st_name" name="st_name" type="text" class="form-control"
                                        placeholder="student name">

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
