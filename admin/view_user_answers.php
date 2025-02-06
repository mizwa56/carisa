<?php include 'db_connect.php' ?>
<?php 
	$qry = $conn->query("SELECT * FROM survey_set where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		if($k == 'title')
			$k = 'stitle';
		$$k = $v;
	}

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

    // select a.answer, q.question from answers a inner join questions q on a.question_id = q.id where q.survey_id = 7
?>

<div class="col-lg-12">
    <div class="row">
        <div class="col">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>Survey Details</b></h3>
				</div>
				<div class="card-body p-0 py-2">
					<div class="container-fluid">
						<p>Title: <b><?php echo $stitle ?></b></p>
						<p class="mb-0">Description:</p>
						<p><b><?php echo $description; ?></b></p>
					</div>
					<hr class="border-primary">
                    
                    <button class="btn btn-flat btn-sm bg-gradient-success" type="button" id="xls"><i class="fa fa-print"></i> XLS</button>
				</div>
			</div>
		</div>
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="card-title">English Assessment Answer</h4>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped overflow-x-scroll">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <?php foreach($qs as $q => $j): ?>
                                <th>Question <?php echo ++$q?></th>
                                <?php endforeach ?>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach($user_arr as $user):?>
                                    <th>User <?php echo $user ?></th>
                                <?php $user_ans = $conn->query("SELECT a.answer, q.question, q.frm_option from answers a inner join questions q on a.question_id = q.id where q.survey_id = {$id} and a.user_id = {$user}");
                                    while($row = $user_ans->fetch_assoc()):
                                ?>
                                <?php
                                    $i = 1;
                                    foreach(json_decode($row['frm_option']) as $k => $v){
                                    if($row['answer'] != $k) $i++;
                                    else break;
                                }
                                ?>
                                <td class=""><?php echo $i ?></td>
                                <?php endwhile ?>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	$('#xls').click(function(){
		var newXLS = window.open("get_users_answers.php?id=<?php echo $id ?>", "_blank")
	})
</script>