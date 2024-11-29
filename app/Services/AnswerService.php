<?php

namespace App\Services;

use App\Repositories\AnswerRepository;

class AnswerService
{
    protected $repository;

    public function __construct(AnswerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllAnswers()
    {
        return $this->repository->all();
    }

    public function getAnswerByTask($task_id){
        return $this->repository->findByTask($task_id);
    }

    public function getAnswerById($id)
    {
        return $this->repository->find($id);
    }

    public function createAnswer(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateAnswer($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteAnswer($id)
    {
        return $this->repository->delete($id);
    }
}