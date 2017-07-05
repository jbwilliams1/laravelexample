<?php namespace App\Http\Controllers;

use Facebook\Facebook;
use Vinkla\Instagram\Facades\Instagram;
use SammyK\LaravelFacebookSdk\FacebookFacade;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
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
	 * Display the Homepage
	 * Allows Facebook and Instagram 
	 * @return View
	 */
	public function index()
	{
        $fb = new Facebook;
        $fbFeed = $fb->get('your_fb_api_request')->getDecodedBody();
		$igFeed = $this->getIgFeed();

        $page_data = array(
            'page_class' => 'home',
            'javascripts' => $this->javascripts,
            'stylesheets' => $this->stylesheets,
            'instagram' => !empty($igFeed) ? $igFeed : NULL,
            'facebook' =>  !empty($fbFeed['data']) ? $fbFeed['data'] : NULL
        );

		return view('home')->with($page_data);
	}

	//Temporary - API randomly disabled by IG
	public function getIgFeed() {
		$client = new \GuzzleHttp\Client();

		try {
			$ig = $client->get('your_ig_api_request');
		} catch (\GuzzleHttp\Exception\RequestException $e) {
			echo $e->getMessage();
		}

		if ($ig->getStatusCode() == 200 && !empty($content = $ig->getBody()->getContents())) {
			$igFeed = json_decode($content);
			return $igFeed->data;
		}
		return NULL;
	}

}