<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\StockController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function(){


    Route::controller(AdminController::class)->group(function () {

        Route::get('/admin/logout', 'destroy')->name('admin.logout');

        Route::get('/admin/users', 'Users')->name('admin.users');

        Route::get('/admin/profile', 'Profile')->name('admin.profile');

        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');

        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');

        Route::post('/update/password', 'UpdatePassword')->name('update.password');

    });


    Route::controller(SupplierController::class)->group(function () {

        // view blade all users
        Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');

        // view blade add supplier
        Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');

        // insert supplier
        Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');

        // view blade edit supplier
        Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');

        // update supplier
        Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');

        // delete supplier
        Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');

    });


    Route::controller(CustomerController::class)->group(function () {

        // view blade all customers
        Route::get('/customer/all', 'CustomerAll')->name('customer.all');

        // view blade add customer
        Route::get('/customer/add', 'CustomerAdd')->name('customer.add');

        // insert customer
        Route::post('/customer/store', 'CustomerStore')->name('customer.store');

        // view blade edit customer
        Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');

        // update customer
        Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');

        // delete customer
        Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');

        //credit customer
        Route::get('/credit/customer', 'CreditCustomer')->name('credit.customer');

        // view blade  pdf credit customer
        Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');

        // view blade  edit invoice customer
        Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');

        // update invoice customer
        Route::post('/customer/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');

        Route::get('/customer/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');

        Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');

        Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');

        Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');

        Route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');

        Route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');


    });

    Route::controller(UnitController::class)->group(function () {

        // view blade all unit
        Route::get('/unit/all', 'UnitAll')->name('unit.all');

        // view blade add unit
        Route::get('/unit/add', 'UnitAdd')->name('unit.add');

        // insert unit
        Route::post('/unit/store', 'UnitStore')->name('unit.store');

        // view blade edit unit
        Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');

        // update unit
        Route::post('/unit/update', 'unitUpdate')->name('unit.update');

        // delete unit
        Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');

    });


    Route::controller(CategoryController::class)->group(function () {

        // view blade all category
        Route::get('/category/all', 'CategoryAll')->name('category.all');

        // view blade add category
        Route::get('/category/add', 'CategoryAdd')->name('category.add');

        // insert category
        Route::post('/category/store', 'CategoryStore')->name('category.store');

        // view blade edit category
        Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');

        // update category
        Route::post('/category/update', 'CategoryUpdate')->name('category.update');

        // delete category
        Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');

    });


    Route::controller(ProductController::class)->group(function () {

        // view blade all Product
        Route::get('/product/all', 'ProductAll')->name('product.all');

        // view blade add product
        Route::get('/product/add', 'ProductAdd')->name('product.add');

        // insert product
        Route::post('/product/store', 'ProductStore')->name('product.store');

        // view blade edit product
        Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');

        // update product
        Route::post('/product/update', 'ProductUpdate')->name('product.update');

        // delete product
        Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');

    });


    Route::controller(PurchaseController::class)->group(function () {

        // view blade all purchase
        Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all');

        // view blade add purchase
        Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');

        // update  product
        Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');

        // delete purchase
        Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');


        // pending purchase
        Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');

        // approve purchase
        Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');


        Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
        Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');

    });


    Route::controller(DefaultController::class)->group(function () {

        // filter by category
        Route::get('/get-category', 'GetCategory')->name('get-category');


        // filter by product
        Route::get('/get-product', 'GetProduct')->name('get-product');


        // filter by product from invoice
        Route::get('/check-product', 'GetStock')->name('check-product-stock');


    });


    Route::controller(InvoiceController::class)->group(function () {

        // view blade all invoice
        Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all');

        // view blade add invoice
        Route::get('/invoice/add', 'InvoiceAdd')->name('invoice.add');

        // update  invoice
        Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');

        // view blade pending list
        Route::get('/invoice/pending/list', 'InvoicePendingList')->name('invoice.pending.list');

        // delete invoice
        Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');


        // view vlade approve invoice
        Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');

        // approve invoice
        Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');

        // view blade print pdf invoice
        Route::get('/print/invoice/list', 'PrintInvoiceList')->name('print.invoice.list');

        // print pdf invoice
        Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');

        // view blade daily invoice report
        Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');

        //  form daily invoice
        Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');


    });


    Route::controller(StockController::class)->group(function () {

        // view blade stock
        Route::get('/stock/report', 'StockReport')->name('stock.report');

        // view pdf stock report
        Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf');

        // stock supplier wise
        Route::get('/stock/supplier/wise', 'StockSupplierWise')->name('stock.supplier.wise');

        // view blade  supplier wise pdf
        Route::get('/supplier/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');

        Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');

    });

});

require __DIR__.'/auth.php';
