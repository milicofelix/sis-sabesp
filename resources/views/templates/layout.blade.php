<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('tittle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Le styles -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>

<div class="navbar ">
    <div class="navbar-inner">
        <div class="container">
            <h3 class="brand">@yield('h3-tittle')</h3>
            <ul class="nav nav-pills" role="tablist">
                <li class="active"><a href="/">Home</a></li>

                @if(Auth::user())

                    @if(Auth::user()->role == "admin")

                <li><a href="{{route('admin.lista')}}">Categorias</a></li>
                <li><a href="{{route('admin.lista-prod')}}">Produtos</a></li>
                <li><a href="{{route('admin.order-list')}}">Pedidos</a></li>
                <li><a href="{{route('admin.client-list')}}">Clientes</a></li>
                <li><a href="{{route('admin.cupom-list')}}">Cupons</a></li>
                @elseif(Auth::user()->role == "cliente")

                    <li><a href="{{route('customer.order.index')}}">Meus Pedidos</a></li>

                @endif
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="nav-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>
@yield('conteudo')

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>