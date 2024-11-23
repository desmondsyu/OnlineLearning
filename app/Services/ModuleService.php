<?php

namespace App\Services;

use App\Repositories\ModuleRepository;

class ModuleService
{
    protected $repository;

    public function __construct(ModuleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllModules()
    {
        return $this->repository->all();
    }

    public function getModuleById($id)
    {
        return $this->repository->find($id);
    }

    public function createModule(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateModule($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteModule($id)
    {
        return $this->repository->delete($id);
    }
}