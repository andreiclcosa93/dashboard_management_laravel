<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Illuminate\Support\Carbon;
use Image;
use App\Models\Payment;
use App\Models\PaymentDetail;

class CustomerController extends Controller
{

    public function CustomerAll() {

        // $suppliers = Supplier::all();
        $customers = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customers'));
    }

    public function CustomerAdd() {
        return view('backend.customer.customer_add');
    }


    public function CustomerStore(Request $request) {

        $request->validate([
            'name' => ['required','max:50'],
            'mobile_no' => ['required','max:15'],
            'customer_image' => ['required'],
            'email' => ['required','max:50','email'],
            'address' => ['required','max:50'],
        ],
        [

            'name.required' => 'You must enter a value in the field',
            'name.max' => 'The field cannot have more than 50 digits',

            'customer_image.required' => 'You must enter a image in the field',

            'mobile_no.required' => 'You must enter a value in the field',
            'mobile_no.max' => 'Campul nu poate avea mai mult de 15 cifre',

            'email.required' => 'You must enter a value in the field',
            'email.email' => 'You must enter a valid email address',
            'email.max' => 'The field cannot have more than 50 digits',

            'address.required' => 'You must enter a value in the field',
            'address.max' => 'The field cannot have more than 50 digits',

        ]);

        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'customer_image' => $save_url,
            'email' => $request->email,
            'address' => $request->address,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    }


    public function CustomerEdit($id) {

        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }


    public function CustomerUpdate(Request $request){

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

        $customer_id = $request->id;
        if ($request->file('customer_image')) {

        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;

        Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url ,
            // 'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Customer Updated with Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

        } else{

          Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            // 'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Customer Updated without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

        }

    }

    public function CustomerDelete($id) {

        $customers = Customer::findOrFail($id);
        $img = $customers->customer_image;
        // unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Customer Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }

    public function CreditCustomer(){

        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.customer.customer_credit',compact('allData'));

    }

    public function CreditCustomerPrintPdf(){

        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf',compact('allData'));

    }

    public function CustomerEditInvoice($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.customer.edit_customer_invoice',compact('payment'));

    }

    public function CustomerUpdateInvoice(Request $request, $invoice_id){

        if ($request->new_paid_amount < $request->paid_amount) {

            $notification = array(
            'message' => 'Sorry You Paid Maximum Value',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
        } else{
            $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_paid') {
                 $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                 $payment->due_amount = '0';
                 $payment_details->current_paid_amount = $request->new_paid_amount;

            } elseif ($request->paid_status == 'partial_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;

            }

            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d',strtotime($request->date));
            // $payment_details->updated_by = Auth::user()->id;
            $payment_details->updated_at = Carbon::now();
            $payment_details->save();

              $notification = array(
            'message' => 'Invoice Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('credit.customer')->with($notification);


        }

    }

    public function CustomerInvoiceDetails($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pdf.invoice_details_pdf',compact('payment'));

    }

    public function PaidCustomer(){

        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.customer.customer_paid',compact('allData'));

    }

    public function PaidCustomerPrintPdf(){

        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.pdf.customer_paid_pdf',compact('allData'));

    }

    public function CustomerWiseReport(){

        $customers = Customer::all();
        return view('backend.customer.customer_wise_report',compact('customers'));

    }

    public function CustomerWiseCreditReport(Request $request){

        $allData = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_wise_credit_pdf',compact('allData'));

   }

    public function CustomerWisePaidReport(Request $request){

        $allData = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
        return view('backend.pdf.customer_wise_paid_pdf',compact('allData'));

        }

}
