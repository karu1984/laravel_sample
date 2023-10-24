@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="text-left">
            <h2 style="font-size:1rem;">受注編集画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/juchus')}}">戻る</a>
        </div>
    </div>
<div>


<div style="text-align:right;">
<form action="{{ route('juchu.update',$juchu->id) }}" method="POST">
    @method('PUT')
    @csrf
     
     <div class="row">
        <div class="col-12 mb-2 mt-2 mb-2">
            <div class="form-group">
                <select name="kyakusaki_id" class="form-select">
                    <option>客先を選択してください</otion>
                    @foreach ($kyakusakis as $kyakusaki)
                        <option value="{{ $kyakusaki->id }}"@if($kyakusaki->id==$juchu->kyakusaki_id) selected @endif>{{ $kyakusaki->name }}</otion>
                    @endforeach
                </select>
                @error('kyakusaki_id')
                <span style="color:red;">客先を選択してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2 mb-2">
            <div class="form-group">
                <select name="bunbougu_id" class="form-select">
                    <option>文房具を選択してください</otion>
                    @foreach ($bunbougus as $bunbougu)
                        <option value="{{ $bunbougu->id }}"@if($bunbougu->id==$juchu->bunbougu_id) selected @endif>{{ $bunbougu->name }}</otion>
                    @endforeach
                </select>
                @error('bunbougu_id')
                <span style="color:red;">文房具を選択してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="kosu" value="{{ $juchu->kosu }}" class="form-control" placeholder="個数">
                @error('kosu')
                <span style="color:red;">個数を1～12までの数値で入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2 mb-2">
            <div class="form-group">
                <select name="name" class="form-select">
                    <option>状態を選択してください</otion>
                    @foreach ($joutais as $joutai)
                        <option value="{{ $joutai->id }}" selected>{{ $joutai->name }}</option>
                    @endforeach
                </select>
                @error('name')
                <span style="color:red;">状態を選択してください</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">変更</button>
        </div>
    </div>      
</form>
@endsection
