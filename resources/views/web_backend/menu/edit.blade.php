@extends('layouts.back_main')
@section('content')
<h4 class="text-center font-weight-bold" style="color:grey">New Menu</h4>
<form action="{{route('menu.update',['menu'=>$menu])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('Put')
    <!-- menu ga tiososososossoosos -->
    <div class="container">
        <div class="row p-3">
            <select name="position" class="form-control @error('position') is-invalid @enderror " id="">
                <option selected disabled>---Position select---</option>
                <option value="1">Navbar</option>
                <option value="0">Footer</option>
            </select>
            @error('position')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="form1">Name_uz</label>
                <input type="text" id="form1" class="form-control @error('name_uz') is-invalid @enderror " name="name_uz" value="{{old('name_uz',$menu->name_uz)}}">
                @error('name_uz')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="form1">Name_cyrl</label>
                <input type="text" id="form1" class="form-control @error('name_cyrl') is-invalid @enderror " name="name_cyrl" value="{{old('name_cyrl',$menu->name_cyrl)}}">
                @error('name_cyrl')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="form1">Name_ru</label>
                <input type="text" id="form1" class="form-control @error('name_ru') is-invalid @enderror " name="name_ru" value="{{old('name_ru',$menu->name_ru)}}">
                @error('name_ru')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="form1">Name_en</label>
                <input type="text" id="form1" class="form-control @error('name_en') is-invalid @enderror " name="name_en" value="{{old('name_en',$menu->name_en)}}">
                @error('name_en')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row pt-2">
            <div class="form-group w-100 p-3">
                <label for="form1">Url</label>
                <input type="text" id="form1" class="form-control @error('url') is-invalid @enderror " name="url" value="{{old('url',$menu->url)}}">
                @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-6">
                <label for="form1">Parent</label>
                <select name="parent" id="" class="form-control @error('parent') is-invalid @enderror">
                    <option value="">-- @lang('pages.select_one') --</option>
                    @foreach($menus as $menuu)
                    <option value="{{ $menuu->id }}" {{ $menuu->id==$menu->parent?'selected':'' }}>{{ $menuu->name_ru }}</option>
                    @endforeach
                </select>
                @error('parent')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="form1">Order_by</label>
                <input type="number" id="form1" class="form-control @error('order_by') is-invalid @enderror " name="order_by" value="{{old('order_by',$menu->order_by)}}">
                @error('order_by')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <label for="nationality">Status</label>
                <select id="nationality" type="date" class="form-control select2 @error('status') is-invalid @enderror" name="status">
                    <option selected disabled>-- status tanlang --</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>

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