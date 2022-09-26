<?php

namespace App\Http\Controllers;

use App\Models\PromotionalPackage;
use Illuminate\Http\Request;

class PromotionalPackageController extends Controller
{
    public function index(){
        $packages = PromotionalPackage::all();
        return view('backend.promotional_package.index', ['packages' => $packages]);
    }

    public function store(Request $request){
        
        $package = new PromotionalPackage();
        $package->name = $request->name;

        $image_name = time() . '.' . $request->image->getClientOriginalExtension();
        $path = $request->image->storeAs('public/promotional_packages/', $image_name);
        $package->image = $image_name;

        if($package->save()){
            session()->flash('success', 'Package Created Successfully');
            return back();
        }
    }

    public function destroy($id){

        $package = PromotionalPackage::find($id);
        if($package->delete()){
            if (file_exists(public_path('storage/promotional_packages/' . $package->image))) {
                unlink(public_path('storage/promotional_packages/' . $package->image));
            }
            session()->flash('success', 'Package Deleted Successfully');
            return back();
        }
    }
}
