@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Sistema De Pago <a href="https://www.youtube.com/watch?v=pRtJl2vYG9o"><img  width="40px" height="30px" src="{{asset('img/youtube.ico')}}" alt=""></a></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                 <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FaVb-N7KfEo" frameborder="0" allowfullscreen=""></iframe>
                  </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
