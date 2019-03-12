<div class="container">

	<h1>Create</h1>
	
	<form action="<?= URL ?>Clients/createSave" method="post">
	
		<input required type="text" name="firstname" placeholder="Firstname">
		<input required type="text" name="lastname" placeholder="Lastname">
		<input required type="number" name="phonenumber" placeholder="Phonenumber">
		<input required type="text" name="email" placeholder="Email">

		<input type="submit" value="Verzenden">
	
	</form>

</div>