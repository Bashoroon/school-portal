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
                            <h5 class="mb-0 fw-semibold">{{ $subjects->count() }}</h5>
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
                                BROAD SHEET
                                @if (session()->has('update-success'))
                                    <div class="alert alert-success">{{ session('update-success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Admission No</th>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            @foreach ($subjects as $subject)
                                                <th>{{ $subject->subject }}</th>
                                            @endforeach

                                            <th>Total</th>
                                            <th>Average</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="{{ route('submit.scores') }}" method="POST">
                                            @csrf
                                            @foreach ($broadsheets as $broadsheet)
                                                @php
                                                    //query student names

                                                    $names = DB::table('studentusers')
                                                        ->where('admissionNo', '=', $broadsheet->admissionNo)
                                                        ->first();
                                                @endphp
                                                <tr>
                                                    <td><input type="hidden" name="admissionNo"
                                                            value="{{ $broadsheet->admissionNo }}">{{ $broadsheet->admissionNo }}
                                                    </td>

                                                    <td style="text-transform: uppercase;">{{ $names->surname ?? ' ' }}</td>
                                                    <td style="text-transform: uppercase;">{{ $names->firstName ?? ' ' }}
                                                    </td>
                                                    @foreach ($subjects as $subject)
                                                        @php
                                                            // query number of subject by each student
                                                            $studentSubjects = DB::table('studentscores')->select('subject')
                                                                ->where('session', '=', $session)
                                                                ->where('class', '=', $class)
                                                                ->where('term', '=', $term)
                                                                ->where('admissionNo', '=', $broadsheet->admissionNo)
                                                                ->groupBy('subject')
                                                                ->get();

                                                            //  query student scores by subject
                                                            $results = DB::table('studentscores')
                                                                ->where('session', '=', $session)
                                                                ->where('class', '=', $class)
                                                                ->where('term', '=', $term)
                                                                ->where('subject', '=', $subject->subject)
                                                                ->where('admissionNo', '=', $broadsheet->admissionNo)
                                                                ->first();
                                                            $totalBySub = '-';
                                                            $test = isset($results->test)
                                                                ? intval($results->test)
                                                                : '-';
                                                            $exam = isset($results->exam)
                                                                ? intval($results->exam)
                                                                : '-';
                                                            $totalBySub =
                                                                $test !== '-' && $exam !== '-' ? $test + $exam : '-';

                                                            // query scores by student
                                                            $total = DB::table('studentscores')
                                                                ->select(DB::raw('SUM(exam + test) AS total'))
                                                                ->where('session', '=', $session)
                                                                ->where('class', '=', $class)
                                                                ->where('term', '=', $term)
                                                                ->where('admissionNo', '=', $broadsheet->admissionNo)
                                                                ->first();
                                                            $offer = $studentSubjects->count();
                                                            $expectedScore = 100 * $offer;
                                                            $average = round(($total->total / $expectedScore) * 100, 1);
                                                        @endphp

                                                        <td style="text-transform: uppercase;">{{ $totalBySub ?? ' ' }}
                                                        </td>
                                                    @endforeach
                                                    <td style="text-transform: uppercase;">{{ $total->total }}</td>
                                                    <td style="text-transform: uppercase;">{{ $average }}</td>

                                                </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Admission No</th>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            @foreach ($subjects as $subject)
                                                <th>{{ $subject->subject }}</th>
                                            @endforeach

                                            <th>Total</th>
                                            <th>Average</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <br>
                            <input type="hidden" name="session" value="{{ $session }}" id="session">
                            <input type="hidden" name="term" value="{{ $term }}" id="term">
                            <input type="hidden" name="class" value="{{ $class }}" id="clazz">

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
