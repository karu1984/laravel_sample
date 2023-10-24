@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="text-left">
            <h2 style="font-size:1rem;">文房具登録画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/bunbougus')}}?page={{ $page_id }}" margin=20px>戻る</a>
        </div>
    </div>
<div>


<div style="text-align:right;">
<form action="{{ route('bunbougu.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="名前">
                @error('name')
                <span style="color:red;">名前を20文字以内で入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="kakaku" class="form-control" placeholder="価格">
                @error('kakaku')
                <span style="color:red;">半角整数値で入力ください</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <select name="bunrui" class="form-select">
                    <option>分類を選択してください</option>
                    @foreach($bunruis as $bunrui)
                    <option value="{{ $bunrui->id }}">{{$bunrui->str}} </option>
                    @endforeach
                </select>
                @error('bunrui')
                <span style="color:red;">分類を数値で入力ください</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <textarea style="height:100px" name="shosai" class="form-control" placeholder="詳細"></textarea>
                @error('shosai')
                <span style="color:red;">詳細を入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
                <button type="submit"  class="btn btn-primary w-100">登録</button>
        </div>
    </div>

</form>
</div>
@endsection
