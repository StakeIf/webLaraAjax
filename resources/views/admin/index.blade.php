@extends('core.template.layout')

@section('content')

<?php $pageTitle = 'АДМИНКА'; ?>


    <div class='container text-center'>
        <div class="row">
            <div class="col"><h1>Введите пароль</h1></div>
        </div>
        <br>

        <form method="GET" action='/'>
            <div style="margin-left: auto; margin-right: auto; width: 10em" class="col-xs-12">

                <input class='col-12' name='PASS' type='password'>
            </div>
            <br>
            <div style="margin-left: auto; margin-right: auto; width: 10em" class="col-xs-12">
                <input class='col-5' type='submit' value='Войти'>
            </div>
        </form>

    </div>

@endsection
