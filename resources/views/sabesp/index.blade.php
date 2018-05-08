<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/estilos.css') !!}
    {{--<link href="/css/app.css" rel="stylesheet">--}}

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>

<div class="container">

    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('sabesp.index')}}">Sabesp</a>
                {{--<img src="images/sabesp.gif">--}}
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>

    <h2>ADM do Sistema de Controle de Consumo/água</h2>

    <div id="content">

        {!! Form::open(['route' => 'sabesp.store']) !!}

        <div class="form-group">
            {!! Form::label('leitura1','Leitura Altual') !!}
            {!! Form::text('leitura1',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('leitura2','Leitura Anterior') !!}
            {!! Form::text('leitura2',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('data_conta','Data da conta') !!}
            {!! Form::text('data_conta',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('data_vencimento','Data do Vencimento') !!}
            {!! Form::text('data_vencimento',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Calcular',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}


        <p>Desenvolvido por <span>Adriano Felix de Freitas</span> &COPY;Todos os Direitos Reservados.</p>


</div>

</div>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>--}}

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>