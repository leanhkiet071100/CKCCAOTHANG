@extends('layouts.appadmin')


@section('sidebar')
@parent

<div class="col-md-12">
    <a href="{{route('adminPost')}}"><button type="button" class="btn btn-outline-primary"><i
                class=" ti-arrow-left"></i>Quay lại</button></a>
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Chi tiết bài viết</h5>


            <ul class="breadcrumb-title b-t-default p-t-10">
                <li class="breadcrumb-item">
                    <a href="{{route('adminDashboard')}}"> <i class="fa fa-home"></i> </a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('adminPost')}}">Bài viết</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Chi tiết bài viết</a>
                </li>
            </ul>

        </div>

    </div>


</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Hình ảnh bài viết</h5>
        </div>
        <div class="card-block">
            @if($totalMedia > 0)
            <div class="row text-center">
                @foreach($listMedia as $lstmedia =>$media)
                <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                    <a data-lightbox="{{URL('image_post')}}/{{$media->media_file_name}}"><img
                            src="{{URL('image_post')}}/{{$media->media_file_name}}" class="img-fluid m-b-10" alt=""></a>
                </div>
                @endforeach

            </div>
            @else
            Bài viết này không có hình ảnh
            @endif
        </div>
    </div>
</div>
<div class="col-md-12 order-md-2">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-header">
                    <h5 class="font-weight-normal"><a href="#" class="text-h-primary text-reset"><b
                                class="font-weight-bolder">{{$post->user->first_name}}
                                {{$post->user->last_name}}</b></a>
                    </h5>
                    <p class="mb-0 text-muted">{{$post->created_at}}</p>

                </div>

                <div class="card-body">

                    <p class="text-muted mb-0">{!! nl2br($post->content_post) !!}</p>
                </div>


            </div>

        </div>

    </div>
</div>
@endsection