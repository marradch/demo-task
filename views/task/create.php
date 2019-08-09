<h1>Create task</h1>
<hr>

<?php if(count($errors)):?>
<div class="alert alert-danger">
	<?php foreach($errors as $error):?>
		<p>- <?php echo $error; ?></p>
	<?php endforeach;?>
</div>
<?php endif; ?>

<form class="form-horizontal" role="form" action="/task/save" method="POST">

  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Name" name="name" required="true">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email"  required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="content" class="col-sm-2 control-label">Content</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="content" name="content" placeholder="Content"  required="true"></textarea>
    </div>
  </div>  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Create</button>
    </div>
  </div>
</form>