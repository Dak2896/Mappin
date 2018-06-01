@extends('layouts.app')
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('icona.png') }}">
<title>Mappin</title>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>Dashboard</center></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                      <div class="row">
                        <div class="col">
                        {!! $chart->html() !!}
                        {!! Charts::scripts() !!}
                        {!! $chart->script() !!}
                        </div>
                        <div class="col">
                        {!! $chartE->html() !!}
                        {!! $chartE->script() !!}
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                        {!! $chartF->html() !!}
                        {!! $chartF->script() !!}
                        </div>
                        <div class="col">
                        {!! $chartG->html() !!}
                        {!! $chartG->script() !!}
                        </div>
                        <div class="w-100"></div>                        
                        <table>
                        <tbody>
                        @foreach ($users as $user)
                            <th scope="row">
                            {{ $loop->index }}
                            </th>
                            <tr>
                                <td> {{ $user->client_ip }} </td>
                                <td> ciao </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                      </div>
                    </div>
                    You are logged in!


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
