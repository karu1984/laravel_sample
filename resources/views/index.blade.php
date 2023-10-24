@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @auth<h5 style="text-align:right">編集者:{{$user_name}}</h5>@endauth
        <h2 style="font-size:1rem;">文房具マスター</h2>
    </div>
    <div class="text-right mb-1">
        @auth<a class="btn btn-success" href="{{ route('bunbougu.create')}}?page={{ $page_id }}">新規登録</a>@endauth
    </div>
</div>
    <div>
    @if($message = Session::get('success'))
        <div class="alert alert-success mt-1"><p>{{$message}}</p></div>
    @endif
    </div>

<div>
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>商品名</th>
        <th>価格</h>
        <th>分類</h>
        <th>編集</th>
        <th>削除</th>
        <th>編集者</th>

    </tr>
    @foreach($bunbougus as $bunbougu)
    <tr>
        <td style="text-align:right">{{ $bunbougu->id}}</td>
        <td><a href="{{route('bunbougu.show',$bunbougu->id)}}?page={{ $page_id }}">{{$bunbougu->name}}</a></td>
        <td style="text-align:right">{{ $bunbougu->kakaku}}円</td>
        <td style="text-align:left">{{ $bunbougu->bunrui}}</td>
        <td style="text-align:center">
            @auth
            <a class="btn btn-primary" href="{{ route('bunbougu.edit',$bunbougu->id)}}?page={{ $page_id }}">変更</a>
            @endauth
        </td>
        <td style="text-align:center">
        @auth
            <form action="{{route('bunbougu.destroy',$bunbougu->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか")'>削除</button>
            </form>
        @endauth
        </td>
        <td>{{$bunbougu->user_name}}</td>
    </tr>
    @endforeach
</table>
{!! $bunbougus->links('pagination::bootstrap-5')!!}
@endsection
