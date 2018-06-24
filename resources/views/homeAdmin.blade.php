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
                                        {!! $chartAd->html() !!}
                                        {!! Charts::scripts() !!}
                                        {!! $chartAd->script() !!}
                                        </div>
                                        <div class="col">
                                        {!! $chartAd2->html() !!}
                                        {!! $chartAd2->script() !!}
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                        {!! $chartAd3->html() !!}
                                        {!! $chartAd3->script() !!}
                                        </div>
                                        <div class="col">
                                        {!! $chartAd4->html() !!}
                                        {!! $chartAd4->script() !!}
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                        {!! $chartAd5->html() !!}
                                        {!! $chartAd5->script() !!}
                                        </div>
                                        <div class="col">
                                        {!! $chartAd6->html() !!}
                                        {!! $chartAd6->script() !!}
                                        </div>
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
@endsection
