    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="./" class="navbar-brand">
                <img src="assets/img/carisalogo.png" class="" alt="CARISA Logo" width="100" height="42">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2 mt-lg-0 justify-content-end text-center" id="navbarSupportedContent">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link carisa-purple <?php if($title == "Home") echo("active") ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="index.php?page=page1" class="nav-link dropdown-toggle carisa-purple" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cancer Risk Assessments</a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?page=nasopharyngeal_cancer&id=7" class="dropdown-item my-2">Nasopharyngeal Cancer</a></li>
                            <li><a href="index.php?page=breast_cancer&id=6" class="dropdown-item my-2">Breast Cancer</a></li>
                            <li><a href="index.php?page=lung_cancer&id=8" class="dropdown-item my-2">Lung Cancer</a></li>
                            <li><a href="index.php?page=colon_cancer&id=9" class="dropdown-item my-2">Colon Cancer</a></li>
                            <li><a href="index.php?page=cervical_cancer&id=10" class="dropdown-item my-2">Cervical Cancer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=contact" class="nav-link carisa-purple <?php if($title == "Contact") echo("active") ?>">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=privacy_policy" class="nav-link carisa-purple <?php if($title == "Privacy Policy") echo("active") ?>">Privacy Policy</a>
                    </li>
                    <?php if(isset($_SESSION['login_id'])): ?>
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle carisa-purple" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user me-3"></i><?php echo $_SESSION['login_firstname']?></a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="index.php?page=manage_account&id=<?php echo $_SESSION['login_id'] ?>" class="dropdown-item">Manage Account <i class="fa-solid fa-address-card ms-2"></i></a></li>
                                <li><a href="ajax.php?action=logout" class="dropdown-item">Logout<i class="fa-solid fa-right-to-bracket ms-2"></i></a></li>
                            </ul>
                        </li>                        
                    <?php else: ?>
                        <li class="nav-item">
                            <button class="btn carisa-btn" id="login"><strong>Log In</strong><i class="fa-solid fa-right-to-bracket ms-2"></i></button>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>