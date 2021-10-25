<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModule;
use App\Http\Resources\ModuleResource;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $moduleService;
    public function __construct(ModuleService $ModuleService)
    {
        $this->moduleService = $ModuleService;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index($course)
    {

        $Modules = $this->moduleService->getModulesByCourse($course);
        return ModuleResource::collection($Modules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUpdateModule  $request
     * @return App\Http\Resource\ModuleResource

     */
    public function store(StoreUpdateModule $request, $course)
    {
        $module = $this->moduleService->createNewModule($request->validated());
        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $module
     */
    public function show($course, $identify)
    {
        $module = $this->moduleService->getModuleByCourseUuid($course, $identify);
        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $module
     * @return App\Http\Requests\StoreUpdateModule

     */
    public function update(StoreUpdateModule $request, $course, $identify)
    {
        $this->moduleService->updateModule($identify, $request->validated());
        return response()->json(['message' => 'update Module!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id

     */
    public function destroy($course, $module)
    {
        $this->moduleService->deleteModule($module);
        return response()->json([], 204);
    }
}
