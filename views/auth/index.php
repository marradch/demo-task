<h1>Log In</h1>
<hr>

<?php if(count($errors)):?>
<div class="alert alert-danger">
	<?php foreach($errors as $error):?>
		<p>- <?php echo $error; ?></p>
	<?php endforeach;?>
</div>
<?php endif; ?>

<form role="form" method="post" action="/auth/authenticate">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required="true">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required="true">
  </div>  
  <button type="submit" class="btn btn-default">Log In</button>
</form>