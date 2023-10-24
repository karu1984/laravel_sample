@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="text-left">
            <h2 style="font-size:1rem;">文房詳細画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/bunbougus')}}?page={{ $page_id }}">戻る</a>
        </div>
    </div>
<div>


<div style="text-align:left;">
<form action="{{ route('bunbougu.update',$bunbougu->id)}}" method="post">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {{ $bunbougu->name}}
            </div>
        </div>
       <div class="col-lg-12">
            <div class="form-group">
                {{$bunbougu->kakaku}}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                    @foreach($bunruis as $bunrui)
                        @if($bunrui->id==$bunbougu->bunrui){{$bunrui->str}}@endif
                    @endforeach 
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
            {{$bunbougu->shosai}}
            </div>
        </div>
    </div>

</form>
</div>
@endsection