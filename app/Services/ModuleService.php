<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;

class ModuleService
{

    protected $moduleRepository, $courseRepository;
    public function __construct(
        ModuleRepository $ModuleRepository,
        CourseRepository $courseRepository
    ) {
        $this->moduleRepository = $ModuleRepository;
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

        $course = $this->getCourse($data['course']);

        return $this->moduleRepository->createNewModule($course, $data);
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
