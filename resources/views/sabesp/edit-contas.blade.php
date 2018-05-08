@extends('templates.layout')
@section('conteudo')
    <div class="container">

        <!-- Example row of columns -->
        <div class="row">
            <div class="span4">



                @if($errors->any())

                    <ul class="alert alert-warning">

                        @foreach($errors->all() as $error)

                            <li>{{$error}}</li>

                        @endforeach

                    </ul>


                @endif

                <a href="{{route('sabesp.index')}}" class="btn btn-default">Contas</a>
                <br /><br />
                <h2>Valor a ser Pago: R$ {{$conta->vlr_final}} </h2>
                    <h3>Leitura Atual: {{$conta->leitura1}} | Leitura Anterior: {{$conta->leitura2}}</h3>
                <h4>Data do vencimento: {{date('d/m/Y', strtotime($conta->data_vencimento))}}</h4>

                    <div class="form-group">

                        {!! Form::model($conta,['route' => ['sabesp.atualiza',$conta->id]]) !!}
                    <div class="form-group">

                        {!! Form::label('status','Status:') !!}

                        {!! Form::select('status',$list_status,null,['class'=>'form-control'])  !!}

                    </div>

                <div class="form-group">
                    {!! Form::submit('Atualizar',['class'=>'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>

            <hr>

            <footer>

                <p>&copy; milicofelix 2017</p>
            </footer>

        </div> <!-- /container -->
    </div>

@endsection
