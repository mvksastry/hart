<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalendarController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventypeController;

use App\Http\Controllers\FaqController;

use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HostingChoiceController;

use App\Http\Controllers\IOCommsController;

use App\Http\Controllers\KanbanController;
use App\Http\Controllers\KanbanBoardsController;
use App\Http\Controllers\KanbanCardsController;

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaverecordController;
use App\Http\Controllers\LeavetypeController;
use App\Http\Controllers\LicensingChoiceController;

use App\Http\Controllers\MessagesController;

use App\Http\Controllers\PathController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\TeamsController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\TasksController;

use App\Http\Controllers\UserController;

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

/////////////////// Footer routes: FAQ & FLOWS //////////////

Route::controller(FaqController::class)->group(function () {
	Route::get('/faq-architecture', 'OfficeArchitecture');
});

Route::controller(FaqController::class)->group(function () {
	Route::get('/faq-work-flows', 'WorkFlows');
});

Route::controller(FaqController::class)->group(function () {
	Route::get('/faq-decision-flows', 'DecisionFlows');
});

Route::controller(FaqController::class)->group(function () {
	Route::get('/faq-customization', 'Customization');
});

/////////////////// Footer routes: FAQ & FLOWS //////////////


Route::controller(HostingChoiceController::class)->group(function () {
	Route::get('/hosting-cloud', 'Cloud');
});

Route::controller(HostingChoiceController::class)->group(function () {
	Route::get('/hosting-onsite', 'OnSite');
});

Route::controller(HostingChoiceController::class)->group(function () {
	Route::get('/hosting-hybrid', 'Hybrid');
});

Route::controller(HostingChoiceController::class)->group(function () {
	Route::get('/hosting-multitenancy', 'MultiTenancy');
});

Route::controller(LicensingChoiceController::class)->group(function () {
	Route::get('/licensing-perpetual', 'perpetual');
});

Route::controller(LicensingChoiceController::class)->group(function () {
	Route::get('/licensing-subscription', 'subscription');
});

Route::controller(LicensingChoiceController::class)->group(function () {
	Route::get('/licensing-data-security', 'DataSecurity');
});

Route::controller(LicensingChoiceController::class)->group(function () {
	Route::get('/licensing-maintenance', 'Maintenance');
});

Route::controller(PostsController::class)->group(function () {
	Route::name('posts.')->prefix('posts')->group(function () {
		Route::get('all', 'index')->name('all');
		Route::get('add', 'create')->name('add');
		Route::post('save', 'store')->name('save');    
		Route::get('view/{slug}', 'show')->name('view');
		Route::get('edit/{slug}', 'edit')->name('edit');
		Route::post('update/{slug}', 'update')->name('update');
		Route::get('activate/{slug}', 'publish')->name('activate');
		Route::get('deactivate/{slug}', 'unpublish')->name('deactivate');
		Route::get('deletepostimage/{slug}', 'deleteimage')->name('deletepostimage');
		Route::get('delete/{slug}', 'destroy')->name('delete');
	});
});

/////////////////// For login routes: Authentication //////////////

Auth::routes();

/////////////////// After login routes: Authentication required //////////////

Route::controller(DashboardController::class)->middleware(['auth'])->group(function () {
	Route::get('/dashboard', 'index');
});

  //Messages routes
  Route::resource('messages', MessagesController::class);
    


