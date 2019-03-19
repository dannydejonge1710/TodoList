<?php

function getOneList($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllLists() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists ORDER BY id DESC";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function createList($data) 
{
	$name = ($data['name']);
	$description = ($data['description']);

	if (strlen($name) == 0 || strlen($description) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO lists(name, description) VALUES (:name, :description)";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':description' => $description));

	$db = null;
	
	return true;
}

function deleteList($id) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM lists WHERE id=:id ";

	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));
	
	$db = null;

	$db = openDatabaseConnection();

	$sql = "DELETE FROM tasks WHERE list_id=:id ";

	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));
	
	$db = null;
	
	return true;
}



function editList($data) 
{
	$name = ($data['name']);
	$description = ($data['description']);
	$id = ($data['id']);
	
	if (strlen($name) == 0 || strlen($description) == 0 || strlen($id) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE lists SET name = :name, description = :description  WHERE id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(

		':name' => $name,
		':description' => $description,
		':id' => $id));

	$db = null;
	
	return true;
}



