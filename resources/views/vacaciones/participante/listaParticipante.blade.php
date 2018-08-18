@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>

                <div class='form-control total btn btn-info' style="margin-top: 30px">
                  Total: Total 
                </div>
                <div>
                    <h2 style="text-align: center;">{{$total }}bs</h2>
                </div>
                <a class='form-control total btn btn-info' style="margin-top: 30px" href="{{url('/crearParticipante')}}">
                Agregar Participante</a>
                 
        </div>
		<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
                            <th>nombre</th>
                            <th>monto total</th>
                            <th>opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participante as $part)
                            <tr>
                                <td>{{$part->nombre}}</td>
                                <td>{{$part->monto_total}}</td>
                                <td>
                                  <a class='form-control total btn btn-info' href="{{url('/historial'.'/'.$part->id)}}">
                                     Ver Historial</a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>   
            {{$participante->render()}}
		</div>

        

	</div>
</div>

@endsection
