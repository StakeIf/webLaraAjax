@extends('core/template/layout')
@section('content')

    <?php
    $success = false;
    if (isset($_GET['PASS']) && ($_GET['PASS'] == '1234')) {
        session_start();
        $success = true;
    }

    ?>
    <div id="all">
        <main class="main" id="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">Каталог комнатных растений</div>
                    <?php if ($success == true):?>
                    <a style="background-color: darkgray" href="/resources/views/add" class="btn btn-primary">Добавить
                        товар</a>
                    <?php endif;?>

                    @foreach($plants as $plant)
                        <div style="margin-left: auto; margin-right: auto; width: 10em"
                             class="col-xs-12 col-md-6 col-lg-4">
                            <div class="card h-100" style="width: 18rem;">
                                <img
                                    src="{{DB::table('image')->select('path')->where('id_plant', $plant->id)->get()[0]->path}}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $plant->name }}</h2>
                                    <h5 class="card-text">{{ $plant->description }}</h5>

                                    <a href="/resources/views/catalog?id={{$plant->id}}"
                                       class="btn btn-primary">Подробнее</a>

                                    <?php if ($success == true):?>
                                    <a style="background-color: darkgray" href="/resources/views/add?id={{$plant->id}}"
                                       class="btn btn-primary">Редактировать</a>
                                    <?php endif;?>

                                    <?php if ($success == true):?>
                                    <div class="success" id="success{{$plant->id}}"></div>
                                    <div style="background-color: indianred"
                                         id="checkDell{{$plant->id}}" class="checkDell btn btn-primary">Удалить
                                    </div>
                                    <?php endif;?>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </main>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="http://mysite.com/jquery.min.js"><\/script>')
    </script>

    <script>
        @foreach($plants as $plant)
        $("#checkDell{{$plant->id}}").click(function () {
            console.log('good');
            let dell = {{$plant->id}};
            $.ajax({
                url: '/delete',
                type: 'GET',
                data: {
                    id: dell
                },
                dataType: 'html',
                success: function (data) {
                    $("#all").load('/catalog');

                    function save() {
                        $("#success{{$plant->id}}").html("<span>Удалено</span>");
                    }

                    setTimeout(save, 0);
                    setTimeout(() => {
                        clearInterval(save);
                        $("#success{{$plant->id}}").html("");
                    }, 2000)
                }
            });
        });
        @endforeach
    </script>
    </div>

@endsection
