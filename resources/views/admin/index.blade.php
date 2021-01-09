@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Закрытый каталог автомобилей</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                Закрытый каталог автомобилей<br>
                Система позволяет добавлять автомобили в каталог
            </div>
            <div class="card-footer">
                &copy {{ date('d.m.Y') }}
            </div>
        </div>
    </section>
@endsection

