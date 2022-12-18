@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (isset($_GET['project']))
                <div class="col-12 mb-3">
                    <a href="{{ route('project.show', $projectSlug) }}">Назад, к проекту</a>
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 mt-1">Посетители</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover text-white">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">Адрес</th>
                                <th class="text-white">IP</th>
                                <th class="text-white">UUID</th>
                                <th class="text-white" style="width: 300px;">Дата посещения</th>
                                <th class="text-white" style="width: 100px;"></th>
                            </tr>
                            @foreach($visitors as $visitor)
                                <tr>
                                    <td class="text-white">#{{ $visitor->id }}</td>
                                    <td class="text-white">{{ $visitor->address == '' ? 'Н/Д' : $visitor->ip }}</td>
                                    <td class="text-white">{{ $visitor->ip == '' ? 'Н/Д' : $visitor->ip }}</td>
                                    <td class="text-white">{{ $visitor->uuid == '' ? 'Н/Д' : $visitor->uuid }}</td>
                                    <td class="text-white">{{ $visitor->created_at }}</td>
                                    <td class="text-white"><a type="button" data-toggle="modal" data-target="#details-{{ $visitor->id }}">Детализация</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($visitors as $visitor)
        <!-- Modal -->
        <div class="modal fade" id="details-{{ $visitor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-dark" aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body bg-dark">
                        <dl>
                            @foreach($visitor->details as $key => $detail)
                                <dt>{{ $key }} => </dt>
                                <dd>
                                    @foreach($detail as $item)
                                        {{ $item }}
                                    @endforeach
                                </dd>
                                <hr>
                            @endforeach
                        </dl>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
