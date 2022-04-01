@extends('front.layouts.master')
@section('title',$page->title." | Barış Akar")


@section('content')

<div class="col-md-10 col-lg-8 col-xl-7">
    {!! $page->content !!}
</div>

@endsection