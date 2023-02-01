@extends('backend.layouts.app',['pageSlug'=>'contact-list'])
@section('title', 'Contacts List')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Simple Table</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="contacttable">
                                    @if(Session::has('message'))
                                        <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                                            <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            {!! session('msg') !!}
                                        </div>
                                    @endif
                                    <thead class=" text-primary">
                                    <tr>
                                        <!-- 1--> <th>Name</th>
                                        <!-- 2--> <th>email</th>
                                        <!-- 3--> <th>Subject</th>
                                        <!-- 4--> <th>message</th>
                                        <!-- 4--> <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--                                {{dd($user)}}--}}
                                    @foreach($contact as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->subject}}</td>
                                            <td>{{$data->message}}</td>
                                            <td>
                                                <a href="{{route('contact.delete',$data->id)}}" onclick="return confirm('Are you sure?')" data-toggle="tooltip" data-placement="top" title="delete" class="far fa-trash-alt ms-text-danger"></a>
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
    </div>
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
        <!--Datatable-->
        $(document).ready( function () {
            $('#contacttable').DataTable();
        } );

        <!--Datatable-->
    </script>
@endsection
