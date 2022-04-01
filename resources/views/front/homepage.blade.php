@extends('front.layouts.master')
@section('title','Anasayfa | Barış Akar')
@section('content')
<div align="center">
    <h3 style="font-family: 'Roboto', sans-serif;">Son içerikler</h3>
</div>
<br><hr>
<div class="col-md-9">
@include('front.widgets.articleList')
</div>
@include('front.widgets.categoryWidget')
@endsection