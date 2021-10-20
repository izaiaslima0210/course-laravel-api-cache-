<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected $entity;
    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return $this->entity->get();
    }
    public function createNewCourse(array $data)
    {
        return $this->entity->create($data);
    }
    public function getCourseByUuid(string $indetify)
    {
        return $this->entity->where('uuid', $indetify)->firstOrfail();
    }
    public function deleteCourseByUuid(string $indetify)
    {
        $course = $this->getCourseByUuid($indetify);
        return $course->delete();
    }
    public function updateCourseByUuid(string $identify, array $data)
    {
        $course = $this->getCourseByUuid($identify);
        return $course->update($data);
    }
}
