<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use App\Control;
use App\historial;
use App\Pago;
use DB;

class vacacionesController extends Controller
{
    public function listaParticipante(){
            $participante=DB::table('participante')
            ->orderby('id','asc')
            ->paginate(7);

            $total=0;
            $part=Participante::all();
            foreach($part as $participantes){
                $total += $participantes->monto_total;
            }
            return view('vacaciones.participante.listaParticipante',["participante"=>$participante,"total"=>$total]);
    }

    public function crearParticipante(){
            return view('vacaciones.participante.crearParticipante');
    }

    public function saveParticipante(Request $request){
        
            $participante= new Participante;
            $participante->nombre=$request->get('nombre');
            $participante->monto_total=$request->get('monto');
            $participante->estado="pendiente";
            $participante->save();
            $info="sus datos se guardaron correctamente";
           return redirect('crearParticipante')->with('msjs',$info);
    }

        public function registroSemana(){

           
            return view('control.registroSemana');
    }

    public function saveRegistroSemana(Request $request){
      
         $tiempo=DB::table('control')->orderby('id','desc')->first();
         $participante=DB::table('participante')->orderby('id','desc')->first();

          if (!is_null($tiempo) &&  !is_null($participante) ) {

            $this->guardarHistorial($tiempo->id);  
          }

            $registro= new Control;
            $registro->mes=$request->get('mes');
            $registro->inicio=$request->get('inicio');
            $registro->fin=$request->get('final');
            $registro->save();

              Participante::where('estado', 'pagado')
             ->update(['estado' => 'pendiente']);

            
            
            $info="sus datos se guardaron correctamente, puede ir a seccion de control de participante";


           return redirect('controlSemanal')->with('msjs',$info);
    }

    public function guardarHistorial($idtiempo){
      $participante=Participante::all();
      foreach ($participante as $key => $value) {
        $historial=new historial;
        $historial->idparticipante=$value->id;
        $historial->idtiempo=$idtiempo;    
        $historial->estado=$value->estado;
        $historial->save();
        if ($value->estado=="pagado") {
          $pago=DB::table('pago')->where('idparticipante',$value->id)->where('idtiempo',$idtiempo)->first();
          historial::where('idparticipante',$value->id)->where('idtiempo',$idtiempo)->update(['monto' =>$pago->monto ,'fechapagado'=>$pago->created_at]);
        }

      }




    }

      public function controlSemanal(){

        $participante=Participante::all();
         $tiempo=DB::table('control')->orderby('id','desc')->first();
         if (!is_null($tiempo)) {
            return view('control.control',["participante"=>$participante,"tiempo"=>$tiempo]);
         }else{
            return view('mensaje.control');
         }
            
    }

        public function registroPago(){
        $participante=Participante::all();
        $tiempo=DB::table('control')->orderby('id','desc')->get();
        
        return view('vacaciones.participante.pagoParticipante',["participante"=>$participante,"tiempo"=>$tiempo]);
        }


        public function saveRegistroPago(Request $request){

            $si_ya_pago=DB::table('pago')->where('idparticipante',$request->get('idparticipante'))->where('idtiempo',$request->get('idtiempo'))->get();
            
            if (count($si_ya_pago)==0) {
                $participante = Participante::findOrFail($request->get('idparticipante'));
            
                $pago= new Pago;
                $pago->idparticipante=$request->get('idparticipante');
                $pago->idtiempo=$request->get('idtiempo');
                $pago->monto=$request->get('monto');
                $pago->save();

                  Participante::where('id', $request->get('idparticipante'))
                 ->update(['monto_total'=>($participante->monto_total+$request->get('monto'))]);

                 $tiempo=DB::table('control')->orderby('id','desc')->first();

                 if ($tiempo->id==$request->get('idtiempo')) {
                    Participante::where('id', $request->get('idparticipante'))
                    ->update(['estado' => 'pagado']);
                 }else{
                      $si_existe_historial=DB::table('historial')->where('idparticipante',$request->get('idparticipante'))->where('idtiempo',$request->get('idtiempo'))->first();

                       if (is_null($si_existe_historial)) {
                        $historial=new historial;
                        $historial->idparticipante=$request->get('idparticipante');
                        $historial->idtiempo=$request->get('idtiempo');    
                        $historial->estado="pagado";
                        $historial->monto=$request->get('monto');
                        $historial->fechapagado=$pago->created_at;
                        $historial->save();
                       }else{
                          historial::where('idparticipante', $request->get('idparticipante'))
                          ->where('idtiempo',$request->get('idtiempo'))
                          ->update(['estado'=>'pagado','monto'=>$request->get('monto'),'fechapagado'=>$pago->created_at]);     
                       }   
                 }


            $info="Sus Datos se guardaron Correctamente";      
           return redirect('registroPago')->with('msjs',$info); 
            }else{
                $info="Error No se puede Registrar algo que ya fue registrado";
                return redirect('registroPago')->with('error',$info);
            }      
           
        }



        public function historial($id){
        $participante=Participante::findOrFail($id);
        $historial=DB::table('historial as h')
        ->join('control as c','c.id','=','h.idtiempo')
        ->select('h.estado','h.monto', 'h.fechapagado','c.mes','c.inicio','c.fin')
        ->where('h.idparticipante','=', $id)
        ->orderby('c.inicio','asc')->paginate(8);
        
       
          return view('vacaciones.participante.historial',["participante"=>$participante,"historial"=>$historial]);
        }
        

}
  
