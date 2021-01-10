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
                <h3 class="card-title">Автомобили</h3>

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
                <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Добавить автомобиль</a>
                @if (!$cars->isEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Фото</th>
                                <th>Марка</th>
                                <th>Модель</th>
                                <th>Год выпуска</th>
                                <th>Госномер</th>
                                <th>Цвет</th>
                                <th>Коробка передач автомат/механика</th>
                                <th>Цена в сутки</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>
                                        <img
                                             src="@if (empty($car->file)){{ asset('/no-image.png') }}@else{{ $car->file }}@endif"
                                             alt=""
                                             class="img-size-64">
                                    </td>
                                    <td>{{ $car->model->brand->name }}</td>
                                    <td>{{ $car->model->name }}</td>
                                    <td>{{ $car->year_manufacture }}</td>
                                    <td>{{ $car->national_number }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>{{ $car->transmission }}</td>
                                    <td>{{ $car->rental_price }}</td>
                                    <td>
                                        <a href="{{ route('car-models.edit', $car->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('car-models.destroy', $car->id) }}" method="post" class="float-left">
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
                    {{ $cars->links() }}
                </ul>
            </div>
        </div>
    </section>
@endsection
