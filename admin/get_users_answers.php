<?php
    include 'db_connect.php' ;

    require_once 'PhpXlsxGenerator.php'; 

    $qry = $conn->query("SELECT * FROM survey_set where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		if($k == 'title')
			$k = 'stitle';
		$$k = $v;
	}

    $filename = $acronym . "_Users-Answers_" . date('Y-m-d') . ".xlsx";
    $excel_data = array();

	$qs = [];
    $questions = $conn->query("SELECT question FROM questions WHERE survey_id = {$id} and lang = 'eng' order by abs(order_by) asc,abs(id) asc");
    while($row = $questions->fetch_assoc()) {
        $qs[] = $row['question'];
    }

    $users = $conn->query("SELECT DISTINCT(user_id) FROM answers WHERE survey_id = {$id}");
    $user_arr = [];

    if($users->num_rows > 0){
        while($row = $users->fetch_assoc()){
            $user_arr[] = $row['user_id'];
        }
    }

    $excel_data[] = array($acronym . " Users Answers", "\n");
    $q_data = array("Questions");

    foreach($qs as $q => $j) {
        // $q_data[] = $j;
        $q_data[] = "Q" . ++$q;
    }
    $excel_data[] = $q_data;

    foreach($user_arr as $user) {
        $line_data = array("User " . $user);
        
        $user_ans = $conn->query("SELECT a.answer, q.question, q.frm_option from answers a inner join questions q on a.question_id = q.id where q.survey_id = {$id} and a.user_id = {$user}");
        while($row = $user_ans->fetch_assoc()) {
            $i = 1;
            foreach(json_decode($row['frm_option']) as $k => $v) {
                if($row['answer'] != $k) $i++;
                else break;
            }
            $line_data[] = $i;
        }
        $excel_data[] = $line_data;
    }
    
    $excel_data[] = "\n";
    foreach($qs as $index => $question) {
        $index++;
        $line_data = array("Q" . $index, $question);
        $excel_data[] = $line_data;
    }

    // Export data to excel and download as xlsx file 
    $xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excel_data ); 
    $xlsx->downloadAs($filename); 
    
    exit; 
?>