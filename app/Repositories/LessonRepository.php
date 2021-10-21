<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    protected $entity;
    public function __construct(Lesson $Lesson)
    {
        $this->entity = $Lesson;
    }

    public function getLessonsmodule(int $module)
    {
        return $this->entity->where('module_id', $module)->get();
    }
    public function createNewLesson(int $moduleId, array $data)
    {
        $data['module_id'] = $moduleId;
        return $this->entity->create($data);
    }
    public function getLessonBymodule(string $indetify, int $module)
    {
        return $this->entity
            ->where('module_id', $module)
            ->where('uuid', $indetify)
            ->firstOrfail();
    }
    public function getLessonByUuid(string $indetify)
    {
        return $this->entity
            ->where('uuid', $indetify)
            ->firstOrfail();
    }
    public function deleteLessonByUuid(string $indetify)
    {
        $Lesson = $this->getLessonByUuid($indetify);
        return $Lesson->delete();
    }
    public function updateLessonByUuid(int $moduleId, string $identify, array $data)
    {
        $data['module_id'] = $moduleId;
        $Lesson = $this->getLessonByUuid($identify);
        return $Lesson->update($data);
    }
}
