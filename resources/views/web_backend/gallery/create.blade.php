@extends('layouts.back_main')
@section('content')
@php
    $lang = App::getLocale();
@endphp
<link rel="stylesheet" type="text/css" href="{{ asset('image_uploader/fancy_fileupload.css') }}">
<script src="{{ asset('image_uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('image_uploader/jquery.fileupload.js') }}"></script>
<script src="{{ asset('image_uploader/jquery.fancy-fileupload.js') }}"></script>
<style>
    .page-status{
        cursor:pointer;
    }
    #my-dropzone .message {
        font-family: "Segoe UI Light", "Arial", serif;
        font-weight: 600;
        color: #0087F7;
        font-size: 1.5em;
        letter-spacing: 0.05em;
    }

    .dropzone {
        display: block;
        width: 100%;
        min-height: 200px;
        box-sizing: border-box;
        border: 2px dashed #A2B4CA;
        border-radius: 3px;
        padding: 0;
        background-color: #FCFCFC;
        background-image: url("{{ asset('image_uploader/fancy_upload.png') }}");
        background-repeat: no-repeat;
        background-position: center center;
        opacity: 0.5;
        cursor: not-allowed;
        outline: none;
    }
</style>
<div class="container-fluid" id="upload">
    <h2 class="text-center text-uppercase font-weight-bold">Gallery</h2>
    <div class="row">
        @if(!session()->has('message'))
        <div class="alter alter-success">
            <Strong>{{session()->get('message')}}</Strong>
        </div>
        @endif
    </div>
    <form action="{{ route('galleries.store') }}" method="post" class="gallery-form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="album">Albums <span style="color: red">*</span></label>
                    <select name="album" id="album" class="form-control border-0  {{ $errors->has('album') ? ' is-invalid' : '' }}">
                            <option selected disabled>-- @lang('pages.select_one') --</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->id }}">{{ $album->album_title_uz }}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('album'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('album') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="dropzone">
                <input style="display: none" type="file" name="files" id="demo" class=" {{ $errors->has('files') ? ' is-invalid' : '' }}"  accept=".jpg, .png, image/jpeg, image/png" multiple>
            </div>
            @if ($errors->has('files'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('files') }}</strong>
                </span>
            @endif
        </div>
    </form>
</div>
<script>
    $(function () {
        $('#album').select2();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url =  $('.gallery-form').attr('action');

        var refresh = false;

        $('#album').on('change', function (e) {
            e.preventDefault();
            refresh = true;
            var album_id = $(this).val();
            if ($(this).val() != null){
                console.log('album_id: '+ album_id);
                $.ajax({
                    url:url,
                    type: 'POST',
                    data:{
                        album_id:album_id,
                    },
                    success:function (data) {
                        console.log(data);
                        $('.dropzone').css({'border': 'none', 'opacity':'1', 'backgroundImage':'none'});
                        $('#demo').FancyFileUpload({
                            'params' : {
                                action : 'fileuploader',
                                status:status,
                                album_id:album_id
                            },
                            'dataType':'json',
                            'type':'POST',
                            // send data to this url
                            'url' : url,
                            // key-value pairs to send to the server
                            // editable file name?
                            'edit' : true,
                            // max file size
                            'maxfilesize' : 10000000,
                            // a list of allowed file extensions
                            'accept' : null,
                            // 'iec_windows', 'iec_formal', or 'si' to specify what units to use when displaying file sizes
                            'displayunits' : 'iec_windows',
                            // adjust the final precision when displaying file sizes
                            'adjustprecision' : true,
                            // the number of retries to perform before giving up
                            'retries' : 5,
                            // the base delay, in milliseconds, to apply between retries
                            'retrydelay' : 500,
                            // called for each item after it has been added to the DOM
                            'added' : null,
                            // called whenever starting the upload
                            'startupload' : null,
                            // called whenever progress is up<a href="https://www.jqueryscript.net/time-clock/">date</a>d
                            'continueupload' : null,
                            // called whenever an upload has been cancelled
                            'uploadcancelled' : null,
                            // called whenever an upload has successfully completed
                            'uploadcompleted' : null,

                            // jQuery File Upload options
                            'fileupload': {},

                            // translation strings here
                            'lang<a href="https://www.jqueryscript.net/tags.php?/map/">map</a>': {},
                            // A valid callback function that is called during initialization to allow for last second changes to the settings.
                            // Useful for altering fileupload options on the fly.
                            'preinit' : null,
                        });
                    }
                });
            }
        });
    })
</script>
@endsection
