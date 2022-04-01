@isset($categories)

<div id="kategori" class="col-md-3">
    <div class="aside-widget" style="margin-left:10px">
        <div class="section-title">
            <h2 style="font-family: 'Roboto', sans-serif;" class="title">KATEGORİLER</h2>
        </div>
        <div class="category-widget">

            @foreach($categories as $category)

            <ul>
                <li @if (Request::segment(2)==$category->slug) active @endif">
                    <a style="font-family: 'Roboto', sans-serif;" @if (Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}" @endif
                        >{{$category->name}}
                        <span class="badge rounded-pill bg-dark float-end">{{$category->articleCount()}}</span></a>

                </li>
            </ul>

            @endforeach

        </div>
    </div>
</div>
@endif









