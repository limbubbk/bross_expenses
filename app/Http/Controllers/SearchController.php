<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;
class SearchController extends Controller
{

  public function search(Request $request){
    $categories=Category::all();
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $expenses=Expense::query()->where('category','LIKE', "%{$search}%")->orwhere('role_name','LIKE', "%{$search}%")->orwhere('extra_date','LIKE', "%{$search}%")->get();
    // dd($expenses);

    // Return the search view with the resluts compacted
    return view('searched', compact('categories','expenses'));
}
    

}
