<div class="container">

	<h1>Tasks</h1>

		<table border="1">
		<tr>
			<th>Name</th>
			<th>Description</th>

			<th colspan="2">Action</th>
		</tr>

		<?php foreach ($tasks as $task) { ?>

		<tr>
			<td><?= $task['name']; ?></td>
			<td><?= $task['description']; ?></td>

			<td><a href="<?= URL ?>Task/edit/<?= $task['id'] ?>/<?= $id ?>"><i class="far fa-edit"></i></a></td>
			<td><a href="<?= URL ?>Task/delete/<?= $task['id'] ?>/<?= $id ?>"><i class="far fa-trash-alt"></i></a></td>
		</tr>
		
		<?php } ?>

	</table>

	<p><a href="<?= URL ?>Task/create/<?= $id ?>">Create</a></p>
	<p><a href="<?= URL ?>List/index">Back to my lists</a></p>
</div>