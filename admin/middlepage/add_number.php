<?php
$qry_a = mysqli_query($con, "SELECT phone_number FROM `number`");
$row_a = mysqli_fetch_assoc($qry_a);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="my-3 font-weight-bold text-primary">Add Number</h6>
        </div>
        <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="data">
                <label class="form-label" for="inputEmail4">Phone Number<span class="text-danger"> *</span></label>
                <input type="tel" class="form-control" name="number" id="numberInput" placeholder="Number Format Like (XXX)-XXX-XXXX" value="<?php echo $row_a['phone_number'] ?>" />
                <button class="btn btn-primary mt-5" value="submit" name="submit" type="submit" id="submit">Send</button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- AJAX -->
<script>
    $(document).ready(function() {
        // Start add employee    
        $("#data").on('submit', (function(e) {
            e.preventDefault();
            if ($('#numberInput').val() == '') {
                toastr.warning('Please fill all required field');
            } else {
                $.ajax({
                    url: "./action/number_action.php",
                    type: "POST",
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#submit').text('Processing...').prop('disabled', true)
                    },
                    success: function(r) {
                        if (r.success) {
                            toastr.success(r.message)
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.error(r.message)
                        }
                    },
                    error: function() {

                    },
                    complete: function() {
                        $('#submit').text('Send').prop('disabled', false)
                    }
                });
            }
        }));

    });
</script>