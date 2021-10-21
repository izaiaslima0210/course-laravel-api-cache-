<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Module;


class ModuleObserver
{
    /**
     * Handle the module "creating" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function creating(Module $module)
    {
        $module->uuid = (string) Str::uuid();
    }

    // /**
    //  * Handle the module "updated" event.
    //  *
    //  * @param  \App\Models\module  $module
    //  * @return void
    //  */
    // public function updated(module $module)
    // {
    //     //
    // }

    // /**
    //  * Handle the module "deleted" event.
    //  *
    //  * @param  \App\Models\module  $module
    //  * @return void
    //  */
    // public function deleted(module $module)
    // {
    //     //
    // }

    // /**
    //  * Handle the module "restored" event.
    //  *
    //  * @param  \App\Models\module  $module
    //  * @return void
    //  */
    // public function restored(module $module)
    // {
    //     //
    // }

    // /**
    //  * Handle the module "force deleted" event.
    //  *
    //  * @param  \App\Models\module  $module
    //  * @return void
    //  */
    // public function forceDeleted(module $module)
    // {
    //     //
    // }
}
