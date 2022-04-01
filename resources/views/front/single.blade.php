@extends('front.layouts.master')
@section('title',$article->title)


@section('content')

            <div class="col-md-9">
                <h2>{!!$article->title!!}</h2>
                <img  class="img-fluid" width="900" height="300" src="{{$article->image}}" alt="{{$article->title}}">
                 <p>{!!$article->content!!}</p>
                 <span style="color: rgb(22, 8, 8)" class="text-red"><i>Okunma sayısı: <b>{{$article->hit}}</b></i></span>
                 <br><br><br><br>
            </div>
            
 @include('front.widgets.categoryWidget')
@endsection