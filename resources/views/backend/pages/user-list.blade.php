@extends('backend.layouts.app',['pageSlug' => 'users-list'])
@section('title', 'Users List')

@section('content')


    <style type="text/css">
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #da4fd2;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #da4fd2;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 24px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


        td.myrow {
            max-width: 100px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }



    </style>
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
                                    <th>Status</th>
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
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" id="status" class="checkbox checkbox_list"
                                                       data-id="{{ $data->id }}" value="{{ ($data->status == 1) ? 0 : 1 }}"
                                                       data-url="{{route('status-user',[$data->id])}}"
                                                       name="status" {{ ($data->status == 1) ? 'checked' : '' }}>
                                                <span class="slider round" ></span>
                                            </label>
                                            <span style="display: none">{{ ($data->status == 1) ? 'Active' : 'false' }}</span>


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

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <script>

        $(function() {
            $("td.myrow").mouseenter(function() {
                $(this).attr("title", $(this).html());
            });

        });



        $(document).ready(function () {
            $("#cross").click(function () {
                $(".alert-hide").hide();
            });
            setTimeout(function () {

                $(".alert-hide").fadeOut("slow")

            }, 6000);
        });




        $(document).on("click", "#status", function () {
            var is_checked_obj = $(this);
            var is_checked = $(this).val(); // this gives me null
            let token = $('meta[name="csrf-token"]').attr('content');
            // console.log(is_checked);
            {{--add this in head
                        "<meta name="csrf-token" content="{{ csrf_token() }}" />"
            when token mismatches --}}

            if (is_checked != null) {
                var url = $(this).attr('data-url'); // this gives me null
                var dltUrl = url;
                $.ajax({
                    url: dltUrl,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        'status': is_checked,
                        '_token': token
                    },
                    success: function (response) {
                        if (response.statusCode === 200) {
                            is_checked = 1 - Math.abs(is_checked);
                            is_checked_obj.val(is_checked); // this gives me null
                            toastr.success(response.message);
                            // $(document.getElementById())
                        }
                        else {
                            if(is_checked){
                                is_checked_obj.removeAttribute('checked');
                            }
                            else{
                                is_checked_obj.attr('checked');
                            }
                            // toastr.error("Oops something went wrong");
                        }
                    }, error: function () {
                        toastr.success("User approved Successfully");
                        // toastr.error("Oops something went wrong");

                    },
                });
            }


        });
        $('#inputStateRes').on('change', function () {
            if (this.value == 'Active') {
                $(".dataTable").DataTable().column(10).search('Active').draw();
            } else if (this.value == 'InActive') {
                $(".dataTable").DataTable().column(10).search('false').draw();
            } else if (this.value == 'All') {
                $(".dataTable").DataTable().column(10).search('').draw();
            } else {
                $(".datatable").DataTable().search(this.value).draw();
            }
        });
    </script>

@endsection
