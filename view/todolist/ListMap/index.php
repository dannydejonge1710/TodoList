<div class="container">

	<h1>Lists</h1>

		<table border="1">

		<tr>
			<th>Name</th>
			<th>Description</th>

			<th colspan="2">Action</th>
		</tr>
	
		
		<?php foreach ($lists as $list) { ?>

		<tr>
			<td><?= $list['name']; ?></td>
			<td><?= $list['description']; ?></td>

			<td><a href="<?= URL ?>List/edit/<?= $list['id'] ?>">Edit</a></td>
			<td><a href="<?= URL ?>List/delete/<?= $list['id'] ?>">Delete</a></td>
		</tr>
		
		<?php } ?>	

	</table>

	<p><a href="<?= URL ?>List/create">Create</a></p>
	<p><a href="<?= URL ?>List/index">Home</a></p>
</div>
