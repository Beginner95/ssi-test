@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Редатирование автомобиля</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Редатирование автомобиля</h3>
                        </div>
                        <form role="form" method="post" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="car_model_id">Название модели</label>
                                    <select class="custom-select rounded-0 @error('car_model_id') is-invalid @enderror" name="car_model_id" id="car_model_id">
                                        <option value="">-Выберите модель-</option>
                                        @foreach($models as $key => $model)
                                            <option value="{{ $key }}" @if ($key == $car->car_model_id) selected @endif>{{ $model }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="year_manufacture">Год выпуска</label>
                                    <input type="date" name="year_manufacture"
                                           class="form-control @error('year_manufacture') is-invalid @enderror"
                                           id="year_manufacture"
                                           value="{{ $car->year_manufacture }}">
                                </div>
                                <div class="form-group">
                                    <label for="national_number">Госномер</label>
                                    <input type="text" name="national_number"
                                           class="form-control @error('national_number') is-invalid @enderror"
                                           id="national_number"
                                           value="{{ $car->national_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="color">Цвет</label>
                                    <input type="text" name="color"
                                           class="form-control @error('color') is-invalid @enderror"
                                           id="color"
                                           value="{{ $car->color }}">
                                </div>
                                <div class="form-group">
                                    <label for="transmission">Коробка передач</label>
                                    <select class="custom-select rounded-0 @error('transmission') is-invalid @enderror" name="transmission" id="transmission">
                                        <option value="автомат" @if ($car->transmission == 'автомат') selected @endif> Автомат</option>
                                        <option value="механика" @if ($car->transmission == 'механика') selected @endif>Механика</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="rental_price">Цена в сутки</label>
                                    <input type="text" name="rental_price"
                                           class="form-control @error('color') is-invalid @enderror" id="rental_price"
                                           value="{{ $car->rental_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="file">Фото</label>
                                    <img src="{{ $car->getImage() }}" alr="" class="img-size-64">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input" id="file">
                                            <label class="custom-file-label" for="file">Выбрать файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
