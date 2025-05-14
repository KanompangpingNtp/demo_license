<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\users\UsersController;
use App\Http\Controllers\food_storage_license\AdminFoodStorageLicense;
use App\Http\Controllers\food_storage_license\UserFoodStorageLicense;
use App\Http\Controllers\health_hazard_applications\AdminHealthHazardApplicationController;
use App\Http\Controllers\health_hazard_applications\HealthHazardApplicationController;

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

//auth
Route::get('/', [AuthController::class, 'LoginPage'])->name('LoginPage');
Route::get('/RegisterPage', [AuthController::class, 'RegisterPage'])->name('RegisterPage');
Route::post('/login', [AuthController::class, 'Login'])->name('Login');
Route::post('/register', [AuthController::class, 'Register'])->name('Register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'AdminIndex'])->name('AdminIndex');

    //แบบคำร้องใบอณุญาตสะสมอาหาร
    Route::get('/admin/food_storage_license/showdata', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminShowData'])->name('FoodStorageLicenseAdminShowData');
    Route::get('/admin/food_storage_license/appointment', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminAppointment'])->name('FoodStorageLicenseAdminAppointment');
    Route::get('/admin/food_storage_license/explore', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminExplore'])->name('FoodStorageLicenseAdminExplore');
    Route::get('/admin/food_storage_license/payment', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminPayment'])->name('FoodStorageLicenseAdminPayment');
    Route::get('/admin/food_storage_license/approve', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminApprove'])->name('FoodStorageLicenseAdminApprove');
    Route::get('/admin/food_storage_license/export-pdf/{id}', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminExportPDF'])->name('FoodStorageLicenseAdminExportPDF');
    Route::get('/admin/food_storage_license/calendar/{id}', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminCalendar'])->name('FoodStorageLicenseAdminCalendar');
    Route::get('/admin/food_storage_license/checklist/{id}', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminChecklist'])->name('FoodStorageLicenseAdminChecklist');
    Route::get('/admin/food_storage_license/payment-check/{id}', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminPaymentCheck'])->name('FoodStorageLicenseAdminPaymentCheck');
    Route::get('/admin/food_storage_license/detail/{id}', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminDetail'])->name('FoodStorageLicenseAdminDetail');
    Route::get('/admin/food_storage_license/confirm/{id}', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminConfirm'])->name('FoodStorageLicenseAdminConfirm');
    Route::put('/admin/food_storage_license/confirm', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminConfirmSave'])->name('FoodStorageLicenseAdminConfirmSave');
    Route::put('/admin/food_storage_license/checklistSave', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminChecklistSave'])->name('FoodStorageLicenseAdminChecklistSave');
    Route::put('/admin/food_storage_license/calendarSave', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminCalendarSave'])->name('FoodStorageLicenseAdminCalendarSave');
    Route::put('/admin/food_storage_license/paymentSave', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminPaymentSave'])->name('FoodStorageLicenseAdminPaymentSave');
    Route::post('/admin/food_storage_license/admin-reply/{id}', [AdminFoodStorageLicense::class, 'FoodStorageLicenseAdminReply'])->name('FoodStorageLicenseAdminReply');
    Route::post('/admin/food_storage_license/update-status/{id}', [AdminFoodStorageLicense::class, 'FoodStorageLicenseUpdateStatus'])->name('FoodStorageLicenseUpdateStatus');
    Route::get('/admin/certificate/food_storage_license/export-pdf/{id}', [AdminFoodStorageLicense::class, 'AdminCertificateFoodStorageLicensePDF'])->name('AdminCertificateFoodStorageLicensePDF');
    Route::post('/admin/food_storage_license/extend', [AdminFoodStorageLicense::class, 'FoodStorageLicenseCoppy'])->name('FoodStorageLicenseCoppy');
    Route::get('/admin/food_storage_license/expire', [AdminFoodStorageLicense::class, 'FoodStorageLicenseExpire'])->name('FoodStorageLicenseExpire');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/admin/health_hazard_applications/showdata', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminShowData'])->name('HealthHazardApplicationAdminShowData');
    Route::get('/admin/health_hazard_applications/appointment', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminAppointment'])->name('HealthHazardApplicationAdminAppointment');
    Route::get('/admin/health_hazard_applications/export-pdf/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminExportPDF'])->name('HealthHazardApplicationAdminExportPDF');
    Route::post('/admin/health_hazard_applications/admin-reply/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminReply'])->name('HealthHazardApplicationAdminReply');
    Route::post('/admin/health_hazard_applications/update-status/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationUpdateStatus'])->name('HealthHazardApplicationUpdateStatus');
    Route::get('/admin/health_hazard_applications/confirm/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminConfirm'])->name('HealthHazardApplicationAdminConfirm');
    Route::put('/admin/health_hazard_applications/confirm', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminConfirmSave'])->name('HealthHazardApplicationAdminConfirmSave');
    Route::get('/admin/health_hazard_applications/detail/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminDetail'])->name('HealthHazardApplicationAdminDetail');
    Route::get('/admin/health_hazard_applications/calendar/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminCalendar'])->name('HealthHazardApplicationAdminCalendar');
    Route::put('/admin/health_hazard_applications/calendarSave', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminCalendarSave'])->name('HealthHazardApplicationAdminCalendarSave');
    Route::get('/admin/health_hazard_applications/explore', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminExplore'])->name('HealthHazardApplicationAdminExplore');
    Route::get('/admin/health_hazard_applications/checklist/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminChecklist'])->name('HealthHazardApplicationAdminChecklist');
    Route::put('/admin/health_hazard_applications/checklistSave', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminChecklistSave'])->name('HealthHazardApplicationAdminChecklistSave');
    Route::get('/admin/health_hazard_applications/payment', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminPayment'])->name('HealthHazardApplicationAdminPayment');
    Route::get('/admin/health_hazard_applications/payment-check/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminPaymentCheck'])->name('HealthHazardApplicationAdminPaymentCheck');
    Route::put('/admin/health_hazard_applications/paymentSave', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminPaymentSave'])->name('HealthHazardApplicationAdminPaymentSave');
    Route::get('/admin/health_hazard_applications/approve', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminApprove'])->name('HealthHazardApplicationAdminApprove');
    Route::get('/admin/certificate/health_hazard_applications/export-pdf/{id}', [AdminHealthHazardApplicationController::class, 'AdminCertificateHealthHazardApplicationPDF'])->name('AdminCertificateHealthHazardApplicationPDF');
    Route::post('/admin/certificate/health_hazard_applications/extend', [AdminHealthHazardApplicationController::class, 'CertificateHealthHazardApplicationCoppy'])->name('CertificateHealthHazardApplicationCoppy');
    Route::get('/admin/health_hazard_applications/expire', [AdminHealthHazardApplicationController::class, 'CertificateHealthHazardApplicationExpire'])->name('CertificateHealthHazardApplicationExpire');
});

Route::middleware(['user'])->group(function () {
    Route::get('/user/index', [UsersController::class, 'UsersIndex'])->name('UsersIndex');

    //แบบคำร้องใบอณุญาตสะสมอาหาร
    Route::get('/user-account/food_storage_license', [UserFoodStorageLicense::class, 'FoodStorageLicenseFormPage'])->name('FoodStorageLicenseFormPage');
    Route::post('/user-account/food_storage_license/form/create', [UserFoodStorageLicense::class, 'FoodStorageLicenseFormCreate'])->name('FoodStorageLicenseFormCreate');

    Route::get('/user-account/food_storage_license/show-details', [UserFoodStorageLicense::class, 'FoodStorageLicenseShowDetails'])->name('FoodStorageLicenseShowDetails');
    Route::get('/user-account/food_storage_license/export-pdf/{id}', [UserFoodStorageLicense::class, 'FoodStorageLicenseUserExportPDF'])->name('FoodStorageLicenseUserExportPDF');
    Route::post('/user-account/food_storage_license/reply/{id}', [UserFoodStorageLicense::class, 'FoodStorageLicenseUserReply'])->name('FoodStorageLicenseUserReply');
    Route::get('/user-account/food_storage_license/show-edit/{id}', [UserFoodStorageLicense::class, 'FoodStorageLicenseUserShowFormEdit'])->name('FoodStorageLicenseUserShowFormEdit');
    Route::get('/user-account/certificate/food_storage_license/export-pdf/{id}', [UserFoodStorageLicense::class, 'CertificateFoodStorageLicensePDF'])->name('CertificateFoodStorageLicensePDF');
    Route::get('/user-account/certificate/food_sales/export-pdf/{id}', [UserFoodStorageLicense::class, 'CertificateFoodSalesPDF'])->name('CertificateFoodSalesPDF');
    Route::get('/user-account/food_storage_license/detail/{id}', [UserFoodStorageLicense::class, 'FoodStorageLicenseDetail'])->name('FoodStorageLicenseDetail');
    Route::get('/user-account/food_storage_license/calendar/{id}', [UserFoodStorageLicense::class, 'FoodStorageLicenseCalendar'])->name('FoodStorageLicenseCalendar');
    Route::get('/user-account/food_storage_license/payment/{id}', [UserFoodStorageLicense::class, 'FoodStorageLicensePayment'])->name('FoodStorageLicensePayment');
    Route::put('/user-account/food_storage_license/paymentSave', [UserFoodStorageLicense::class, 'FoodStorageLicensePaymentSave'])->name('FoodStorageLicensePaymentSave');
    Route::put('/user-account/food_storage_license/calendarSave', [UserFoodStorageLicense::class, 'FoodStorageLicenseCalendarSave'])->name('FoodStorageLicenseCalendarSave');

    Route::get('/user-account/health_hazard_applications', [HealthHazardApplicationController::class, 'HealthHazardApplicationFormPage'])->name('HealthHazardApplicationFormPage');
    Route::post('/user-account/health_hazard_applications/form/create', [HealthHazardApplicationController::class, 'HealthHazardApplicationFormCreate'])->name('HealthHazardApplicationFormCreate');
    Route::get('/user-account/health_hazard_applications/show-details', [HealthHazardApplicationController::class, 'HealthHazardApplicationShowDetails'])->name('HealthHazardApplicationShowDetails');
    Route::get('/user-account/health_hazard_applications/export-pdf/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserExportPDF'])->name('HealthHazardApplicationUserExportPDF');
    Route::post('/user-account/health_hazard_applications/reply/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserReply'])->name('HealthHazardApplicationUserReply');
    Route::get('/user-account/health_hazard_applications/show-edit/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserShowFormEdit'])->name('HealthHazardApplicationUserShowFormEdit');
    Route::get('/user-account/certificate/health_hazard_applications/export-pdf/{id}', [HealthHazardApplicationController::class, 'CertificateHealthHazardPDF'])->name('CertificateHealthHazardPDF');
    Route::get('/user-account/health_hazard_applications/detail/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationDetail'])->name('HealthHazardApplicationDetail');
    Route::get('/user-account/health_hazard_applications/calendar/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationCalendar'])->name('HealthHazardApplicationCalendar');
    Route::put('/user-account/health_hazard_applications/calendarSave', [HealthHazardApplicationController::class, 'HealthHazardApplicationCalendarSave'])->name('HealthHazardApplicationCalendarSave');
    Route::get('/user-account/health_hazard_applications/payment/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationPayment'])->name('HealthHazardApplicationPayment');
    Route::put('/user-account/health_hazard_applications/paymentSave', [HealthHazardApplicationController::class, 'HealthHazardApplicationPaymentSave'])->name('HealthHazardApplicationPaymentSave');
});
