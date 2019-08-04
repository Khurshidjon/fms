@extends('layouts.back_main')
@section('content')
@php 
    $lang = App::getLocale();
@endphp
<style>
    textarea[name="description_uz"],
    textarea[name="description_cyrl"],
    textarea[name="description_ru"],
    textarea[name="description_en"] {
        resize: none
    }
</style>
    @if(!session()->has('success'))
    <div class="alter alter-success">
        <Strong>{{session()->get('message')}}</Strong>
    </div>
    @endif
<h4 class="text-center font-weight-bold" style="color:grey">Update page</h4>
<form action="{{route('pages.update',['page'=>$page])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <div class="nav m-5 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link  active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Страница uz</a>
            <a class="nav-link  " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Страница криль</a>
            <a class="nav-link  " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Страница рус</a>
            <a class="nav-link " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Страница англи.</a>
        </div>
        <label for="menu">Menu</label>
        <select name="menu_id" class="form-control" id="menu">
            <option value="">-- {{ __('pages.select_one') }} --</option>
            @foreach($menus as $menu)
                <option value="{{ $menu->id }}" {{ $menu->id==$page->menu_id?'selected':'' }}>{{ $menu->{'name_'.$lang } }}</option>
            @endforeach
        </select>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="container">
                        <div class="form-group p-2">
                            <label for="form1">Title_uz</label>
                            <input type="text" id="form1" class="form-control @error('title_uz') is-invalid @enderror " name="title_uz" value="{{old('title_uz',$page->title_uz)}}">
                            @error('title_uz')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group p-2">
                            <label for="">Description_uz</label>
                            <textarea name="description_uz" cols="20" rows="5" class="form-control @error('description_uz') is-invalid @enderror">{{old('description_uz',$page->description_uz)}}</textarea>
                            @error('description_uz')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="page_body">Body_uz</label>
                        <div class="form-group p-2">
                            <textarea id="page_body" name="body_uz" cols="30" rows="5" class="form-control @error('body_uz') is-invalid @enderror">{{old('body_uz',$page->body_uz)}}</textarea>
                            @error('body_uz')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="container">
                        <div class="form-group p-2">
                            <label for="form1">Title_cyrl</label>
                            <input type="text" id="form1" class="form-control w-100 @error('title_cyrl') is-invalid @enderror " name="title_cyrl" value="{{old('title_cyrl',$page->title_cyrl)}}">
                            @error('title_cyrl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group p-2">
                            <label for="">Description_cyrl</label>
                            <textarea name="description_cyrl" cols="30" rows="5" class="form-control @error('description_cyrl') is-invalid @enderror">{{old('description_cyrl',$page->description_cyrl)}}</textarea>
                            @error('description_cyrl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="page_body">Body_cyrl</label>
                        <div class="form-group p-2">
                            <textarea id="page_body0" name="body_cyrl" cols="30" rows="5" class="form-control @error('body_cyrl') is-invalid @enderror">{{old('body_cyrl',$page->body_cyrl)}}</textarea>
                            @error('body_cyrl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="container">
                        <div class="form-group p-2">
                            <label for="form1">Title_ru</label>
                            <input type="text" id="form1" class="form-control @error('title_ru') is-invalid @enderror " name="title_ru" value="{{old('title_ru',$page->title_ru)}}">
                            @error('title_ru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group p-2">
                            <label for="">Description_ru</label>
                            <textarea name="description_ru" cols="30" rows="5" class="form-control @error('description_ru') is-invalid @enderror">{{old('description_ru',$page->description_ru)}}</textarea>
                            @error('description_ru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="page_body">Body_ru</label>
                        <div class="form-group p-2">
                            <textarea id="page_body2" name="body_ru" cols="30" rows="5" class="form-control @error('body_ru') is-invalid @enderror">{{old('body_ru',$page->body_ru)}}</textarea>
                            @error('body_ru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="container">
                        <div class="form-group p-2">
                            <label for="form1">Title</label>
                            <input type="text" id="form1" class="form-control @error('title_en') is-invalid @enderror " name="title_en" value="{{old('title_en',$page->title_en)}}">
                            @error('title_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group p-2">
                            <label for="">Description</label>
                            <textarea name="description_en" cols="30" rows="5" class="form-control @error('description_en') is-invalid @enderror">{{old('description_en',$page->description_en)}}</textarea>
                            @error('description_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="page_body">Body</label>
                        <div class="form-group p-2 form-group">
                            <textarea id="page_body1" name="body_en" cols="30" rows="5" class="form-control @error('body_en') is-invalid @enderror">{{old('body_en',$page->body_en)}}</textarea>
                            @error('body_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <button type="submit" class="btn btn-info btn-block btn-rounded z-depth-1">Отправать</button>
            </div>
        </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
<script>
    CKEDITOR.replace('page_body0', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });
    CKEDITOR.replace('page_body', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });
    CKEDITOR.replace('page_body1', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });

    CKEDITOR.replace('page_body2', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });
</script>
@endsection