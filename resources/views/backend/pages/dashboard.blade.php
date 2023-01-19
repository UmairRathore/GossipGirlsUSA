@extends('backend.layouts.app',['pageSlug' => 'dashboard'])
@section('title', 'Dashboard')
@section('content')
    <div class="content">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Dashbaord</h5>
                    @if(Session::has('message'))
                        <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {!! session('msg') !!}
                        </div>
                    @endif
                </div>
                <div class="card-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    {{auth()->user()->first_name}}


                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->role_id===1)
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Users</h5>
                        <h3 class="card-title"><i class="tim-icons icon-single-02"></i>{{$user}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chartLinePurple"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Bloggers</h5>
                        <h3 class="card-title"><i class="tim-icons icon-single-02"></i> {{$blogger}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="CountryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Total Posts</h5>
                        <h3 class="card-title"><i class="tim-icons icon-credit-card text-success"></i>{{$post}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chartLineGreen"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Dummy Card</h5>
                        <h3 class="card-title"> 12,100K</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(auth()->user()->role_id===3)
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Posts</h5>
                        <h3 class="card-title"><i class="tim-icons icon-credit-card"></i>{{$bloggerpost}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chartLinePurple"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
