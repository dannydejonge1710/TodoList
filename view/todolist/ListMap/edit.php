<div class="container">
	<h1>Edit</h1>
	<form action="<?= URL ?>Patients/editSave" method="post">
	
		<p><input required type="text" name="patient_name" placeholder="Patient name" value="<?= $patients['patient_name'] ?>"></p>
		
		<p><select name="species_id">	
			<?php foreach ($species as $specie) { ?>
				<option 

				value="<?= $specie['species_id'] ?>"

				<?if($specie['species_id'] == $patients['species_id'])
				{
					echo "selected";
				} ?> 

				><?= $specie['species_description']?>
					
				</option>

			<?php } ?>

		</select></p>

		<p><input required type="text" name="patient_status" placeholder="Patient status" value="<?= $patients['patient_status'] ?>"></p>
	
		<p><select name="client_id">	
			<?php foreach ($clients as $client) { ?>
				<option 

				value="<?= $client['client_id'] ?>"

				<?if($client['client_id'] == $patients['client_id'])
				{
					echo "selected";
				} ?> 

				><?= $client['client_firstname'] . " " . $client['client_lastname'] ?>
			
				</option>

			<?php } ?>

		</select></p>


		<input type="hidden" name="id" value="<?= $patients['patient_id']; ?>">
		<input type="submit" value="Verzenden">
	
	</form> 

</div>
