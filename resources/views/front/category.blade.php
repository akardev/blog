@extends('front.layouts.master')
@section('title',$category->name." | Barış Akar")
@section('content')

<br>

@if(count($articles)>0)
<div style="color: rgb(0, 0, 0);" align="center">
    <h3><i><b>{{$category->name}}</b></i></h3>
</div>

<br><br><hr><br><br>
@endif

<div class="col-md-9">
    @include('front.widgets.articleList')
</div>

@include('front.widgets.categoryWidget')
@endsection