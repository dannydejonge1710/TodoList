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

function getFilteredTasks($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE list_id = :id ORDER BY id DESC";

	$query = $db->prepare($sql);
	$query->execute([
		":id" => $id
	]);

	$db = null;

	return $query->fetchAll();
}

function createTask($data) 
{
	$name = ($data['name']);
	$description = ($data['description']);
	$list_id = ($data['list_id']);

	if (strlen($name) == 0 || strlen($description) == 0 || strlen($list_id) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO tasks(name, description, list_id) VALUES (:name, :description, :list_id)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':description' => $description,
		':list_id' => $list_id));

	$db = null;
	
	return true;
}

function deleteTask($id) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM tasks WHERE id=:id ";
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



