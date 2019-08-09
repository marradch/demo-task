
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Task management</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/offcanvas.css" rel="stylesheet">
  
  </head>

  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">My Tasks<?php echo (!empty($_SESSION['user']))?('('.$_SESSION['user'].')'):''?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo (isset($menuItem) && $menuItem == 'home')?'active':''; ?>"><a href="/">Home</a></li>
            <li class="<?php echo (isset($menuItem) && $menuItem == 'task')?'active':''; ?>"><a href="/task/index">Task</a></li>
			<?php if(!empty($_SESSION['user'])):?>
			<li><a href="/auth/exit">Logout</a></li>
			<?php else:?>
            <li class="<?php echo (isset($menuItem) && $menuItem == 'login')?'active':''; ?>"><a href="/auth/index">Login</a></li>
			<?php endif;?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">

      <?php
	  include("views\\".static::$name."\\".$templateName.'.php');
	  ?>

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
