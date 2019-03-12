<?php

require(ROOT . "model/ListModel.php");
require(ROOT . "model/TaskModel.php");

function index()
{
	render("todolist/ListMap/index", array(
		'lists' => getAllLists()
	));
}

function create()
{
	render("todolist/ListMap/create");
}

function createSave()
{
	if (!createList($_POST)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "List/index");
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

