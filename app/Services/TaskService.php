<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTasks()
    {
        return $this->repository->all();
    }

    public function getTaskById($id)
    {
        return $this->repository->find($id);
    }

    public function createTask(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateTask($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteTask($id)
    {
        return $this->repository->delete($id);
    }
}