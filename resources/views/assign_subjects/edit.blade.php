@extends('layouts.dashboard')

@section('content')
    {{-- <div class="container"> --}}

        <div class="content-wrapper ">
            <div class="row grid-margin stretch-card">
            <div class="col-md-12 ">
        {{-- <h1>Edit Student</h1> --}}

        <div class="card">
            <div class="card-header">
                <h2>Edit Assign Subject</h2>
            </div>
            <div class="card-body">

        {{-- <h1>Edit Assign Subject</h1> --}}
        <form action="{{ route('assign_subjects.update', $assignSubject->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="teacher_id">Teacher</label>
                <select name="teacher_id" id="teacher_id" class="form-control" required>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $teacher->id == $assignSubject->teacher_id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="class_group_id">Class Group</label>
                <select name="class_group_id" id="class_group_id" class="form-control" required>
                    @foreach($classGroups as $classGroup)
                        <option value="{{ $classGroup->id }}" {{ $classGroup->id == $assignSubject->class_group_id ? 'selected' : '' }}>
                            {{ $classGroup->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="section_id">Section</label>
            <select name="section_id" id="section_id" class="form-control" required>
                <option value="">Select Section</option>
                @foreach($sections as $section)
                <option value="{{ $section->id }}" {{ $section->id == $assignSubject->section_id ? 'selected' : '' }}>
                    {{ $section->name }}
                </option>
            @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject</label>
                <select name="subject_id" id="subject_id" class="form-control" required>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $subject->id == $assignSubject->subject_id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

            </div>

        </div>

            </div>

            </div>

        </div>
    </div>


@endsection


@push('js')

<script>
    $(document).ready(function() {
        $('#class_group_id').change(function() {
            console.log('senmd');
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
