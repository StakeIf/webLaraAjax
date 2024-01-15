<?php $pageTitle = 'Детализация';
$id = $_GET['id'];
$plant = DB::table('plant')->where('id', $id)->first();
?>
@extends('core/template/layout')

@section('content')

    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">{{$plant->name}}</div>

                <div class="card bg-dark text-white">
                    <img src="/{{DB::table('image')->select('path')->where('id_plant', $id)->get()[0]->path}}" class="card-img">
                    <div class="card-img-overlay">
                        <h5 class="card-title">{{$plant->name}}</h5>
                        <p class="card-text">{{$plant->description}}</p>
                        <h5 class="card-text">Поливать</h5>
                        <p class="card-text">{{DB::table('requirements')->where('id', $plant->id_requirements)->get()[0]->watering}}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
