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
        <h2 class="text-center text-uppercase font-weight-bold">Albums</h2>
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
        <div class="container-fluid"><a href="{{route('albums.create')}}"><button class="btn btn-success text-white btn-lg">@lang('pages.add_new')</button></a></div>
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
                        <th>Image</th>
                        <th>Title uz</th>
                        <td>Status</td>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($albums as $album)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><img src="{{ asset('storage') .'/'. $album->album_image }}" style="width:70px" alt=""></td>
                            <td>{{ $album->{'album_title_'.$lang} }}</td>
                            <td class="page-status" data-toggle="modal" data-target="#pageStatus" data-url="{{ route('album.status',['album'=>$album])}}">
                                @if($album->status == 1)
                                    <span class="badge badge-success">активный</span>
                                @elseif($album->status == 0)
                                    <span class="badge badge-danger">неактивный</span>                                
                                @endif    
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm text-white" href="{{ route('albums.show', [$album ]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-success btn-sm text-white" href="{{ route('albums.edit',['album'=>$album]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm delete-page text-white" data-toggle="modal" data-target="#fullHeightModalRightPage" data-item="{{$album}}" data-url="{{route('albums.destroy',['album'=>$album])}}"> <i class="fa fa-trash"></i></a>
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
        {{$albums->links('vendor.pagination.simple-bootstrap-4')}}
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
