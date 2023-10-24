@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @auth<h5 style="text-align:right">ログイン者:{{$user_name}}</h5>@endauth
        <h2 style="font-size:1rem;">受注入力</h2>
    </div>
    <div class="text-right mb-1">
        @auth<a class="btn btn-success" href="{{ route('juchu.create')}}?page={{ $page_id }}">新規登録</a>@endauth
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
        <th>ID</th>
        <th>客先</th>
        <th>文房具</h>
        <th>個数</h>
        <th>状態</th>
        
        <th>編集</th>
        <th>削除</th>
        <th>編集者</th>
    </tr>
    @foreach($juchus as $juchu)
    <tr>
        <td style="text-align:right">{{ $juchu->id}}</td>
        <td>{{$juchu->kyakusaki_name}}</td>
        <td>{{$juchu->bunbougu_name}}</td>
        <td style="text-align:left">{{ $juchu->kosu}}</td>
        <td style="text-align:left">{{ $juchu->joutai}}</td>
        
        <td style="text-align:center">
            @auth
            <a class="btn btn-primary" href="{{ route('juchu.edit',$juchu->id)}}">変更</a>
            @endauth
        </td>
        <td style="text-align:center">
        @auth
            <form action="{{route('juchu.destroy',$juchu->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか")'>削除</button>
            </form>
        @endauth
        </td>
        <td>{{$juchu->user_name}}</td>
    </tr>
    @endforeach
</table>
{!! $juchus->links('pagination::bootstrap-5')!!}
@endsection
