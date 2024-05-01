@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">

<div class="row grid-margin stretch-card">
    <div class="col-md-12">
    {{-- <div class="container"> --}}
        {{-- <h1>Assign Subject</h1> --}}
        <div class="card">
            <div class="card-header">
                <h2>Assign Subject</h2>
            </div>
            <div class="card-body">

        <form action="{{ route('assign_subjects.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="teacher_id">Teacher</label>
                <select name="teacher_id" id="teacher_id" class="form-control" required>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="class_group_id">Class</label>
            <select name="class_group_id" id="class_group_id" class="form-control" required>
                <option value="">Select Class</option>
                @foreach($classGroups as $classGroup)
                    <option value="{{ $classGroup->id }}">{{ $classGroup->name }}</option>
                @endforeach
            </select>
            </div>

            <div class="form-group">
            <label for="section_id">Section</label>
            <select name="section_id" id="section_id" class="form-control" required>
                <option value="">Select Section</option>
            </select>
            </div>

            <div class="form-group">
                <label for="subject_id">Subject</label>
                <select name="subject_id" id="subject_id" class="form-control" required>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

            </div>
        </div>

        </div>
    </div>
    {{-- </div> --}}
</div>
@endsection

@push('js')

    <script>
        $(document).ready(function() {
            $('#class_group_id').change(function() {
                var classGroupId = $(this).val();
                $.ajax({
                    url: "{{ route('sections.by_class_group') }}",
                    type: 'POST',
                    data: { class_group_id: classGroupId, _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        $('#section_id').empty();
                        $('#section_id').append('<option value="">Select Section</option>');
                        $.each(response, function(key, value) {
                            $('#section_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

@endpush
