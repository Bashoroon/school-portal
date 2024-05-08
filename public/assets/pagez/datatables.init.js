/*
 Template Name: Stexo - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Datatable js
 */

$(document).ready(function() {
   
    //Buttons examples
    var table = $('#score-sheet').DataTable({
        lengthChange: false,
       dom: 'Bfrtip',
buttons: [  'copy', 'csv', 'excel', 'pdf', 'print'   ]
    });



 //Buttons examples
    var table = $('#promote-student').DataTable({
        lengthChange: false,
       dom: 'Bfrtip',
buttons: [  'copy', 'csv', 'excel', 'pdf', 'print'   ]
    });

    //Buttons examples
    var table = $('#inputScore').DataTable({
        lengthChange: false,
       dom: 'Bfrtip',
buttons: [  'copy', 'csv', 'excel', 'pdf', 'print'   ]
    });


     var table = $('#student-detail').DataTable({
        lengthChange: false,
       dom: 'Bfrtip',
buttons: [  'copy', 'csv', 'excel', 'pdf', 'print'   ]
    });

      var table = $('#teacher-detail').DataTable({
        lengthChange: false,
       dom: 'Bfrtip',
buttons: [  'copy', 'csv', 'excel', 'pdf', 'print'   ]
    });

 var table = $('#cleared-student').DataTable({
        lengthChange: false,
       dom: 'Bfrtip',
buttons: [  'copy', 'csv', 'excel', 'pdf', 'print'   ]
    });


     
    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );



