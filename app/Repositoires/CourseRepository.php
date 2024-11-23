<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    public function all()
    {
        return Course::all();
    }

    public function find($id)
    {
        return Course::findOrFail($id);
    }

    public function create(array $data)
    {
        return Course::create($data);
    }

    public function update($id, array $data)
    {
        $course = $this->find($id);
        $course->update($data);
        return $course;
    }

    public function delete($id)
    {
        $course = $this->find($id);
        return $course->delete();
    }
}
