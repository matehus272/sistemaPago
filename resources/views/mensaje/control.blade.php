@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

		
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1>No puedes Acceder a Este sitio sin antes aver Registrado Primero un Registro Semanal</h1>

						 <a class='form-control total btn btn-info' style="margin-top: 30px" href="{{url('/registroSemana')}}">
                		Registro de Semana</a>
					</div>		
				</div>
			</div>
		
	</div>
</div>


@endsection
