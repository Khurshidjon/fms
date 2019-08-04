@extends('layouts.back_main')
@section('content')
@php
$i = 1;
@endphp
<div class="container-fluid ml-3 mr-3">
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
                        <td>{{$one->title_uz}}</td>
                        <td>{{$one->description_uz}}</td>
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
                            <a href="#" class="btn btn-danger btn-sm delete-student text-white" data-toggle="modal" data-target="#fullHeightModalRight" data-item="{{$one}}" data-url="{{route('post.destroy',['one'=>$one])}}"> <i class="fa fa-trash"></i></a>
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
        $('.delete-student').on('click', function() {
            // $(this).preventDefault();

            var url = $(this).attr('data-url');
            var data = JSON.parse($(this).attr('data-item'));
            $('#myModalLabel').text(data.title);
            $('.permission-delete-form').attr('action', url);
            $('.delete-question').find('span').text(data.title);
        });
        $('.menu-update').on('click', function() {
            var url = $(this).attr('data-url');
            $('.menu-update-form').attr('action', url);
        });
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

<div class="modal fade" id="statusModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger"><b>Update confirm</b></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" class="menu-update-form" method="post">
                @csrf
                <div class="modal-body text-danger">
                    <label style="margin-right: 20px">
                        <input type="radio" name="status" value="0" checked> неактивный
                    </label>
                    <label style="margin-left: 20px">
                        <input type="radio" name="status" value="1"> активный
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>