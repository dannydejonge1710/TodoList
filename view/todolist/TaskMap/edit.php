<div class="container">
	<h1>Edit</h1>
	<form action="<?= URL ?>Clients/editSave" method="post">
	
		<input type="text" name="firstname" placeholder="Firstname" value="<?= $clients['client_firstname'] ?>">
		<input type="text" name="lastname" placeholder="Lastname" value="<?= $clients['client_lastname'] ?>">
		<input type="text" name="phonenumber" placeholder="Phonenumber" value="<?= $clients['client_phonenumber'] ?>">
		<input type="text" name="email" placeholder="Email" value="<?= $clients['client_email'] ?>">

		<input type="hidden" name="id" value="<?= $clients['client_id']; ?>">
		<input type="submit" value="Verzenden">
	
	</form> 

</div>
