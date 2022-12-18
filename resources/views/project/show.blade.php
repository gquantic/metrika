@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h5 style="font-weight: bolder;">График посещений</h5>
                        <div id="graph"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 style="font-weight: bolder;">Информация</h5>
                            <b class="mb-1">Visitors: {{ $project->visitors->count() }}</b>
                            <b class="mb-1">
                                Статус сайта:
                                @switch($project->status_code)
                                    @case(200)
                                        <span class="text-success">Доступен</span>
                                        @break

                                    @default
                                        <span class="text-danger">Не доступен</span>
                                        @break
                                @endswitch
                            </b>
                    </div>
                </div>
                <a href="{{ route('visitor.index', ['project' => $project->id]) }}" class="border-0">
                    <button class="btn btn-success w-100 mt-2 fw-bold mb-md-5">Перейти к посетителям</button>
                </a>
            </div>
            <div class="col-xl-8 mt-md-3 mt-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 style="font-weight: bolder;margin-bottom: 0;">Мета-теги</h5>
                            <span class="text-warning">В разработке</span>
                        </div>
                        <p class="mb-1 mt-2">Title: <b id="meta_title">...</b></p>
                        <p class="mb-1">Description: <b id="meta_desccription">...</b></p>
                        <p class="mb-1">Keywords: <b id="meta_keywords">...</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        {{--request('//{{ $project->title }}', function (err, res, body) {--}}
        {{--    if (err) throw err;--}}
        {{--    console.log(body);--}}
        {{--    console.log(res.statusCode);--}}
        {{--});--}}
    </script>

    <script>
        $(document).ready(function () {
            // const ctx = document.getElementById('graph');

            var options = {
                chart: {
                    type: 'line'
                },
                series: [{
                    name: 'Visitors',
                    data: [
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(16)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(15)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(14)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(13)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(12)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(11)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(10)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(9)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(8)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(7)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(6)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(5)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(4)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(3)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(2)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(1)->format('Y-m-d') . '%')->count() }},
                        {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->format('Y-m-d') . '%')->count() }}
                    ]
                }],
                xaxis: {
                    categories: [
                        "{{ \Carbon\Carbon::now()->subDays(16)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(15)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(14)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(13)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(12)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(11)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(10)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(9)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(8)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(7)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(6)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(5)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(4)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(3)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(2)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->subDays(1)->format('d.m.Y') }}",
                        "{{ \Carbon\Carbon::now()->format('d.m.Y') }}"
                    ]
                }
            }

            var chart = new ApexCharts(document.querySelector("#graph"), options);
            chart.render();

            {{--var chart = c3.generate({--}}
            {{--    bindto: '#graph',--}}
            {{--    data: {--}}
            {{--        columns: [--}}
            {{--            [--}}
            {{--                'visitors',--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(7)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(6)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(5)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(4)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(3)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(2)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(1)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->format('Y-m-d') . '%')->count() }},--}}
            {{--            ],--}}
            {{--        ]--}}
            {{--    }--}}
            {{--});--}}

            {{--new Chart(ctx, {--}}
            {{--    type: 'line',--}}
            {{--    data: {--}}
            {{--        labels: ['7d', '6d', '5d', '4d', '3d', '2d', '1d'],--}}
            {{--        datasets: [{--}}
            {{--            label: 'Visitors',--}}
            {{--            data: [--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(7)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(6)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(5)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(4)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(3)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(2)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(1)->format('Y-m-d') . '%')->count() }},--}}
            {{--                {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->format('Y-m-d') . '%')->count() }},--}}
            {{--            ],--}}
            {{--            borderWidth: 1--}}
            {{--        }]--}}
            {{--    },--}}
            {{--    options: {--}}
            {{--        scales: {--}}
            {{--            y: {--}}
            {{--                beginAtZero: true--}}
            {{--            }--}}
            {{--        }--}}
            {{--    }--}}
            {{--});--}}
        });
    </script>
@endpush
