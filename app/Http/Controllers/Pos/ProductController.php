<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Supplier;
use App\models\Unit;
use App\models\Category;
use App\models\Product;
use Illuminate\Support\Carbon;
use Auth;

class ProductController extends Controller
{

    public function ProductAll(){

        $product = Product::latest()->get();
        return view('backend.product.product_all',compact('product'));

    }


    public function ProductAdd(){

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product.product_add',compact('supplier','category','unit'));

    }


    public function ProductStore(Request $request) {

        $request->validate([
            'name' => ['required','max:50'],
        ],
        [

            'name.required' => 'You must enter a value in the field',
            'name.max' => 'The field cannot have more than 50 digits',

        ]);

        Product::insert([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }

    public function ProductEdit($id) {

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('supplier','category','unit','product'));
    }

    public function ProductUpdate(Request $request) {

        $request->validate([
            'name' => ['required','max:50'],
        ],
        [

            'name.required' => 'You must enter a value in the field',
            'name.max' => 'The field cannot have more than 50 digits',

        ]);

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }

    public function productDelete($id) {

        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}


