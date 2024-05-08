<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> SCHOOL MANAGEMENT PORTAL- @yield('title') </title>
    <meta name="Description" content="IT gives Value">
    <meta name="Author" content="Datapalace IT Solution">
    <meta name="keywords" content="Explre the World of Digital">

    <!-- Favicon -->
    <link rel="icon" href=" {{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

     <!-- Chartist Chart -->
     <link rel="stylesheet" href="{{ asset('assets/plugins/chartist/css/chartist.min.css') }}">
          <!-- Vendor CSS -->
          <link rel="stylesheet" href="{{ ('assets/css/chartist.min.css') }}">
          <link rel="stylesheet" href="{{ ('assets/css/chartist.css') }}">
          <link rel="stylesheet" href="{{ ('assets/lib/remixicon/fonts/remixicon.css') }}">
          <link rel="stylesheet" href="{{ ('assets/lib/prismjs/themes/prism.min.css') }}">
          <link rel="stylesheet" href="{{ ('plugins/chartist/css/chartist.min.css') }}">

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <!-- Jsvector Maps -->
    <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">

    <link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.css">
<style>
        /* style.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4sf4;
}

header {
    background-color: #333s;
    color: white;
    padding: 20px;
    text-align: center;
}

main {
    padding: 20px;
}

section {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #eed4d4;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body>
    <img src="{{ asset('storage/images/report_logo.png') }}" style="width: 80%; height: auto; margin-left: 10%;" alt="CHYFLEY LOGO">
   
    <main class="container-fluid" style="padding:2% 4% 2% 4%;">
        <!-- Student Information -->
        <section>
            <div class="row" style="border: solid 1px;">
                
                <div class="col-lg-4 col-4 col-md-4 col-xl-4 col-sm-4" style="border-right: solid 1px; padding-top: 2%;">
                        
                    <h2>Student Information</h2>
                    <p>Name: <b>{{$myName->surname. ' '.$myName->firstName. ' ' .$myName->lastName}}</b></p>
                    <p>Admission Number: <b>{{$admissionNo}}</b></p>
                    <p>Class: <b style="border-right: solid 1px"> {{$class}} </b> No of Time Present: <b>{{$studentAtt->present}}</b> <span style="border-left: solid 1px">No of Time Absent:</span> <b>120</b></p>
                    <p>Gender: @if ($myName->gender == "F")
                        <b>{{'Female'}}</b>
                    @else <b>{{'Male'}}</b>@endif </p>
                    <p>DOB: <b>{{$myName->dob ?? ''}}</b></p>
                    <!-- Add more student details as needed -->
                </div>
                <div class="col-lg-4 col-4 col-md-4 col-xl-4 col-sm-4" style="paddinsg-left: 10%;border-right: solid 1px; padding-top: 2%;">
                    <h2>Other Information</h2>
                    <p>Session: <b>{{$session}} Term: {{$term}}</b></p>
                    <p> <p>No of Time School Open: <b>{{ $schoolAttendance->schOpen ?? ''}}</b></p>
                    <p>School Vacates: <b >{{ $schoolAttendance->termEnds ?? ''}}</b> School Resumes: <b>{{$schoolAttendance->nxtTermBegins ?? ''}} </b></p>
                    <p></p>
                    <!-- Add more student details as needed -->
                </div>
                <div class="col-lg-4 col-4 col-md-4 col-xl-4 col-sm-4 circular" style="padding: 2% 0% 0% 12%;">
                    <img  src="{{ asset('storage/images/passport/'.$myName->passport) }}" alt="">
                    <!-- Add more student details as needed -->
                </div>
            </div>
           
        </section>
        <!-- Performance Details -->
        <section>
            <div class="row">
                <div class="col-12">
                    <center>
                        <h1>Student Performance Report</h1>
                    </center>
                    <table>
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Test</th>
                                <th>Exam</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $chartSubject = "";
                                $chartScore = "";
                            @endphp
                            @foreach ($results as $result)
                            @php
                                 
                                $chartSubject  .= "'".substr($result["subject"], 0, 6)."', ";
                                 $chartScore  .=  $result["test"] + $result["exam"].", ";
                            @endphp 
                            <tr>
                                <td>{{$result->subject}}</td>
                                <td>{{$result->test}}</td>
                                <td>{{$result->exam}}</td>
                                <td>175</td>
                            </tr>
                            <!-- Add more subjects as needed -->
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
           
        </section>
        <section>
            <div class="row">
                <div class="col-6">
                    <table>
                        <thead>
                            <tr>
                                <th>Psychomotor Domain</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>Verbal Fluency</td>
                                <td>@if ($schoolAttendance)
                                    
                                @endif</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Game</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Handling Tools</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Drawing and Painting</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- Add more subjects as needed -->
                            
                            
                        </tbody>
                    </table>
                </div>


                <div class="col-6">
                    <table>
                        <thead>
                            <tr>
                                <th>Affective Domain</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>Punctuality</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Neatness</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Honesty</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Interpersonal Relationship</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- Add more subjects as needed -->
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <br>
        <!-- Remarks and Comments -->
        <section>
            <div class="row">
                <div class="col-xl-12 col-sm-12" >
    
                      <h4 class="mt-0 header-title">Performance Chart</h4>
    
                      <canvas id="myChart" width="700" height="300"></canvas>
    
                </div> <!-- end col -->
              </div> <!-- end row -->
        </section>
        
          <br>
        <section>
            <div class="row">
                <div class="col-lg-6 col-6 col-md-6 col-xl-6 col-sm-6">
                   Principal's Comment: <i>John has shown remarkable improvement in his academic performance.</i> 
                </div>
                <div class="col-lg-6 col-6 col-md-6 col-xl-6 col-sm-6">
                    <p>Teacher's Comment: <i>{{$studentAtt->comment}}</i></p>
                 </div>
            </div>
            
           
        </section>
    </main>
   
</body>
</html>
<!-- chartjs js -->
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/pagez/chartjs.init.js') }}"></script>
<!--Chartjs Chart-->


<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [ <?php print $chartSubject;?> ''],
      datasets: [{
        label: 'Performance Chart',
        data: [ <?php print $chartScore;?> 0],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(300, 559, 196, 0.2)',
          'rgba(55, 59, 96, 0.2)',
          'rgba(15, 19, 296, 0.2)',
          'rgba(425, 335, 316, 0.2)',
          'rgba(50, 511, 29, 0.2)',
          'rgba(50, 511, 29, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(189, 183,107, 1)',
          'rgba(209, 119,137, 1)',
          'rgba(20, 79,17, 1)',
          'rgba(144,38,44, 1)',
          'rgba(144,38,44, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>
