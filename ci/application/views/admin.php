<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title> <?=$title?></title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	

</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Library</a>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Ini Admin</a>
                    </li>
                    <li><a href="">Link</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" method="post" action="home/logout">
                    <button type="submit" name="btn-logout" class="btn btn-default">Sign Out</button>
                </form>
            </div>
        </center>
    </div>
  </div>
  <br>
  <br>

    <div class="books">
        <table class="table table-condensed table-borderless">
            <tbody>
                <?php $j = 0; foreach ($books as $value) { ?>
                    
                
                    <tr>
                        <td rowspan="3"><img width="150px" src="<?php echo $value['img_path']; ?>" alt="book-borrowed"/></td>
                        <td><strong><?php echo $value['title']; ?></strong></td>
                    </tr>
                    <tr>
                        <td><em><?php echo $value['author']; ?></em><br>Published by: <?php echo $value['publisher']; ?><br>
                        Qty: <?php echo $value['quantity']; ?><br></td>
                    </tr>
                    <tr><td><button class="btn btn-submit"><a href="book_details/view/<?=$value['book_id']?>">View Details...</a></button>
                    <?php if($value['quantity'] > 0) { 
                        if($is_loans[$j] > -1) { ?>
                    <form method="post" action="borrowedBooks/return_book">
                        <button class="btn btn-warning" name="return" type="submit">Kembalikan</button>
                        <input type="hidden" name="ret_value" value="<?=$is_loans[$j]?>">
                        <input type="hidden" name="bookid" value="<?=$value['book_id']?>">
                    </form>
                    <?php } else {?>
                    <form method="post" action="admin/borrow">
                        <button id="btn-submit" name="borrow" class="btn btn-success" type="Submit">Pinjam</button>
                        <input type="hidden" name="bookid" value="<?=$value['book_id']?>">
                    </form>
                    <?php }} $j = $j + 1; ?>
                    </td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>