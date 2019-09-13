@extends('layouts.front_main')
@section('content')
<div class="container" style="margin-top:120px">
<h3 class="text-center font-weight-bold">Calculator</h3>
    <div class="row p-2">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box1 p-5">
            <form>
              <div class="row">
                    <div class=" col-md-6 form-group">
                    <label for="exampleFormControlSelect1">Qaysi shaxardan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleFormControlSelect1">Qaysi shaxarga</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
              </div>
                <div class="row pl-4 ">
                <div class="col-md-6 form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Kuryer Chaqirish</label>
                </div>
                <div class="col-md-6 form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                    <label class="form-check-label" for="exampleCheck2">Yetkazib berish</label>
                </div>
                </div>
                <div class="row">
                    <div class=" col-md-6 form-group">
                    <label for="exampleInputEmail1">Og'iligi</label>
                    <input type="number" class="form-control" >
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Hajmi</label>
                    <input type="number" class="form-control" >
                </div>
              </div>
                <div class="text-center"><button type="submit" style="background-color:#ff5e00;" class="text-center btn btn text-white">Submit</button></div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection