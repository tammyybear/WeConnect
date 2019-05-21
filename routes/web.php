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
Route::get('/', function () {
    return redirect()->route('get.login');
});

Route::get('/login', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'get.login',
]);

Route::post('/login', [
    'uses' => 'Auth\LoginController@login',
    'as' => 'post.login',
]);

Route::post('/logout', [
    'uses' => 'Auth\LoginController@logout',
    'as' => 'post.logout',
]);

Route::get('/student-application', [
    'uses' => 'HomeController@studentApplication',
    'as' => 'get.student-application',
]);

Route::post('/student-application', [
    'uses' => 'HomeController@submitstudentApplication',
    'as' => 'post.student-application',
]);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'get.home',
    ]);

});

Route::group(['middleware' => 'auth', 'prefix' => 'admission', 'middleware' => ['role:Super Admin|Admission Staff']], function () {

    Route::get('/', [
        'uses' => 'AdmissionController@index',
        'as' => 'get.admission',
    ]);

    Route::get('/list-of-student', [
        'uses' => 'AdmissionController@oldstud',
        'as' => 'get.admission.oldstud',
    ]);

    Route::post('/unverified-student-delete', [
        'uses' => 'AdmissionController@deleteUnverified',
        'as' => 'post.admission.student-delete',
    ]);

    Route::post('/manual-addStudent', [
        'uses' => 'AdmissionController@manualAddStudent',
        'as' => 'post.manual.add-student',
    ]);

    Route::get('/unverified-student', [
        'uses' => 'AdmissionController@unverifiedStudent',
        'as' => 'get.admission.unverified-student',
    ]);

    Route::get('/get-unverified-student', [
        'uses' => 'AdmissionController@getUnverifiedStudent',
        'as' => 'get.admission.unverified-student.details',
    ]);

    Route::post('/verify-unverified-student', [
        'uses' => 'AdmissionController@verifyStudent',
        'as' => 'post.admission.verify-student',
    ]);

    Route::get('/rooms', [
        'uses' => 'AdmissionController@roomShow',
        'as' => 'get.admission.rooms',
    ]);

    Route::post('create/room', [
        'uses' => 'AdmissionController@createRoom',
        'as' => 'get.create.admission.rooms',
    ]);

    Route::post('edit/room', [
        'uses' => 'AdmissionController@editRoom',
        'as' => 'get.edit.admission.rooms',
    ]);

    Route::get('edit/room', [
        'uses' => 'AdmissionController@getRoom',
        'as' => 'get.admission.rooms.details',
    ]);

    Route::post('delete/room', [
        'uses' => 'AdmissionController@deleteRoom',
        'as' => 'get.delete.rooms.details',
    ]);

    Route::get('/subjects', [
        'uses' => 'AdmissionController@subjectShow',
        'as' => 'get.admission.subjects',
    ]);

    Route::post('create/subjects', [
        'uses' => 'AdmissionController@createSubjects',
        'as' => 'get.create.admission.subjects',
    ]);

    Route::post('edit/subjects', [
        'uses' => 'AdmissionController@editSubjects',
        'as' => 'get.edit.admission.subjects',
    ]);

    Route::get('edit/subjects', [
        'uses' => 'AdmissionController@getSubjects',
        'as' => 'get.admission.subjects.details',
    ]);

    Route::post('delete/subjects', [
        'uses' => 'AdmissionController@deleteSubjects',
        'as' => 'get.delete.subjects.details',
    ]);

    Route::get('/sections', [
        'uses' => 'AdmissionController@sectionShow',
        'as' => 'get.admission.sections',
    ]);

    Route::get('get/sections', [
        'uses' => 'AdmissionController@getSection',
        'as' => 'get.admission.det.sections',
    ]);

    Route::post('/add/sections', [
        'uses' => 'AdmissionController@sectionAdd',
        'as' => 'get.admission.add.sections',
    ]);

    Route::post('/edit/sections', [
        'uses' => 'AdmissionController@sectionEdit',
        'as' => 'get.admission.edit.sections',
    ]);

    Route::post('/delete/sections', [
        'uses' => 'AdmissionController@sectionDelete',
        'as' => 'get.admission.del.sections',
    ]);

});

Route::group(['middleware' => 'auth', 'prefix' => '', 'middleware' => ['role:Super Admin|Registrar Staff']], function () {

    Route::get('/request-forms', [
        'uses' => 'ScheduleController@requestForms',
        'as' => 'get.request-forms',
    ]);

});

