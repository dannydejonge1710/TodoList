<div class="container">
	<h1>Edit</h1>
	<form action="<?= URL ?>Task/editSave/<?= $list_id ?>" method="post">
	
		<input required type="text" name="name" placeholder="Name" value="<?= $tasks['name'] ?>">
		<input required type="text" name="description" placeholder="Description" value="<?= $tasks['description'] ?>">
		<input required type="number" name="duration" placeholder="Duration in minutes" value="<?=  $tasks['duration'] ?>">


		<input type="hidden" name="list_id" value="<?= $tasks['list_id']; ?>">
		<input type="hidden" name="id" value="<?= $tasks['id']; ?>">
		<input type="submit" value="Submit">
	
	</form> 

</div>
