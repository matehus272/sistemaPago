@extends('layouts.app')

@section('content')



<div class="container">
	<div class="row">

	<h1 style="text-align: center;">Registrar el Pago de un participante</h1>
	<br>

<form  action="{{ url('/registroPago') }}"  method="POST">    
		      		{{ csrf_field() }}				       
		      		@include('mensaje.participante')
		      		@include('mensaje.error')

			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="form-group">
                    <label name="idparticipante" for="">Nombre Participante</label>
		                <select name="idparticipante" class="form-control" required="">
		    				@foreach ($participante as $part)
		    				   <option value="{{$part->id}}">{{$part->nombre}}</option>	 
		    				@endforeach
		    			</select>
                  </div>
				
			</div>


			   <div class="col-md-2 col-sm-12 col-xs-12">
                   <div class="form-group">
                    <label name="monto" for="">Monto a Pagar</label>
                    <input type="number" name="monto" id="input" class="form-control datepicker" placeholder="Con que monto inicia el participante" required="">
                  </div>
            </div>

			<div class="col-md-4 col-sm-12 col-xs-12">
                   <div class="form-group">
                    <label name="idtiempo" for="">En que fecha</label>
		               <select name="idtiempo" class="form-control" required="">
		    				@foreach ($tiempo as $time)
		    				   <option value="{{$time->id}}">{{$time->id}} -{{$time->mes}} del {{$time->inicio}} al {{$time->fin}}</option>	 
		    				@endforeach
		    		   </select>
                  </div>
            </div>



			<div class="col-md-2 col-sm-12 col-xs-12" >
 		        <input class="btn btn-primary" style="margin-top: 23px" value="Guardar" type="submit">  
	        </div>
							
						       
			                
		
				</form>	  	
		
	</div>
	
</div>


@endsection
