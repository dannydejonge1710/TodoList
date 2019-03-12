<?php

require(ROOT . "model/PatientsModel.php");
require(ROOT . "model/ClientsModel.php");

function index()
{
	render("hospital/PatientsMap/index", array(
		'patients' => getAllPatients()
	));
}

function create()
{
	render("hospital/PatientsMap/create", array(
		'species' => getAllSpecies(),
		'clients' => getAllClients()
	));
}

function createSave()
{
	if (!createPatient($_POST)) {
		header("Location:" . URL . "error/index");
		exit();
	}


	header("Location:" . URL . "Patients/index");
}

function delete($id)
{
	if (!deletePatient($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "Patients/index");
}


function edit($id)
{
	render("hospital/PatientsMap/edit", array(
		'patients' => getOnePatient($id),
		'clients' => getAllClients(),
		'species' => getAllSpecies()
	));
}


function editSave()
{
	if (!editPatient($_POST)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "Patients/index");
} 

