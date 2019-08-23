@extends('layouts.back_main')
@section('content')
@php 
    $lang = App::getLocale();
    //dd(explode('/', $album->album_image)[1])
@endphp
<style>
    textarea[name="description_uz"],
    textarea[name="description_cyrl"],
    textarea[name="description_ru"],
    textarea[name="description_en"]{
        resize:none
    }
</style>
<h4 class="text-center font-weight-bold" style="color:grey">New Album</h4>
<form action="{{route('albums.update', [$album])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container-fluid">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="container">
                <div class="row">
                    <div class="form-group col-md-3 p-2">
                        <label for="title_uz">Title uz</label>
                        <input type="text" id="album_title_uz" class="form-control @error('album_title_uz') is-invalid @enderror " name="album_title_uz" value="{{ old('album_title_uz', $album->album_title_uz )}}">
                        @error('album_title_uz')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 p-2">
                    <label for="album_title_cyrl">Title kril</label>
                    <input type="text" id="album_title_cyrl" class="form-control @error('album_title_cyrl') is-invalid @enderror " name="album_title_cyrl" value="{{ old('album_title_cyrl', $album->album_title_cyrl) }}">
                        @error('album_title_cyrl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 p-2">
                        <label for="album_title_ru">Title ru</label>
                        <input type="text" id="album_title_ru" class="form-control @error('album_title_ru') is-invalid @enderror" name="album_title_ru" value="{{ old('album_title_ru', $album->album_title_ru)}}">
                        @error('album_title_ru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 p-2">
                        <label for="album_title_en">Title en</label>
                        <input type="text" id="album_title_en" class="form-control @error('album_title_en') is-invalid @enderror " name="album_title_en" value="{{old('album_title_en', $album->album_title_en)}}">
                        @error('album_title_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <input type="file" class="form-control @error('album_image') is-invalid @enderror " name="album_image" accept="image/jpeg,image/png,image/gif" value="{{ $album->album_image }}">
                        @error('album_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="float-right btn btn-info btn-rounded z-depth-1">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
           
        </div>
    </div>
</form>
</div>
</div>
</div>
<script>
    CKEDITOR.replace('post_body0', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });
    CKEDITOR.replace('post_body', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });
    CKEDITOR.replace('post_body1', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });

    CKEDITOR.replace('post_body2', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });
</script>
@endsection