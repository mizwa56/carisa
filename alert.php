<div id="myAlert" class="alert-container top-0 start-50 translate-middle x" style="position: fixed; z-index: 99999">
    <div class="alert alert-<?php echo $_SESSION['alert'][1] ?> alert-dismissible" role="alert" style="transform: translateY(110px);">
        <div><?php echo $_SESSION['alert'][0] ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>