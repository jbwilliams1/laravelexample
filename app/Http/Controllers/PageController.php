<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem;

class PageController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Page Controller
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

    public function getPage($slug)
    {
        $page_data['page_class'] = 'custom-page';
        $page_data['page'] = Page::where('slug', '=', $slug)->first();

        return view('templates.base_page_template')->with($page_data);
    }

    public function getPages()
    {
        $page_data['pages'] = Page::whereRaw('page_template_id IS NULL')->get();

        return view('admin.pages.pages_list_view')->with($page_data);
    }

    public function createPage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:150|unique:pages'
        ]);
        $page = new Page($request->all());
        $page->save();

        return redirect('admin/page/edit/'.$page->id)->with('message', '<div class="alert alert-success">Successfully created page '.$page->name.'</div>');
    }

    public function createBlog(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:150|unique:pages'
        ]);
        $page = new Page($request->all());
        $page->save();

        return redirect('admin/blog/edit/'.$page->id)->with('message', '<div class="alert alert-success">Successfully created page '.$page->name.'</div>');
    }

    public function updatePage($page_id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:150'
        ]);
        $page = Page::find($page_id);
        $page->update($request->all());

        return redirect('admin/page/edit/'.$page->id)->with('message', '<div class="alert alert-success">Successfully updated page</div>');
    }

    public function getEditPage($page_id)
    {
        $page_data['pages'] = Page::all();
        $page_data['page'] = Page::find($page_id);

        return view('admin.pages.page_edit_view')->with($page_data);
    }
}