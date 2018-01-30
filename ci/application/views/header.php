<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
?><!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title> <?=$title?> </title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
     <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Library</a>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <?php if(isset($_SESSION['user'])) { ?>
                    <ul class="nav navbar-nav">
                        <?php if(isset($_SESSION['role'])) { 
                            $role = $_SESSION['role'];
                            if($role == "admin") {
                            ?>
                        <li class="nav-btn" id ="add-books"><a href="<?php echo base_url(); ?>form">Add Books</a>
                        <li class="nav-btn" id="my-books"><a href="<?php echo base_url(); ?>borrowedBooks">My Books</a>
                        </li>
                        <?php } else if($role == "user"){ ?>
                        <li class="nav-btn" id="my-books"><a href="<?php echo base_url(); ?>borrowedBooks">My Books</a>
                        </li>
                        <?php } }?>
                    </ul>
                <?php  } ?>

                <?php if(!isset($_SESSION['user'])) { ?>
                <form  id="login-form" class="navbar-form navbar-right" role="search" method="post" action="<?php echo base_url();?>home/login">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pass" placeholder="Password" required>
                    </div>
                    <button type="submit" name="btn-login" class="btn btn-default">Sign In</button>
                </form>
                <?php } ?>
                <?php if(isset($_SESSION['user'])) { ?>
                <form id="logout-btn" class="navbar-form navbar-right" role="search" method="post" action="<?php echo base_url();?>home/logout">
                    <button type="submit" name="btn-logout" class="btn btn-default">Sign Out</button>
                </form>
                <?php } ?>
            </div>
        </center>
    </div>
</div>
<br>
<br>
<?php if(isset($_SESSION['message'])) { ?>
<div class="alert alert-danger">
  <strong><?=$_SESSION['message']?></strong>
</div>
<?php } unset($_SESSION['message']);?>