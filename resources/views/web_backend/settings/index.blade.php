@extends('layouts.back_main')
@section('content')
<h1 class="font-weight-bold text-center">Settings</h1>
<a href="{{route('settings.create')}}" class="btn btn-success">Create</a>

@php
$i = 1;
@endphp
<div class="container-fluid ml-3 mr-3">
    <div class="container-fluid ">
        <h2 class="text-center"></h2>
    </div>
    <div class="container">
        <div class="row">
            @if(!session()->has('message'))
            <div class="alter alter-success">
                <Strong>{{session()->get('message')}}</Strong>
            </div>
            @endif
        </div>
    </div>
    <div class="table-responsive">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
        <div class="table-responsive">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Key</th>
                        <th>Title_uz</th>
                        <th>Value_uz</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($settings as $one)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$one->key}}</td>
                        <td>{{$one->title_uz}}</td>
                        <td>{{$one->value_uz}}</td>
                        <td><img src="{{ $one->image!=null? asset('storage').'/'. $one->image:asset('img/no_image.png') }}" alt="" width="100px"></td>
                        <td>

                            <a class="btn btn-info btn-sm text-white" href="">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-success btn-sm text-white" href="{{route('settings.edit',['one'=>$one])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm delete-student text-white" data-toggle="modal" data-target="#fullHeightModalRight" data-item="{{$one}}" data-url="{{route('settings.destroy',['one'=>$one])}}"> <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Hozircha hech qanday hodimlar ro'yxati mavjud emas!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{$settings->links('vendor.pagination.simple-bootstrap-4')}}
    </div>
</div>
<script>
    $(function() {
        $('.delete-student').on('click', function() {
            // $(this).preventDefault();

            var url = $(this).attr('data-url');
            var data = JSON.parse($(this).attr('data-item'));
            $('#myModalLabel').text(data.title_uz);
            $('.permission-delete-form').attr('action', url);
            $('.delete-question').find('span').text(data.title_uz);
        })
    })
</script>
<!-- Full Height Modal Right -->
@endsection
<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-full-height modal-top" role="document" style="">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-danger" id="myModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger font-weight-bold delete-question"> <span></span> ga tegisli postni tizimdan o'chirishni hohlaysizmi?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form action="" class="permission-delete-form" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                    <button type="submit" class="btn btn-danger">Ha, hohlayman!</button>
                </form>
            </div>
        </div>
    </div>
</div>