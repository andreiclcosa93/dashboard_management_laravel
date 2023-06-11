<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Supplier;
use Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function SupplierAll() {

        // $suppliers = Supplier::all();
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('suppliers'));
    }

    public function SupplierAdd() {
        return view('backend.supplier.supplier_add');
    }

    public function SupplierStore(Request $request) {

        $request->validate([
            'name' => ['required','max:50'],
            'mobile_no' => ['required','max:15'],
            'email' => ['required','max:50','email'],
            'address' => ['required','max:50'],
        ],
        [

            'name.required' => 'You must enter a value in the field',
            'name.max' => 'The field cannot have more than 50 digits',

            'mobile_no.required' => 'You must enter a value in the field',
            'mobile_no.max' => 'Campul nu poate avea mai mult de 15 cifre',

            'email.required' => 'You must enter a value in the field',
            'email.email' => 'You must enter a valid email address',
            'email.max' => 'The field cannot have more than 50 digits',

            'address.required' => 'You must enter a value in the field',
            'address.max' => 'The field cannot have more than 50 digits',

        ]);

        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    public function SupplierEdit($id) {

        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit', compact('supplier'));
    }

    public function SupplierUpdate(Request $request) {

        $request->validate([
            'name' => ['required','max:50'],
            'mobile_no' => ['required','max:15'],
            'email' => ['required','max:50','email'],
            'address' => ['required','max:50'],
        ],
        [

            'name.required' => 'You must enter a value in the field',
            'name.max' => 'The field cannot have more than 50 digits',

            'mobile_no.required' => 'You must enter a value in the field',
            'mobile_no.max' => 'Campul nu poate avea mai mult de 15 cifre',

            'email.required' => 'You must enter a value in the field',
            'email.email' => 'You must enter a valid email address',
            'email.max' => 'The field cannot have more than 50 digits',

            'address.required' => 'You must enter a value in the field',
            'address.max' => 'The field cannot have more than 50 digits',

        ]);

        $supplier_id = $request->id;

        Supplier::findOrFail($supplier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            // 'created_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    public function SupplierDelete($id) {

        Supplier::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Supplier Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }
}
