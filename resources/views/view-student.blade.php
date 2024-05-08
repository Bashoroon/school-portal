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
                           Student by class
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
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotedStudents as $name)
                                 <tr>
                                    <td>{{ optional($name->student)->admissionNo }}</td>
                                    <td style="text-transform: uppercase;">{{ optional($name->student)->surname }}</td>
                                    <td style="text-transform: uppercase;">{{ optional($name->student)->firstName }}
                                    </td>
                                    <td style="text-transform: uppercase;">{{ optional($name->student)->lastName }}</td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a href="/view-student/{{optional ($name->student)->admissionNo}}" class="text-info fs-14 lh-1"><i
                                                    class="ri-edit-line"></i></a>
                                            <a href="/delete/{{optional ($name->student)->admissionNo}}" class="text-danger fs-14 lh-1"><i
                                                    class="ri-delete-bin-5-line"  onclick="return confirmation()"></i></a>
                                        </div>
                                    </td>
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
