<div class="books">
		<table class="table table-condensed table-borderless">
			<tbody>
				<?php foreach ($books as $value) { ?>
					
				
					<tr>
						<td class="img-table" rowspan="3"><img width="150px" src="<?php echo $value['img_path']; ?>" alt="book-borrowed"/></td>
						<td class="book-title"><strong><p class="book-title"><?php echo $value['title']; ?></p></strong></td>
					</tr>
					<tr>
						<td><em><?php echo $value['author']; ?></em><br>Published by: <?php echo $value['publisher']; ?><br>
						Quantity: <?php echo $value['quantity']; ?><br></td>
					</tr>
                    <tr><td><button class="btn btn-default"><a href="book_details/view/<?=$value['book_id']?>">View Details...</a></button></td></tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>