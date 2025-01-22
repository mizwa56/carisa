<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        $title = isset($_GET['page']) ? ucwords(str_replace("_", ' ', $_GET['page'])) : 'Home' 
    ?>
    <title><?php echo $title ?> | CARISA</title>

    <link rel="stylesheet" href="assets/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/style.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <script src="assets\dist\js\jquery.min.js"></script>
    <script src="assets\dist\js\jquery-ui.min.js"></script>
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->
</head>