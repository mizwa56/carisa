<?php
    include 'db_connect.php' ;

    require_once 'PhpXlsxGenerator.php'; 

    $qry = $conn->query("SELECT * FROM survey_set where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		if($k == 'title')
			$k = 'stitle';
		$$k = $v;
	}

    $filename = $acronym . "_Assessment-Report_" . date('Y-m-d') . ".xlsx";
    $excel_data = array();

	$answers = $conn->query("SELECT a.*,q.type,q.lang from answers a inner join questions q on q.id = a.question_id where a.survey_id ={$id}");
	$ans = array();

	while($row=$answers->fetch_assoc()){
		if($row['type'] == 'radio_opt'){
			$ans[$row['question_id']][$row['answer']][$row['lang']][] = 1;
		}
		if($row['type'] == 'check_opt'){
			foreach(explode(",", $row['answer']) as $v){
				$ans[$row['question_id']][$v][$row['lang']][] = 1;
			}
		}
		if($row['type'] == 'textfield_s'){
			$ans[$row['question_id']][] = $row['answer'];
		}
	}

    $excel_data[] = array("English Assessment Summary", "\n");
    $question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'eng' order by abs(order_by) asc,abs(id) asc");
    while($row=$question->fetch_assoc()){
        $excel_data[] = array($row['question'], "Answers");
        foreach(json_decode($row['frm_option']) as $k => $v) {
            $total = isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0;
            $line_data = array($v->label, $total);
            $excel_data[] = $line_data;
        }
        $excel_data[] = array("\n");
    }

    $excel_data[] = array("Malay Assessment Summary", "\n");
    $question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'malay' order by abs(order_by) asc,abs(id) asc");
    while($row=$question->fetch_assoc()){
        $excel_data[] = array($row['question'], "Answers");
        foreach(json_decode($row['frm_option']) as $k => $v) {
            $total = isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0;
            $line_data = array($v->label, $total);
            $excel_data[] = $line_data;
        }
        $excel_data[] = array("\n");
    }

    $excel_data[] = array("Mandarin Assessment Summary", "\n");
    $question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'mandarin' order by abs(order_by) asc,abs(id) asc");
    while($row=$question->fetch_assoc()){
        $excel_data[] = array($row['question'], "Answers");
        foreach(json_decode($row['frm_option']) as $k => $v) {
            $total = isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0;
            $line_data = array($v->label, $total);
            $excel_data[] = $line_data;
        }
        $excel_data[] = array("\n");
    }

    $excel_data[] = array("Iban Assessment Summary", "\n");
    $question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'iban' order by abs(order_by) asc,abs(id) asc");
    while($row=$question->fetch_assoc()){
        $excel_data[] = array($row['question'], "Answers");
        foreach(json_decode($row['frm_option']) as $k => $v) {
            $total = isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0;
            $line_data = array($v->label, $total);
            $excel_data[] = $line_data;
        }
        $excel_data[] = array("\n");
    }

    // Export data to excel and download as xlsx file 
    $xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excel_data ); 
    $xlsx->downloadAs($filename); 
    
    exit; 
?>