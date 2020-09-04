<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategory()
    {
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_name')
            ->get();

        return view('admin.category.subcategory',compact('category','subcategory'));


    }

    public function storesubcategory(Request $request){
        $validateData = $request->validate([
            'category_id' => 'required|max:55',
            'subcategory_name' => 'required',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] =$request->subcategory_name;
        DB::table('subcategories')->insert($data);
        $notification=array(
            'messege'=>'SubCategory Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function deletesubcategory($id){
       DB::table('subcategories')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'SubCategory Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function editsubcategory($id){
        $subcat = DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('admin.category.edit_subcategory',compact('subcat','category'));



    }

    public function updatesubcategory(Request $request,$id){

        $validateData = $request->validate([
            'category_id' => 'required|max:55',
            'subcategory_name' => 'required',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] =$request->subcategory_name;
        DB::table('subcategories')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'SubCategory Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('sub.categories')->with($notification);
    }
}
