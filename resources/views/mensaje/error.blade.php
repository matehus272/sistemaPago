 @if(Session::has('error'))
<!-- success -->
<div style=" background-color:red ; border-radius: 100px" id="msj" class ="alert alert-success alert-dismissible" role="alert">
  <button  type="button" class="close"  data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <p style="font-weight: bold;">
  {{Session::get('error')}}
  </p>
</div>
@endif