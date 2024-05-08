@extends('layout.master')
@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h4 class="mb-0">Hi, welcome back!</h4>
                    <p class="mb-0 text-muted">
                        @if (session()->has('update-success'))
                            <div class="alert alert-success">{{ session('update-success') }}
                            </div>
                        @endif
                    </p>
                </div>
                <div class="main-dashboard-header-right">
                    <div>
                        <label class="fs-13 text-muted">Number of Student</label>
                        <div class="main-star">
                            <h5 class="mb-0 fw-semibold">{{ $reports->count() }}</h5>
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

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Admission No</th>
                                        <th>Surname</th>
                                        <th>First Name</th>
                                        <th>Other Name</th>
                                        <th>First Term Grade</th>
                                        <th>Second Term Grade</th>
                                        <th>Third Term Grade</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $report)
                                        @php
                                            //query student names

                                            $names = DB::table('studentusers')
                                                ->where('admissionNo', '=', $report->admissionNo)
                                                ->first();
                                            $first = DB::table('studentscores')
                                                ->where('session', '=', $session)
                                                ->where('class', '=', $class)
                                                ->where('term', '=', 'First')
                                                ->where('admissionNo', '=', $report->admissionNo)
                                                ->first();

                                            $second = DB::table('studentscores')
                                                ->where('session', '=', $session)
                                                ->where('class', '=', $class)
                                                ->where('term', '=', 'Second')
                                                ->where('admissionNo', '=', $report->admissionNo)
                                                ->first();

                                            $third = DB::table('studentscores')
                                                ->where('session', '=', $session)
                                                ->where('class', '=', $class)
                                                ->where('term', '=', 'Third')
                                                ->where('admissionNo', '=', $report->admissionNo)
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td>{{  $report->admissionNo }}</td>
                                            <td style="text-transform: uppercase;">{{ $names->surname }}</td>
                                            <td style="text-transform: uppercase;">{{ $names->firstName }}
                                            </td>
                                            <td style="text-transform: uppercase;">{{ $names->lastName }}</td>
                                            <td>
                                                @if (isset($first))
                                                @php
                                                $studentSubjects = DB::table('studentscores')
                                                    ->select('subject')
                                                    ->where('session', '=', $session)
                                                    ->where('class', '=', $class)
                                                    ->where('term', '=', 'First')
                                                    ->where('admissionNo', '=', $report->admissionNo)
                                                    ->groupBy('subject')
                                                    ->get();
                                                    $total = DB::table('studentscores')
                                                        ->select(DB::raw('SUM(exam + test) AS total'))
                                                        ->where('session', '=', $session)
                                                        ->where('class', '=', $class)
                                                        ->where('term', '=', 'First')
                                                        ->where('admissionNo', '=', $report->admissionNo)
                                                        ->first();
                                                    $offer = $studentSubjects->count();
                                                    $expectedScore = 100 * $offer;
                                                    $average = round(($total->total / $expectedScore) * 100, 1);
                                            @endphp
                                                    {!! $average !!} <a href='/report/{{$session}}/{{'First'}}/{{$class}}/{{$report->admissionNo}}'>View Full Report</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($second))
                                                @php
                                                $studentSubjects = DB::table('studentscores')
                                                    ->select('subject')
                                                    ->where('session', '=', $session)
                                                    ->where('class', '=', $class)
                                                    ->where('term', '=', 'Second')
                                                    ->where('admissionNo', '=', $report->admissionNo)
                                                    ->groupBy('subject')
                                                    ->get();
                                                    $total = DB::table('studentscores')
                                                        ->select(DB::raw('SUM(exam + test) AS total'))
                                                        ->where('session', '=', $session)
                                                        ->where('class', '=', $class)
                                                        ->where('term', '=', 'Second')
                                                        ->where('admissionNo', '=', $report->admissionNo)
                                                        ->first();
                                                    $offer = $studentSubjects->count();
                                                    $expectedScore = 100 * $offer;
                                                    $average = round(($total->total / $expectedScore) * 100, 1);
                                            @endphp
                                                    {!! $average !!} <a href='/report/{{$session}}/{{'Second'}}/{{$class}}/{{$report->admissionNo}}'>View Full Report</a>
                                                    
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($third))
                                                    @php
                                                        $studentSubjects = DB::table('studentscores')
                                                            ->select('subject')
                                                            ->where('session', '=', $session)
                                                            ->where('class', '=', $class)
                                                            ->where('term', '=', 'Third')
                                                            ->where('admissionNo', '=', $report->admissionNo)
                                                            ->groupBy('subject')
                                                            ->get();
                                                            $total = DB::table('studentscores')
                                                                ->select(DB::raw('SUM(exam + test) AS total'))
                                                                ->where('session', '=', $session)
                                                                ->where('class', '=', $class)
                                                                ->where('term', '=', 'Third')
                                                                ->where('admissionNo', '=', $report->admissionNo)
                                                                ->first();
                                                            $offer = $studentSubjects->count();
                                                            $expectedScore = 100 * $offer;
                                                            $average = round(($total->total / $expectedScore) * 100, 1);
                                                    @endphp
                                                    {!! $average !!} <a href='/report/{{$session}}/{{'Third'}}/{{$class}}/{{$report->admissionNo}}'>View Full Report</a>
                                                @endif
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
                                        <th>First Term Grade</th>
                                        <th>Second Term Grade</th>
                                        <th>Third Term Grade</th>

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
