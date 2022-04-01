@extends('back.layouts.master')
@section('title','Tüm Sayfalar')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sayfa sayısı: <strong>{{$pages->count()}}</strong>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        
                        <th>Sayfa Başlığı</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Durum</th>
                        <th>İşlemler</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        
                        <td>{{$page->title}}</td>
                        <td>{{$page->created_at->diffForHumans()}}</td>
                        <td align="center">

                            <input class="switch" page-id="{{$page->id}}" type="checkbox" data-on="Aktif"
                                data-onstyle="info" data-off="Pasif" data-offstyle="dark" data-size="normal"
                                @if($page->status==1) checked @endif data-toggle="toggle">

                        </td>


                        <td align="center">

                            <a target="_blank" title="Görüntüle" class="btn btn-success btn-sm"
                                href="{{route('page',$page->slug)}}"><i class="fa fa-eye"></i></a>

                            <a title="DÜzenle" class="btn btn-primary btn-sm"
                                href="{{route('admin.pages.edit',$page->id)}}"><i class="fa fa-edit"></i></a>

                            <a title="Sil" class="btn btn-danger btn-sm"
                                href="{{route('admin.pages.delete',$page->id)}}"><i class="fa fa-times"></i></a>

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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>
    $(function() {
      $('.switch').change(function() {
        id = $(this)[0].getAttribute('page-id');
        statu=$(this).prop('checked');
        $.get("{{route('admin.page.switch')}}",{id:id,statu:statu}, function(data, status){
        
  });
      })
    })
</script>


@endsection