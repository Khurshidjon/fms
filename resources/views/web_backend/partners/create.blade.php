@extends('layouts.back_main')
@section('content')
<h4 class="text-center font-weight-bold" style="color:grey">Parents Create</h4>
<form action="{{route('partners.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <label for="form1">Name</label>
                <input type="text" id="form1" class="form-control @error('name') is-invalid @enderror " name="name" value="{{old('name')}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pt-4">
                <label for="form1">Url</label>
                <input type="text" id="form1" class="form-control @error('url') is-invalid @enderror " name="url" value="{{old('url')}}">
                @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 pt-4">
                <label for="img">Post Image</label>
                <input id="img" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-md-4 pt-5">
            </div>
            <div class="col-md-4 pt-5">
            </div>
            <div class="col-md-4 pt-5">
                <button class="btn btn-info form-control" type="submit">Save</button>
            </div>
        </div>
    </div>
</form>
@endsection