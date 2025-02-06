<?php include 'db_connect.php' ?>
<?php 
	$qry = $conn->query("SELECT * FROM survey_set where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		if($k == 'title')
			$k = 'stitle';
		$$k = $v;
	}

// select a.*, q.* from answers a inner join questions q on q.id = a.question_id where a.question_id = 29;

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
<style>
	.tfield-area{
		max-height: 30vh;
		overflow: auto;
	}
</style>
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>Survey Details</b></h3>
				</div>
				<div class="card-body p-0 py-2">
					<div class="container-fluid">
						<p>Title: <b><?php echo $stitle ?></b></p>
						<p class="mb-0">Description:</p>
						<p><b><?php echo $description; ?></b></p>
						<p>Have Taken in English: <b><?php echo number_format($taken) ?></b></p>
						<p>Have Taken in Malay: <b><?php echo number_format($taken_malay) ?></b></p>
						<p>Have Taken in Mandarin: <b><?php echo number_format($taken_mandarin) ?></b></p>
						<p>Have Taken in Malay: <b><?php echo number_format($taken_iban) ?></b></p>
					</div>
					<hr class="border-primary">
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card card-outline card-success">
				<div class="card-header">
					<h3 class="card-title"><b>Survey Report</b></h3>
					<div class="card-tools">
						<button class="btn btn-flat btn-sm bg-gradient-success" type="button" id="print"><i class="fa fa-print"></i> Print</button>
						<button class="btn btn-flat btn-sm bg-gradient-success" type="button" id="xls"><i class="fa fa-print"></i> XLS</button>
					</div>
				</div>
				<div class="card-body ui-sortable">
					<div class="accordion" id="surveyList">
						<div class="card">
								
							<div class="card-header" id="engSurvey">
								<h2 class="mb-0">
									<button type="button" class="btn btn-link btn-block text-left" data-toggle="collapse" data-target="#engBody" aria-expanded="true" aria-controls="engBody">English Survey</button>
								</h2>
							</div>

							<div class="collapse" id="engBody" aria-labelledby="engSurvey" data-parent="#surveyList">
								<div class="card-body">
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
									<?php endwhile ?>
									
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" id="malaySurvey">
								<h2 class="mb-0">
									<button type="button" class="btn btn-link btn-block text-left" data-toggle="collapse" data-target="#malayBody" aria-expanded="true" aria-controls="malayBody">Malay Survey</button>
								</h2>
							</div>

							<div class="collapse" id="malayBody" aria-labelledby="malaySurvey" data-parent="#surveyList">
								<div class="card-body">
								<?php 
									$question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'malay' order by abs(order_by) asc,abs(id) asc");
									while($row=$question->fetch_assoc()):	
									?>
									<div class="callout callout-info">
										<h5><?php echo $row['question'] ?></h5>	
										<div class="col-md-12">
										<input type="hidden" name="qid[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">	
										<input type="hidden" name="type[<?php echo $row['id'] ?>]" value="<?php echo $row['type'] ?>">	
											
											<?php if($row['type'] != 'textfield_s'):?>
												<ul>
											<?php foreach(json_decode($row['frm_option']) as $k => $v): 
												if($row['lang'] == 'eng')
													$currTaken = $taken;
												else if($row['lang'] == 'malay')
													$currTaken = $taken_malay;
												else if($row['lang'] == 'mandarin')
													$currTaken = $taken_mandarin;
												else if($row['lang'] == 'iban')
													$currTaken = $taken_iban;

												if(!$currTaken == 0){
													$prog = ((isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0) / $currTaken) * 100;
													$prog = round($prog,2);
												}
												else
													$prog = 0;
												?>
												<li>
													<div class="d-block w-100">
														<b><?php echo $v->label ?></b>
													</div>
													<div class="d-flex w-100">
													<span class=""><?php echo isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0 ?>/<?php echo $currTaken ?></span>
													<div class="mx-1 col-sm-8"">
													<div class="progress w-100" >
													<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prog ?>%">
														<span class="sr-only"><?php echo $prog ?>%</span>
													</div>
													</div>
													</div>
													<span class="badge badge-info"><?php echo $prog ?>%</span>
													</div>
												</li>
												<?php endforeach; ?>
												</ul>
										<?php else: ?>
											<div class="d-block tfield-area w-100 bg-dark">
												<?php if(isset($ans[$row['id']])): ?>
												<?php foreach($ans[$row['id']] as $val): ?>
												<blockquote class="text-dark"><?php echo $val ?></blockquote>
												<?php endforeach; ?>
												<?php endif; ?>
											</div>
										<?php endif; ?>
										</div>	
									</div>
									<?php endwhile; ?>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" id="mandarinSurvey">
								<h2 class="mb-0">
									<button type="button" class="btn btn-link btn-block text-left" data-toggle="collapse" data-target="#mandarinBody" aria-expanded="true" aria-controls="mandarinBody">Mandarin Survey</button>
								</h2>
							</div>

							<div class="collapse" id="mandarinBody" aria-labelledby="mandarinSurvey" data-parent="#surveyList">
								<div class="card-body">
								<?php 
									$question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'mandarin' order by abs(order_by) asc,abs(id) asc");
									while($row=$question->fetch_assoc()):	
									?>
									<div class="callout callout-info">
										<h5><?php echo $row['question'] ?></h5>	
										<div class="col-md-12">
										<input type="hidden" name="qid[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">	
										<input type="hidden" name="type[<?php echo $row['id'] ?>]" value="<?php echo $row['type'] ?>">	
											
											<?php if($row['type'] != 'textfield_s'):?>
												<ul>
											<?php foreach(json_decode($row['frm_option']) as $k => $v): 
												if($row['lang'] == 'eng')
													$currTaken = $taken;
												else if($row['lang'] == 'malay')
													$currTaken = $taken_malay;
												else if($row['lang'] == 'mandarin')
													$currTaken = $taken_mandarin;
												else if($row['lang'] == 'iban')
													$currTaken = $taken_iban;

												if(!$currTaken == 0){
													$prog = ((isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0) / $currTaken) * 100;
													$prog = round($prog,2);
												}
												else
													$prog = 0;
												?>
												<li>
													<div class="d-block w-100">
														<b><?php echo $v->label ?></b>
													</div>
													<div class="d-flex w-100">
													<span class=""><?php echo isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0 ?>/<?php echo $currTaken ?></span>
													<div class="mx-1 col-sm-8"">
													<div class="progress w-100" >
													<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prog ?>%">
														<span class="sr-only"><?php echo $prog ?>%</span>
													</div>
													</div>
													</div>
													<span class="badge badge-info"><?php echo $prog ?>%</span>
													</div>
												</li>
												<?php endforeach; ?>
												</ul>
										<?php else: ?>
											<div class="d-block tfield-area w-100 bg-dark">
												<?php if(isset($ans[$row['id']])): ?>
												<?php foreach($ans[$row['id']] as $val): ?>
												<blockquote class="text-dark"><?php echo $val ?></blockquote>
												<?php endforeach; ?>
												<?php endif; ?>
											</div>
										<?php endif; ?>
										</div>	
									</div>
									<?php endwhile; ?>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" id="ibanSurvey">
								<h2 class="mb-0">
									<button type="button" class="btn btn-link btn-block text-left" data-toggle="collapse" data-target="#ibanBody" aria-expanded="true" aria-controls="ibanBody">Iban Survey</button>
								</h2>
							</div>

							<div class="collapse" id="ibanBody" aria-labelledby="ibanSurvey" data-parent="#surveyList">
								<div class="card-body">
								<?php 
									$question = $conn->query("SELECT * FROM questions where survey_id = $id and lang = 'iban' order by abs(order_by) asc,abs(id) asc");
									while($row=$question->fetch_assoc()):	
									?>
									<div class="callout callout-info">
										<h5><?php echo $row['question'] ?></h5>	
										<div class="col-md-12">
										<input type="hidden" name="qid[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">	
										<input type="hidden" name="type[<?php echo $row['id'] ?>]" value="<?php echo $row['type'] ?>">	
											
											<?php if($row['type'] != 'textfield_s'):?>
												<ul>
											<?php foreach(json_decode($row['frm_option']) as $k => $v): 
												if($row['lang'] == 'eng')
													$currTaken = $taken;
												else if($row['lang'] == 'malay')
													$currTaken = $taken_malay;
												else if($row['lang'] == 'mandarin')
													$currTaken = $taken_mandarin;
												else if($row['lang'] == 'iban')
													$currTaken = $taken_iban;

												if(!$currTaken == 0){
													$prog = ((isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0) / $currTaken) * 100;
													$prog = round($prog,2);
												}
												else
													$prog = 0;
												?>
												<li>
													<div class="d-block w-100">
														<b><?php echo $v->label ?></b>
													</div>
													<div class="d-flex w-100">
													<span class=""><?php echo isset($ans[$row['id']][$k][$row['lang']]) ? count($ans[$row['id']][$k][$row['lang']]) : 0 ?>/<?php echo $currTaken ?></span>
													<div class="mx-1 col-sm-8"">
													<div class="progress w-100" >
													<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prog ?>%">
														<span class="sr-only"><?php echo $prog ?>%</span>
													</div>
													</div>
													</div>
													<span class="badge badge-info"><?php echo $prog ?>%</span>
													</div>
												</li>
												<?php endforeach; ?>
												</ul>
										<?php else: ?>
											<div class="d-block tfield-area w-100 bg-dark">
												<?php if(isset($ans[$row['id']])): ?>
												<?php foreach($ans[$row['id']] as $val): ?>
												<blockquote class="text-dark"><?php echo $val ?></blockquote>
												<?php endforeach; ?>
												<?php endif; ?>
											</div>
										<?php endif; ?>
										</div>	
									</div>
									<?php endwhile; ?>
								</div>
							</div>
						</div>
					</div>
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
	$('#print').click(function(){
		start_load()
		var nw = window.open("print_report.php?id=<?php echo $id ?>","_blank","width=800,height=600")
			nw.print()
			setTimeout(function(){
				nw.close()
				end_load()
			},2500)
	})
	$('#xls').click(function(){
		var newXLS = window.open("get_xlsx.php?id=<?php echo $id ?>", "_blank")
	})
// Array ( [13] => Array ( [VUkes] => Array ( [0] => 1 ) ) )
</script>

<!-- SELECT a.*,q.type from answers a inner join questions q on q.id = a.question_id where a.survey_id = 10 -->
