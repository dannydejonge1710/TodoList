<?php

function getOneClient($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients WHERE client_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllClients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients ORDER BY client_firstname";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;


	return $query->fetchAll();
}

function createClient($data) 
{
	$firstname = ($data['firstname']);
	$lastname = ($data['lastname']);
	$phonenumber = ($data['phonenumber']);
	$email = ($data['email']);


	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($phonenumber) == 0 || strlen($email) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO clients(client_firstname, client_lastname, client_phonenumber, client_email) VALUES (:firstname, :lastname, :phonenumber, :email)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':phonenumber' => $phonenumber,
		':email' => $email));

	$db = null;
	
	return true;
}

function deleteClient($id) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM clients WHERE client_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));
	
	$db = null;
	
	return true;
}



function editClient($data) 
{
	$firstname = ($data['firstname']);
	$lastname = ($data['lastname']);
	$phonenumber= ($data['phonenumber']);
	$email = ($data['email']);
	$id = ($data['id']);
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($phonenumber) == 0 || strlen($email) == 0 ||  strlen($id) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE clients SET client_firstname = :firstname, client_lastname = :lastname, client_phonenumber = :phonenumber, client_email = :email WHERE client_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':phonenumber' => $phonenumber,
		':email' => $email,
		':id' => $id));

	$db = null;
	
	return true;
}



