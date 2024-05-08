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
                        <h5 class="mb-0 fw-semibold">{{$allStudents->count()}}</h5>
                    </div>
                </div>
                <div>
                    <label class="fs-13 text-muted">Session</label>
                    <h5 class="mb-0 fw-semibold"></h5>
                </div>
                <div>
                    <label class="fs-13 text-muted">Class</label>
                    <h5 class="mb-0 fw-semibold"></h5>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                           All Students
                            @if (session()->has('update-success'))
                            <div class="alert alert-success">{{ session('update-success') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">

                        <table id="example"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allStudents as $name)
                                 <tr>
                                    <td>{{ optional($name)->admissionNo }}</td>
                                    <td style="text-transform: uppercase;">{{ optional($name)->surname }}</td>
                                    <td style="text-transform: uppercase;">{{ optional($name)->firstName }}
                                    </td>
                                    <td style="text-transform: uppercase;">{{ optional($name)->lastName }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                       
                                    </tr>
                                </tfoot>
                            </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End::app-content -->
   
@endsection
