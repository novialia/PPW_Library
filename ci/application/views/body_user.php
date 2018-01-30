<div class="books">
        <table class="table table-condensed table-borderless">
            <tbody>
                <?php $j = 0; foreach ($books as $value) { ?>
                    
                
                    <tr>
                        <td class="img-table" rowspan="3"><img width="150px" src="<?php echo $value['img_path']; ?>" alt="book-borrowed"/></td>
                        <td><strong><p class="book-title"><?php echo $value['title']; ?></p></strong></td>
                    </tr>
                    <tr>
                        <td><em><?php echo $value['author']; ?></em><br>Published by: <?php echo $value['publisher']; ?><br>
                        Quantity: <?php echo $value['quantity']; ?><br></td>
                    </tr>
                    <tr><td><button class="btn btn-default"><a href="book_details/view/<?=$value['book_id']?>">View Details...</a></button>
                    <?php if($is_loans[$j] > -1) { ?>
                    <form method="post" action="borrowedBooks/return_book">
                        <button class="btn btn-warning" name="return" type="submit">Return</button>
                        <input type="hidden" name="ret_value" value="<?=$is_loans[$j]?>">
                        <input type="hidden" name="bookid" value="<?=$value['book_id']?>">
                    </form>
                    <?php } if($value['quantity'] > 0) { ?>
                    <form method="post" action="userController/borrow">
                        <button id="btn-submit" name="borrow" class="btn btn-success" type="Submit">Take</button>
                        <input type="hidden" name="bookid" value="<?=$value['book_id']?>">
                    </form>
                    <?php } $j = $j + 1; ?>
                    </td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>