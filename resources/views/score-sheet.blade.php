@extends('layout.master')
@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h4 class="mb-0">Hi, Lawal welcome back!</h4>
                    <p class="mb-0 text-muted">
                        @if (session()->has('update-success'))
                            <div class="alert alert-success">{{ session('update-success') }}
                            </div>
                        @endif
                    </p>
                </div>
                <div class="main-dashboard-header-right">
                    <div>
                        <label class="fs-13 text-muted">Subject</label>
                        <div class="main-star">
                            <h5 class="mb-0 fw-semibold">{{ $subject }} </h5>
                        </div>
                    </div>
                    <div>
                        <label class="fs-13 text-muted">Session</label>
                        <h5 class="mb-0 fw-semibold">{{ $session }}</h5>
                    </div>
                    <div>
                        <label class="fs-13 text-muted">Class</label>
                        <h5 class="mb-0 fw-semibold">{{ $class }}</h5>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                Student by class
                                @if (session()->has('update-success'))
                                    <div class="alert alert-success">{{ session('update-success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="examsple" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Admission No</th>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Scores</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="{{ route('submit.scores') }}" method="POST">
                                            @csrf
                                            @foreach ($promotedStudents as $name)
                                                @php
                                                    $admissionNo = optional($name->student)->admissionNo;
                                                    $exists = DB::table('studentscores')
                                                        ->where('admissionNo', '=', $admissionNo)
                                                        ->where('session', '=', $session)
                                                        ->where('class', '=', $class)
                                                        ->where('term', '=', $term)
                                                        ->first();
                                                @endphp
                                                <tr>
                                                    <td><input type="hidden" name="admissionNo[]" value="{{ optional($name->student)->admissionNo }}">{{ optional($name->student)->admissionNo }}</td>
                                                    <td style="text-transform: uppercase;">{{ optional($name->student)->surname }}</td>
                                                    <td style="text-transform: uppercase;">{{ optional($name->student)->firstName }}</td>
                                                    <td style="text-transform: uppercase;">{{ optional($name->student)->lastName }}</td>
                                                    <td>
                                                        <a href=""
                                                        class="btn btsn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                           >{{ $exists->test ?? ''}}</i></a>
                                                            
                                                           <a href=""
                                                        class="btn btsn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                           >{{ $exists->exam ?? ''}}</i></a>
                                                        
                                                    </td>
                                                    <td><a href="/editScores/{{$exists->id ?? ''}}"
                                                        class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                            class="ri-edit-line"></i></a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i
                                                            class="ri-delete-bin-line"></i></a></td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Admission No</th>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Scores</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                            <br>
                            <input type="hidden" name="session" value="{{ $session }}" id="session">
                            <input type="hidden" name="term" value="{{ $term }}" id="term">
                            <input type="hidden" name="class" value="{{ $class }}" id="clazz">
                            <input type="hidden" name="subject" value="{{ $subject }}" id="clazz">
                            <button type="submit" class="btn btn-dark">Submit Score</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::app-content -->
@endsection
