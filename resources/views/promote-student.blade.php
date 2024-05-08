@extends('layout.master')
@section('content')

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h4 class="mb-0">Hi, welcome back!</h4>
                    <p class="mb-0 text-muted">  @if (session()->has('update-success'))
                        <div class="alert alert-success">{{ session('update-success') }}
                        </div>
                    @endif</p>
                </div>
                <div class="main-dashboard-header-right">
                    <div>
                        <label class="fs-13 text-muted">Number of Student</label>
                        <div class="main-star">
                            <h5 class="mb-0 fw-semibold">{{$promotedStudents->count()}}</h5>
                        </div>
                    </div>
                    <div>
                        <label class="fs-13 text-muted">Session</label>
                        <h5 class="mb-0 fw-semibold">{{$session}}</h5>
                    </div>
                    <div>
                        <label class="fs-13 text-muted">Class</label>
                        <h5 class="mb-0 fw-semibold">{{$class}}</h5>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                STUDENT
                              
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checkAll" name="admissionNo[]">Admission No</th>
                                        <th>Surname</th>
                                        <th>First Name</th>
                                        <th>Other Name</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route ('promoting.student') }}" method="post">
                                        @csrf
                                    @foreach ($promotedStudents as $name)
                                        <tr>
                                            <td><input type="checkbox" name="admissionNo[]"
                                                    value="{{ optional($name->student)->admissionNo }}">{{ optional($name->student)->admissionNo }}
                                            </td>
                                            <td style="text-transform: uppercase;">{{ optional($name->student)->surname }}
                                            </td>
                                            <td style="text-transform: uppercase;">{{ optional($name->student)->firstName }}
                                            </td>
                                            <td style="text-transform: uppercase;">{{ optional($name->student)->lastName }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Admission No</th>
                                        <th>Surname</th>
                                        <th>First Name</th>
                                        <th>Other Name</th>

                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label"> Session</label>
                                    <select required type="text" name="session" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Session</option>
                                        @foreach ($sessions as $session)
                                            <option>{{ $session['session'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Class</label>
                                    <select type="text" required name="class" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Session</option>
                                        @foreach ($classes as $class)
                                            <option>{{ $class['class'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark"> Promote </button>
                                </div>
                            </div>
                        </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::app-content -->
@endsection
