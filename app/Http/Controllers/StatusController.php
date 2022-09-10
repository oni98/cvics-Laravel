<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(){
        $status = Status::all();
        return view('backend.status.index', ['status' => $status]);
    }

    public function store(Request $request){

        $status = new Status();
        $status->name = $request->name;
        if($status->save()){
            return back();
        }
    }

    public function edit($id){
        $status = Status::find($id);
        return view('backend.status.edit', ['status' => $status]);
    }

    public function update(Request $request, $id){
        $status = Status::find($id);
        $status->name = $request->name;
        if($status->save()){
            return redirect('/admin/status/list');
        }
    }

    public function destroy($id){
        $status = Status::find($id);
        if($status->delete()){
            return redirect('/admin/status/list');
        }
    }
}
