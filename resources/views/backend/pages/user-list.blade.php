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
                            <table id="usertable" class="table">
                                <thead class=" text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                                {{dd($user)}}--}}
                                @foreach($user as $data)
                                    <tr>
                                        <td>{{$data->first_name.' '.$data->last_name}}</td>
                                        <td>{{$data->email}}</td>
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
{{--    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>--}}

    <script>
        $(document).ready( function () {
            $('#usertable').DataTable();
        } );
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

