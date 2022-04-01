@extends('back.layouts.master')
@section('title',$page->title.' Sayfasını güncelle')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
    </div>
    <div class="card-body">

       
        <div class="col-md-6">
            @if($errors->any())
        <div align="center" class="alert alert-danger">
            
                @foreach ($errors->all() as $error)

                <p style="font-size: 15px;"> {{$error}} </p>
                    
                @endforeach
            
            </div>
        @endif
            <form method="post" action="{{route('admin.pages.edit.post',$page->id)}}">
                @csrf
                
                <div class="form-group">
                    <label for="">Sayfa Başlığı</label>
                    <input type="text" name="title" value="{{$page->title}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Sayfa İçeriği</label>
                    <textarea  id="editor" name="content" class="form-control" cols="30" rows="10" required>{!!$page->content!!}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('summernotecss')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection


@section('summernotejs')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#editor').summernote(
  {
      'height':300
  }
  );
});
</script>
@endsection