Route::middleware(['auth'] )->group(function () {

		Route::resource('calendar', CalendarController::class);
		Route::post('calendar_mass_destroy', ['uses' => 'App\Http\Controllers\CalendarController@massDestroy', 'as' => 'calendar.mass_destroy']);
		
    //Dashboard controller
    Route::resource('kanban', KanbanController::class);

		//Kanban Boards routes
		Route::resource('kanban-boards', KanbanBoardsController::class);	
		Route::post('kanbanboards_mass_destroy', ['uses' => 'App\Http\Controllers\KanbanBoardsController@massDestroy', 'as' => 'kanban-boards.mass_destroy']);

		//Kanban Cards routes
		Route::resource('kanban-cards', KanbanCardsController::class);	
		Route::post('kanbancards_mass_destroy', ['uses' => 'App\Http\Controllers\KanbanCardsController@massDestroy', 'as' => 'kanban-cards.mass_destroy']);
    
		//Leave types routes
		Route::resource('leavetypes', LeavetypeController::class);	
		Route::post('leavetypes_mass_destroy', ['uses' => 'App\Http\Controllers\LeavetypeController@massDestroy', 'as' => 'leavetypes.mass_destroy']);

		//Holiday routes
		Route::resource('holidays', HolidayController::class);	
		Route::post('holidays_mass_destroy', ['uses' => 'App\Http\Controllers\HolidayController@massDestroy', 'as' => 'holidays.mass_destroy']);

		//Path routes
		Route::resource('paths', PathController::class);	
		Route::post('paths_mass_destroy', ['uses' => 'App\Http\Controllers\PathController@massDestroy', 'as' => 'paths.mass_destroy']);
		
		//communication routes
    Route::post('/iocomms/comment/{id}',        ['uses' => 'App\Http\Controllers\IOCommsController@commentIOC',   'as' => 'iocomms.comment']);	
		Route::get('/iocomms/decision/{id}',        ['uses' => 'App\Http\Controllers\IOCommsController@decision',     'as' => 'iocomms.decision']);
		Route::post('/iocomms/decisionupdate/{id}', ['uses' => 'App\Http\Controllers\IOCommsController@postDecision', 'as' => 'iocomms.decisionupdate']);
		Route::resource('iocomms', IOCommsController::class);
		Route::post('iocomms_mass_destroy',  ['uses' => 'App\Http\Controllers\IOCommsController@massDestroy', 'as' => 'IOCommsController.mass_destroy']);
		Route::post('iocomms_mass_approval', ['uses' => 'App\Http\Controllers\IOCommsController@massApprove', 'as' => 'IOCommsController.mass_approval']);

		//Users routes
		Route::resource('users', UserController::class);	
		Route::post('users_mass_destroy', ['uses' => 'App\Http\Controllers\UserController@massDestroy', 'as' => 'users.mass_destroy']);

		//roles routes
		Route::resource('roles', RoleController::class);	
		Route::post('roles_mass_destroy', ['uses' => 'App\Http\Controllers\RoleController@massDestroy', 'as' => 'roles.mass_destroy']);

		//permissions routes
		Route::resource('permissions', PermissionController::class);	
		Route::post('permissions_mass_destroy', ['uses' => 'App\Http\Controllers\PermissionController@massDestroy', 'as' => 'permissions.mass_destroy']);

		//Eventypes routes
		Route::resource('eventypes', EventypeController::class);	
		Route::post('permissions_mass_destroy', ['uses' => 'App\Http\Controllers\PermissionController@massDestroy', 'as' => 'permissions.mass_destroy']);

		//events routes
		Route::resource('events', EventController::class);	
		Route::post('events_mass_destroy', ['uses' => 'App\Http\Controllers\EventController@massDestroy', 'as' => 'events.mass_destroy']);

		//Leaves routes
    
		Route::get('/leaves/decision/{id}', ['uses' => 'App\Http\Controllers\LeaveController@decision', 'as' => 'leave.decision']);
		Route::get('/leaves/casual',   [LeaveController::class, 'casual'])->name('leaves.casual');
		Route::get('/leaves/paid',     [LeaveController::class, 'paid'])->name('leaves.paid');
		Route::get('/leaves/vacation', [LeaveController::class, 'vacation'])->name('leaves.vacation');
    
    Route::get('/leaves/form/{id}', [LeaveController::class, 'form'])->name('leaves.form');
    
		Route::post('/leaves/decisionupdate/{id}', ['uses' => 'App\Http\Controllers\LeaveController@postDecision', 'as' => 'leave.decisionupdate']);
		Route::post('/leaves_mass_approve', ['uses' => 'App\Http\Controllers\LeaveController@massApprove', 'as' => 'leaves.mass_approval']);
		Route::resource('leaves', LeaveController::class);
		Route::post('leaves_mass_destroy', ['uses' => 'App\Http\Controllers\LeaveController@massDestroy', 'as' => 'leaves.mass_destroy']);

		//Leaverecord routes
		Route::get('/leaverecords/creditCLs', [LeaverecordController::class, 'creditCLs'])->name('leaverecords.creditCLs');
		Route::post('/leaverecords/addNewCLs', [LeaverecordController::class, 'addNewCLs'])->name('leaverecords.addNewCLs');
		Route::get('/leaverecords/creditPaidLeaves', [LeaverecordController::class, 'creditPaidLeaves'])->name('leaverecords.creditPaidLeaves');
		Route::post('/leaverecords/addNewPaidLeaves', [LeaverecordController::class, 'addNewPaidLeaves'])->name('leaverecords.addNewPaidLeaves');
		Route::resource('/leaverecords', LeaverecordController::class);

    //Profile routes
    Route::resource('/profile', ProfileController::class);
    
    //Projects routes
    Route::resource('/projects', ProjectsController::class);

    //Tasks routes
    Route::resource('/projtasks', TasksController::class);

    //Tasks routes
    Route::resource('/teams', TeamsController::class);
    
		//tourdetails routes
		Route::get('/tours/decision/{id}', ['uses' => 'App\Http\Controllers\ToursController@decision', 'as' => 'tours.decision']);
		Route::post('/tours/decisionupdate/{id}', ['uses' => 'App\Http\Controllers\ToursController@postDecision', 'as' => 'tours.decisionupdate']);
		Route::resource('tours', ToursController::class);
		Route::post('tours_mass_destroy', ['uses' => 'App\Http\Controllers\ToursController@massDestroy', 'as' => 'tours.mass_destroy']);

		Route::resource('employees', EmployeesController::class);
		Route::post('employees_mass_destroy', ['uses' => 'App\Http\Controllers\EmployeesController@massDestroy', 'as' => 'employees.mass_destroy']);

		/*
		Route::controller(IOCommsController::class)->group(function () {
			Route::get('iocomms', 'index')->name('iocomms.index');
			Route::get('create', 'create')->name('iocomms.create');
			Route::post('save', 'store')->name('iocomms.store');
			Route::get('edit/{id}', 'edit')->name('iocomms.edit');
			Route::get('destroy/{id}', 'destroy')->name('iocomms.destroy');
			Route::get('iocomms.new', 'new')->name('iocmms.new');
			Route::post('/iocomms/comment/{id}', 'comment')->name('iocomms.comment');
			Route::get('/iocomms/decision/{id}', 'decision')->name('iocomms.decision');
			Route::post('/iocomms/updatedecision/{id}', 'updatedecision')->name('iocomms.updatedecision');
		});
		*/
	
});