Route::group(['middleware' => 'auth', 'prefix' => 'schedules', 'middleware' => ['role:Super Admin|Registrar Staff']], function () {

    Route::get('/', [
        'uses' => 'ScheduleController@showSchedules',
        'as' => 'get.schedules',
    ]);

    Route::post('/', [
        'uses' => 'ScheduleController@addSchedule',
        'as' => 'get.schedules.add',
    ]);

    Route::post('/edit', [
        'uses' => 'ScheduleController@editSchedule',
        'as' => 'get.schedules.update',
    ]);

    Route::get('/get', [
        'uses' => 'ScheduleController@getSchedule',
        'as' => 'get.schedules.edit',
    ]);

    Route::post('/delete', [
        'uses' => 'ScheduleController@deleteSchedule',
        'as' => 'get.schedules.delete',
    ]);
});

Route::group(['middleware' => 'auth', 'prefix' => 'enrollment', 'middleware' => ['role:Super Admin|Registrar Staff']], function () {

    Route::get('/', [
        'uses' => 'EnrollmentController@showEnrollment',
        'as' => 'get.enrollment',
    ]);

    Route::get('/section/{id}/show', [
        'uses' => 'EnrollmentController@viewSection',
        'as' => 'get.students.enrollment',
    ]);

    Route::post('/enroll', [
        'uses' => 'EnrollmentController@enrollStudent',
        'as' => 'post.enroll.student',
    ]);

    Route::post('/remove-student', [
        'uses' => 'EnrollmentController@removeStudentFromSection',
        'as' => 'post.remove.student',
    ]);

});

Route::group(['middleware' => 'auth', 'prefix' => 'user-management', 'middleware' => ['role:Super Admin']], function () {

    Route::get('/', [
        'uses' => 'UserController@index',
        'as' => 'get.user-management',
    ]);

    Route::post('/store', [
        'uses' => 'UserController@store',
        'as' => 'post.new-user',
    ]);

    Route::get('/list', [
        'uses' => 'UserController@show',
        'as' => 'get.user-by-role',
    ]);

    Route::post('/manage-roles', [
        'uses' => 'UserController@manageRole',
        'as' => 'post.manage-roles',
    ]);

});

Route::group(['middleware' => 'auth', 'prefix' => 'guidance', 'middleware' => ['role:Super Admin|Guidance Staff']], function () {
    Route::resource('incident-report', 'GuidanceController');
});

Route::group(['middleware' => 'auth', 'prefix' => 'teacher', 'middleware' => ['role:Faculty']], function () {
    Route::get('/sections', [
        'uses' => 'TeacherController@sections',
        'as' => 'teacher.sections',
    ]);
    Route::get('/schedules', [
        'uses' => 'TeacherController@schedule',
        'as' => 'teacher.schedule',
    ]);
    Route::get('/section/{section}/grades', [
        'uses' => 'TeacherController@grades',
        'as' => 'teacher.grades',
    ]);
    Route::post('/grade-save', [
        'uses' => 'TeacherController@gradeSave',
        'as' => 'grade.save',
    ]);

    Route::get('/files', [
        'uses' => 'ClinicController@showFiles',
        'as' => 'clinic.files',
    ]);

    Route::post('/files', [
        'uses' => 'ClinicController@uploadFiles',
        'as' => 'get.file',
    ]);

    Route::post('/files/delete', [
        'uses' => 'ClinicController@delteFiles',
        'as' => 'get.delete',
    ]);

});

