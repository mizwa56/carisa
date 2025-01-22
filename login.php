<!DOCTYPE html>
<html lang="en">  
<?php 
    session_start();
    include('./db_connect.php');
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login | CARISA</title>
        <link rel="stylesheet" href="assets/dist/css/bootstrap.css">
        <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/style.css">
        <script src="assets\dist\js\jquery.min.js"></script>
    </head>

    <body class="text-bg-dark">
        <div class="d-flex justify-content-center flex-column" style="height: 100vh;">
            <h4 class="text-white align-self-center mb-3">Admin Login</h4>
            <div class="container w-lg-100 w-25 align-self-center card">
                <div class="card-body">
                    <form action="" id="login-form">
                        <div class="mb-3">
                            <label for="username" class="form-label"><strong>Username</strong></label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><strong>Password</strong></label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <input type="button" value="Home" onclick="window.location.href = 'index.php'" class="btn btn-outline-danger w-lg-25">
                            <button class="btn btn-outline-secondary w-lg-25" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
<script>
    $(document).ready(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault();
            console.log($(this).serialize())
            // $.ajax({
            //     url: 'ajax.php?action=login',
            //     method: 'post',
            //     data: $(this).serialize(),
            //     success: function(resp) {
            //         if(resp == 1)
            //             location.href = "index.php"
            //         else
            //             console.log("Wrong. Fuck you!")
            //     }
            // })
        })
    })
</script>