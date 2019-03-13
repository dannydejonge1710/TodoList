<div class="container">

	<h1>Create</h1>
	
	<form action="<?= URL ?>Task/createSave/<?= $id ?>" method="post">
	
		<input required type="text" name="name" placeholder="Name">
		<input required type="text" name="description" placeholder="Description">

		<input type="hidden" name="list_id" value="<?= $id ?>">

		<input type="submit" value="Submit">
	
	</form>

</div>