@extends('layout.master')
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h4 class="mb-0">Hi, Lawal!</h4>
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
            <!-- Start of View Student By Class -->
            @if ($name =="view")
                <div class="row">

                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="card top-countries-card">
                            <div class="card-header p-0">
                                <h6 class="card-title fs-13 mb-2">View Student By Class</h6><span
                                    class="d-block mg-b-10 text-muted fs-12 mb-2">Student</span>
                            </div>
                            <form action="{{ route('student.process') }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="input-placeholder" class="form-label"> Session</label>
                                        <select required type="text" name="session" class="form-control"
                                            id="input-placeholder">
                                            <option>Select a Session</option>
                                            @foreach ($sessions as $session)
                                                <option>{{ $session['session'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="input-placeholder" class="form-label">Class</label>
                                        <select type="text" required name="class" class="form-control"
                                            id="input-placeholder">
                                            <option>Select a Class</option>
                                            @foreach ($classes as $class)
                                                <option>{{ $class['class'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-dark"> Process </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif ($name =="promote")
                <!-- Start Promote Student  -->
                <div class="row">

                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="card top-countries-card">
                            <div class="card-header p-0">
                                <h6 class="card-title fs-13 mb-2">Promote Student</h6><span
                                    class="d-block mg-b-10 text-muted fs-12 mb-2">Promotion</span>
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
                            <form action="{{ route('promote.process') }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label for="input-placeholder" class="form-label"> Session</label>
                                        <select required type="text" name="session" class="form-control"
                                            id="input-placeholder">
                                            <option>Select a Session</option>
                                            @foreach ($sessions as $session)
                                                <option>{{ $session['session'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
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
                                        <button type="submit" class="btn btn-dark"> Process </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif ($name == "processClearance")
            <!-- Start Clearance student -->
            <div class="row">

                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card top-countries-card">
                        <div class="card-header p-0">
                            <h6 class="card-title fs-13 mb-2">Clear Student</h6><span
                                class="d-block mg-b-10 text-muted fs-12 mb-2">Clearance</span>
                        </div>
                        <form action="{{ route('clearance.process') }}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label"> Session</label>
                                    <select required type="text" name="session" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Session</option>
                                        @foreach ($sessions as $session)
                                            <option>{{ $session['session'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Class</label>
                                    <select type="text" required name="class" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Class</option>
                                        @foreach ($classes as $class)
                                            <option>{{ $class['class'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Term</label>
                                    <select type="text" required="required" name="term" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Term</option>
                                        @foreach ($terms as $term)
                                            <option>{{ $term['term'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark"> Process </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @elseif($name == "recordExam")

             <!-- Start Record student Scores -->
             <div class="row">

                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card top-countries-card">
                        <div class="card-header p-0">
                            <h6 class="card-title fs-13 mb-2">Exam and Rrecord</h6><span
                                class="d-block mg-b-10 text-muted fs-12 mb-2">Exam & Record</span>
                        </div>
                        <form action="{{ route('record.process')}}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label"> Session</label>
                                    <select required type="text" name="session" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Session</option>
                                        @foreach ($sessions as $session)
                                            <option>{{ $session['session'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Class</label>
                                    <select type="text" required name="class" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Class</option>
                                        @foreach ($classes as $class)
                                            <option>{{ $class['class'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Term</label>
                                    <select type="text" required="required" name="term" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Term</option>
                                        @foreach ($terms as $term)
                                            <option>{{ $term['term'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Subject</label>
                                    <select type="text" required="required" name="subject" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option>{{ $subject['subject'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark"> Process </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @elseif($name == "scoreSheet")

            <!-- View Score Sheet -->
            <div class="row">

               <div class="col-md-12 col-lg-6 col-xl-6">
                   <div class="card top-countries-card">
                       <div class="card-header p-0">
                           <h6 class="card-title fs-13 mb-2">Score Sheet</h6><span
                               class="d-block mg-b-10 text-muted fs-12 mb-2">Exam & Tes</span>
                       </div>
                       <form action="{{ route('viewScoreSheet.process')}}" method="GET">
                           @csrf
                           <div class="row">
                               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                   <label for="input-placeholder" class="form-label"> Session</label>
                                   <select required type="text" name="session" class="form-control"
                                       id="input-placeholder">
                                       <option>Select a Session</option>
                                       @foreach ($sessions as $session)
                                           <option>{{ $session['session'] }}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                   <label for="input-placeholder" class="form-label">Class</label>
                                   <select type="text" required name="class" class="form-control"
                                       id="input-placeholder">
                                       <option>Select a Class</option>
                                       @foreach ($classes as $class)
                                           <option>{{ $class['class'] }}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                   <label for="input-placeholder" class="form-label">Term</label>
                                   <select type="text" required="required" name="term" class="form-control"
                                       id="input-placeholder">
                                       <option>Select a Term</option>
                                       @foreach ($terms as $term)
                                           <option>{{ $term['term'] }}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                   <label for="input-placeholder" class="form-label">Subject</label>
                                   <select type="text" required="required" name="subject" class="form-control"
                                       id="input-placeholder">
                                       <option>Select a Subject</option>
                                       @foreach ($subjects as $subject)
                                           <option>{{ $subject['subject'] }}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                           <br>
                           <div class="row">
                               <div class="col-12">
                                   <button type="submit" class="btn btn-dark"> Process </button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
            @elseif($name == "broadSheet")

               <!-- View Broad Sheet -->
               <div class="row">

                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card top-countries-card">
                        <div class="card-header p-0">
                            <h6 class="card-title fs-13 mb-2">Broad Sheet</h6><span
                                class="d-block mg-b-10 text-muted fs-12 mb-2">Broad Sheet</span>
                        </div>
                        <form action="{{ route('viewBroadSheet.process')}}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label"> Session</label>
                                    <select required type="text" name="session" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Session</option>
                                        @foreach ($sessions as $session)
                                            <option>{{ $session['session'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Class</label>
                                    <select type="text" required name="class" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Class</option>
                                        @foreach ($classes as $class)
                                            <option>{{ $class['class'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Term</label>
                                    <select type="text" required="required" name="term" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Term</option>
                                        @foreach ($terms as $term)
                                            <option>{{ $term['term'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark"> Process </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            @elseif($name == "reportSheet")

            <!-- View report Sheet -->
            <div class="row">

             <div class="col-md-12 col-lg-6 col-xl-6">
                 <div class="card top-countries-card">
                     <div class="card-header p-0">
                         <h6 class="card-title fs-13 mb-2">Report Sheet</h6><span
                             class="d-block mg-b-10 text-muted fs-12 mb-2">Report Sheet</span>
                     </div>
                     <form action="{{ route('viewReportSheet.process')}}" method="GET">
                         @csrf
                         <div class="row">
                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <label for="input-placeholder" class="form-label"> Session</label>
                                 <select required type="text" name="session" class="form-control"
                                     id="input-placeholder">
                                     <option>Select a Session</option>
                                     @foreach ($sessions as $session)
                                         <option>{{ $session['session'] }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <label for="input-placeholder" class="form-label">Class</label>
                                 <select type="text" required name="class" class="form-control"
                                     id="input-placeholder">
                                     <option>Select a Class</option>
                                     @foreach ($classes as $class)
                                         <option>{{ $class['class'] }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         
                         <br>
                         <div class="row">
                             <div class="col-12">
                                 <button type="submit" class="btn btn-dark"> Process </button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
             @elseif($name = 'comment')

             <div class="row">

                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card top-countries-card">
                        <div class="card-header p-0">
                            <h6 class="card-title fs-13 mb-2">Comment Student</h6><span
                                class="d-block mg-b-10 text-muted fs-12 mb-2">Teacher's Comment</span>
                        </div>
                        <form action="{{ route('comment.process') }}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label"> Session</label>
                                    <select required type="text" name="session" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Session</option>
                                        @foreach ($sessions as $session)
                                            <option>{{ $session['session'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Class</label>
                                    <select type="text" required name="class" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Class</option>
                                        @foreach ($classes as $class)
                                            <option>{{ $class['class'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-placeholder" class="form-label">Term</label>
                                    <select type="text" required="required" name="term" class="form-control"
                                        id="input-placeholder">
                                        <option>Select a Term</option>
                                        @foreach ($terms as $term)
                                            <option>{{ $term['term'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark"> Process </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
