<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//do not want to display welcome page 
//nama kat url link / nama function / nama panggil kat interface
Route::get('/', function () {
    if ($user = Auth::user()) {
        //if login
        return redirect('/dashboard');
    } else {
        //if not login
        return redirect('login');
    }
});

Auth::routes();                             

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'loadDashboard'])->name('dashboard');
Route::get('/dashboard/technician', [DashboardController::class, 'technician'])->name('dashboard.technician');




Route::get('/ListOfRepairForm', [App\Http\Controllers\ticketController::class, 'newTicket'])->name('listOfTicket');
Route::get('/newTicketAdmin', [App\Http\Controllers\ticketController::class, 'newTicketAdmin'])->name('newTicketAdmin'); 
Route::get('/RepairForm/{id}', [App\Http\Controllers\ticketController::class, 'newForm'])->name('repairForm'); 
Route::post('/displayRepairForm/{id}', [App\Http\Controllers\ticketController::class, 'insertForm'])->name('insertForm'); 
Route::get('/DisplayForm/{id}', [App\Http\Controllers\ticketController::class, 'displayForm'])->name('displayForm');
Route::delete('/deleteRepairForm/{id}', [App\Http\Controllers\ticketController::class, 'deleteRepairForm'])->name('deleteRepairForm');
Route::post('/updateStatus/{id}', [App\Http\Controllers\ticketController::class, 'updateStatus'])->name('updateStatus');
Route::get('/displayEdit/{id}', [App\Http\Controllers\ticketController::class, 'displayEdit'])->name('displayEdit');
Route::post('/updateRejectProceed/{id}', [App\Http\Controllers\ticketController::class, 'updateRejectProceed'])->name('updateRejectProceed');


Route::get('/RepairFormTechnician/{id}', [App\Http\Controllers\repairFormTechnician::class, 'listTechnicianForm'])->name('listTechnicianForm'); 

Route::get('/NewRepairForm', [App\Http\Controllers\repairFormController::class, 'NewRepairForm'])->name('NewRepairForm'); 

Route::get('/ListOfCustomer', [App\Http\Controllers\customerController::class, 'listCustomer'])->name('listOfCustomer');
Route::get('/AddCustomer', [App\Http\Controllers\customerController::class, 'newCustomer'])->name('addCustomer');
Route::post('/Customer', [App\Http\Controllers\customerController::class, 'insertCustomer'])->name('insertCustomer');
Route::get('/DisplayCustomer/{id}', [App\Http\Controllers\customerController::class, 'displayCustomer'])->name('displayCustomer');
Route::get('/EditCustomer/{id}', [App\Http\Controllers\customerController::class, 'editCustomer'])->name('editCustomer');
Route::put('/UpdateCustomer/{id}', [App\Http\Controllers\customerController::class, 'UpdateCustomer'])->name('UpdateCustomer');
Route::delete('/deleteCustomer/{id}', [App\Http\Controllers\customerController::class, 'deleteCustomer'])->name('deleteCustomer');



Route::get('/ListOfService', [App\Http\Controllers\serviceController::class, 'Service'])->name('listOfService');
Route::get('/AddService', [App\Http\Controllers\serviceController::class, 'newService'])->name('addService');
Route::post('/Service', [App\Http\Controllers\serviceController::class, 'insertService'])->name('insertService');
Route::get('/DisplayService/{id}', [App\Http\Controllers\serviceController::class, 'displayService'])->name('displayService');
Route::get('/EditService/{id}', [App\Http\Controllers\serviceController::class, 'editService'])->name('editService');
Route::put('/UpdateService/{id}', [App\Http\Controllers\serviceController::class, 'UpdateService'])->name('UpdateService');
Route::delete('/DeleteService/{id}', [App\Http\Controllers\serviceController::class, 'deleteService'])->name('deleteService');



Route::get('/ListOfStaff', [App\Http\Controllers\staffController::class, 'listStaff'])->name('listOfStaff');
Route::get('/listTechnician', [App\Http\Controllers\staffController::class, 'listTechnician'])->name('listTechnician');
Route::get('/listInternshipStudent', [App\Http\Controllers\staffController::class, 'listInternshipStudent'])->name('listInternshipStudent');
Route::get('/AddStaff', [App\Http\Controllers\staffController::class, 'newStaff'])->name('addStaff');
Route::get('/displayStaff/{id}', [App\Http\Controllers\staffController::class, 'displayStaff'])->name('displayStaff');



Route::get('/ListOfProduct', [App\Http\Controllers\productController::class, 'listProduct'])->name('listOfProduct');
Route::get('/AddProduct', [App\Http\Controllers\productController::class, 'newProduct'])->name('addProduct');
Route::post('/Product', [App\Http\Controllers\productController::class, 'insertProduct'])->name('insertProduct');
Route::get('/DisplayProduct/{id}', [App\Http\Controllers\productController::class, 'displayProduct'])->name('displayProduct');
Route::get('/EditProduct/{id}', [App\Http\Controllers\productController::class, 'editProduct'])->name('editProduct');
Route::put('/UpdateProduct/{id}', [App\Http\Controllers\productController::class, 'UpdateProduct'])->name('UpdateProduct');
Route::delete('/DeleteProduct/{id}', [App\Http\Controllers\productController::class, 'deleteProduct'])->name('deleteProduct');



Route::get('/ListOfSolution', [App\Http\Controllers\solutionController::class, 'listSolution'])->name('listOfSolution');
Route::get('/AddSolution', [App\Http\Controllers\solutionController::class, 'newSolution'])->name('addSolution');
Route::post('/Solution', [App\Http\Controllers\solutionController::class, 'insertSolution'])->name('insertSolution');
Route::get('/DisplaySolution/{id}', [App\Http\Controllers\solutionController::class, 'displaySolution'])->name('displaySolution');
Route::get('/EditSolution/{id}', [App\Http\Controllers\solutionController::class, 'editSolution'])->name('editSolution');
Route::put('/UpdateSolution/{id}', [App\Http\Controllers\solutionController::class, 'UpdateSolution'])->name('UpdateSolution');
Route::delete('/DeleteSolution/{id}', [App\Http\Controllers\solutionController::class, 'deleteSolution'])->name('deleteSolution');

Route::get('/ListOfStaff', [App\Http\Controllers\profileController::class, 'listProfile'])->name('listOfStaff');
Route::put('/UpdateProfile/{id}', [App\Http\Controllers\profileController::class, 'updateProfile'])->name('updateProfile');
Route::get('/Profile/{id}', [App\Http\Controllers\profileController::class, 'Profile'])->name('Profile');
Route::post('/updatePassword', [App\Http\Controllers\profileController::class, 'updatePassword'])->name('updatePassword');
Route::delete('/deleteUser/{id}', [App\Http\Controllers\profileController::class, 'deleteUser'])->name('deleteUser');


Route::get('/getEmail/{id}', [App\Http\Controllers\staffController::class, 'getEmail'])->name('getEmail');

Route::get('/attendance  ', [App\Http\Controllers\AttendanceController::class, 'attendance'])->name('attendance');
Route::post('/checkIn', [App\Http\Controllers\AttendanceController::class, 'checkIn'])->name('checkIn');
Route::get('/checkOut/{id}', [App\Http\Controllers\AttendanceController::class, 'checkOut'])->name('checkOut');

Route::get('/Calendar', [App\Http\Controllers\calendarController::class, 'stdCalendar'])->name('stdCalendar');

