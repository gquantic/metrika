<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    protected StatusesController $statusesController;

    public function __construct(StatusesController $statusesController)
    {
        $this->statusesController = $statusesController;
    }

    public function updateStatuses(Request $request, Project $project)
    {
        foreach (Project::query()->limit(25)->offset($request->get('offset') ?? 0)->get() as $item) {
            $type = $this->statusesController->getStatus($this->getHtml($item->url));

            if ($type === false) {
                echo "Not found {$item->url} <hr>";
                $item->status_code = 403;
            } else {
                echo "Success {$item->url} <hr>";
                $item->status_code = 200;
            }

            $item->save();
        }
    }

    public function getHtml($url)
    {
        $url = strtolower($url);

        if (!str_starts_with($url, 'http'))
            $url = "http://$url";

        return file_get_contents($url);
    }
}
