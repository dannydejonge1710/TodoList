<?php

function getOnePatient($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patients WHERE patient_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllPatients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patients LEFT JOIN species ON patients.species_id = species.species_id LEFT JOIN clients ON patients.client_id = clients.client_id ORDER BY patient_name";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;


	return $query->fetchAll();
}

function createPatient($data) 
{
	$patient_name = ($data['patient_name']);
	$species_id = ($data['species_id']);
	$patient_status = ($data['patient_status']);
	$client_id = ($data['client_id']);

	if (strlen($patient_name) == 0 || strlen($species_id) == 0 || strlen($patient_status) == 0 || strlen($client_id) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO patients(patient_name, species_id, patient_status, client_id) VALUES (:patient_name, :species_id, :patient_status, :client_id)";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		':patient_name' => $patient_name,
		':species_id' => $species_id,
		':patient_status' => $patient_status,
		':client_id' => $client_id));

	$db = null;
	
	return true;
}

function deletePatient($id) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM patients WHERE patient_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));
	
	$db = null;
	
	return true;
}



function editPatient($data) 
{
	$patient_name = ($data['patient_name']);
	$species_id = ($data['species_id']);
	$patient_status = ($data['patient_status']);
	$client_id = ($data['client_id']);
	$id = ($data['id']);
	
	if (strlen($patient_name) == 0 || strlen($species_id) == 0 || strlen($patient_status) == 0 || strlen($client_id) == 0 || strlen($id) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE patients SET patient_name = :patient_name, species_id = :species_id, patient_status = :patient_status, client_id = :client_id  WHERE patient_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(

		':patient_name' => $patient_name,
		':species_id' => $species_id,
		':patient_status' => $patient_status,
		':client_id' => $client_id,
		':id' => $id));

	$db = null;
	
	return true;
}



