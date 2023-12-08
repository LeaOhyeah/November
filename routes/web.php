<?php

use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\UserViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ProjectControllerResource;
use App\Http\Controllers\ProjectDetailControllerResource;

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
    return view('welcome');
});

// admin
Route::get('/dashboard/admin', [DashboardAdminController::class, 'indexAdmin'])->name('admin.dashboard');
Route::get('/dashboard/admin/users', [DashboardAdminController::class, 'userManagement'])->name('admin.users');
Route::get('/dashboard/admin/user/{id}', [DashboardAdminController::class, 'detailUser'])->name('admin.user');
Route::put('/dashboard/admin/user/{id}/update', [DashboardAdminController::class, 'updateUser'])->name('admin.userUpdate');

Route::get('/dashboard/admin/staffs', [DashboardAdminController::class, 'staffManagement'])->name('admin.staffs');
Route::get('/dashboard/admin/staff/{id}', [DashboardAdminController::class, 'detailStaff'])->name('admin.staff');
Route::put('/dashboard/admin/staff/{id}/update', [DashboardAdminController::class, 'updateStaff'])->name('admin.staffUpdate');

Route::get('/dashboard/admin/blocks', [DashboardAdminController::class, 'blockManagement'])->name('admin.blocks');
Route::get('/dashboard/admin/block/{id}', [DashboardAdminController::class, 'detailblock'])->name('admin.block');
Route::put('/dashboard/admin/block/{id}/update', [DashboardAdminController::class, 'updateblock'])->name('admin.blockUpdate');

Route::get('/dashboard/admin/provinces', [DashboardAdminController::class, 'provinceManagement'])->name('admin.provinces');
Route::get('/dashboard/admin/cities', [DashboardAdminController::class, 'cityManagement'])->name('admin.cities');

// staff
Route::get('/dashboard/staff', [DashboardStaffController::class, 'indexStaff'])->name('staff.dashboard');
Route::get('/dashboard/staff/projects/active', [DashboardStaffController::class, 'indexActiveProjects'])->name('staff.projectsActive');
Route::get('/dashboard/staff/project/{id}', [DashboardStaffController::class, 'showProject'])->name('staff.projectActive');
Route::get('/dashboard/staff/project/create', [DashboardStaffController::class, 'createProject'])->name('staff.projectCreate');
Route::get('/get-cities', [DashboardStaffController::class, 'getCities']);
Route::post('/dashboard/staff/project', [DashboardStaffController::class, 'storeProject'])->name('staff.storeProject');
Route::post('/dashboard/staff/projectdetail', [DashboardStaffController::class, 'storeProjectDetail'])->name('staff.projectdetailStore');


Route::put('/dashboard/staff/project/{id}/update', [DashboardStaffController::class, 'updateProject'])->name('staff.projectUpdate');
// Route::post('/dashboard/staff/projectdetail', [DashboardStaffController::class, 'updateproject'])->name('staff.projectdetailUpdate');

// user





// Route::resource('project', ProjectControllerResource::class);

Route::resource('projectdetail', ProjectDetailControllerResource::class);
Route::post('user/comment/store', [UserViewController::class, 'commentStore'])->name('userComment.store');
Route::delete('/user/comment/delete/{id}', [UserViewController::class, 'commentDelete'])->name('userComment.delete');