<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Unit;
use Illuminate\Support\Carbon;
use Auth;

class UnitController extends Controller
{

    public function UnitAll() {


        $units = Unit::latest()->get();
        return view('backend.unit.unit_all', compact('units'));
    }

    public function UnitAdd() {

        return view('backend.unit.unit_add');
    }



    public function UnitStore(Request $request) {

        $request->validate([
            'name' => ['required','max:50'],
        ],
        [

            'name.required' => 'You must enter a value in the field',
            'name.max' => 'The field cannot have more than 50 digits',

        ]);

        Unit::insert([
            'name' => $request->name,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'unit Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }


    public function UnitEdit($id) {

        $unit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit', compact('unit'));
    }

    public function unitUpdate(Request $request) {

        $request->validate([
            'name' => ['required','max:50'],
        ],
        [
            'name.required' => 'You must enter a value in the field',
            'name.max' => 'The field cannot have more than 50 digits',

        ]);

        $unit_id = $request->id;

        Unit::findOrFail($unit_id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Unit Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }

    public function UnitDelete($id) {

        Unit::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Unit Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }


}
