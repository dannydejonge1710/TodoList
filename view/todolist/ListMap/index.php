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
			<td><a href="<?= URL ?>Task/index/<?= $list['id'] ?>"><?= $list['name']; ?></a></td>
			<td><?= $list['description']; ?></td>

			<td><a href="<?= URL ?>List/edit/<?= $list['id'] ?>"><i class="far fa-edit"></i></a></td>
			<td><a href="<?= URL ?>List/delete/<?= $list['id'] ?>"><i class="far fa-trash-alt"></i></a></td>
		</tr>
		
		<?php } ?>	

	</table>

	<p><a href="<?= URL ?>List/create">Create</a></p>
	<p><a href="<?= URL ?>List/index">Home</a></p>
</div>
