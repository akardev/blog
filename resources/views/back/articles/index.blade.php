@extends('back.layouts.master')
@section('title','Tüm Makaleler')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Makale sayısı: <strong>{{$articles->count()}}</strong>
            <a href="{{route('admin.article.trashed')}}" class="btn btn-danger btn-sm float-right"><i
                    class="fas fa-trash"></i> Silinen Makaleler</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th style="width: 15px">Görüntülenme</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Durum</th>
                        <th>İşlemler</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <td align="center"><img width="100" height="100" src="{{$article->image}}"></td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->getCategory->name}}</td>
                        <td align="center">{{$article->hit}}</td>
                        <td align="center">{{$article->created_at->diffForHumans()}}</td>
                        <td align="center">

                            <input class="switch" article-id="{{$article->id}}" type="checkbox" data-on="Aktif"
                                data-onstyle="info" data-off="Pasif" data-offstyle="dark" data-size="normal"
                                @if($article->status==1) checked @endif data-toggle="toggle">

                        </td>

                        <td align="center">
                            <a target="_blank" title="Görüntüle" class="btn btn-success btn-sm"
                                href="{{route('single', [$article->getCategory->slug,$article->slug])}}"><i
                                    class="fa fa-eye"></i></a>
                            <a title="DÜzenle" class="btn btn-primary btn-sm"
                                href="{{route('admin.makaleler.edit',$article->id)}}"><i class="fa fa-edit"></i></a>
                            <a title="Sil" class="btn btn-danger btn-sm"
                                href="{{route('admin.article.delete',$article->id)}}"><i class="fa fa-times"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection


@section('togglecss')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('togglejs')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    $(function() {
      $('.switch').change(function() {
        id = $(this)[0].getAttribute('article-id');
        statu=$(this).prop('checked');
        $.get("{{route('admin.switch')}}",{id:id,statu:statu}, function(data, status){
        
  });
      })
    })
</script>


@endsection