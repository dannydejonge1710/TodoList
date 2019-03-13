<div class="container">
	<h1>Edit</h1>
	<form action="<?= URL ?>List/editSave" method="post">
	
		<p><input required type="text" name="name" placeholder="Name" value="<?= $lists['name'] ?>"></p>

		<p><input required type="text" name="description" placeholder="Description" value="<?= $lists['description'] ?>"></p>
	
		<input type="hidden" name="id" value="<?= $lists['id']; ?>">
		<input type="submit" value="Submit">
	
	</form> 

</div>
