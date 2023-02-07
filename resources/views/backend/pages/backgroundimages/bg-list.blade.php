@extends('backend.layouts.app',['pageSlug' => 'background-list'])
@section('title', 'background List')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title"> Background Images Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table tablesorter">
                                @if(Session::has('message'))
                                    <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                                        <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {!! session('msg') !!}
                                    </div>
                                @endif
                                <thead class=" text-primary">
                                <tr>
                                    <th>Auth Image</th>
                                    <th>About Us banner</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                                {{dd($user)}}--}}
                                @foreach($background as $data)
                                    <tr>
                                        <td>
                                            @if($data->auth_bg)
                                                <img src="{{ asset($data->auth_bg) }}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="Image">
                                            @else
                                                <img src="{{asset('images/default.png')}}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="no image">
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->aboutus_bg)
                                                <img src="{{ asset($data->aboutus_bg) }}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="Image">
                                            @else
                                                <img src="{{asset('images/default.png')}}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="no image">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('bg.edit',$data->id)}}" data-toggle="tooltip" data-placement="top" title="edit" class="fas fa-pencil-alt ms-text-primary"></a>
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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

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

