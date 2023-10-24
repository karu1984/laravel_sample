<?php

namespace App\Http\Controllers;

use App\Models\Bunbougu;
use App\Models\Bunrui;
use Illuminate\Http\Request;

class BunbouguController extends Controller
{
    public function index(Request $request)
    {
        $bunbougus = Bunbougu::select([
            'b.id',
            'b.name',
            'b.kakaku',
            'b.shosai',
            'b.user_id',
            'u.name as user_name',
            'r.str as bunrui',
            ])
            ->from('bunbougus as b')
            ->join('bunruis as r',function($join){
                $join->on('b.bunrui','=','r.id');
            })
            ->join('users as u',function($join){
                $join->on('b.user_id','=','u.id');
            })
            ->orderBy('b.id','DESC')
            ->paginate(5);
    
       if(isset(\Auth::user()->name)){
        return view('index',compact('bunbougus'))->with('page_id',request()->page)
            ->with('i',(request()->input('page',1)-1)*5)->with('user_name',\Auth::user()->name);
       }else{
        return view('index',compact('bunbougus'))->with('page_id',request()->page)
            ->with('i',(request()->input('page',1)-1)*5);
       }
    }

    public function create(Request $request,Bunbougu $bunbougu)
    {
        $bunruis = Bunrui::all();
        return view('create')
        ->with('page_id',request()->page)
        ->with('bunruis',$bunruis);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:20',
            'kakaku' =>'required|integer',
            'bunrui' =>'required|integer',
            'shosai' =>'required|max:140',
        ]);

        $bunbougu = new Bunbougu;
        $bunbougu->name = $request->input(["name"]);
        $bunbougu->kakaku = $request->input(["kakaku"]);
        $bunbougu->bunrui = $request->input(["bunrui"]);
        $bunbougu->shosai = $request->input(["shosai"]);
        $bunbougu->user_id =\Auth::user()->id;
        $bunbougu->save();

        return redirect()->route('bunbougus.index')
        ->with('success','文房具'.$bunbougu->name.'を作成しました');
    }

    public function show(Bunbougu $bunbougu)
    {
        $bunruis = Bunrui::all();
        
        return view('show',compact('bunbougu'))
        ->with('page_id',request()->page)
        ->with('bunruis',$bunruis);
    }

    public function edit(Bunbougu $bunbougu)
    {
        $bunruis = Bunrui::all();
        return view('edit',compact('bunbougu'))
        ->with('page_id',request()->page)
        ->with('bunruis',$bunruis);
    }

    public function update(Request $request, Bunbougu $bunbougu)
    {
        $request->validate([
            'name' =>'required|max:20',
            'kakaku' =>'required|integer',
            'bunrui' =>'required|integer',
            'shosai' =>'required|max:140',
        ]);

        $bunbougu->name = $request->input(["name"]);
        $bunbougu->kakaku = $request->input(["kakaku"]);
        $bunbougu->bunrui = $request->input(["bunrui"]);
        $bunbougu->shosai = $request->input(["shosai"]);
        $bunbougu->user_id =\Auth::user()->id;
        $bunbougu->save();

        return redirect()->route('bunbougus.index')
        ->with('success','文房具'.$bunbougu->name.'を更新しました');
    }

    public function destroy(Bunbougu $bunbougu)
    {
        $bunbougu->delete();
        return redirect()->route('bunbougus.index')
        ->with('success','文房具'.$bunbougu->name.'を削除しました');
    }
}
