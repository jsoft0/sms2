@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">



        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Class</h4>
                        <form action="{{ route('class.update',$class->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">

                                    <label for="t_name">Teacher ID *</label>
                                    <input id="t_name" name="teacher_id" type="text" class="form-control"
                                        placeholder="Teacher Id" value="{{ $class->teacher_id }}">

                                </div>

                                <div class="col-md-6">

                                    <label for="t_name">Teacher Name *</label>
                                    <input id="t_name" name="name" type="text" class="form-control"
                                        placeholder="Teacher Name" value="{{$class->name}}">

                                </div>


                                <div class="col-md-6 mt-3 ">
                                    @php
                                    $classNames=['Prep','Nursery','One','Two','Three','Four','Five',]

                                    @endphp
                                    <label for="name">Class *</label>
                                    <select name="class" class="form-control">
                                        <option value="none">Default select</option>

                                        @foreach ($classNames as $className)

                                        <option value="{{$className}}" {{($class->class==$className) ? 'selected' : ''}}>{{$className}}</option>

                                        @endforeach

                                    </select>
                                </div>



                                <div class="col-md-6 mt-3">

                                    @php

                                $sections=['a','b','c']

                                    @endphp


                                    <label for="section">Section *</label>
                                    <select name="section" id="section" class="form-control">
                                        <option>Default select</option>

                                        @foreach($sections as  $section)

                                        <option value="{{$section}}" {{($class->section==$section) ? 'selected' : ''}} > {{$section}}
                                        </option>


                                        @endforeach

                                    </select>
                                </div>


                                <div class="col-md-6 mt-3">

                                    @php

                                        $subjects=['English','Math','General Science']

                                    @endphp

                                    <label for="subject">Subject *</label>
                                    <select name="subject" class="form-control">

                                        <option>Default select</option>

                                        @foreach ($subjects as  $subject)

                                        <option value="{{$subject}}" {{($class->subject==$subject ? 'selected' : '')}}> {{$subject}}
                                        </option>


                                        @endforeach






                                    </select>
                                </div>


                                <div class="col-12 mt-3">

                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
