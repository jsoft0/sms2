@push('js')


<script>
    $(document).ready(function() {
        $('select[name="select-class"]').change(function() {
            var classId = $(this).val();
            if (classId) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('attendance.sections') }}",
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

@extends('layouts.dashbaord')
@section('content')

<div class="container">
    <div class="row">

        <div class="col-12 mt-3">
            <h2>Attendance Report</h2>
            <form action="{{ route('attendance.index') }}" method="GET">
                @csrf
                <div class="form-row">

                    <div class="col-md-4">
                        <select class="custom-select" name="select-class">
                            <option selected>Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4" id="sectionContainer">
                        <select class="custom-select" name="select-section">
                            <option selected>Select Section</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="attendance_date" class="form-control">
                    </div>
                    <div class="col-12 mt-3">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">


    <div class="row">

        <div class="col-12">
            <form action="">
                <div class="form-row">
                    <!-- Add this code below your form to display the student list only when data is available -->
                    @if (isset($attendanceData) && count($attendanceData) > 0)
                        <div class="mt-3 col-12">
                            <h2>Attendance Data</h2>
                            <table class="table table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Status</th>
                                        <!-- Add more columns based on your data structure -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendanceData as $attendance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attendance->student->name }}</td>
                                            <td>{{ $attendance->status }}</td>
                                            <!-- Add more columns based on your data structure -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @elseif (isset($attendanceData) && count($attendanceData) == 0)
                        <div class="mt-3 col-12">
                            <p>No attendance data available for the selected criteria.</p>
                        </div>
                    @endif
                </div>
            </form>
        </div>

    </div>

</div>

@endsection
