@extends('backend.layouts.app',['pageSlug'=>'posts'])
@section('title', 'Create Post')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert-hide" style="margin-top: 10px">
                    @if(Session::has('message'))
                        <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                            <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {!! session('msg') !!}
                        </div>
                    @endif
                </div>

                <div class="card" style="margin-top: 10%;opacity: 0.8;box-shadow: 30px 50px 60px black;">
                    <div class="card-header" style="color: white">Add Post</div>

                    <div class="card-body  justify-content-center">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label for="title" style="color: white">Title </label>
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label for="description" style="color: white">Description</label>
                                        <textarea id="postdescription" name="description" rows="4" cols="80" class="ckeditor form-control @error('description') is-invalid @enderror" placeholder="Briefly explain why you want to blog for our community">
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <div>
                                            <label for="post_image" style="color: white">Add Image</label>
                                        </div>
                                        <div>
                                            <img id="previewImg" src="{{asset('images/default.png')}}" alt="No File Choosen" width="100" height="100">
                                        </div>
                                        <div>
                                            <button>
                                                <input type="file" name="post_image" onchange="previewFile(this);" class="img-thumbnail form-control @error('post_image') is-invalid @enderror">
                                                @error('post_image')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                                Choose File
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-5 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <strong style="color: white">Create Post</strong>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });


        // <!--alert Hide and Time Duration -->
        $(document).ready(function () {
            $("#cross").click(function () {
                $(".alert-hide").hide();
            });
            setTimeout(function () {

                $(".alert-hide").fadeOut("slow")

            }, 6000);
        });
        // <!--alert Hide and Time Duration -->

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function () {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }

    </script>
    {{--    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
    {{--    <script type="text/javascript">--}}
    {{--        tinymce.init({--}}
    {{--            selector: 'textarea.tinymce-editor',--}}
    {{--            height: 300,--}}
    {{--            menubar: false,--}}
    {{--            plugins: [--}}
    {{--                'advlist autolink lists link image charmap print preview anchor',--}}
    {{--                'searchreplace visualblocks code fullscreen',--}}
    {{--                'insertdatetime media table paste code help wordcount', 'image'--}}
    {{--            ],--}}
    {{--            toolbar: 'undo redo | formatselect | ' +--}}
    {{--                'bold italic backcolor | alignleft aligncenter ' +--}}
    {{--                'alignright alignjustify | bullist numlist outdent indent | ' +--}}
    {{--                'removeformat | help',--}}
    {{--            content_css: '//www.tiny.cloud/css/codepen.min.css'--}}
    {{--        });--}}

    {{--    </script>--}}
@endsection

