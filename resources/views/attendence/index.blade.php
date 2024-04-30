@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Attendence List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Reg No</th>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendences as $attendence)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$attendence->reg_no}}</td>
                                    <td>{{$attendence->roll_no}}</td>
                                    <td>{{$attendence->name}}</td>

                                    <td>

                                        <div class="dropdown">
                                            <button class="btn" type="button" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>


                                            </button>
                                            <div class="dropdown-menu">
                                                <span class="dropdown-item"><a  class="btn btn-warning" href="{{route('attendence.edit',$attendence->id)}}">Edit</a></span>
                                                <a class="dropdown-item" href="#">
                                                    <form action="{{route('attendence.destroy',$attendence->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </a>

                                            </div>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
