<div class="container text-bg-dark">
    <p class="mb-0 text text-lg-start text-center">Copyright © 2023</p>
</div>

<script>
    $(document).ready(function(){
		// Loading Animation
		window.start_load = function(){
	    	$('body').prepend('<div id="preloader2"></div>')
		}
		window.end_load = function(){
			$('#preloader2').fadeOut('fast', function() {
				$(this).remove();
			})
		}
  	})

	// Result Modal (after submitting questionnaire responses)
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

	// Show alert for notification
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
</script>
<!-- Bootstrap Bundle JS -->
<script src="assets\dist\js\bootstrap.bundle.min.js"></script>
<!-- Custom JavaScript -->
<script src="assets\script.js"></script>
