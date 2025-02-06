<?php 
    include 'db_connect.php' ;

    $qry = $conn->query("SELECT * FROM survey_set where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		if($k == 'title')
			$k = 'stitle';
		$$k = $v;
	}
	$taken = $conn->query("SELECT distinct(user_id) from answers a inner join questions q on q.id = a.question_id where a.survey_id ={$id} and q.lang = 'eng'")->num_rows;
	$taken_malay = $conn->query("SELECT distinct(user_id) from answers a inner join questions q on q.id = a.question_id where a.survey_id ={$id} and q.lang = 'malay'")->num_rows;
	$taken_mandarin = $conn->query("SELECT distinct(user_id) from answers a inner join questions q on q.id = a.question_id where a.survey_id ={$id} and q.lang = 'mandarin'")->num_rows;
	$taken_iban = $conn->query("SELECT distinct(user_id) from answers a inner join questions q on q.id = a.question_id where a.survey_id ={$id} and q.lang = 'iban'")->num_rows;

    $filename = $acronym . "_Assessment-Report_" . date('Y-m-d') . ".xls";
    $excel_data = "";


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

    $excel_data .= "English Assessment Report\n\n";
    $question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'eng' order by abs(order_by) asc,abs(id) asc");
    while($row=$question->fetch_assoc()){
        $excel_data .= $row['question'] . "\tAnswers\n";
        foreach(json_decode($row['frm_option']) as $k => $v) {
            $total = isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0;
            $excel_data .= $v->label . "\t" . $total . "\n";
        }
        $excel_data .= "\n";
    }


    $excel_data .= "\nMalay Assessment Report\n\n";
    $question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'malay' order by abs(order_by) asc,abs(id) asc");
    while($row=$question->fetch_assoc()){
        $excel_data .= $row['question'] . "\tAnswers\n";
        foreach(json_decode($row['frm_option']) as $k => $v) {
            $total = isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0;
            $excel_data .= $v->label . "\t" . $total . "\n";
        }
        $excel_data .= "\n";
    }

    $excel_data .= "\nMandarin Assessment Report\n\n";
    $question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'mandarin' order by abs(order_by) asc,abs(id) asc");
    while($row=$question->fetch_assoc()){
        $excel_data .= $row['question'] . "\tAnswers\n";
        foreach(json_decode($row['frm_option']) as $k => $v) {
            $total = isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0;
            $excel_data .= $v->label . "\t" . $total . "\n";
        }
        $excel_data .= "\n";
    }

    $excel_data .= "\nIban Assessment Report\n\n";
    $question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'iban' order by abs(order_by) asc,abs(id) asc");
    while($row=$question->fetch_assoc()){
        $excel_data .= $row['question'] . "\tAnswers\n";
        foreach(json_decode($row['frm_option']) as $k => $v) {
            $total = isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0;
            $excel_data .= $v->label . "\t" . $total . "\n";
        }
        $excel_data .= "\n";
    }

    // Headers for download 
    header("Content-Type: application/vnd.ms-excel"); 
    header("Content-Disposition: attachment; filename=\"$filename\""); 
 
    // Render excel data 
    echo $excel_data; 
    
    exit;

?>