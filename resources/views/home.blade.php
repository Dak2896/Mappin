@extends('layouts.app')
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('icona.png') }}">
<title>Mappin</title>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    {!! $chart->html() !!}
                    {!! Charts::scripts() !!}
                    {!! $chart->script() !!}
                    {!! $chartE->html() !!}
                    {!! $chartE->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
