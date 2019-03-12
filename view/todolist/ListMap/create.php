<div class="container">
	<h1>Create</h1>
	<form action="<?= URL ?>Patients/createSave" method="post">
	
		<p><input required type="text" name="patient_name" placeholder="Patient name"></p>
		
		<p><select name="species_id">	
			<?php foreach ($species as $specie) { ?>
				<option value="<?= $specie['species_id'] ?>"><?= $specie['species_description'] ?></option>
			<?php } ?>
		</select></p>

		<p><input required type="text" name="patient_status" placeholder="Patient status"></p>
	
		<p><select name="client_id">	
			<?php foreach ($clients as $client) { ?>
				<option value="<?= $client['client_id'] ?>"><?= $client['client_firstname'] . " " . $client['client_lastname'] ?></option>
			<?php } ?>
		</select></p>


		<input type="submit" value="Verzenden">
	
	</form>

</div>