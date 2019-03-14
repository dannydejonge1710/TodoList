<?php

require(ROOT . "model/TaskModel.php");

function index($id)
{
	render("todolist/TaskMap/index", array(
		'tasks' => getFilteredTasks($id),
		'id' => $id,
	));
}

function create($id)
{
	render("todolist/TaskMap/create", [
		'id' => $id,
	]);
}

function createSave($id)
{
	if (!createTask($_POST)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "Task/index/" . $id);
}

function delete($id, $listId)
{
	if (!deleteTask($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "Task/index/" . $listId);
}


function edit($id, $list_id)
{
	render("todolist/TaskMap/edit", array(
		'tasks' => getOneTask($id),
		'list_id' => $list_id,
	));
}


function editSave($id)
{
	if (!editTask($_POST)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "Task/index/" . $id);
} 

