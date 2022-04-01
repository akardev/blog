@extends('back.layouts.master')
@section('title','Silinen Makaleler')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Silinen makale sayısı: <strong>{{$articles->count()}}</strong>
            <a  href="{{route('admin.makaleler.index')}}" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-left"></i> Makalelere dön </a>
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
                        <th>Silinme Tarihi</th>
                        
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
                        <td align="center">{{$article->deleted_at->diffForHumans()}}</td>
                        

                        <td align="center">
                            <a  class="btn btn-primary btn-sm" href="{{route('admin.article.recover',$article->id)}}"><i class="fas fa-recycle"></i> Geri Yükle</a>
                        <hr>
                            <a  class="btn btn-danger btn-sm" href="{{route('admin.article.hard.delete',$article->id)}}"><i class="fa fa-times"></i> Sil</a>
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



@endsection