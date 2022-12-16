@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h5 style="font-weight: bolder;">Visitors statistic</h2>
                        <canvas id="graph"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 style="font-weight: bolder;">About project</h2>
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
                    </div>
                </div>
            </div>
            <div class="col-xl-8 mt-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h5 style="font-weight: bolder;">Site metatags</h2>
                            <p class="mb-1">Title: <b id="meta_title">...</b></p>
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
            const ctx = document.getElementById('graph');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['7d', '6d', '5d', '4d', '3d', '2d', '1d'],
                    datasets: [{
                        label: 'Visitors',
                        data: [
                            {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(7)->format('Y-m-d') . '%')->count() }},
                            {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(6)->format('Y-m-d') . '%')->count() }},
                            {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(5)->format('Y-m-d') . '%')->count() }},
                            {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(4)->format('Y-m-d') . '%')->count() }},
                            {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(3)->format('Y-m-d') . '%')->count() }},
                            {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(2)->format('Y-m-d') . '%')->count() }},
                            {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->subDays(1)->format('Y-m-d') . '%')->count() }},
                            {{ $project->visitors()->where('created_at', 'like', \Carbon\Carbon::now()->format('Y-m-d') . '%')->count() }},
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endpush
