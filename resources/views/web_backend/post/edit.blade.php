@extends('layouts.back_main')
@section('content')
<div class="container">
    <h4 class="text-center font-weight-bold" style="color:grey">New Post</h4>
    <form action="{{route('post.update',['post'=>$post])}}" method="post" enctype="multipart/form-data">
         <div class="row">
         @csrf
            @method('PUT')
<div class="col-md-12">
<label for="form1">Title</label>
            <input type="text" id="form1" class="form-control @error('title') is-invalid @enderror " name="title" value="{{old('title',$post->title)}}">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

</div>


<div class="col-md-12">
<label for="">Description</label>
            <textarea name="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{old('description',$post->description)}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
</div>
            <div class="col-md-12">
            <label for="">Body</label>
            <textarea name="body"  id="post_body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{old('body',$post->body)}}</textarea>
            @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
        <label for="img">Post Image</label>
                <input id="img" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-info btn-block btn-rounded z-depth-1">Save</button>
                </div>
        </form>
</div>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace('post_body');
        </script>
@endsection