<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\User;

class CourseRepository
{
    public function all()
    {
        return Course::all();
    }

    public function searchByName($query)
    {
        return Course::where('title', 'like', '%' . $query . '%')->get();
    }

    public function searchFromTutor($query, $tutor_id)
    {
        $queryBuilder = Course::where('tutor_id', $tutor_id);

        if (!empty($query)) {
            $queryBuilder->where('title', 'like', '%' . $query . '%');
        }

        return $queryBuilder->get();
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

    public function getCourseWithActivity($courseId, $studentId)
    {
        return Course::with(['modules.tasks.answers' => function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        }])->findOrFail($courseId);
    }

    public function getStudentById($studentId)
    {
        return User::findOrFail($studentId);
    }
}
