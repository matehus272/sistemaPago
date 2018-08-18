@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

		<section class="content">
			   		@include('mensaje.participante')

			<h2 style="text-align: center;">Control Semanal del mes de <span style="color: blue">{{$tiempo->mes}}</span></h2>
			<h3 style="text-align: center;"> del <span style="font-weight: bold;color: blue">{{$tiempo->inicio}}</span>   hasta el     <span style="font-weight: bold;color: blue">{{$tiempo->fin}}</span>
			</h3>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-filter" data-target="pagado">Pagado</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Pendiente</button>
								
								<button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button>
							</div>
						</div>
						
						<div class="table-container">
							<table class="table table-filter">
								
								<tbody>

								 @foreach ($participante as $part)

									<tr data-status="{{$part->estado}}">
										<td>
										<a href="{{url('/historial'.'/'.$part->id)}}">Ver Historial</a>
										
										</td><td>
											
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
												
													<h4 class="title">
														{{$part->nombre}}
														<span class="pull-right {{$part->estado}}">({{$part->estado}})</span>
													</h4>
													<p class="summary">   
														   <?php 
														        $cantidad= App\historial::select()->where('estado','=',"pendiente")->where('idparticipante','=',$part->id)->count();

														        ?>
														     Debe un total de: {{$cantidad}} Semana

													</p>
												</div>
											</div>
										</td>
									</tr>

								 @endforeach 
								
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="content-footer">
					<p>
						Page © - 2018 <br>
						facebook <a href="https://www.facebook.com/cesar.fuentesjucha" target="_blank">Cesar fuentes</a>
					</p>
				</div>
			</div>
		</section>
		
	</div>
</div>


@endsection
