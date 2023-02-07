@extends('backend.layouts.app',['pageSlug' => 'posts-list'])
@section('title', 'Posts List')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title"> Bloggers Posts Table</h4>
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
                                    <th>Blogger Name</th>
                                    <th>Post Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                                {{dd($user)}}--}}
                                @foreach($posts as $data)
                                    <tr>
                                        <td>{{$data->username}}</td>
                                        <td>
                                            @if($data->post_image)
                                                <img src="{{ asset($data->post_image) }}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="Image">
                                            @else
                                                <img src="{{asset('images/default.png')}}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="no image">
                                            @endif
                                        </td>
                                        <td>{{$data->title}}</td>
                                        <td  class="myrow">
                                            <?= $data->description ?></td>
                                        <td>
                                            <a href="{{route('bloggersposts.destroy',$data->id)}}" onclick="return confirm('Are you sure?')" data-toggle="tooltip" data-placement="top" title="delete" class="far fa-trash-alt ms-text-danger"></a>
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

        $(function() {
            $("td.myrow").mouseenter(function() {
                $(this).attr("title", $(this).html());
            });

        });


    </script>
@endsection

