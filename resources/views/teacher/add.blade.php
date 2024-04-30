@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">



    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Teacher</h4>
                    <form action="{{ route('teacher.store') }}" method="POST">
                        @csrf
                        <div class="row">


                            <div class="col-md-6">

                                <label for="t_name">Teacher Name *</label>
                                <input id="t_name" name="name" type="text" class="form-control"
                                    placeholder="Teacher Name">

                            </div>

                            <div class="col-md-6">

                                <label for="address">Teacher Address *</label>
                                <input id="address" name="address" type="text" class="form-control"
                                    placeholder="Teacher Address">

                            </div>

                            <div class="col-md-6 mt-3">

                                <label for="phone">Teacher Phone *</label>
                                <input id="phone" name="phone" type="number" class="form-control"
                                    placeholder="Teacher Phone">

                            </div>


                            <div class="col-md-6 mt-3">

                                <label for="phone">Teacher Email *</label>
                                <input id="phone" name="email" type="email" class="form-control"
                                    placeholder="Teacher Email">

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
