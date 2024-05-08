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
                            <h5 class="mb-0 fw-semibold"></h5>
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
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card top-countries-card">
                        <div class="card-header p-0">
                            <h6 class="card-title fs-13 mb-2">Update Student</h6><span
                                class="d-block mg-b-10 text-muted fs-12 mb-2">Students</span>
                        </div>

                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @elseif (session()->has('error'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @php
                            $admissionNo = $find->admissionNo;
                        @endphp

                        <form method="POST" action="{{ route('student.update', ['admissionNo' => $find->admissionNo]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input type="file" name="passport">
                            </div>
                            <div class="row" style="background-image: url('{{ asset('storage/images/passport/passbg.jpg') }}'); ">
                                <center>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 circular" >
                                        <img src="{{ asset('storage/' . $find->passport) }}"
                                            alt="{{ $find->surname . ' passport' }}">
                                    </div>
                            </div>
                            </center>


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <label for="input-placeholder" class="form-label">AdmissionNo</label>
                                <input type="text" name="admissionNo" readonly value="{{ $find->admissionNo }}"
                                    class="form-control" id="input-placeholder" placeholder="Enter your full name...">
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Surname </label>
                                    <input type="" name="surname" readonly value="{{ $find->surname }}"
                                        class="form-control" id="input-placeholder"
                                        placeholder="Enter a valid email address">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">First Name </label>
                                    <input type="tel" name="firstname" value="{{ $find->firstName }}"
                                        class="form-control" id="input-placeholder"
                                        placeholder="Enter valid phone number...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Other Name </label>
                                    <input type="text" value="{{ $find->lastName }}" class="form-control"
                                        id="input-placeholder" name="lastname" placeholder="Enter  your username">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Date of Birth</label>
                                    <input type="date" value="{{ $find->dob }}" name="dob" class="form-control"
                                        id="input-placeholder">
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">State of Origin </label>
                                    <select type="text" class="form-control" id="input-placeholder" name="state"
                                        placeholder="Enter  your username">
                                        @if ($find->state !=="")
                                        <option value="{{$find->state}}" selected >{{$find->state}}</option>  
                                        @else 
                                        <option value="" selected>_Select_</option>
                                        @endif                                      
                                     
                                        <option value="Abuja FCT">Abuja FCT</option>
                                        <option value="Abia">Abia</option>
                                        <option value="Adamawa">Adamawa</option>
                                        <option value="Akwa Ibom">Akwa Ibom</option>
                                        <option value="Anambra">Anambra</option>
                                        <option value="Bauchi">Bauchi</option>
                                        <option value="Bayelsa">Bayelsa</option>
                                        <option value="Benue">Benue</option>
                                        <option value="Borno">Borno</option>
                                        <option value="Cross River">Cross River</option>
                                        <option value="Delta">Delta</option>
                                        <option value="Ebonyi">Ebonyi</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Enugu">Enugu</option>
                                        <option value="Gombe">Gombe</option>
                                        <option value="Imo">Imo</option>
                                        <option value="Jigawa">Jigawa</option>
                                        <option value="Kaduna">Kaduna</option>
                                        <option value="Kano">Kano</option>
                                        <option value="Katsina">Katsina</option>
                                        <option value="Kebbi">Kebbi</option>
                                        <option value="Kogi">Kogi</option>
                                        <option value="Kwara">Kwara</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nassarawa">Nassarawa</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                        <option value="Plateau">Plateau</option>
                                        <option value="Rivers">Rivers</option>
                                        <option value="Sokoto">Sokoto</option>
                                        <option value="Taraba">Taraba</option>
                                        <option value="Yobe">Yobe</option>
                                        <option value="Zamfara">Zamfara</option>
                                        <option value="Outside Nigeria">Outside Nigeria</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">LGA</label>
                                    <input type="text" name="lga" value="{{ $find->lga }}"
                                        class="form-control" id="input-placeholder" placeholder="Enter your LGA">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Place of Birth </label>
                                    <input type="text" class="form-control" id="input-placeholder"
                                        value="{{ $find->pob }}" name="pob"
                                        placeholder="Enter your place of birth ">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Phone number</label>
                                    <input type="tel" name="phone" value="{{ $find->phone }}"
                                        class="form-control" id="input-placeholder"
                                        placeholder="Enter your phone number">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <label for="input-placeholder" class="form-label">Home Address</label>
                                <textarea type="text" name="address" value="{{ $find->address }}" class="form-control" id="input-placeholder"
                                    placeholder="Enter your Home Address">{{ $find->address }}</textarea>
                            </div><br>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-dark"> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::app-content -->
@endsection
