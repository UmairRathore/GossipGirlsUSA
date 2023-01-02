@extends('backend.layouts.app',['pageSlug'=>'admin-list'])
@section('title', 'Admins List')

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
                                <table class="table" id="datatable">
                                    <thead class=" text-primary">
                                    <tr>
                                        <!-- 1--> <th>Name</th>
                                        <!-- 2--> <th>email</th>
                                        <!-- 3--> <th>Ph.No</th>
                                        <!-- 4--> <th>address</th>
                                        <!-- 5--> <th>city</th>
                                        <!-- 6--> <th>zipcode</th>
                                        <!-- 7--> <th>state</th>
                                        <!-- 8--> <th>time_in_community</th>
                                        <!-- 9--> <th>description</th>
                                        <!-- 10--> <th>status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--                                {{dd($user)}}--}}
                                    @foreach($user as $data)
                                        <tr>
                                            <td>{{$data->first_name.' '.$data->last_name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->phone_number}}</td>
                                            <td>{{$data->address}}</td>
                                            <td>{{$data->city}}</td>
                                            <td>{{$data->zipcode}}</td>
                                            <td>{{$data->state}}</td>
                                            <td>{{$data->time_in_community}}</td>
                                            <td>{{$data->description}}</td>
                                            <td>


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
{{--    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>--}}


@endsection
