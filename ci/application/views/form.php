<?php

?><!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title> <?=$title?></title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

</head>
<body>
	<form class="form-horizontal" method="post" action="form/add" >
<fieldset>

<legend>ADD BOOK</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="img-path">Image</label>  
  <div class="col-md-4">
  <input id="img-path" name="img-path" type="text" placeholder="Image Source" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title</label>  
  <div class="col-md-4">
  <input id="title" name="title" type="text" placeholder="Book Title" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="author">Author</label>  
  <div class="col-md-4">
  <input id="author" name="author" type="text" placeholder="Book Author" class="form-control input-md" required=""> 
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="publisher">Publisher</label>  
  <div class="col-md-4">
  <input id="publisher" name="publisher" type="text" placeholder="Book Publisher" class="form-control input-md" required=""> 
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="quantity">Quantity</label>  
  <div class="col-md-4">
  <input id="quantity" name="quantity" type="text" placeholder="Book Quantity" class="form-control input-md" required=""> 
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description">Write description</textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="btn-submit"></label>
  <div class="col-md-4">
    <button id="btn-submit" name="btn-submit" class="btn btn-success" type="Submit">Ok</button>
  </div>
</div>

</fieldset>
</form>

</body>
</html>