@extends('layouts.back_main')
@section('content')
@php
$i = 1;
$lang = App::getLocale();
@endphp
<style>
    .page-status{
        cursor:pointer;
    }
</style>
<div class="container-fluid">
    <div class="container-fluid ">
        <h2 class="text-center">Pages</h2>
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
        <div class="container-fluid"><a href="{{route('pages.create')}}"><button class="btn btn-success text-white">@lang('pages.add_new')</button></a></div>
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
                        <th>Title_uz</th>
                        <th>Description_uz</th>
                        <td>Status</td>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($pages as $page)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $page->{'title_'.$lang} }}</td>
                            <td>{{ $page->{'description_'.$lang} }}</td>
                            <td class="page-status" data-toggle="modal" data-target="#pageStatus" data-url="{{ route('pages.status',['page'=>$page])}}">
                                @if($page->status == 1)
                                    <span class="badge badge-success">активный</span>
                                @elseif($page->status == 0)
                                    <span class="badge badge-danger">неактивный</span>                                
                                @endif    
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm text-white" href="">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-success btn-sm text-white" href="{{ route('pages.edit',['page'=>$page]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm delete-page text-white" data-toggle="modal" data-target="#fullHeightModalRight" data-item="{{$page}}" data-url="{{route('pages.destroy',['page'=>$page])}}"> <i class="fa fa-trash"></i></a>
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
        {{$pages->links('vendor.pagination.simple-bootstrap-4')}}
    </div>
</div>
<script>
    $(function() {
        $('.delete-page').on('click', function() {
            var url = $(this).attr('data-url');
            var data = JSON.parse($(this).attr('data-item'));
            '<?php if($lang=="uz"):?>'
                $('#myModalLabelOne').text(data.title_uz);
            '<?php elseif($lang=="cyrl"):?>'
                $('#myModalLabelOne').text(data.title_cyrl);
            '<?php elseif($lang=="ru"):?>'
                $('#myModalLabelOne').text(data.title_ru);
            '<?php elseif($lang=="en"):?>'
                $('#myModalLabelOne').text(data.title_en);
            '<?php endif;?>'
                $('.page-delete-form').attr('action', url);
            '<?php if($lang=="uz"):?>'
                $('.page-delete-question').find('span').text(data.title_uz);
            '<?php elseif($lang=="cyrl"):?>'
                $('.page-delete-question').find('span').text(data.title_cyrl);
            '<?php elseif($lang=="ru"):?>'
                $('.page-delete-question').find('span').text(data.title_ru);
            '<?php elseif($lang=="en"):?>'
                $('.page-delete-question').find('span').text(data.title_en);
            '<?php endif;?>'
        })
        $('.page-status').on('click', function() {
            var url = $(this).attr('data-url');
            $('.status-update-form').attr('action', url);
        })
    });
</script>
@endsection
<div class="modal fade" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabelOne" aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-danger" id="myModalLabelOne"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger font-weight-bold page-delete-question"> <span></span> ga tegishli sahifani tizimdan o'chirishni hohlaysizmi?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form action="" class="page-delete-form" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                    <button type="submit" class="btn btn-danger">Ha, hohlayman!</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pageStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabelTwo" aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-danger" id="myModalLabelTwo"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="status-update-form" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group text-center">
                        <label for="unpublish">неактивный</label>
                        <input type="radio" id="unpublish" class="mr-5" checked name="status" value="0">
                        <label for="publish">активный</label>
                        <input type="radio" id="publish" class="" name="status" value="1">
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрить</button>
                    <button type="submit" class="btn btn-danger">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>