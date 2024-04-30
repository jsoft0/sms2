@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Subject List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Subject ID</th>
                                    <th>Subject Name</th>
                                    <th>course code</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->course_code}}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn" type="button" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>


                                            </button>
                                            <div class="dropdown-menu">
                                                <span class="dropdown-item"><a  class="btn btn-warning" href="{{route('subject.edit',$subject->id)}}">Edit</a></span>
                                                <a class="dropdown-item" href="#">
                                                    <form action="{{route('subject.destroy',$subject->id)}}" method="POST">
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
