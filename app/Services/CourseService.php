<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    protected $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCourses()
    {
        return $this->repository->all();
    }

    public function searchCoursesByNameFromAll($query)
    {
        return $this->repository->searchByName($query);
    }

    public function searchCoursesByNameFromTutor($query, $author_id){
        return $this->repository->searchFromTutor($query, $author_id);
    }

    public function getCourseById($id)
    {
        return $this->repository->find($id);
    }

    public function createCourse(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateCourse($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteCourse($id)
    {
        return $this->repository->delete($id);
    }
}
