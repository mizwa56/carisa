<?php include 'db_connect.php' ?>
<?php 
    $qry = $conn->query("SELECT * FROM survey_set where id = ".$_GET['id'])->fetch_array();
    foreach($qry as $k => $v){
        if($k == 'title')
            $k = 'stitle';
        $$k = $v;
    }

    $imgsrc = "cervicalriskassessment.png";

    include 'answer_questoinnaire.php';
?>

