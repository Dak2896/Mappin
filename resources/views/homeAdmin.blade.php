@extends('layouts.app')
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('icona.png') }}">
<title>Mappin</title>

@section('content')

       <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            Admin 
                        </a>
                    </li>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Shortcuts</a>
                    </li>
                    <li>
                        <a href="#">Overview</a>
                    </li>
                    <li>
                        <a href="#">Events</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
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
                                      </div>
                                    </div>


                                    You are logged in!
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>


<!--<div class="container">
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
                      </div>
                    </div>


                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
