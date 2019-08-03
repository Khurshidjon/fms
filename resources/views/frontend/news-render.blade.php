@foreach($posts as $post)
    <div class="col-md-6 p-4">
        <div class="card" style="height:18em">
            <div class="row">
                <div class="col-md-4">
                    <div style="overflow:hidden;">
                        <img src="{{ asset('storage') .'/'. $post->image }}" class="card-img" style="height:17em; width: 30em;" alt="...">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase font-weight-bold">
                            <a href="{{ route('single.news', ['post' => $post ]) }}">
                                {{ $post->{'title_'.$lang} }}                                
                            </a>
                        </h5>
                        <p class="card-text">{{ str_limit($post->{'description_'.$lang}, 430) }}</p>
                        <p class="card-text" style="position:absolute; top:15em">
                            <small class="text-muted mr-3"><i class="fa fa-calendar"> </i> {{ $post->created_at->format('d.m.Y') }}</small>
                            <small class="text-muted"><i class="fa fa-eye"> </i> {{ $post->view_count }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endforeach