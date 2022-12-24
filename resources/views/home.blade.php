@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach(\App\Models\Category::all() as $category)
            <h4 class="fw-bold mb-4 mt-4">{{ $category->title }}</h1>

            @if ($category->projects->count() < 1)
                <h5>No projects in this category.</h5>
            @endif

            @foreach($category->projects as $project)
                <div class="col-md-4 mr-3 mb-3">
                    <div class="card" class="@if($project->status_code == 200) site-available @endif">
                        <div class="card-header d-flex justify-content-between">
                            <span class="@if($project->status_code == 200) site-available-text @endif">
                                {{ $project->title }}
                                @if($project->status_code == 200)
                                    <i class="fa-solid fa-check text-success"></i>
                                @elseif ($project->status_code != 200 && $project->status_code != 404)
                                    <i class="fa-solid fa-triangle-exclamation text-warning"></i>
                                @else
                                    <i class="fa-regular fa-circle-xmark text-danger"></i>
                                @endif
                            </span>
                            <a href="{{ route('project.show', $project->slug) }}">Перейти в проект</a>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <b class="mb-1">Посетителей всего: {{ $project->visitors->count() }}</b>
                            <b class="mb-1">
                                Статус сайта:
                                @switch($project->status_code)
                                    @case(200)
                                        <span class="text-success">Работает</span>
                                        @break

                                    @default
                                        <span class="text-danger">Ошибка</span>
                                        @break
                                @endswitch
                            </b>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <a href="@if (substr($project, 0, 4) != 'http')http://{{ $project->url }}@else{{ $project->url }}@endif"
                                   class=""
                                   target="_blank">
                                    Перейти на сайт
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection
