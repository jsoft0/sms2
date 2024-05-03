@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Admin</p>


                    </div>
                </div>


            </div>




        </div>

        <div class="row">
            @php
            // Define card classes based on key
            $cardClasses = [
                'Classes' => 'card-dark-blue',
                'Sections' => 'card-tale',
                'Teachers' => 'card-light-blue bg-secondary',
                'Students' => 'card-light-danger',
                'Subjects' => 'card-dark-blue bg-success',
                'Attendances' => 'card-tale bg-info',
            ];
        @endphp
            @foreach ($tableCounts as $key => $value)

                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card {{
                        isset($cardClasses[$key]) ? $cardClasses[$key] : 'card-light-blue'
                        }}">
                        <div class="card-body">
                            <p class="mb-4">{{ $key }}</p>
                            <p class="fs-30 mb-2">{{ $value }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
