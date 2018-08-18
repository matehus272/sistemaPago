
@extends('layouts.app')
@section('content')

 @if(Session::has('msj'))
<!-- danger -->
<div id="msj" class ="alert alert-success alert-dismissible" role="alert">
  <button  type="button" class="close"  data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('msj')}}
</div>
@endif


@stop



