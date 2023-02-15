@extends('backend.layouts.app',['pageSlug'=>'posts'])
@section('title', 'Update Post')
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
                    <div class="card-header" style="color: white">Edit Post</div>

                    <div class="card-body  justify-content-center">
                        <form method="POST" action="{{ route('posts.update' ,[$posts->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label for="title" style="color: white">Title </label>
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $posts->title, old('title') }}" required autocomplete="title" autofocus>
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
                                            {{ $posts->description,old('description') }}
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

                                            @if($posts->post_image)
                                                <img id="previewImg" src="{{ asset($posts->post_image) }}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="Image">
                                            @else
                                                <img id="previewImg" src="{{asset('images/default.png')}}" alt="No File Choosen" width="100" height="100">
                                            @endif
{{--                                                <img id="previewImg" src="{{asset('images/default.png')}}" alt="No File Choosen" width="100" height="100">--}}

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
                                        <strong style="color: white">Edit Post</strong>
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
@endsection

