<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Course;


class CourseObserver
{
    /**
     * Handle the course "creating" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        $course->uuid = (string) Str::uuid();
    }

    // /**
    //  * Handle the course "updated" event.
    //  *
    //  * @param  \App\Models\course  $course
    //  * @return void
    //  */
    // public function updated(course $course)
    // {
    //     //
    // }

    // /**
    //  * Handle the course "deleted" event.
    //  *
    //  * @param  \App\Models\course  $course
    //  * @return void
    //  */
    // public function deleted(course $course)
    // {
    //     //
    // }

    // /**
    //  * Handle the course "restored" event.
    //  *
    //  * @param  \App\Models\course  $course
    //  * @return void
    //  */
    // public function restored(course $course)
    // {
    //     //
    // }

    // /**
    //  * Handle the course "force deleted" event.
    //  *
    //  * @param  \App\Models\course  $course
    //  * @return void
    //  */
    // public function forceDeleted(course $course)
    // {
    //     //
    // }
}
