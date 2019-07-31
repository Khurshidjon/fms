@extends('layouts.back_main')
@section('content')
<h4 class="text-center font-weight-bold" style="color:grey">Settings</h4>
<form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <label for="form1">Key</label>
                <input type="text" id="form1" class="form-control @error('key') is-invalid @enderror " name="key" value="{{old('key')}}">
                @error('key')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pt-5">
                <label for="form1">Title_uz</label>
                <input type="text" id="form1" class="form-control @error('title_uz') is-invalid @enderror " name="title_uz" value="{{old('title_uz')}}">
                @error('title_uz')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">Value_uz</label>
                <textarea name="value_uz" cols="20" rows="5" class="form-control @error('value_uz') is-invalid @enderror">{{old('value_uz')}}</textarea>
                @error('value_uz')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pt-5">
                <label for="form1">Title_ўз</label>
                <input type="text" id="form1" class="form-control @error('title_ўз') is-invalid @enderror " name="title_ўз" value="{{old('title_ўз')}}">
                @error('title_ўз')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">Value_ўз</label>
                <textarea name="value_ўз" cols="20" rows="5" class="form-control @error('value_ўз') is-invalid @enderror">{{old('value_ўз')}}</textarea>
                @error('value_ўз')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pt-5">
                <label for="form1">Title_ru</label>
                <input type="text" id="form1" class="form-control @error('title_ru') is-invalid @enderror " name="title_ru" value="{{old('title_ru')}}">
                @error('title_ru')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">Value_ru</label>
                <textarea name="value_ru" cols="20" rows="5" class="form-control @error('value_ru') is-invalid @enderror">{{old('value_ru')}}</textarea>
                @error('value_ru')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pt-5">
                <label for="form1">Title_en</label>
                <input type="text" id="form1" class="form-control @error('title_en') is-invalid @enderror " name="title_en" value="{{old('title_en')}}">
                @error('title_en')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">Value_en</label>
                <textarea name="value_en" cols="20" rows="5" class="form-control @error('value_en') is-invalid @enderror">{{old('value_en')}}</textarea>
                @error('value_en')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="img">Post Image</label>
                <input id="img" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-md-6">
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
            <div class="col-md-6 pt-5">
                <button class="btn btn-info form-control" type="submit">Save</button>
            </div>
        </div>
    </div>
</form>
@endsection