
	<div class="wrap">
		<h1><?=$title?></h1>
	</div>

	<div class="books">
		<table class="table table-condensed table-borderless">
			<tbody>
				<?php for($i=0; $i<sizeof($books); $i++): ?>
					<tr>
						<td class="img-table" rowspan="3"><img width="150px" src="<?=$books[$i]['img_path'] ?>" alt="book-borrowed"/></td>
						<td><strong><p class="book-title"><?=$books[$i]['title']?></p></strong></td>
					</tr>
					<tr>
						<td><em><?=$books[$i]['author']?></em><br>Published by: <?=$books[$i]['publisher']?><br>
						Quantity: <?=$books[$i]['quantity']?><br></td>
					</tr>
					<form class="navbar-form navbar-right" method="post" action="borrowedBooks/return_book">
						<input type="hidden" name="ret_value" value="<?=$loans[$i]['loan_id']?>">
						<input type="hidden" name="bookid" value="<?=$books[$i]['book_id']?>">
						<tr><td><button class="btn btn-warning" name="return" type="submit">Return</button></td></tr>
					</form>
					
				<?php endfor; if(sizeof($books) == 0) { ?>
					You have no borrowed books.
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>