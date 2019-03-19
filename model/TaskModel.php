<?php

function getOneTask($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getFilteredTasks($id, $sort, $data) 
{
	$filter = ($data['filter']);

	var_dump($filter);

	$db = openDatabaseConnection();

	$sql = null;
	if ($data == null) {
		$sql = "SELECT * FROM tasks WHERE list_id = :id ORDER BY id DESC";
	} else {
		$sql = "SELECT * FROM tasks WHERE list_id = :id AND duration = :duration ORDER BY id DESC";
	}

	if ($sort == 0) {
		$sql = "SELECT * FROM tasks WHERE list_id = :id ORDER BY status DESC";
	}

	if ($sort == 1) {
		$sql = "SELECT * FROM tasks WHERE list_id = :id ORDER BY status ASC";
	}

	$query = $db->prepare($sql);
	if ($data == null) {
		$query->execute([
		":id" => $id,
		]);
	} else {
		$query->execute([
		":id" => $id,
		":duration" => $filter,
		]);
	}

	$db = null;

	return $query->fetchAll();
}

function createTask($data) 
{
	$name = ($data['name']);
	$description = ($data['description']);
	$list_id = ($data['list_id']);
	$duration = ($data['duration']);

	if (strlen($name) == 0 || strlen($description) == 0 || strlen($list_id) == 0 || strlen($duration) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO tasks(name, description, list_id, duration) VALUES (:name, :description, :list_id, :duration)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':duration' => $duration,
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

function editTask($data) 
{
	$name = ($data['name']);
	$description = ($data['description']);
	$list_id = ($data['list_id']);
	$duration = ($data['duration']);
	$id = ($data['id']);
	
	if (strlen($name) == 0 || strlen($description) == 0 || strlen($list_id) == 0 || strlen($id) == 0 || strlen($duration) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE tasks SET name = :name, description = :description, list_id = :list_id, duration = :duration WHERE id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':description' => $description,
		':list_id' => $list_id,
		':duration' => $duration,
		':id' => $id));

	$db = null;
	
	return true;
}

function changeStatus($id, $check)
{
	if ($check == 0) {
		$db = openDatabaseConnection();
		$sql = "UPDATE tasks SET status = :status WHERE id = :id";

		$query = $db->prepare($sql);
		$query->execute(array(
			':status' => 1,
			':id' => $id));

		$db = null;
		
		return true;
	} 

	if ($check == 1) {
		$db = openDatabaseConnection();
		$sql = "UPDATE tasks SET status = :status WHERE id = :id";

		$query = $db->prepare($sql);
		$query->execute(array(
			':status' => null,
			':id' => $id));

		$db = null;
		
		return true;
	}

	return false;
}



