@extends('layouts.back_main')
@section('content')
<h4 class="text-center font-weight-bold" style="color:grey">New Post</h4>
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container-fluide">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="nav m-5 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link  active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Post_Uz</a>
                        <a class="nav-link  " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Пост_Ўз</a>
                        <a class="nav-link  " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Пост_РУ</a>
                        <a class="nav-link " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Post_En</a>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="container">
                                <div class="row p-2">
                                    <label for="form1">Title_uz</label>
                                    <input type="text" id="form1" class="form-control @error('title_uz') is-invalid @enderror " name="title_uz" value="{{old('title_uz')}}">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="row p-2">
                                    <label for="">Description_uz</label>
                                    <textarea name="description_uz" cols="30" rows="10" class="form-control @error('description_uz') is-invalid @enderror">{{old('description_uz')}}</textarea>
                                    @error('description_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="post_body">Body_uz</label>
                                <div class="row p-2">
                                    <textarea id="post_body" name="body_uz" cols="30" rows="10" class="form-control @error('body_uz') is-invalid @enderror">{{old('body_uz')}}</textarea>
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
                                <div class="row p-2">
                                    <label for="form1">Title_Ўз</label>
                                    <input type="text" id="form1" class="form-control w-100 @error('title_ўз') is-invalid @enderror " name="title_ўз" value="{{old('title_ўз')}}">
                                    @error('title_ўз')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="row p-2">
                                    <label for="">Description_ўз</label>
                                    <textarea name="description_ўз" cols="30" rows="10" class="form-control @error('description_ўз') is-invalid @enderror">{{old('description_ўз')}}</textarea>
                                    @error('description_ўз')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="post_body">Body_ўз</label>
                                <div class="row p-2">
                                    <textarea id="post_body0" name="body_ўз" cols="30" rows="10" class="form-control @error('body_ўз') is-invalid @enderror">{{old('body_ўз')}}</textarea>
                                    @error('body_ўз')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="container">
                                <div class="row p-2">
                                    <label for="form1">Title_ru</label>
                                    <input type="text" id="form1" class="form-control @error('title_ru') is-invalid @enderror " name="title_ru" value="{{old('title_ru')}}">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="row p-2">
                                    <label for="">Description_ru</label>
                                    <textarea name="description_ru" cols="30" rows="10" class="form-control @error('description_ru') is-invalid @enderror">{{old('description_ru')}}</textarea>
                                    @error('description_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="post_body">Body_ru</label>
                                <div class="row p-2">
                                    <textarea id="post_body2" name="body_ru" cols="30" rows="10" class="form-control @error('body_ru') is-invalid @enderror">{{old('body_ru')}}</textarea>
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
                                <div class="row p-2">
                                    <label for="form1">Title</label>
                                    <input type="text" id="form1" class="form-control @error('title_en') is-invalid @enderror " name="title_en" value="{{old('title_en')}}">
                                    @error('title_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="row p-2">
                                    <label for="">Description</label>
                                    <textarea name="description_en" cols="30" rows="10" class="form-control @error('description_en') is-invalid @enderror">{{old('description_en')}}</textarea>
                                    @error('description_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="post_body">Body</label>
                                <div class="row p-2 form-group">
                                    <textarea id="post_body1" name="body_en" cols="30" rows="10" class="form-control @error('body_en') is-invalid @enderror">{{old('body_en')}}</textarea>
                                    @error('body_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row pt-2">
                    <div class="col-md-12">

                    </div>
                </div>
                <div class="row pt-2">
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
                    <div class="col-md-12">
                        <label for="banner">Banner</label>
                        <input type="checkbox" name="banner" id="banner" value="1" class="form-control @error('banner') is-invalid @enderror">
                        @error('banner')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <label for="nationality">Status</label>
                        <select id="nationality" type="date" class="form-control select2 @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>-- status tanlang --</option>
                            <option value="0">0</option>
                            <option value="1">1</option>

                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info btn-block btn-rounded z-depth-1">Save</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('post_body');
</script>
</div>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('post_body0');
</script>
</div>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('post_body1');
</script>
</div>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('post_body2');
</script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea#post_body",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>

@endsection