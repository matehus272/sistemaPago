@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

<form  action="{{ url('/crearParticipante') }}"  method="POST">    
		      		{{ csrf_field() }}				       
		      		@include('mensaje.participante')

			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="form-group">
                    <label name="nombre" for="">Nombre completo</label>
                    <input class="form-control" name="nombre" value="" type="text" required="" placeholder="Escriba el nombre de un participante">
                  </div>
				
			</div>

			   <div class="col-md-4 col-sm-12 col-xs-12">
                   <div class="form-group">
                    <label name="monto" for="">Monto inicial</label>
                    <input type="number" name="monto" id="input" class="form-control datepicker" placeholder="Con que monto inicia el participante">
                  </div>
            </div>


			 <center>
          <div class="col-md-2 col-sm-12 col-xs-12" >
                <input class="btn btn-primary" style="margin-top:25px" value="Guardar" type="submit">  
          </div>
        </center>
							
						       
			                
		
				</form>	  	
		
	</div>
	
</div>


@endsection
