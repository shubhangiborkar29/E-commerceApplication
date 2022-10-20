<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function create(){
        return view('backend.admin.product.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price'=> 'required',
            'description' => 'required',
            'image' => 'required',

        ]);
        $data=new Product();
        $data->name=$request->name;
        $data->price=$request->price;
        $data->description=$request->description;
        if($request->hasFile('image'))
        {
            $file=$request->image;
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads',$filename);
            $data->image=$filename;
        }
    $data->save();
    return redirect()->route('admin.product.table')->with('msg','Data Add succesfuly');
    }

    public function table(){
        $data=Product::Paginate(4);
        return view('backend.admin.product.table',compact('data'));
    }
    public function edit($id){
        $data=Product::find($id);
        return view('backend.admin.product.edit',compact('data'));

    }
public function update(Request $request,$id){
        $validated = $request->validate([
            'name' => 'required',
            'price'=> 'required',
            'description' => 'required',
            'image' => 'nulable',

        ]);

        $data=Product::find($id);
        $data->name=$request->name;
        $data->price=$request->price;
       $data->description=$request->description;

       if($request->hasFile('image'))
            {
                $file=$request->image;
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('uploads',$filename);
                $data->image=$filename;
            }
       $data->save();
       return redirect()->route('admin.product.table')->with('msg','Data Update succesfuly');
    }

    public function delete($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->route('admin.product.table')->with('msg','Data Delete succesfuly');
    }

}


