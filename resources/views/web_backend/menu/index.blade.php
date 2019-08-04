@extends('layouts.back_main')
@section('content')
<h1 class="font-weight-bold text-center">Menu</h1>
<a href="{{route('menu.create')}}" class="btn btn-success text-light ml-4 btn-lg ">@lang('pages.add_new')</a>

@php
$i = 1;
@endphp
<div class="container-fluid">
    <div class="container-fluid">
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
                        <th>Name_uz</th>
                        <th>Parent</th>
                        <th>Order_by</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($menu as $one)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$one->name_uz}}</td>
                        <td>{{$one->parent}}</td>
                        <td>{{$one->order_by}}</td>
                        <td class="menu-update" data-toggle="modal" data-target="#statusModal" style="cursor: pointer" data-url="{{ route('status.menu', ['one' => $one]) }}">
                            @if($one->status == 1)
                            <span class="badge badge-success">активный</span>
                            @elseif($one->status == 0)
                            <span class="badge badge-danger">неактивный</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm text-white" href="">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-success btn-sm text-white" href="{{route('menu.edit',['one'=>$one])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm delete-menu text-white" data-toggle="modal" data-target="#fullHeightModalRight" data-item="{{$one}}" data-url="{{route('menu.destroy',['one'=>$one])}}"> <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Hozircha hech qanday hodimlar ro'yxati mavjud emas!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="ml-auto">
                {{ $menu->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.delete-menu').on('click', function() {
            // $(this).preventDefault();
            var url = $(this).attr('data-url');
            var data = JSON.parse($(this).attr('data-item'));
            $('#myModalLabel').text(data.name_uz);
            $('.menu-delete-form').attr('action', url);
            $('.delete-question').find('span').text(data.name_uz);
        });
        $('.menu-update').on('click', function() {
            var url = $(this).attr('data-url');
            $('.menu-update-form').attr('action', url);
        });
    })
</script>

<!-- Full Height Modal Right -->
@endsection