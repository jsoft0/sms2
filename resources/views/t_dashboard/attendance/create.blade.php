@push('js')


<script>
    $(document).ready(function() {
        $('select[name="select-class"]').change(function() {
            var classId = $(this).val();
            if (classId) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('teacher.attendence.sections') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        class_id: classId
                    },
                    success: function(res) {
                        if (res) {
                            $("#sectionContainer").html(res);
                        } else {
                            $("#sectionContainer").empty();
                        }
                    }
                });
            } else {
                $("#sectionContainer").empty();
            }
        });
    });
</script>
@endpush

@push('css')
<style>
    .form-check .form-check-label{
        margin-left: 2px;
    }
</style>

@endpush
@extends('layouts.teacher')
@section('content')



    <div class="content-wrapper ">


        <div class="row">

            <div class="col-12 mt-3">
                <h2>Attendance Form</h2>

                <form action="{{ route('teacher.attendence.create') }}" method="GET">
                    @csrf
                    <div class="form-row">
                        {{-- <div class="col-md-4">
                        <select class="custom-select" name="select-class">
                            <option selected>Select Class</option>
                            @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>

                    </div> --}}

                        {{-- <div class="col-md-4">

                        <select class="custom-select" name="select-section">
                            <option selected>Select Section</option>
                            @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>

                    </div> --}}


                        {{-- new code --}}

                        <div class="col-md-4">
                            <select class="custom-select" name="select-class" id="select-class">
                                <option selected>Select Class</option>
                                @php
                                    $classes = App\Models\ClassGroup::all(); // Replace 'ClassName' with your actual class model name
                                @endphp
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4" id="sectionContainer">
                            <select class="custom-select" name="select-section" id="select-section">
                                <option selected>Select Section</option>
                            </select>
                        </div>


                        {{-- end new code --}}




                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">Search</button>




                        </div>


                    </div>
                </form>

                <form class="mt-3" method="POST" action="{{ route('teacher.attendence.store') }}">

                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <h2>Attendance Date</h2>
                            <input type="date" name="attendance_date" class="form-control" required>

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mt-3">
                            <h2>Name</h2>
                        </div>
                        <div class="col-md-6  mt-3">
                            <h2 class="ml-3">Attendance</h2>
                        </div>
                    </div>
                    @isset($students)
                        @foreach ($students as $student)
                            <div class="form-row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="student_id[]" class="form-control"
                                            value="{{ $student->id }}" hidden>
                                        <input type="text" name="student_name[]" class="form-control"
                                            value="{{ $student->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox ml-3 form-group">
                                        <div class="form-check form-check-inline d-inline">
                                            <input class="form-check-input d-inline" type="radio"
                                                name="attendance[{{ $student->id }}]" id="present{{ $student->id }}"
                                                value="present">
                                            <label class="form-check-label d-inline " for="present{{ $student->id }}">Present</label>
                                        </div>
                                        <div class="form-check form-check-inline d-inline">
                                            <input class="form-check-input d-inline" type="radio"
                                                name="attendance[{{ $student->id }}]" id="absent{{ $student->id }}"
                                                value="absent">
                                            <label class="form-check-label d-inline" for="absent{{ $student->id }}">Absent</label>
                                        </div>
                                        <div class="form-check form-check-inline d-inline">
                                            <input class="form-check-input d-inline" type="radio"
                                                name="attendance[{{ $student->id }}]" id="leave{{ $student->id }}"
                                                value="leave">
                                            <label class="form-check-label d-inline d-inline" for="leave{{ $student->id }}">Leave</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset



                    <button type="submit" class="btn btn-primary mt-3">Submit</button>

                </form>

                <div class="row">
                    <div class="col">

                        {{-- <div class="mt-3 ">
                            <a href="http://127.0.0.1:8000/studentreport/attendence" target="_BLANK">
                                <button class="btn btn-primary">View Report</button>
                            </a>

                            <a href="http://127.0.0.1:8000/student/attendence">
                                <button class="btn btn-primary">Go Back</button>
                            </a>

                        </div> --}}
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
