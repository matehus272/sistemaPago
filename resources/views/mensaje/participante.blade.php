 @if(Session::has('msjs'))
<!-- success -->
<div style=" background: rgba(0, 0, 255, 0.3); border-radius: 100px" id="msj" class ="alert alert-success alert-dismissible" role="alert">
  <button  type="button" class="close"  data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <p style="font-weight: bold;">
  {{Session::get('msjs')}}
  </p>
</div>
@endif