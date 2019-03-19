<div class="container">

	<h1>Tasks</h1>

		<form action="<?= URL ?>Task/index/<?= $id ?>" method="post">
	
			<input required type="number" name="filter" placeholder="Filter Duration">
			<input type="submit" value="Submit">
	
		</form>

		<a href="<?= URL ?>Task/index/<?= $id ?>">Reset</a>

		<table border="1">
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Status
				<a href="<?= URL ?>Task/index/<?= $id ?>/0"><i class="fas fa-arrow-up"></i></a>
				<a href="<?= URL ?>Task/index/<?= $id ?>/1"><i class="fas fa-arrow-down"></i></a>
			</th>
			<th>Duur</th>

			<th colspan="2">Action</th>
		</tr>

		<?php foreach ($tasks as $task) { ?>

		<tr>
			<td><?= $task['name']; ?></td>
			<td><?= $task['description']; ?></td>

			<?php if ($task['status'] == null) { ?>
				<td><a href="<?= URL ?>Task/status/<?= $task['id'] ?>/<?= $id ?>/0" style="color: darkred">Not done</a></td>
			<?php } else { ?>
				<td><a href="<?= URL ?>Task/status/<?= $task['id'] ?>/<?= $id ?>/1" style="color: green">Done</td>
			<?php } ?>

			<td><?= $task['duration']; ?> minuten</td>

			<td><a href="<?= URL ?>Task/edit/<?= $task['id'] ?>/<?= $id ?>"><i class="far fa-edit"></i></a></td>
			<td><a href="<?= URL ?>Task/delete/<?= $task['id'] ?>/<?= $id ?>"><i class="far fa-trash-alt"></i></a></td>
		</tr>
		
		<?php } ?>

	</table>

	<p><a href="<?= URL ?>Task/create/<?= $id ?>">Create</a></p>
	<p><a href="<?= URL ?>List/index">Back to my lists</a></p>
</div>