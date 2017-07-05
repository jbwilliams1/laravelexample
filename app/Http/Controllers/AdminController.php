<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Event;
use Auth;
use App\Models\User;
use App\Services\Registrar;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem;

class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Admin Controller
	|--------------------------------------------------------------------------
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
        $this->beforeFilter('@auth', array('except' => array('getLogin', 'login', 'getSetup', 'setup')));
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.admin_dashboard');
	}

    public function auth() {
        if (!Auth::check()) {
            return redirect('admin/login');
        }
    }

    /**
     * Gets a list of all events
     * @return $this
     */
    public function getEvents()
    {
        $page_data['events'] = Event::all();

        return view('admin.events.event_list_view')->with($page_data);
    }

    public function addEvent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'date' => 'required'
        ]);
        $event = new Event($request->all());
        $event->save();

        return redirect('admin/events')->with('message', '<div class="alert alert-success">Successfully created event</div>');
    }

    public function editEvent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'date' => 'required'
        ]);
        $event = Event::find($request->input('id'));
        $event->update($request->except('id', '_token'));

        return redirect('/admin/events')->with('message', '<div class="alert alert-success">Successfully updated the "'.$event->name.'" event.</div>');
    }


    /**
     * Gets a list of all employees and displays them in employee list view
     * @return view
     */
    public function getEmployees()
    {
        $page_data['employees'] = Employee::all();

        return view('admin.employees.employee_list_view')->with($page_data);
    }

    /**
     * Adds a new employee
     * @param Request $request
     */
    public function addEmployee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'occupation' => 'required'
        ]);
        $employee = new Employee($request->except('photo', '_token'));

        if ($request->hasFile('photo') && $request->file('photo')->isValid())
        {
            $imageName = uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();

            $request->file('photo')->move(
                base_path() . '/public/uploads/employees/', $imageName
            );

            $employee->photo_source = '/uploads/employees/'.$imageName;
        }
        $employee->save();

        return redirect('admin/employees')->with('message', '<div class="alert alert-success">Successfully added '.$employee->name.' as an employee</div>');
    }

    public function editEmployee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'occupation' => 'required'
        ]);
        $employee = Employee::find($request->input('id'));

        if ($request->hasFile('photo') && $request->file('photo')->isValid())
        {
            $imageName = uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();

            $request->file('photo')->move(
                base_path() . '/public/uploads/employees/', $imageName
            );

            File::delete(base_path() . '/public/'.$employee->photo_source);
            $employee->photo_source = '/uploads/employees/'.$imageName;
        }
        $employee->update($request->except('photo', '_token', 'id'));

        return redirect('admin/employees')->with('message', '<div class="alert alert-success">Successfully updated '.$employee->name.'\'s information.</div>');
    }

    public function getSetup()
    {
        return view('admin.admin_setup');
    }

    public function setup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $reg = new Registrar();
        $user = $reg->create(array('name' => $request->input('name'), 'email' => $request->input('email'), 'password' => $request->input('password')));

        if ($user) {
            Auth::loginUsingId($user->id);
            return redirect('admin');
        }

        return redirect('admin/setup');
    }

    public function getLogin(Request $request)
    {
        if (User::count() == 0) {
            return redirect('admin/setup');
        }


        if (Auth::check())
        {
            return redirect('admin');
        }

        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
//        $reg = new Registrar();
//        $reg->create(array('name'=> 'Jacob', 'email' => 'jbwilliams1@gmail.com', 'password' => 'password'));
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]))
        {
            return redirect('admin');
        } else {
            return redirect('admin/login')->with('message', '<div class="alert alert-danger">Account credentials invalid.</div>');
        }
    }
}