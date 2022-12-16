<?php

namespace App\Console\Commands;

use App\Models\Project;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CheckStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statuses:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update statuses';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Project::all() as $project) {
            $status = Http::post($project->title)->status();

            $project->status_code = $status;
            $project->save();

            echo "{$project->title} status: $status \n\n";
        }
    }
}
