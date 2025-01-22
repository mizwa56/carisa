<!DOCTYPE html>
<html lang="en">
    <?php session_start() ?>
    <?php include 'header.php' ?>
<body class="container-fluid gx-0 position-relative">

    <div id="myAlert" class="alert-container top-0 start-50 translate-middle x"></div>

    <?php 
      if(isset($_SESSION['alert']))
        include 'alert.php';
        unset($_SESSION['alert']);
    ?>

    <div class="wrapper position-relative">
        
      <?php include 'navbar.php' ?>
        
        <div class="content-wrapper">
          
          <div class="page-container bg">
            <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                include $page .'.php';
            ?>
          </div>

          <div class="modal fade" id="uni_modal" role='dialog' data-bs-backdrop="static">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      </div>
                      <div class="modal-body"></div>
                      <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                      <button type="button" class="btn btn-primary" form="manage-survey" onclick="location.href = 'index.php?page=<?php echo $_GET['page'] ?>&id=<?php echo $_GET['id'] ?>'">Close</button>
                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" id="login_modal" role="dialog" data-bs-backdrop="static">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content carisa-purple">
                <div class="modal-header">
                  <h5 class="modal-title">Log In</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="d-flex justify-content-center flex-column">
                    <div class="container align-self-center card border-0">
                        <div class="card-body">
                            <form action="" id="login-form">
                              <div class="mb-3">
                                    <label for="lemail" class="form-label carisa-purple"><strong>Email</strong></label>
                                    <input type="text" name="email" id="lemail" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lpassword" class="form-label carisa-purple"><strong>Password</strong></label>
                                    <input type="password" name="password" id="lpassword" class="form-control" required>
                                </div>
                                <div class="d-flex flex-column gap-2">  
                                  <button class="btn carisa-btn w-lg-25">Login</button>
                                  <p class="carisa-purple text-center m-0 mt-2">Don't have an account? <a href="index.php?page=sign_up" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Sign Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <section class="bg-dark py-3">
            <?php include 'footer.php' ?>
        </section>
    </div>
    

</body>
</html>

<script>
  $('#login').click(function(){
    $('#login_modal').modal("show");
  })

  $(document).ready(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'ajax.php?action=login',
                method: 'post',
                data: $(this).serialize(),
                success: function(resp) {
                    if(resp == 1)
                        location.href = "index.php"
                    else
                      showAlert("Incorrect login credentials. Please try again.", "danger");
                }
            })
        })
    })
</script>