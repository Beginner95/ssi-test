@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Модели автомобилей</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Модели автомобилей</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('car-models.create') }}" class="btn btn-primary mb-3">Добавить модель</a>
                @if (!$car_models->isEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Марка</th>
                                <th>Модель</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($car_models as $car_model)
                                <tr>
                                    <td>{{ $car_model->id }}</td>
                                    <td>{{ $car_model->brand->name }}</td>
                                    <td>{{ $car_model->name }}</td>
                                    <td>
                                        <a href="{{ route('car-models.edit', $car_model->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('car-models.destroy', $car_model->id) }}" method="post" class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Подтвердите удаление')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>База моделей пустая</p>
                @endif
            </div>
            <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $car_models->links() }}
                </ul>
            </div>
        </div>
    </section>
@endsection

