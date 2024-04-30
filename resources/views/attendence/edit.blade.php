@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">



        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Attendence</h4>
                        <form action="{{ route('subject.update', $attendence->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">



                                <div class="col-md-6">

                                    <label for="s_name">Subject Name *</label>
                                    <input id="s_name" name="s_name" value="{{$subject->name }}" type="text" class="form-control"
                                        placeholder="Subject Name">

                                </div>

                                <div class="col-md-6">

                                    <label for="s_code">Subject Code *</label>
                                    <input id="s_code" name="s_code" value="{{$subject->course_code }}" type="text" class="form-control"
                                        placeholder="Subject Code">

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
