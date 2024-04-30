@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Student Details</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $student->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Registration Number</td>
                                        <td>{{ $student->reg_no }}</td>
                                    </tr>
                                    <tr>
                                        <td>Roll Number</td>
                                        <td>{{ $student->roll_no }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>{{ $student->date_of_birth }}</td>
                                    </tr>
                                    <tr>
                                        <td>Class Group</td>
                                        <td>{{ $student->classGroup->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Section</td>
                                        <td>{{ $student->section->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Picture</td>
                                        <td><img src="{{ asset('storage/' . $student->picture) }}" alt="Student Picture" class="img-thumbnail" style="max-width: 200px;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
