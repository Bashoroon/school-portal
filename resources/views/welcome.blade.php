@extends('layout.master')
@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h4 class="mb-0">Hi, welcome back!</h4>
                    <p class="mb-0 text-muted">Sales monitoring dashboard template.</p>
                </div>
                <div class="main-dashboard-header-right">
                    <div>
                        <label class="fs-13 text-muted">Customer Ratings</label>
                        <div class="main-star">
                            <i class="bi bi-star-fill fs-13 text-warning"></i>
                            <i class="bi bi-star-fill fs-13 text-warning"></i>
                            <i class="bi bi-star-fill fs-13 text-warning"></i>
                            <i class="bi bi-star-fill fs-13 text-warning"></i>
                            <i class="bi bi-star-fill fs-13 text-muted op-8"></i> <span>(14,873)</span>
                        </div>
                    </div>
                    <div>
                        <label class="fs-13 text-muted">Online Sales</label>
                        <h5 class="mb-0 fw-semibold">563,275</h5>
                    </div>
                    <div>
                        <label class="fs-13 text-muted">Offline Sales</label>
                        <h5 class="mb-0 fw-semibold">783,675</h5>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- row -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden sales-card bg-primary-gradient">
                        <div class="px-3 pt-3  pb-2 pt-0">
                            <div>
                                <h6 class="mb-3 fs-12 text-fixed-white">TOTAL OF STUDENTS</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{$noStudent}}</h4>
                                        <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                    </div>
                                    <span class="float-end my-auto ms-auto">
                                        <i class="fas fa-arrow-circle-up text-fixed-white"></i>
                                        <span class="text-fixed-white op-7"> +{{$noStudent}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="compositeline"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden sales-card bg-danger-gradient">
                        <div class="px-3 pt-3  pb-2 pt-0">
                            <div>
                                <h6 class="mb-3 fs-12 text-fixed-white">TOTAL OF STAFF</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{$noStaff}}</h4>
                                        <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                    </div>
                                    <span class="float-end my-auto ms-auto">
                                        <i class="fas fa-arrow-circle-down text-fixed-white"></i>
                                        <span class="text-fixed-white op-7"> -23.09%</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="compositeline2"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden sales-card bg-success-gradient">
                        <div class="px-3 pt-3  pb-2 pt-0">
                            <div>
                                <h6 class="mb-3 fs-12 text-fixed-white">TOTAL EARNINGS</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="fs-20 fw-bold mb-1 text-fixed-white">$7,125.70</h4>
                                        <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                    </div>
                                    <span class="float-end my-auto ms-auto">
                                        <i class="fas fa-arrow-circle-up text-fixed-white"></i>
                                        <span class="text-fixed-white op-7"> 52.09%</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="compositeline3"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden sales-card bg-warning-gradient">
                        <div class="px-3 pt-3  pb-2 pt-0">
                            <div>
                                <h6 class="mb-3 fs-12 text-fixed-white">PRODUCT SOLD</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="fs-20 fw-bold mb-1 text-fixed-white">$4,820.50</h4>
                                        <p class="mb-0 fs-12 text-fixed-white op-7">Compared to last week</p>
                                    </div>
                                    <span class="float-end my-auto ms-auto">
                                        <i class="fas fa-arrow-circle-down text-fixed-white"></i>
                                        <span class="text-fixed-white op-7"> -152.3</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="compositeline4"></div>
                    </div>
                </div>
            </div>
            <!-- row closed -->



            <!-- row opened -->
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="card top-countries-card">
                        <div class="card-header p-0">
                            <h6 class="card-title fs-13 mb-2">Recently Added Teachers</h6><span
                                class="d-block mg-b-10 text-muted fs-12 mb-2">Staff/Teachers</span>
                        </div>
                        <div class="list-group border">
                            @foreach ($staffs as $staff)
                            <div class="list-group-item border-top-0" id="br-t-0">
                                <p>{{$staff['name']}}</p><span>{{$staff['role']}}</span>
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-8">
                    <div class="card card-table">
                        <div class=" card-header p-0 d-flex justify-content-between">
                            <h4 class="card-title mb-1">Recently Added Student</h4>
                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light bg-transparent rounded-pill"
                                data-bs-toggle="dropdown"><i class="fe fe-more-horizontal"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);">Action</a>
                                <a class="dropdown-item" href="javascript:void(0);">Another
                                    Action</a>
                                <a class="dropdown-item" href="javascript:void(0);">Something Else
                                    Here</a>
                            </div>
                        </div>
                        <span class="fs-12 text-muted mb-3 ">This is your most recent earnings for today's date.</span>
                        <div class="table-responsive country-table">
                            <table class="table table-striped table-bordered mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-lg-25p">Admission No</th>
                                        <th class="wd-lg-25p">Surname</th>
                                        <th class="wd-lg-25p">First Name</th>
                                        <th class="wd-lg-25p">Other Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($promotedStudents as $name)
                                    <tr>
                                        <td>{{ optional($name->student)->admissionNo }}</td>
                                        <td style="text-transform: uppercase;">{{  optional($name->student)->surname }}</td>
                                        <td style="text-transform: uppercase;">{{  optional($name->student)->firstName }}</td>
                                        <td style="text-transform: uppercase;">{{  optional($name->student)->lastName }}</td>
                                    </tr>
                                    @endforeach
                                  
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->

            <!-- row opened - Student -->
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card top-countries-card">
                        <div class="card-header p-0">
                            <h6 class="card-title fs-13 mb-2">Add Teachers</h6><span
                                class="d-block mg-b-10 text-muted fs-12 mb-2">Staff/Teachers</span>
                        </div>
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                            
                        @endif
                        <form action="{{ route('users.create') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <label for="input-placeholder" class="form-label">Full name</label>
                                <input type="text" name="name" class="form-control" id="input-placeholder"
                                    placeholder="Enter your full name...">
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Email </label>
                                    <input type="email" name="email" class="form-control" id="input-placeholder"
                                        placeholder="Enter a valid email address">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Phone Number </label>
                                    <input type="tel" name="phone" class="form-control" id="input-placeholder"
                                        placeholder="Enter valid phone number...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Username </label>
                                    <input type="text" class="form-control" id="input-placeholder"  name="username"
                                        placeholder="Enter  your username">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Password</label>
                                    <input type="tel" name="password" class="form-control" id="input-placeholder"
                                        placeholder="Enter your password">
                                </div>
                            </div><br>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <button type="submit" class="primary"> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card top-countries-card">
                        <div class="card-header p-0">
                            <h6 class="card-title fs-13 mb-2">Add Student</h6><span
                                class="d-block mg-b-10 text-muted fs-12 mb-2">Student</span>
                        </div>
                        @if (session()->has('error'))
                        <div class="alert alert-success">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session()->has('student-success'))
                        <div class="alert alert-success">
                            {{ session('student-success') }}
                        </div>
                        @endif
                        <form action="{{ route('student.create') }}" method="POST">
                            @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for="input-placeholder" class="form-label">Full name</label>
                            <input type="text" name="fullname" max="225" required class="form-control" id="input-placeholder"
                                placeholder="Enter your full name...">
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <label for="input-placeholder"  class="form-label">Admission Number </label>
                                <input type="text" name="admissionNo" max="225"  class="form-control" id="input-placeholder"
                                   >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <label for="input-placeholder" class="form-label"> Session</label>
                                <select required type="text" name="session" class="form-control" id="input-placeholder" >
                                    <option>Select a Session</option>
                                    @foreach ($sessions as $session)
                                    <option>{{$session['session']}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <label for="input-placeholder" class="form-label">Class</label>
                                <select type="text" required name="class" class="form-control" id="input-placeholder" >
                                    <option>Select a Session</option>
                                    @foreach ($classes as $class)
                                    <option>{{$class['class']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <label for="input-placeholder" class="form-label">Gender</label>
                                <select type="text" name="gender" required class="form-control" id="input-placeholder" >
                                    <option>Select a Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit"> Add Student </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /row close -Student -->
        </div>
    </div>
    <!-- End::app-content -->
@endsection
