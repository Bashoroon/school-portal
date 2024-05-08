<div class="scrollToTop">
    <span class="arrow"><i class="las la-angle-double-up"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->

<!-- Popper JS -->
<script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Defaultmenu JS -->
<script src="{{ asset('assets/js/defaultmenu.min.js')}}"></script>

<!-- Node Waves JS-->
<script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!-- Sticky JS -->
<script src="{{ asset('assets/js/sticky.js')}}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ asset('assets/js/simplebar.js')}}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js')}}"></script>

<!-- Apex Charts JS -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- JSVector Maps JS -->
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>

<!-- JSVector Maps MapsJS -->
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js')}}"></script>
<script src="{{ asset('assets/js/us-merc-en.js')}}"></script>

<!-- Chartjs Chart JS -->
<script src="{{ asset('assets/js/index.js')}}"></script>

<!-- Custom-Switcher JS -->
<script src="{{ asset('assets/js/custom-switcher.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js')}}"></script>



<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>


<script>
     function confirmation() {
            return confirm('Are you sure you want to do this?');
        }
        
    $(".checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
    });
    

    $('#example').DataTable({
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});

// submti clearance 
$(document).ready(function() {
    // Keep track of previously checked boxes
    var previouslyChecked = [];

    // Listen for checkbox changes
    $("input[name='admissionNo[]']").change(function() {
        // Get the checked checkboxes
        var selectedAdmissionNos = [];
        $("input[name='admissionNo[]']:checked").each(function() {
            selectedAdmissionNos.push($(this).val());
        });

        // Determine which boxes were just checked
        var newlyChecked = selectedAdmissionNos.filter(function(admissionNo) {
            return !previouslyChecked.includes(admissionNo);
        });

        // Update previously checked boxes
        previouslyChecked = selectedAdmissionNos;

        // If there are no newly checked boxes, do nothing
        if (newlyChecked.length === 0) {
            return;
        }
        
        // Get other input values
        var session = $("#session").val();
        var term = $("#term").val();
        var clazz = $("#clazz").val();

        // Send data to the server using AJAX
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('submit.clearance') }}",
            type: "POST",
            data: {
                _token: csrfToken,
                session: session,
                term: term,
                clazz: clazz,
                admissionNo: newlyChecked // Only send newly checked boxes
            },
            beforeSend: function() {
                // Show loading indicator before sending the request
                $("#result").html("<p>Loading...</p>");
            },
            success: function(response) {
                // Display the response from the server
                $("#result").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Display an error message
                $("#result").html("Error in connection. Please check your connection: " + textStatus);
            }
            
        });
    });
});

//delete clearance while unchecked

$(document).ready(function() {
    // Keep track of previously checked boxes
    var previouslyChecked = [];

    // Listen for checkbox changes
    $("input[name='admissionNo[]']").change(function() {
        // Get the checked checkboxes
        var selectedAdmissionNos = [];
        $("input[name='admissionNo[]']:checked").each(function() {
            selectedAdmissionNos.push($(this).val());
        });

        // Determine which boxes were just checked
        var newlyChecked = selectedAdmissionNos.filter(function(admissionNo) {
            return !previouslyChecked.includes(admissionNo);
        });

        // Determine which boxes were just unchecked
        var newlyUnchecked = previouslyChecked.filter(function(admissionNo) {
            return !selectedAdmissionNos.includes(admissionNo);
        });

        // Update previously checked boxes
        previouslyChecked = selectedAdmissionNos;

        // If there are newly checked boxes, send them to the server
        if (newlyChecked.length > 0) {
            // Your existing AJAX call to handle newly checked boxes
        }

        // If there are newly unchecked boxes, send them to the server to delete
        if (newlyUnchecked.length > 0) {
            // Send data to the server using AJAX to delete the unchecked boxes
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('delete.clearance') }}", // Assuming you have a route for deleting
                type: "POST",
                data: {
                    _token: csrfToken,
                    admissionNo: newlyUnchecked // Only send newly unchecked boxes
                },
                beforeSend: function() {
                    // Show loading indicator before sending the request
                    $("#result").html("<p>Loading...</p>");
                },
                success: function(response) {
                    // Display the response from the server
                    $("#result").html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Display an error message
                    $("#result").html("Error in connection. Please check your connection: " + textStatus);
                }
            });
        }
    });
});

</script>
