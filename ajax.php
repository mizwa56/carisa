<?php
    ob_start();
    $action = $_GET['action'];
    include 'class.php';

    $crud = new Action();

    if($action == 'save_user'){
        $save = $crud->save_user();
        if($save)
            echo $save;
    }

    if($action == 'login'){
        $login = $crud->login();
        if($login)
            echo $login;
    }

    if($action == "logout"){
        $login = $crud->logout();
        if($logout)
            echo $logout;
    }

    if($action == 'save_answer'){
        $save_ans = $crud->save_answer();
        if($save_ans)
            echo $save_ans;
    }

    if($action == 'data_serialization'){
        $ds = $crud->data_serialization();
        if($ds)
            print_r($ds);
    }
    
    ob_end_flush();
?>