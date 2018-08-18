@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	
	 <div class="col-md-12 col-sm-12 col-xs-12 ">	
			<div class="span7">   
				<div class="widget stacked widget-table action-table">
    				
						<div class="widget widget-header">
							
							<h3>Historial del Participante:  
								{{$participante->nombre}} </h3>
						</div> <!-- /widget-header -->
						
						<div class="table-responsive">
							
							<table class="table table-striped table-bordered">
								<thead >
									<tr >
										<th class="text-center">Mes</th>
										<th class="text-center">desde</th>
										<th class="text-center">Hasta</th>
										<th class="text-center">Estado</th>
										<th class="text-center">Monto</th>
										<th class="text-center">Fecha Registrado</th>
										
									</tr>
								</thead>
								<tbody>
								  @foreach ($historial as $his)	
									<tr class="text-center">
										<td>{{$his->mes}}</td>
										<td>{{$his->inicio}}</td>
										<td>{{$his->fin}}</td>
										@if($his->estado=="pagado")
											<td style="background-color: green;color: white;font-weight: bold;"> {{$his->estado}}</td>
											@else
												<td style="background-color: red;color: white;font-weight: bold;">{{$his->estado}}</td>	
										@endif
										
										<td>{{$his->monto}}</td>
										<td>{{$his->fechapagado}}</td>
										
									</tr>
								 @endforeach 
									</tbody>
								</table>
							 {{$historial->render()}}
						</div> <!-- /widget-content -->
					
					</div> <!-- /widget -->
             </div>
          </div>  
	</div>
</div>



@endsection
