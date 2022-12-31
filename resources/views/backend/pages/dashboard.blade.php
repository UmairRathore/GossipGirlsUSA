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

                </div>
            </div>
        </div>
    </div>
@endsection
