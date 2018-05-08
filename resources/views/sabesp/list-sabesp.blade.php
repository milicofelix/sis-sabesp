@extends('templates.layout')
@section('conteudo')

    <div class="container">

        <!-- Example row of columns -->
        <div class="row">
            <div class="span4">

                <h3>Contas D'agua - Sabesp</h3>

                <a href="{{route('sabesp.sabesp-form')}}" class="btn btn-default">Nova Conta</a>
                <br /><br />
                <?php $total_geral = 0; ?>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Leitura Atual</th>
                        <th>Leitura Anterior</th>
                        <th>Data da Leitura</th>
                        <th>Data do Vencimento</th>
                        <th>Tarifa</th>
                        <th>Consumo</th>
                        <th>Valor do Consumo</th>
                        <th>Valor Final</th>
                        <th>Status</th>
                        <th colspan="2">Operação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contas as $conta)
                        <tr class="{{$conta->status == 0 ? 'warning': ($conta->status == 1 ?'success':'danger')}}">
                            <td>{{$conta->id}}</td>
                            <td>{{$conta->leitura1}}</td>
                            <td>{{$conta->leitura2}}</td>
                            <td>{{date('d/m/Y', strtotime($conta->data_conta))}}</td>
                            <td>{{date('d/m/Y', strtotime($conta->data_vencimento))}}</td>
                            <td>{{number_format($conta->tarifa,2,',','.')}}</td>
                            <td>{{$conta->consumo_atual}}m<sup>3</sup></td>
                            <td>R${{number_format($conta->vlr_consumo,2,',','.')}}</td>
                            <td>R${{number_format($conta->vlr_final,2,',','.')}}</td>
                            <td >{{$conta->status == 0 ? 'Pendente': ($conta->status == 1 ?'Paga':'Vencida')}}</td>
                            <td><a href="{{route('sabesp.editar',['id' => $conta->id])}}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td><a href="{{route('sabesp.remove',['id' => $conta->id])}}" class="btn btn-danger btn-sm">Excluir</a></td>
                        </tr>
                        <?php $total_geral += $conta->vlr_final;  ?>
                    @endforeach
                    </tbody>
                </table>
                <b>Total Geral:</b> R$ <?=number_format($total_geral,2,',','.') ?>
                {{$contas->render()}}

            </div>

            <hr>

            <footer>

                <p>&copy; milicofelix 2017</p>
            </footer>

        </div> <!-- /container -->
    </div>

@endsection