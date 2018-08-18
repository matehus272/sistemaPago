@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <form  action="{{ url('/registroSemana') }}"  method="POST">    
              {{ csrf_field() }}               
              @include('mensaje.participante')

            <div class="col-md-12 col-sm-12 col-xs-12">
                   <h1 style="text-align: center;">Registro de semana en un determinado mes</h1>
            </div>
             <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 30px">
                <?php 
                 $tiempo= App\Control::select()->orderby('id','desc')->first();

                  ?>
                  @if(is_null($tiempo))
                         <h4 style="text-align: center;"> </h4> 
                  @else
                      <h4 style="text-align: center;">El Ultimo Registro Fue desde {{$tiempo->inicio}} hasta {{$tiempo->fin}} </h4>
                  @endif
                   
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                   <div class="form-group">
                    <label for="">Fecha de Inicio</label>
                    <input type="date" name="inicio" id="input" class="form-control datepicker" required="">
                  </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                   <div class="form-group">
                    <label for="">Fecha Final</label>
                    <input type="date" name="final" id="input" class="form-control datepicker" required="">
                  </div>
            </div>


             <div class="col-md-4 col-sm-12 col-xs-12">
                 <div class="form-group">
                     <label>Mes</label>
                      <select name="mes"  id="mes" class="form-control mb-md"  required=""  optionsCaption: >
                              <option selected value="none" disabled="disabled">Seleccione el mes a registrar</option>
                               <option value="enero" >Enero</option>   
                               <option value="febrero" >Febrero</option>   
                               <option value="Marzo" >Marzo</option>   
                               <option value="abril" >Abril</option>   
                               <option value="mayo" >Mayo</option>   
                               <option value="junio" >Junio</option>   
                               <option value="julio" >Julio</option>   
                               <option value="agosto" >Agosto</option>   
                               <option value="septiembre" >Septiembre</option>   
                               <option value="octubre" >Octubre</option>   
                               <option value="noviembre" >Noviembre</option>   
                               <option value="diciembre" >Diciembre</option>   
                               
                        </select>
                  
                  </div>
              </div>
        
        <center>
          <div class="col-md-4 col-sm-12 col-xs-12" >
                <input class="btn btn-primary" style="margin-top: 10px" value="Guardar" type="submit">  
          </div>
        </center>
  </form>
    </div>
</div>
@endsection

