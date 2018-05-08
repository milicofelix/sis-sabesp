<?php

namespace MILICO\Http\Controllers;

use Illuminate\Http\Request;
use MILICO\Repositories\SabespRepository;


class SabespController extends Controller
{


    /**
     * @var SabespRepository
     */
    private $repository;

    public function __construct(SabespRepository $repository)
   {


       $this->repository = $repository;
   }

   public function index()
   {

       $contas = $this->repository->paginate();


       return view('sabesp.list-sabesp',compact('contas'));

   }

   public function create(){

       return view('sabesp.index');

   }

   public function store(Request $request)
   {
       $data = $request->all();
//        dd($data);
       $leituraAtual   = $data['leitura1'];
       $leituraAnterior   = $data['leitura2'];
       $consumoAtual = $leituraAtual-$leituraAnterior;
       $consumoAnterior = 0;
       $consumoMinimo      = 10;///--metros--///
       $tarifa = 3.78;//3.50;
       $VlrEsgoto = 0.00;
       $valorConsumo = 0.00;
       $vlrMinimo = 24.15;//22.38;
       $consumoUltrapassado = ($consumoAtual - $consumoMinimo);
       $restoConsumoUltrapassado = $consumoUltrapassado - $consumoMinimo;

       if($consumoAtual <= 10){
           $tarifa = 0.00;
           $valorConsumo = $vlrMinimo;
           $VlrEsgoto = $valorConsumo;
       }

       if ($consumoAtual > 10 && $consumoAtual <= 20) {

           $valorConsumo += ($tarifa * ($consumoAtual - $consumoMinimo))+$vlrMinimo;
           $VlrEsgoto = $valorConsumo;
       }

       if ($consumoAtual > 20 && $consumoAtual <= 50 ) {
           $vlrTaxa = 0;

           $vlrTaxa += $tarifa*10;

           if ($consumoUltrapassado > $consumoMinimo){
               $tarifa =  9.44;//8.75;
               $vlrTaxa += $tarifa*$restoConsumoUltrapassado;

           }

           $valorConsumo = $vlrMinimo+$vlrTaxa;
           $VlrEsgoto = $valorConsumo;

       }
       if($consumoAtual > 50){

           $tarifa = 10.40;//9.64;
           $valorConsumo += ($tarifa * $consumoAtual)+$vlrMinimo;
           $VlrEsgoto = $valorConsumo;
       }
       $data['consumo_atual'] = $consumoAtual;
       $data['tarifa'] = $tarifa;
       $data['vlr_consumo'] = $valorConsumo;
       $data['vlr_final'] = ($valorConsumo+$VlrEsgoto);
       $data['data_conta'] = date('Y-m-d',strtotime($data['data_conta']));
       $data['data_vencimento'] = date('Y-m-d',strtotime($data['data_vencimento']));
//        dd($data);
       $this->repository->create($data);


       return redirect()->route('sabesp.index');
   }

   public function edit($id)
   {
       $conta = $this->repository->find($id);


       $list_status = ['0' => 'Pendente', '1' => 'Paga', '2' => 'Vencida'];

       return view('sabesp.edit-contas',compact('conta','list_status'));
   }

   public function update(Request $request, $id)
   {
       $this->repository->update($request->all(),$id);

       return redirect()->route('sabesp.index');

   }

    public function destroy($id){

        $this->repository->delete($id);

        return redirect()->route('sabesp.index');
    }


}
