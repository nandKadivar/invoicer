<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Customer\CustomersController;
use App\Http\Controllers\Admin\Item\ItemsController;
use App\Http\Controllers\Admin\Invoice\InvoicesController;
use App\Http\Controllers\Admin\RecurringInvoice\RecurringInvoicesController;
use App\Http\Controllers\Admin\Payment\PaymentsController;
use App\Http\Controllers\Admin\Expense\ExpensesController;
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\Admin\Report\ReportsController;
use App\Http\Controllers\Admin\Setting\SettingsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::route('login');
});

Auth::routes(['register' => false]);

Route::get('/logout',[LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/admin/customers', [CustomersController::class, 'index'])->name('admin.customers')->middleware('auth');
Route::get('/admin/customers/new', function(){
    return view('admin.customers-create');
})->name('admin.customers.create')->middleware('auth');
Route::get('/admin/customers/view', function(){
    return view('admin.customers-view');
})->name('admin.customers.view')->middleware('auth');
Route::get('/admin/items', [ItemsController::class, 'index'])->name('admin.items')->middleware('auth');
Route::get('/admin/items/new', function(){
    return view('admin.items-create');
})->name('admin.items.create')->middleware('auth');
Route::get('/admin/items/view', function(){
    return view('admin.items-view');
})->name('admin.items.view')->middleware('auth');
Route::get('/admin/invoices', [InvoicesController::class, 'index'])->name('admin.invoices')->middleware('auth');
Route::get('/admin/invoices/new', function(){
    return view('admin.invoices-create');
})->name('admin.invoices.create')->middleware('auth');
Route::get('/admin/invoices/view', function(){
    return view('admin.invoices-view');
})->name('admin.invoices.view')->middleware('auth');
Route::get('/admin/recurring-invoices', [RecurringInvoicesController::class, 'index'])->name('admin.recurring-invoices')->middleware('auth');
Route::get('/admin/payments', [PaymentsController::class, 'index'])->name('admin.payments')->middleware('auth');
Route::get('/admin/payments/new', function(){
    return view('admin.payments-create');
})->name('admin.payments.create')->middleware('auth');
Route::get('/admin/payments/view', function(){
    return view('admin.payments-view');
})->name('admin.payments.view')->middleware('auth');
Route::get('/admin/expenses', [ExpensesController::class, 'index'])->name('admin.expenses')->middleware('auth');
Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users')->middleware('auth');
Route::get('/admin/reports', [ReportsController::class, 'index'])->name('admin.reports')->middleware('auth');
Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings')->middleware('auth');
