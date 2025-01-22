<div class="container my-5">
  <form id="myForm">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <output id="output"></output>
</div>

<script>
  $('#myForm').submit(function(e) {
      e.preventDefault();

      $.ajax({
        url: 'ajax.php?action=save_user',
        data: new FormData($(this)[0]),
        cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
        success: function(resp) {
          (resp == 1) ? window.alert("User added.") : window.alert("Error occured!");
          // window.alert(resp)
        }
      })
  })
</script>