Route::group(['middleware' => 'auth', 'prefix' => 'clinic', 'middleware' => ['role:Super Admin|Clinic Staff']], function () {
    Route::get('/', [
        'uses' => 'ClinicController@index',
        'as' => 'clinic.index',
    ]);

    Route::get('/logs', [
        'uses' => 'ClinicController@showLogs',
        'as' => 'clinic.logs',
    ]);

    Route::post('/logs', [
        'uses' => 'ClinicController@addLogs',
        'as' => 'get.log',
    ]);

    Route::get('/seminar', [
        'uses' => 'ClinicController@showSeminar',
        'as' => 'clinic.seminars',
    ]);

    Route::post('/logs', [
        'uses' => 'ClinicController@addLogs',
        'as' => 'get.log',
    ]);

    Route::get('/deworming', [
        'uses' => 'ClinicController@showDeworming',
        'as' => 'clinic.deworming',
    ]);

    Route::get('/view/section/{id}', [
        'uses' => 'ClinicController@showStudents',
        'as' => 'clinic.view.section',
    ]);

    Route::post('/view/section', [
        'uses' => 'ClinicController@dewormStudent',
        'as' => 'post.deworm.student',
    ]);

    Route::get('/folic', [
        'uses' => 'ClinicController@showFolic',
        'as' => 'clinic.folic',
    ]);

    Route::get('/folic/section/{id}', [
        'uses' => 'ClinicController@showFolicStudents',
        'as' => 'clinic.folic.section',
    ]);

    Route::post('/folic/section', [
        'uses' => 'ClinicController@folicStudent',
        'as' => 'post.folic.student',
    ]);

    Route::get('/feeding', [
        'uses' => 'ClinicController@showFeeding',
        'as' => 'clinic.feeding',
    ]);

    Route::get('/feeding/section/{id}', [
        'uses' => 'ClinicController@showFeedingStudents',
        'as' => 'clinic.feeding.section',
    ]);

    Route::post('/feeding/section', [
        'uses' => 'ClinicController@feedingStudent',
        'as' => 'post.feeding.student',
    ]);

    Route::get('/nutritional', [
        'uses' => 'ClinicController@showNutritional',
        'as' => 'clinic.nutritional',
    ]);

    Route::get('/nutritional/section/{id}', [
        'uses' => 'ClinicController@showNutritionalStudents',
        'as' => 'clinic.nutritional.section',
    ]);

    Route::post('/nutritional/section', [
        'uses' => 'ClinicController@nutritionalStudent',
        'as' => 'post.nutritional.student',
    ]);

    Route::get('/bmi', [
        'uses' => 'ClinicController@showBMI',
        'as' => 'clinic.bmi',
    ]);

    Route::get('/bmi/section/{id}', [
        'uses' => 'ClinicController@showBMIStudents',
        'as' => 'clinic.bmi.section',
    ]);

    Route::post('/bmi/post/section', [
        'uses' => 'ClinicController@bmiStudent',
        'as' => 'post.bmi.student.post',
    ]);

    Route::get('/bmi/get/section', [
        'uses' => 'ClinicController@getBMIStudents',
        'as' => 'clinic.bmi.section.get',
    ]);

    Route::get('/bmi/get/bmi', [
        'uses' => 'ClinicController@bmiDetail',
        'as' => 'clinic.bmi.section.get.bmi',
    ]);

    Route::get('/bmi/sections', [
        'uses' => 'ClinicController@bmiSections',
        'as' => 'clinic.bmi.sections',
    ]);

    Route::get('/bmi/students/{id}', [
        'uses' => 'ClinicController@bmiStudents',
        'as' => 'clinic.bmi.students.get',
    ]);

    Route::get('/inventory', [
        'uses' => 'ClinicController@inventoryGet',
        'as' => 'clinic.inventory.get',
    ]);

    Route::post('/inventory', [
        'uses' => 'ClinicController@inventoryCreate',
        'as' => 'clinic.inventory.create',
    ]);

    Route::post('/inventory/get/', [
        'uses' => 'ClinicController@inventoryEditView',
        'as' => 'clinic.inventory.edit.view',
    ]);

    Route::post('/inventory/update/', [
        'uses' => 'ClinicController@inventoryUpdate',
        'as' => 'clinic.inventory.update',
    ]);

    Route::post('/delete/inventory/', [
        'uses' => 'ClinicController@inventoryDelete',
        'as' => 'clinic.inventory.delete',
    ]);

});

Route::group(['middleware' => 'auth', 'prefix' => 'student', 'middleware' => ['role:Student']], function () {
    Route::get('/grades', [
        'uses' => 'StudentController@grades',
        'as' => 'student.grades',
    ]);

    Route::get('/non-acad', [
        'uses' => 'StudentController@asd',
        'as' => 'student.asd',
    ]);

    Route::post('/non-x', [
        'uses' => 'StudentController@xaxaxaxaxax',
        'as' => 'student.pekpek',
    ]);

    Route::post('/non-acad', [
        'uses' => 'StudentController@qwe',
        'as' => 'student.qwe',
    ]);

    Route::get('/profile', [
        'uses' => 'HomeController@profile',
        'as' => 'get.profile',
    ]);

    Route::post('/profile-update', [
        'uses' => 'HomeController@ohshit',
        'as' => 'get.ohshit',
    ]);

    Route::get('/schedule', [
        'uses' => 'StudentController@schedule',
        'as' => 'student.schedules',
    ]);

});

Route::get('/request-student-forms', [
    'uses' => 'StudentController@fuckshit',
    'as' => 'student.fuckshit',
]);

Route::post('/request-student-forms', [
    'uses' => 'StudentController@xxx',
    'as' => 'post.student.fuckshit',
]);

Route::post('/checkheck', [
    'uses' => 'StudentController@checkheck',
    'as' => 'checkheck',
]);
