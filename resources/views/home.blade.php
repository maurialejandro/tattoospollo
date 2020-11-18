@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                
                <div class="alert alert-primary" role="alert">
                    <h4>Bienvenido</h2> 
                </div>
                <img src="{{asset('storage/logoSolo.png')}}"/>
            
                     @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
        </div>
    </div>
</div>
@endsection
