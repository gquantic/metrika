@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach(\App\Models\Project::all() as $project)
            <div class="col-md-4 mr-3 mb-3">
                <div class="card" style="@if($project->status_code == 200) border-color: #007100; @endif">
                    <div class="card-header d-flex justify-content-between">
                        <span style="@if($project->status_code == 200) color: #007100; @endif">{{ $project->title }}</span>
                        <a href="">Project</a>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <b class="mb-1">Visitors: {{ $project->visitors->count() }}</b>
                        <b class="mb-1">
                            Site status:
                            @switch($project->status_code)
                                @case(200)
                                    <span class="text-success">Available</span>
                                @break

                                @default
                                    <span class="text-danger">Not available</span>
                                @break
                            @endswitch
                        </b>
                        <a href="" class="mt-1">To site</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
