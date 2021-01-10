@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Создание модели</h1>
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
                            <h3 class="card-title">Создание модели</h3>
                        </div>
                        <form role="form" method="post" action="{{ route('car-models.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="brand_id">Название марки</label>
                                    <select class="custom-select rounded-0 @error('brand_id') is-invalid @enderror" name="brand_id" id="brand_id">
                                        <option value="">-Выберите марку-</option>
                                        @foreach($brands as $key => $brand)
                                            <option value="{{ $key }}">{{ $brand }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Название модели</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="Название">
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
