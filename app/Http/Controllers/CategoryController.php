<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{

   
    public function create(){
        $categories= Category::orderBy('created_at', 'desc')->simplePaginate(4);
        return view('category.create',compact('categories'));
    }
       

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
         
        ]);
        $data = new Category;
        $data->name=$request['name'];
        $data->save();
        return redirect()->back() ->with('success','Category created successfully.');
    }
    
    public function delete($id){
        $data=Category::find($id);
         $data->delete();
       return redirect()->back()->with('success','Category Deleted !!!');
    }

    public function edit($id){
        $demo=Category::find($id);
      
        return view('category.edit',compact('demo'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
         
        ]);
        $data =  Category::find($id);
        $data->name=$request['name'];
        $data->save();
        return redirect()->route('category.index') ->with('success','Category Updated successfully.');
      
      
    }
}
