<?php $lang = isset($_GET['lang']) ? $_GET['lang'] : ''; ?>
<section class="py-5">
    <div class="row container mx-auto">
        <div class="col-lg-5 my-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title fw-bold d-inline carisa-purple-light mb-3"><?php echo $title ?> Risk Assessment</h2><b class="carisa-purple ms-2"><?php echo $acronym ?></b>
                    <img src="assets/img/<?php echo $imgsrc?>" alt="" class="card-img-top rounded-0 mb-3">
                    <p class="carisa-purple card-text fs-4 mb-3"><?php echo $description ?></p>
                    <p class="carisa-purple card-text"><small>Take the risk assessment tool to find out more.</small></p>
                </div>
            </div>
        </div>
        <div class="col my-3">
            <?php if(!isset($_GET['lang'])): ?>
            <div class="card mb-5">
                <div class="card-body">
                    <?php echo isset($_SESSION['login_id']) ? '' : '<div class="alert alert-warning">To take the assessment, you need to have an account. <a href="index.php?page=sign_up">Click here to sign up.</a></div>' ?>
                    
                    <p class="card-title">Choose the language that you wish to use to take the assessment.</p>
                    <hr>
                    <div class="d-flex justify-content-between flex-column flex-lg-row gap-2">
                        <button class="btn carisa-btn btn-lg" onclick="location.href = 'index.php?page=<?php echo $_GET['page'] ?>&id=<?php echo $_GET['id'] ?>&lang=eng'">English</button>
                        <button class="btn carisa-btn btn-lg" onclick="location.href = 'index.php?page=<?php echo $_GET['page'] ?>&id=<?php echo $_GET['id'] ?>&lang=malay'">Malay</button>
                        <button class="btn carisa-btn btn-lg">Mandarin</button>
                        <button class="btn carisa-btn btn-lg">Iban</button>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Questions</strong>
                    <a href="index.php?page=<?php echo $_GET['page'] ?>&id=<?php echo $_GET['id'] ?>" class="btn carisa-btn">Choose Language</a>
                </div>

                <form action="" id="manage-survey" class="container d-flex flex-column gap-4">
					<input type="hidden" name="survey_id" value="<?php echo $id ?>">
                    <input type="hidden" name="survey_name" value="<?php echo $title ?>">
                    <input type="hidden" name="survey_acronym" value="<?php echo $acronym ?>">
				<div class="container py-4 d-flex flex-column gap-4">
					<?php 
					$question = $conn->query("SELECT * FROM questions where lang = '$lang' and  survey_id = $id order by abs(order_by) asc,abs(id) asc");
                    $i = 0;
					while($row=$question->fetch_assoc()):	
					?>
					<div class="d-flex flex-column gap-2 px-3 border-start border-5 border-warning rounded-start-1">
						<strong><?php echo $row['question'] ?></strong>	
                        <small class="showTxt" onclick="showInfo(<?php echo $i ?>)"><i>Show more</i></small>
                        <small class="moreInfo text-danger"><?php echo $row['more_info'] ?></small>
						<div class="col-md-12">
						<input type="hidden" name="qid[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">	
						<input type="hidden" name="type[<?php echo $row['id'] ?>]" value="<?php echo $row['type'] ?>">	
							<?php
								if($row['type'] == 'radio_opt'):
									foreach(json_decode($row['frm_option']) as $k => $v):
							?>
							<div class="form-check mb-2">
		                        <input class="form-check-input" type="radio" id="<?php echo $k ?>" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $v->points ?>" required>
                                <!-- <input type="hidden" name="key[<?php echo $k ?>]" value="<?php echo $v->label ?>"> -->
		                        <label class="form-check-label" for="<?php echo $k ?>"><?php echo $v->label ?></label>
		                     </div>
								<?php endforeach; ?>
						<?php else: ?>
							<div class="form-group">
								<textarea name="answer[<?php echo $row['id'] ?>]" id="" cols="30" rows="4" class="form-control" placeholder="Write Something Here..." ></textarea>
							</div>
						<?php endif; ?>
						</div>	
					</div>
					<?php 
                        $i++;
                        endwhile; 
                    ?>
				</div>
                <?php echo isset($_SESSION['login_id']) ? '' : '<div class="alert alert-warning">To take the assessment, you need to have an account. <a href="index.php?page=sign_up">Click here to sign up.</a></div>' ?>
				</form>

                

                <div class="card-footer">
                    <div class="d-flex w-100 justify-content-center">
						<button class="btn btn-primary mx-1" form="manage-survey" id="" <?php echo isset($_SESSION['login_id']) ? '' : 'disabled' ?>>Submit Answer</button>
						<button class="btn btn-primary mx-1" type="button" onclick="">Cancel</button>
					</div>
                </div>

                <!-- <form action="" id="questionnaire" class="container py-4 d-flex flex-column gap-4">
                    <div class="d-flex flex-column gap-2 px-3 border-start border-5 border-warning rounded-start-1">
                        <strong>Question goes here...</strong>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="" id="">
                            <label for="" class="form-check-label">Answer 1</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="" id="">
                            <label for="" class="form-check-label">Answer 2</label>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2 px-3 border-start border-5 border-warning">
                        <strong>Question goes here...</strong>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Write Something Here..."></textarea>
                        </div>
                    </div>
                </form>
                <div class="card-footer">
                    <div class="d-flex w-100 justify-content-center">
						<button class="btn btn-primary mx-1" form="manage-survey">Submit Answer</button>
						<button class="btn btn-primary mx-1" type="button" onclick="">Cancel</button>
					</div>
                </div> -->
            </div>
            <?php endif ?>
        </div>
        <div></div>
    </div>
