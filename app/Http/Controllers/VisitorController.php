<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (isset($_GET['project'])) {
            $projectSlug = Project::query()->find($_GET['project'])->slug;
            $visitors = Visitor::query()->where('project_id', $_GET['project'])->paginate();
        } else $visitors = Visitor::all();

        $data = [
            'visitors' => $visitors,
        ];

        if (isset($projectSlug)) {
            $data = [
                'visitors' => $visitors,
                'projectSlug' => $projectSlug
            ];
        }


        return view('visitors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::query()->where('url', $request->post('project'))->with('category')->first();
        $ip = $request->ip();

        try {
            $location = Http::get("api.sypexgeo.net/json/{$ip}")->body();
            $location = json_decode($location, true);
            $locationStr = "{$location['country']['name_ru']}, {$location['region']['name_ru']}, {$location['city']['name_ru']}";
        } catch (\Exception $exception) {

        }

        Visitor::query()->create([
            'category_id' => $project->category->id,
            'project_id' => $project->id,
            'address' => $locationStr ?? '',
            'ip' => $request->getClientIp() ?? '',
            'uuid' => $request->post('uuid') ?? '',
            'details' => $request->headers,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
