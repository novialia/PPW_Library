	<div class="books">
        <table class="table table-condensed table-borderless">
            <tbody>
                    <tr>
                        <td class="book-table" rowspan="4"><img width="200px" src="<?=$book['img_path'] ?>" alt="book-borrowed"/></td>
                        <td><strong><p class="book-title"><?=$book['title']?></p></strong></td>
                    </tr>
                    <tr>
                        <td><em><?=$book['author']?></em><br>Published by: <?=$book['publisher']?><br>
                        Quantity: <?=$book['quantity']?><br></td>
                    </tr>
                    <tr>
                        <?php if(isset($is_loan)) { ?>
                        <form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>borrowedBooks/return_book">
                            <input type="hidden" name="ret_value" value="<?=$is_loan->loan_id?>">
                            <input type="hidden" name="bookid" value="<?=$book['book_id']?>">
                            <td><button class="btn btn-warning" name="return" type="submit">Return</button></td>
                        </form>
                        <?php } if(isset($_SESSION['user'])) { ?>
                        <form method="post" action="<?php echo base_url();?><?php if($_SESSION['user']['role'] == 'admin'){?>admin<?php }else{ ?>userController<?php }?>/borrow">
                            <input type="hidden" name="bookid" value="<?=$book['book_id']?>">
                            <td><button id="btn-submit" name="borrow" class="btn btn-success" type="Submit">Take</button></td>
                        </form>
                        <?php } else { ?>
                            <td>Login to borrow book</td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td>Description:<br><?=$book['description']?></td>
                    </tr>
            </tbody>
        </table>
	</div>

    <div class="review-form">
        <form method="post" action="./add_review" id="add-review">
            <div class="form-group">
                <label class="control-label" for="review">Review</label>  
                <div class="">
                    <textarea id="review" name="user-review" type="text" placeholder="Add your review here..." class="form-control textarea-md" required=""></textarea>
                    <input type="hidden" name="bookid" value="<?=$book['book_id']?>">
                    <input id="btn-submit-review" class="btn btn-submit" name="submit-review" type="button" value="Submit Review">
                </div>
            </div>
        </form>
            
    </div><br>

    <div class="review">
        <h4>Reviews:</h4>

        <?php foreach ($reviews as $review) { ?>
            <h5><strong><?=$review['username']?></strong></h5>
            <em><?=$review['review']['date']?></em><br>
            <?=$review['review']['content']?><br><br>
        <?php } ?>
        <div class="new-review">
            
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
</body>
</html>