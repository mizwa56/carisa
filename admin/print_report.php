<?php include 'header.php' ?>
<?php include 'db_connect.php' ?>
<?php 
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

$answers = $conn->query("SELECT a.*,q.type,q.lang from answers a inner join questions q on q.id = a.question_id where a.survey_id ={$id}");
$ans = array();

while($row=$answers->fetch_assoc()){
	if($row['type'] == 'radio_opt'){
		// isset($ans[$row['question_id']][$row['answer']]) ? $ans[$row['question_id']][$row['answer']][0]++ : $ans[$row['question_id']][$row['answer']][] = 1; //$ans[13][VUkes][] = 1
		// $ans[$row['question_id']][$row['answer']][] = 1;
		$ans[$row['question_id']][$row['answer']][$row['lang']][] = 1;
		// $ans[$row['question_id']][$row['answer']][0]++; //$ans[13][VUkes][] = 1
	}
	if($row['type'] == 'check_opt'){
		// foreach(explode(",", str_replace(array("[","]"), '', $row['answer'])) as $v){
		foreach(explode(",", $row['answer']) as $v){
			// $ans[$row['question_id']][$v][] = 1;
			$ans[$row['question_id']][$v][$row['lang']][] = 1;
		}
	}
	if($row['type'] == 'textfield_s'){
		$ans[$row['question_id']][] = $row['answer'];
	}
}
?>
<div class="col-lg-12">
	<p>Title: <b><?php echo $stitle ?></b></p>
	<p class="mb-0">Description:</p>
	<small><?php echo $description; ?></small>
	<p>Start: <b><?php echo date("M d, Y",strtotime($start_date)) ?></b></p>
	<p>End: <b><?php echo date("M d, Y",strtotime($end_date)) ?></b></p>
	<p>Have Taken: <b><?php echo number_format($taken) ?></b></p>

	<div class="row">
		<div class="col-md-12">
			<div class="card card-outline card-success">
				<div class="card-header">
					<h3 class="card-title"><b>Report</b></h3>
				</div>
				<div class="card-body ui-sortable">
					<?php
						$question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'eng' order by abs(order_by) asc,abs(id) asc");
						while($row=$question->fetch_assoc()):	
					?>
					<div class="">
						<!-- <h5><?php echo $row['question'] ?></h5> -->
						<table class="table table-sm table-striped">
							<thead>
								<tr>
									<th scope="col" style="width: 80%"><?php echo $row['question'] ?></th>
									<th scope="col" class="text-center">Total taken (<?php echo $taken ?>)</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach(json_decode($row['frm_option']) as $k => $v):
										if($row['lang'] == 'eng') $currTaken = $taken;
										else if($row['lang'] == 'malay') $currTaken = $taken_malay;
										else if($row['lang'] == 'mandarin') $currTaken = $taken_mandarin;
										else if($row['lang'] == 'iban') $currTaken = $taken_iban;
								?>
									<tr>
										<td><?php echo $v->label ?></td>
										<td class="text-center"><?php echo isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0 ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#manage-survey').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_answer',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Thank You.",'success')
					setTimeout(function(){
						location.href = 'index.php?page=survey_widget'
					},2000)
				}
			}
		})
	})
</script>