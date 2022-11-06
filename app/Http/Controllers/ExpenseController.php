<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'user' => 'required',
            'category' => 'required',
            'description' => 'required|nullable',
            'amount' => 'required',
            // 'date' => 'required',
         
        ]);
        $data = new Expense();
        $data->role_name=$request['user'];
        $data->category=$request['category'];
        $data->description=$request['description'];
        $data->amount=$request['amount'];
        $data->extra_date=$request['date'];
        $data->save();
        return redirect()->back() ->with('success',' Data Entered.');
    }

    public function delete($id){
        $data=Expense::find($id);
         $data->delete();
       return redirect()->back()->with('success','Expense Data Deleted !!!');
    }

    
    public function edit($id){
        $categories=category::all();
        $demo=Expense::find($id);
      
        return view('expense_edit',compact('demo','categories'));
    }
    public function update(Request $request,$id){
      
        $request->validate([
            'user' => 'required',
            'category' => 'required',
            'description' => 'required',
            'amount' => 'required',
            // 'date' => 'requred',
         
        ]);
        $data =  Expense::find($id);
        $data->role_name=$request['user'];
        $data->category=$request['category'];
        $data->description=$request['description'];
        $data->amount=$request['amount'];
        $data->extra_date=$request['date'];
        $data->save();
        return redirect()->route('home') ->with('success','Expenses Data Updated successfully.');
      
      
    }
}
