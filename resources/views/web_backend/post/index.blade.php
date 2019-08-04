@extends('layouts.back_main')
@section('content')
@php
$i = 1;
$lang = App::getLocale()
@endphp
<div class="container-fluid">
    <div class="container-fluid ">
        <h2 class="text-center text-uppercase font-weight-bold">Posts</h2>
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
        <div class="container-fluid"><a href="{{route('post.create')}}"><button class="btn btn-success btn-lg text-white">@lang('pages.add_new')</button></a></div>
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
                        <th>Status</th>
                        <th>Phots</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($post as $one)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$one->{'title_'.$lang} }}</td>
                        <td>{{$one->{'description_'.$lang} }}</td>
                        <td class="menu-update" data-toggle="modal" data-target="#statusModal" style="cursor: pointer" data-url="{{ route('status.post', ['one' => $one]) }}">
                            @if($one->status == 1)
                            <span class="badge badge-success">активный</span>
                            @elseif($one->status == 0)
                            <span class="badge badge-danger">неактивный</span>
                            @endif
                        </td>
                        <td><img src="{{ asset('storage') .'/'. $one->image}}" style="width:100px" alt=""></td>
                        <td>

                            <a class="btn btn-info btn-sm text-white" href="">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-success btn-sm text-white" href="{{route('post.edit',['one'=>$one])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm delete-post text-white" data-toggle="modal" data-target="#fullHeightModalRightPost" data-item="{{$one}}" data-url="{{route('post.destroy',['one'=>$one])}}"> <i class="fa fa-trash"></i></a>
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
        {{$post->links('vendor.pagination.simple-bootstrap-4')}}
    </div>
</div>
<script>
    $(function() {
        $('.delete-post').on('click', function() {
            var lang = '{{ App::getLocale() }}'
            var title = title + '_' + '{{ App::getLocale() }}'
            var url = $(this).attr('data-url');

            var data = JSON.parse($(this).attr('data-item'));
            $('#myModalLabelPost').text(data.title_uz);
            $('.permission-delete-form').attr('action', url);
            $('.delete-question').find('span').text(data.title_uz);
        });
        $('.menu-update').on('click', function() {
            var url = $(this).attr('data-url');
            $('.menu-update-form').attr('action', url);
        });
    })
</script>
<!-- Full Height Modal Right -->
@endsection