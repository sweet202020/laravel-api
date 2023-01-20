<?php

namespace App\Http\Controllers\API;
use App\Models\Project;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success'=>true,
            'results'=>Project::with(['type', 'technologies'])->orderByDesc('id')->paginate(8)
        ]);
    }
    public function show ($slug){
        $project= Project::with('technologies','type')->where('slug', $slug)->first();
        if($project){
            return response()->json([
            'success' =>true,
            'results' => $project
        ]);
         } else {
        return response()->json([
            'success' =>false,
            'results' => null
        ]);
        }
    }
}