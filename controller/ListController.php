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
	if (!deleteList($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "List/index");
}


function edit($id)
{
	render("todolist/ListMap/edit", array(
		'lists' => getOneList($id),
	));
}


function editSave()
{
	if (!editList($_POST)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "List/index");
} 

