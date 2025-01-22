<section class="py-5 d-flex align-items-center" style="min-height: calc(100vh - calc(4rem + 1px) - calc(4rem + 1px));">
    <div class="row container mx-auto">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0"><strong><?php echo isset($id) ? "Your Account Details" : "User Sign Up" ?></strong></h3>
                </div>
                <div class="card-body">
                    <form action="" id="manage-user">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3"><b class="">Personal Information</b></div>
                                <div class="mb-3 row flex-column flex-lg-row">
                                    <label for="firstName" class="col-lg-3 col-form-label text-muted">First Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="firstname" id="firstName" required <?php if(isset($firstname)) {echo 'value="' .$firstname. '"';} ?>>
                                        <small id="firstName_regex" data-status=''></small>
                                    </div>
                                </div>
                                <div class="mb-3 row flex-column flex-lg-row">
                                    <label for="lastName" class="col-lg-3 col-form-label text-muted">Last Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="lastname" id="lastName" required <?php if(isset($lastname)) {echo 'value="' .$lastname. '"';} ?>>
                                        <small id="lastName_regex" data-status=''></small>
                                    </div>
                                </div>
                                <div class="mb-3 row flex-column flex-lg-row">
                                    <label for="contact" class="col-lg-3 col-form-label text-muted">Phone Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="contact" id="contact" required <?php if(isset($contact)) {echo 'value="' .$contact. '"';} ?>>
                                        <small id="contact_regex" data-status=''></small>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="mb-3"><b class="">System Credentials</b></div>
                                <input type="hidden" name="type" value="3">
                                <div class="mb-3 row flex-column flex-lg-row">
                                    <label for="email" class="col-lg-3 col-form-label text-muted">Email</label>
                                    <div class="col-lg-9">
                                        <input type="email" class="form-control" name="email" id="email" required <?php if(isset($email)) {echo 'value="' .$email. '"';} ?>>
                                        <small id="email_regex" data-status=''></small>
                                    </div>
                                </div>
                                <div class="mb-3 row flex-column flex-lg-row">
                                    <label for="<?php echo isset($id) ? "npassword" : "password" ?>" class="col-lg-3 col-form-label text-muted"><?php echo isset($id) ? 'New ' : '' ?>Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control" name="<?php echo isset($id) ? "npassword" : "password" ?>" id="<?php echo isset($id) ? "npassword" : "password" ?>" <?php echo isset($id) ? "" : "required" ?>>
                                        <div id="passwordHelpBlock" class="form-text">
                                            <?php echo isset($id) ? "Leave this empty if you are not intended to update your password.<br>" : '' ?>Your password must be 6 or more characters long, contain at least one uppercase letter and one number, and must not contain spaces.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row flex-column flex-lg-row">
                                    <label for="cpassword" class="col-lg-3 col-form-label text-muted">Confirm Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control" name="cpassword" id="cpassword" <?php echo isset($id) ? "" : "required" ?>>
                                        <small id="pass_match" data-status=''></small>
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($id)): ?>
                            <hr>
                            <div class="col-12">
                                <div class="mb-3"><b>Please enter your current password to save your changes.</b></div>
                                <div class="mb-3 row flex-column flex-lg-row">
                                    <label for="currpassword" class="col-lg-3 col-form-label text-muted">Current Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control" name="currpassword" id="currpassword" required>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>
                    </form>
                </div>
                    <div class="card-footer">
                        <div class="col-lg-12 justify-content-end d-flex">
                            <button id="submitBtn" class="btn btn-primary me-2" form="manage-user">Save</button>
                            <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php'">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

    $(document).ready(function() {
        
        $('#manage-user').submit(function(e){
            const namePattern = /^[a-zA-Z]+$/;
            const noPattern = /^\d{10,11}$/;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\S{6,}$/;
            e.preventDefault();
            start_load();
    
            let isValidFirstname = namePattern.test($('[name="firstname"]').val());
            let isValidLastname = namePattern.test($('[name="lastname"]').val());
            let isValidContact = noPattern.test($('[name="contact"]').val());
            let isValidEmail = emailPattern.test($('[name="email"]').val());

            let isValidPassword =passwordPattern.test($('[name="password"]').val());
            let isSamePassword = ($('[name="password"]').val() == $('[name="cpassword"]').val() || $('[name="npassword"]').val() == $('[name="cpassword"]').val()) ? true : false;
            
            let isValidNewPassword = ($('[name="npassword"]').val() == "") ? true : passwordPattern.test($('[name="npassword"]').val());
            // let isSameNewPassword = ($('[name="npassword"]').val() == $('[name="cpassword"]').val()) ? true : false;

            //For update page, check if user update to new password
            if(isValidNewPassword)
                isValidPassword = true;

            // if(isSameNewPassword)
            //     isSamePassword = true;
            // else if(!isSameNewPassword)
            //     isSamePassword = false;

            if(!isValidFirstname || !isValidLastname || !isValidContact || !isValidEmail || !isValidPassword || !isSamePassword){
                if(!isValidFirstname) {
                    $('#firstName_regex').attr('data-status','2').html('<i class="text-danger">Your first name cannot contain any digits.</i>')
                }
                else {
                    $('#firstName_regex').attr('data-status', '1').empty();
                }
    
                if(!isValidLastname) {
                    $('#lastName_regex').attr('data-status','2').html('<i class="text-danger">Your last name cannot contain any digits.</i>')
                }
                else {
                    $('#lastName_regex').attr('data-status', '1').empty();
                }
    
                if(!isValidContact) {
                    $('#contact_regex').attr('data-status','2').html('<i class="text-danger">Invalid phone number.</i>')
                }
                else {
                    $('#contact_regex').attr('data-status', '1').empty();
                }
    
                if(!isValidEmail) {
                    $('#email_regex').attr('data-status','2').html('<i class="text-danger">Invalid email.</i>')
                }
                else {
                    $('#email_regex').attr('data-status', '1').empty();
                }
    
                if(!isValidPassword) {
                    $('#passwordHelpBlock').addClass("text-danger");
                }
                else
                    $('#passwordHelpBlock').removeClass("text-danger");
    
                if(!isSamePassword){
                    $('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
                }
                else {
                    $('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
                }
                
                end_load();
            }
            else{
                console.log("success, otw to ajax")
                $('#firstName_regex').attr('data-status', '1').empty();
                $('#lastName_regex').attr('data-status', '1').empty();
                $('#contact_regex').attr('data-status', '1').empty();
                $('#email_regex').attr('data-status', '1').empty();
                $('#passwordHelpBlock').removeClass("text-danger");
                $('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>');
        
                $.ajax({
                    url:'ajax.php?action=save_user',
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success:function(resp){
                        if(resp == 1){
                            showAlert("You have successfully created your account!", "success");
                            setTimeout(function(){
                                location.href = "index.php";
                            }, 2000)
                        }
                        else if(resp == 2){
                            showAlert("The email is already taken.", "danger");
                            $('#email_regex').attr('data-status','2').html('<i class="text-danger">This email is taken.</i>')
                            end_load();
                        }
                        else if(resp == 3) {
                            showAlert("Your account details have been successfully updated!", "success");
                            setTimeout(() => {
                                location.href = 'index.php?page=manage_account&id=<?php echo isset($id) ? $id : '' ?>';
                            }, 2000);
                        }
                        else if(resp == 4) {
                            showAlert("Current password is not matcheds. Please try again.", "danger");
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        }
                    }
                })
            }
        })
    })

    // $(document).ready(function() {
    //     $('[name="firstname"]').keyup(function(){
    //         let firstname = $('[name="firstname"]').val();
    //         if(firstname == '')
    //             $('#firstName_regex').attr('data-status', '')
    //         else {
    //             if(namePattern.test(firstname) == false){
    //                 $('#firstName_regex').attr('data-status','2').html('<i class="text-danger">Your first name cannot contain any digits.</i>')
    //                 // $('#submitBtn').attr('disabled', 'true')
    //             }
    //             else{
    //                 $('#firstName_regex').attr('data-status', '1').empty();
    //                 // $('#submitBtn').removeAttr('disabled')
    //             }
    //         }
    //     })
    // })

    // $('[name="lastname"]').keyup(function(){
    //     let lastname = $('[name="lastname"]').val();
    //     if(lastname == '')
    //         $('#lastName_regex').attr('data-status', '')
    //     else {
    //         if(namePattern.test(lastname) == false){
    //             $('#lastName_regex').attr('data-status','2').html('<i class="text-danger">Your last name cannot contain any digits.</i>')
    //                 // $('#submitBtn').attr('disabled', 'true')
    //         }
    //         else{
    //             $('#lastName_regex').attr('data-status', '1').empty();
    //             // $('#submitBtn').removeAttr('disabled')
    //         }
    //     }
    // })

    // $('[name="contact"]').keyup(function(){
    //     let contact = $('[name="contact"]').val();
    //     if(contact == '')
    //         $('#contact_regex').attr('data-status', '')
    //     else {
    //         if(/^\d{10,11}$/.test(contact) == false){
    //             $('#contact_regex').attr('data-status','2').html('<i class="text-danger">Invalid contact number.</i>')
    //                 // $('#submitBtn').attr('disabled', 'true')
    //         }
    //         else{
    //             $('#contact_regex').attr('data-status', '1').empty();
    //             // $('#submitBtn').removeAttr('disabled')
    //         }
    //     }
    // })

    // $('[name="password"],[name="cpassword"]').keyup(function(){
	// 	var pass = $('[name="password"]').val()
	// 	var cpass = $('[name="cpassword"]').val()
	// 	if(cpass == '' ||pass == ''){
	// 		$('#pass_match').attr('data-status','')
	// 	}else{
	// 		if(cpass == pass){
	// 			$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
    //             // $('#submitBtn').removeAttr('disabled')
	// 		}else{
    //             $('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
    //             // $('#submitBtn').attr('disabled', 'true')
	// 		}
	// 	}
	// })
</script>