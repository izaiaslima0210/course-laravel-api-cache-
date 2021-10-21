<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    protected $entity;
    public function __construct(Module $Module)
    {
        $this->entity = $Module;
    }

    public function getModulesCourse(int $course)
    {
        return $this->entity->where('course_id', $course)->get();
    }
    public function createNewModule(int $courseId, array $data)
    {
        $data['course_id'] = $courseId;
        return $this->entity->create($data);
    }
    public function getModuleByCourse(string $indetify, int $course)
    {
        return $this->entity
            ->where('course_id', $course)
            ->where('uuid', $indetify)
            ->firstOrfail();
    }
    public function getModuleByUuid(string $indetify)
    {
        return $this->entity
            ->where('uuid', $indetify)
            ->firstOrfail();
    }
    public function deleteModuleByUuid(string $indetify)
    {
        $Module = $this->getModuleByUuid($indetify);
        return $Module->delete();
    }
    public function updateModuleByUuid(int $courseId, string $identify, array $data)
    {
        $data['course_id'] = $courseId;
        $Module = $this->getModuleByUuid($identify);
        return $Module->update($data);
    }
}
