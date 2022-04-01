@if(count($articles)>0)
@foreach ($articles as $article )

<div class="post-preview">
    <a href="{{route('single', [$article->getCategory->slug,$article->slug])}}">
        <img title="{{$article->title}}" class="img-fluid" src="{{$article->image}}" alt="{{$article->title}}">
        <h2 class="post-title">{!!$article->title!!}</h2>
    </a>
    

    <p style="color: rgb(75, 69, 69); " class="post-meta">Kategori:
        <a href="#">{{$article->getCategory->name}}</a>
        <span  class="float-end">{{$article->created_at->diffForHumans()}}
        </span>
    </p>


</div>

@if(!$loop->last)

<hr class="my-4" />
@endif
@endforeach

<div class="d-flex justify-content-center">{{$articles->links('pagination::bootstrap-4')}}  </div> 

@else
<hr>
<div align="center">
    <h3>İçerik bulunamadı.</h3>
</div>
<hr style="color: black">
@endif