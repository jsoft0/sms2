@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Class List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Teacher ID</th>
                                    <th>Teacher Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td>{{$teacher->address}}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn" type="button" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>


                                            </button>
                                            <div class="dropdown-menu">
                                                <span class="dropdown-item"><a  class="btn btn-warning" href="{{route('teacher.edit',$teacher->id)}}">Edit</a></span>
                                                <a class="dropdown-item" href="#">
                                                    <form action="{{route('teacher.destroy',$teacher->id)}}" method="POST">
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
