<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    public function all()
    {
        return Module::all();
    }

    public function findByCourse($course_id){
        return Module::where('course_id', $course_id)->get();
    }

    public function find($id)
    {
        return Module::findOrFail($id);
    }

    public function create(array $data)
    {
        return Module::create($data);
    }

    public function update($id, array $data)
    {
        $module = $this->find($id);
        $module->update($data);
        return $module;
    }

    public function delete($id)
    {
        $module = $this->find($id);
        return $module->delete();
    }
}
