 <?php
        $sel="SELECT * FROM `admin` WHERE  `admin_id`='".$_SESSION['admin_id']."' ";
        $qry=mysqli_query($con,$sel);
        $row=mysqli_fetch_assoc($qry);
 ?>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>      
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="text-align:right;">Welcome back, <?php echo ucfirst($row["name"]); ?>.</span>
                <img class="img-profile rounded-circle" src="<?php echo '.././img/admin/avatar.png' ?>" alt="profile">
            </a> <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editprofile">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editpassword">
                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->

<!-- Edit Modal-->
<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<form class="form-horizontal" enctype="multipart/form-data" id="edit_admin">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id'] ?>">

            <label class="form-label" for="inputEmail4">Name<span class="text-danger"> *</span></label>
            <input disabled class="form-control" name="name" type="text" id="name" value="<?php echo $row['name']; ?>">

            <label class="form-label mt-2" for="inputEmail4">Email<span class="text-danger"> *</span></label>
            <input disabled class="form-control" name="email" type="email" id="email" value="<?php echo $row['email']; ?>">

            <button class="btn btn-primary mt-3" type="button" id="edit_profile"><i class="far fa-edit"></i></button>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button disabled class="btn btn-primary" type="submit" id="admin_edit_submit">Save</button>
        </div>
        </form>
    </div>
</div>
</div>

<!-- Edit Modal password-->
<div class="modal fade" id="editpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <form class="form-horizontal" enctype="multipart/form-data" id="edit_password">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id'] ?>">
            <input type="hidden" name="action" value="password">

            <label class="form-label mt-2" for="inputEmail4">New Password<span class="text-danger"> *</span></label>
            <input class="form-control preq1" name="password" type="password" id="txtNewPassword">

            <label class="form-label mt-2" for="inputEmail4">Confirme Password<span class="text-danger"> *</span></label>
            <input class="form-control preq2" name="confirme_password" type="password" id="txtConfirmPassword">

        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button disabled class="btn btn-primary" type="submit" id="passwordsave">Save</button>
        </div>
        </form>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();
        if (password == confirmPassword)
            document.getElementById('passwordsave').disabled = false;
    }
    $(document).ready(function () {
       $("#txtConfirmPassword").keyup(checkPasswordMatch);
    });
</script>
<script type="text/javascript">
$(document).ready(function(){

     // Ajax for edit employee
      $("#edit_admin").on('submit',(function(e) {
    e.preventDefault();
     if($('#name').val() == '' || $('#email').val() == ''){
        toastr.warning('Please fill all required field');
    }else{
    $.ajax({
        url: "./action/admin_edit_action.php?action=profile",
        type: "POST",
        data:  new FormData(this),
        dataType:  'json',
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function () {
            $('#admin_edit_submit').text('Processing...').prop('disabled', true)
        },
        success: function(r) {
            if(r.success){
                toastr.success(r.message)
                setTimeout(function(){
                   location.reload(); 
                }, 2000);
            } else {
                toastr.error(r.message)
            }
        },
        error: function(){
            
            
        },
        complete: function(){
            $('#admin_edit_submit').text('Send').prop('disabled', false)
        }
   });
    }
}));

      // Ajax for edit admin password

    $("#edit_password").on('submit',(function(e) {
    e.preventDefault();
    if($('.preq1').val() == '' || $('.preq2').val() == ''){
        toastr.warning('Please fill all required field');
    }else{
    $.ajax({
        url: "./action/admin_edit_action.php?action=password",
        type: "POST",
        data:  new FormData(this),
        dataType:  'json',
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function () {
            $('#passwordsave').text('Processing...').prop('disabled', true)
        },
        success: function(r) {
            if(r.success){
                toastr.success(r.message)
                setTimeout(function(){
                   location.reload(); 
                }, 2000);
            } else {
                toastr.error(r.message)
            }
        },
        error: function(){
            
            
        },
        complete: function(){
            $('#passwordsave').text('Save').prop('disabled', false)
        }
   });
    }
}));

    // Edit button 
    $("button#edit_profile").click(function(){
        document.getElementById('name').disabled = false;
        document.getElementById('email').disabled = false;
        document.getElementById('admin_edit_submit').disabled = false;
    });    
});     
</script>
