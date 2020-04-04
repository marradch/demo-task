<?php

namespace Controllers;

use Models\TaskModel;
use Repositories\TaskRepository;

class TaskController extends AbstractController
{
    public static $name = 'task';

    public function index($params)
    {
        $taskRepository = new TaskRepository();
        $tasks = $taskRepository->getAll($params);
        $pagination = $taskRepository->getPagination($params);

        $this->render(
            'index',
            [
                'tasks' => $tasks,
                'pagination' => $pagination,
                'order' => $params['order'],
                'orderType' => $params['order-type'],
                'menuItem' => 'task'
            ]
        );
    }

    public function create()
    {
        $this->render(
            'create',
            [
                'menuItem' => 'task'
            ]
        );
    }

    public function save()
    {
        $task = new TaskModel();
        $task->name = $_POST['name'];
        $task->email = $_POST['email'];
        $task->content = $_POST['content'];
        $task->status = 0;

        $errors = $task->validate();

        if (count($errors)) {
            $this->render(
                'create',
                [
                    'errors' => $errors,
                    'menuItem' => 'task'
                ]
            );
        } else {
            $task->save();
            header('Location: /task/index');
        }
    }

    public function edit($params)
    {
        $taskRepository = new TaskRepository();
        $task = $taskRepository->getByUid($params['id']);
        if (!$task) {
            throw new Exception("Task not found by Id: (" . $params['id'] . ") ");
        }

        $this->render(
            'edit',
            [
                'task' => $task,
                'menuItem' => 'task'
            ]
        );
    }

    public function update()
    {
        $taskRepository = new TaskRepository();
        $task = $taskRepository->getByUid($_POST['id']);
        if (!$task) {
            throw new Exception("Task not found by Id: (" . $_POST['id'] . ") ");
        }

        $task->content = $_POST['content'];
        $task->status = isset($_POST['status']);

        $task->update();

        header('Location: /task/index');
    }
}