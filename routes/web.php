
<?php

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

use App\Http\Controllers\EmpController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/companyForm', function () {
    $companies = DB::table('company_data')->get();
    return view('companyForm')->with('companies', $companies);
});

// Route::get('/employee', function () {
//     return view('employeeForm');
// });

Route::post('/addCompany', 'CompanyController@addCompany');
Route::get('/companyView', function () {
    
    return view('companyView');
});

// Route::get('/editGet', function (Request $request) {
//     $id = $request->id;
//     $company = DB::table('company_data')->where('id', $id)->first();
//     return view('editCompany')->with('company', $company);;
// });

Route::get('/getCompanies', 'CompanyController@getCompanies');
Route::post('/editCompanyData', 'CompanyController@editCompanyData');
Route::get('/editGet', 'CompanyController@editGet');
Route::post('/delete', 'CompanyController@delete');

Route::get('/employeeForm', 'EmpController@employeeForm')->name('emp.form');
Route::post('/addemp', 'EmpController@addEmp')->name('emp.add');
Route::get('/getEmp', 'EmpController@getEmp');
Route::get('/getEditData', 'EmpController@getEditData');
Route::post('/updateEmpData', 'EmpController@updateEmpData');
Route::post('deleteEmp', 'EmpController@deleteEmp');

Route::get('/sports', function () {
    return view('sports');
});

Route::get('/registerForm', function () {
    return view('registerForm');
});

Route::get('/loginForm', function () {
    return view('loginForm');
});

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::post('/autocomplete', 'UserController@autocomplete');
Route::get('/getPassword', 'UserController@getPassword');