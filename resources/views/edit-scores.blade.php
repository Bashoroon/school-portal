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
                            <h5 class="mb-0 fw-semibold">{{ $find->subject }} </h5>
                        </div>
                    </div>
                    <div>
                        <label class="fs-13 text-muted">Session</label>
                        <h5 class="mb-0 fw-semibold">{{ $find->session }}</h5>
                    </div>
                    <div>
                        <label class="fs-13 text-muted">Class</label>
                        <h5 class="mb-0 fw-semibold">{{ $find->class }}</h5>
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
                                        <form action="{{ route('update.score', ['id' => $find->id]) }}" method="POST">
                                            @csrf

                                                  
                                                <tr> 
                                                    <td><input type="hidden"  name="admissionNo" value="{{ $find->admissionNo }}">{{$find->admissionNo}}</td>
                                                    <td style="text-transform: uppercase;">{{$find->admissionNo}}</td>
                                                    <td style="text-transform: uppercase;">{{$find->admissionNo}}</td>
                                                    <td style="text-transform: uppercase;">{{$find->admissionNo}}</td>
                                                    <td>
                                                     
                                                            <input class="form-control" value="{{ $find->test ?? ''}}" name="test">
                                                            <input class="form-control" value="{{ $find->exam ?? ''}}" name="exam">
                                                        
                                                    </td>
                                                    <td><button type="submit" class="btn btn-dark">Submit</button></td>
                                                </tr>
                                            
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
