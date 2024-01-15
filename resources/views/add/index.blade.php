@extends('core.template.layout')

@section('content')

    <?php
    $id = -1;
    $plant = -1;

    if (isset($_GET['id'])) {
        $pageTitle = 'Редактирование товара';
        $id = $_GET['id'];
        $plant = DB::table('plant')->where('id', $id)->get()[0];
        $path = DB::table('image')->select('path')->where('id_plant', $id)->get()[0]->path;

    } else {
        $pageTitle = 'Добавление товара';
        $id = DB::table('plant')->select('id')->get()->max()->id + 1;
    }
    ?>

    <main class="main">
        <div class="container">

            <form class="my-form" method="GET" action="/create/">
                <input type="hidden" name="upd" value="<?=isset($_GET['id']) ? 1 : 0?>"/>
                <input type="hidden" name="id" value="<?=$id?>"/>

                <div class="row">
                    <div class="col-xs-12">Редактирование/добавление</div>

                    <div style="margin-left: auto; margin-right: auto; width: 10em" class="col-12 ">
                        Название
                        <input type='text' name='NAME' value="<?=$plant->name ?? null ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div style="margin-left: auto; margin-right: auto; width: 10em" class="col-12 ">
                        Рекомендации
                        <input type='number' name='REQ' value="<?=$plant->id_requirements ?? null ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div style="margin-left: auto; margin-right: auto; width: 10em" class="col-12 ">
                        Описание
                        <textarea rows="6" name='TEXT'><?=$plant->description ?? null?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div style="margin-left: auto; margin-right: auto; width: 10em" class="col-12 ">
                        Путь к фото
                        <input type='text' name='IMG' value="<?=$path ?? null ?>" required>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div style="margin-left: auto; margin-right: auto; width: 10em" class="col-12 ">
                        <input class='btn btn-primary' type='submit' value='<?=isset($_GET['id']) ? 'Сохранить изменения' : 'Добавить товар'?>'>
                    </div>
                </div>
            </form>
            <div class="mess"></div>

        </div>
    </main>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="http://mysite.com/jquery.min.js"><\/script>')
    </script>

    <script>
        $('.my-form').submit(function (e) {
            e.preventDefault();
            let th = $(this);
            let mess = $('.mess');
            let btn = th.find('.btn')
            btn.addClass('progress-bar-striped progress-bar-animated');

            $.ajax({
                url: '/create',
                type: 'GET',
                data: th.serialize(),
                success: function (data) {
                    console.log(data);
                    if (!data) {
                        btn.removeClass('progress-bar-striped progress-bar-animated');
                        mess.html('<div class="alert alert-danger mt-3">Путь должен начинаться c \'img/\'</div>');
                        return false;
                    } else {
                        btn.removeClass('progress-bar-striped progress-bar-animated');
                        mess.html('<div class="alert alert-success mt-3">Успешно введено!</div>');
                    }
                },
                error: function () {
                    mess.html('<div class="alert alert-danger mt-3">Ошибка!</div>');
                }
            })
        })
    </script>

@endsection
