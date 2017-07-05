<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Contact Controller
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
		return view('contact/contact_index')->with(array('page_class' => 'contact', 'javascripts' => $this->javascripts));
	}


	/**
	* Ajax contact form endpoint
	* @param Request $request
	*/
	public function sendContact(Request $request)
	{
		$form_data = $request->all();

		\Mail::send('emails.contact', $form_data, function($message) use ($form_data)
		{
			$message->from('email@email.com', $form_data['name']);
			$message->to('email@email.com', 'Website Contact')->subject('Website Contact Message from: '.!empty($form_data['name']) ? $form_data['name'] : uniqid());
		});

		echo count(\Mail::failures()) == 0 ? 0 : 1;
	}

	/**
	* Ajax referral form endpoint
	* @param Request $request
	*/ 
	public function sendReferral(Request $request)
	{
		$form_data = $request->all();

		\Mail::send('emails.referral', $form_data, function($message) use ($form_data)
		{
			$message->from('email@email.com', $form_data['firstname']." ".$form_data['lastname']);
			$message->to($form_data['recipient_email'], 'Referral Recipient')->subject($form_data['firstname']." ".$form_data['lastname'].' recommends that you try out their website!');
		});

		echo count(\Mail::failures()) == 0 ? 0 : 1;
	}

}
