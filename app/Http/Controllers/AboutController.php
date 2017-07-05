<?php namespace App\Http\Controllers;

use Facebook\Facebook;
use Vinkla\Instagram\Facades\Instagram;
use SammyK\LaravelFacebookSdk\FacebookFacade;
use App\Models\Employee;

class AboutController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| About Controller
	|--------------------------------------------------------------------------
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $page_data = array(
            'page_class' => 'about',
        );

		return view('about')->with($page_data);
	}

}