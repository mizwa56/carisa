<div class="container text-bg-dark">
    <p class="mb-0 text text-lg-start text-center">Copyright © 2023</p>
</div>

<script>
    $(document).ready(function(){
	  // $('.datetimepicker').datetimepicker({
	  //     format:'Y/m/d H:i',
	  //     startDate: '+3d'
	  // })
  	})

    window.start_load = function(){
	    $('body').prepend('<div id="preloader2"></div>')
	}

	window.end_load = function(){
	    $('#preloader2').fadeOut('fast', function() {
	        $(this).remove();
	      })
	}

	window.uni_modal = function($title = '' , $url='', $size="", $result = []){
		start_load()
		$.ajax({
			url:$url,
			error:err=>{
				console.log()
				alert("An error occured")
			},
			success:function(resp){
				if(resp){
				console.log(resp)
				$('#uni_modal .modal-title').html($title)
				$('#uni_modal .modal-body').html(resp)
				$('#risk').html($result['risk'])
				$('#riskDesc').html($result['desc'])
				$('#suggestion').html($result['suggestion'])
				$('#uni_modal #risk').addClass("badge " + $result['badge'])
				if($size != ''){
					$('#uni_modal .modal-dialog').addClass($size)
				}else{
					$('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-xl")
				}
				$('#uni_modal').modal("show");
				end_load()
				}
			}
		})
	}

	window.showAlert = function($msg, $style){
	$('.alert-container').css('position', 'fixed');
	$('.alert-container').css('z-index', '999999');
	$('.alert-container').append([
		'<div class="alert alert-' + $style + ' alert-dismissible" role="alert">',
		'<div>' + $msg + '</div>',
		'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
		'</div>'
	].join(''))
	$('.alert').css('transform', 'translateY(110px)');
	}

	window.getResult = function($data, $score) {
	const hiSuggestion = "We strongly suggest that you seek medical assistance (including Ear, Nose and Throat examination) from relevant medical specialist(s) as soon as possible to get further professional advice, and proper diagnosis. It is necessary that you consider quarterly to half yearly medical check up.";
	const middleSuggestion = "While you may be healthy now, it is advisable that you go for regular medical check up. It pays to have a healthy lifestyle too.";
	const loSuggestion = "However, it is still good to live a healthy lifestyle, and go for regular medical check up.";
	
	let result = [];
	result['title'] = "Your responses on " + $data.survey_acronym + ": " + $data.survey_name + " Risk Assessment were successfully submitted."
	// $score = 37;

	if($data.survey_id == 6) {
		if($score <= 20) {
			result['risk'] = "Low Risk";
			result['rating'] = "low";
			result['suggestion'] = loSuggestion;
			result['badge'] = "text-bg-success";
		}
		else if($score >= 21 && $score <= 31) {
			result['risk'] = "Moderate Risk";
			result['rating'] = "low to moderate";
			result['suggestion'] = middleSuggestion;
			result['badge'] = "text-bg-warning";
		}
		else {
			result['risk'] = "High Risk";
			result['rating'] = "moderate to high";
			result['suggestion'] = hiSuggestion;
			result['badge'] = "text-bg-danger";
		}
		result['desc'] = $data.survey_acronym + " indicate a <mark>" + result['rating'] + " " + $data.survey_name + " risk.</mark> Score: " + $score;
	}
	else if($data.survey_id == 7) {
		if($score <= 18) {
			result['risk'] = "Low Risk";
			result['rating'] = "low";
			result['suggestion'] = loSuggestion;
			result['badge'] = "text-bg-success";
		}
		else if($score >= 19 && $score <= 36) {
			result['risk'] = "Moderate Risk";
			result['rating'] = "low to moderate";
			result['suggestion'] = middleSuggestion;
			result['badge'] = "text-bg-warning";
		}
		else {
			result['risk'] = "High Risk";
			result['rating'] = "moderate to high";
			result['suggestion'] = hiSuggestion;
			result['badge'] = "text-bg-danger";
		}
		result['desc'] = $data.survey_acronym + " indicate a <mark>" + result['rating'] + " " + $data.survey_name + " risk.</mark> Score: " + $score;
	}
	uni_modal(result['title'], "result.php", "large", result)

	// let resultTitle;
	// let risk;
	// let riskDesc;
	// let suggestion;
	// let riskRating;
	// let score = 0;


	// resultTitle = "Your responses on " + $data.survey_acronym + ": " + $data.survey_name + " Risk Assessment were successfully submitted.";

	// risk = (score > 5) ? "High Risk" : "Low Risk";
	// riskRating = (score > 5) ? "moderate to high" : "low";
	// suggestion = (score > 5) ? hiSuggestion : loSuggestion;

	// riskDesc = $data.survey_acronym + " indicate a " + riskRating + " " + $data.survey_name + " risk."
	
	// uni_modal(resultTitle, "result.php", "large", risk, riskDesc, suggestion)
	// $('#score').html(score);
	// console.log(score)
	}
</script>
<script src="assets\dist\js\bootstrap.bundle.min.js"></script>
<script src="assets\script.js"></script>
