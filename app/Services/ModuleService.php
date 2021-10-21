<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;

class ModuleService
{

    protected $repository, $courseRepository;
    public function __construct(
        ModuleRepository $moduleRepository,
        CourseRepository $courseRepository
    ) {
        $this->moduleRepository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getCourse(string $course)
    {
        $courseId = $this->courseRepository->getCourseByUuid($course);
        return $courseId->id;
    }

    public function getModulesByCourse(string $course)
    {
        return $this->moduleRepository->getModulesCourse($this->getCourse($course));
    }

    public function createNewModule(array $data)
    {

        return $this->moduleRepository->createNewModule($this->getCourse($data['course']), $data);
    }

    public function getModuleByCourseUuid(string $course, string $identify)
    {
        return $this->moduleRepository->getModuleByCourse($this->getCourse($course), $identify);
    }

    public function deleteModule(string $identify)
    {
        return $this->moduleRepository->deleteModuleByUuid($identify);
    }
    public function updateModule(string $identify, array $data)
    {
        return $this->moduleRepository->updateModuleByUuid($this->getCourse($data['course']), $identify, $data);
    }
}