</section>

<script>
    $('#manage-survey').submit(function(e) {
        e.preventDefault();
        let score = 0;
        let ansKey = [];
        const answer = $("input[type='radio']:checked");
        for(let i = 0; i < answer.length; i++){
            console.log(answer[i].id)
            ansKey.push(answer[i].id)
            score += parseInt(answer[i].value);    
        }
		const data = new FormData($(this)[0]);
        data.forEach((value, key) => data[key] = value);
        console.log($(this).serialize())
        getResult(data, score);

        $.ajax({
			// url:'ajax.php?action=data_serialization',
			url:'ajax.php?action=save_answer',
			method:'POST',
			data:{frm_data: $(this).serialize(), ans_key: ansKey},
			// data:$(this).serialize(),
            error:err=>{
	              console.log()
	              alert("An error occured")
	          },
			success:function(resp){
				if(resp == 1){
					// alert_toast("Thank You.",'success')
					// setTimeout(function(){
					// 	location.href = 'index.php?page=survey_widget'
					// },2000)
                    showAlert("You have successfully submitted your responsed. Thank you.", "success");
				}
                else
                    showAlert("An error occured. Please try again!.", "danger");
			}
		})
        
        // var risk;
        // var riskDesc;
        // var suggestion;
        // var score = 0;
        
        // const hiSuggestion = "We strongly suggest that you seek medical assistance (including Ear, Nose and Throat examination) from relevant medical specialist(s) as soon as possible to get further professional advice, and proper diagnosis. It is necessary that you consider quarterly to half yearly medical check up.";
        
        // const loSuggestion = "However, it is still good to live a healthy lifestyle, and go for regular medical check up.";
        
        // console.log(typeof(data))
        // console.log(typeof(data))
        

        // risk = (score > 5) ? "High Risk" : "Low Risk";
        // riskDesc = (score > 5) ? "high breast cancer risk" : "low breast cancer risk";
        // suggestion = (score > 5) ? hiSuggestion : loSuggestion;
        
        // uni_modal("Your responses on BreCRA: Breast Cancer Risk Assessment were successfully submitted.", "result.php", "large", risk, riskDesc, suggestion)
        // $('#score').html(score);
    })

    $('.moreInfo').hide();
    
    function showInfo(n) {
        const info = document.querySelectorAll('.moreInfo');
        const text = document.querySelectorAll('.showTxt');
        text[n].style.display = 'none';
        info[n].style.display = 'block';
        
    }

</script>