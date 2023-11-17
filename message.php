<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Number Checker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        #js-disabled-message {
            display: none;
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- JavaScript Disabled Message -->
    <div id="js-disabled-message">
        Please enable JavaScript to use this application.
    </div>

    <div id='result'></div>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Popup Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Enter Mobile Number</h5>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button> -->
                            </div>
                            <div class="modal-body">
                                <form id="mobileForm">
                                    <div class="form-group">
                                        <label>Please write number without country code</label>
                                        <input type="tel" class="form-control" name='mobileNumber' id="mobileNumber" placeholder="Please write number without country code" pattern="[0-9]+" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Check Number</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap JS, and AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('js-disabled-message').style.display = 'none';
        $(document).ready(function() {
            // Show the modal on page load
            $('#myModal').modal({
                backdrop: 'static', // Prevent closing when clicking on the background
                keyboard: false // Prevent closing with the keyboard
            });

            // AJAX call on form submission
            $('#mobileForm').submit(function(e) {
                e.preventDefault();
                var mobileNumber = $('#mobileNumber').val();

                $.ajax({
                    type: 'POST',
                    url: 'check_mobile.php', // Specify the PHP file for the server-side processing
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // Handle the response from the server
                        $('#myModal').modal('hide'); // Hide the modal
                        $('#result').html(response); // Display the result
                    }
                });
            });
        });
    </script>
    <noscript>
        <style>
            #js-disabled-message {
                display: block;
            }
        </style>
    </noscript>

</body>

</html>