@extends('backend.layouts.app',['pageSlug' => 'users-list'])
@section('title', 'Users List')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title"> Users Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                @if(Session::has('message'))
                                    <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                                        <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {!! session('msg') !!}
                                    </div>
                                @endif
                                <thead class=" text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                                {{dd($user)}}--}}
                                @foreach($user as $data)
                                    <tr>
                                        <td>{{$data->username}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>
                                            <a href="{{route('users.delete',$data->id)}}" onclick="return confirm('Are you sure?')" data-toggle="tooltip" data-placement="top" title="delete" class="far fa-trash-alt ms-text-danger"></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>

    <script>

        $(document).ready(function () {
            $("#cross").click(function () {
                $(".alert-hide").hide();
            });
            setTimeout(function () {

                $(".alert-hide").fadeOut("slow")

            }, 6000);
        });


    </script>
@endsection

