<h1>Create task</h1>
<hr>

<?php if(count($errors)):?>
<div class="alert alert-danger">
	<?php foreach($errors as $error):?>
		<p>- <?php echo $error; ?></p>
	<?php endforeach;?>
</div>
<?php endif; ?>

<form class="form-horizontal" role="form" action="/task/update" method="POST">

  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name: </label>    
	<div class="col-sm-10">
		<p class="form-control"><?=$task->name?></p>
	</div>
  </div>
  
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Email: </label>    
	<div class="col-sm-10">
		<p class="form-control"><?=$task->email?></p>
	</div>
  </div>

  <div class="form-group">
    <label for="content" class="col-sm-2 control-label">Content</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="content" name="content" placeholder="Content"  required="true"><?=$task->content?></textarea>
    </div>
  </div>  
  
  <div class="form-group">  
    <label class="col-sm-2 control-label">Status</label>
	<div class="col-sm-10">
		<input type="checkbox" name="status" <?=$task->status?'checked':''?>> 
	</div>  
  </div>
  
  <input type="hidden" value="<?=$task->id?>" name="id">
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>