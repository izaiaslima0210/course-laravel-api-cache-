<?php

namespace App\Services;

use App\Repositories\ModuleRepository;
use App\Repositories\LessonRepository;

class LessonService
{

    protected $lessonrepository, $moduleRepository;
    public function __construct(
        LessonRepository $LessonRepository,
        ModuleRepository $moduleRepository
    ) {
        $this->lessonRepository = $LessonRepository;
        $this->moduleRepository = $moduleRepository;
    }

    public function getmodule(string $module)
    {
        $moduleId = $this->moduleRepository->getmoduleByUuid($module);
        return $moduleId->id;
    }

    public function getLessonsBymodule(string $module)
    {
        return $this->lessonRepository->getLessonsmodule($this->getmodule($module));
    }

    public function createNewLesson(array $data)
    {

        return $this->lessonRepository->createNewLesson($this->getmodule($data['module']), $data);
    }

    public function getLessonBymoduleUuid(string $module, string $identify)
    {
        return $this->lessonRepository->getLessonBymodule($this->getmodule($module), $identify);
    }

    public function deleteLesson(string $identify)
    {
        return $this->lessonRepository->deleteLessonByUuid($identify);
    }
    public function updateLesson(string $identify, array $data)
    {
        return $this->lessonRepository->updateLessonByUuid($this->getmodule($data['module']), $identify, $data);
    }
}
