<div class="container">

	<h1>Clients</h1>
	
	<ul>
		<li><a href="<?= URL ?>Patients/index">Patients</a></li>
		<li><a href="<?= URL ?>Clients/index">Clients</a></li>
		<li><a href="<?= URL ?>Species/index">Species</a></li>
	</ul>

		<table border="1">
		<tr>
			<th>Client Firstname</th>
			<th>Client Lastname</th>
			<th>Client Phonenumber</th>
			<th>Client Email</th>

			<th colspan="2">Action</th>
		</tr>

		<?php foreach ($clients as $client) { ?>

		<tr>
			<td><?= $client['client_firstname']; ?></td>
			<td><?= $client['client_lastname']; ?></td>
			<td><?= $client['client_phonenumber']; ?></td>
			<td><?= $client['client_email']; ?></td>

			<td><a href="<?= URL ?>Clients/edit/<?= $client['client_id'] ?>">Edit</a></td>
			<td><a href="<?= URL ?>Clients/delete/<?= $client['client_id'] ?>">Delete</a></td>
		</tr>
		
		<?php } ?>

	</table>

	<p><a href="<?= URL ?>Clients/create">Create</a></p>
	<p><a href="<?= URL ?>Patients/index">Home</a></p>
</div>