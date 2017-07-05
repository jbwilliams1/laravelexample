<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem;

class BlogController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Blog Controller
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
        $page_data['blogs'] = Page::where('page_template_id', '=', '1')->where('is_draft','=',0)->get();
		return view('blogs.blogs_list_view')->with($page_data);
	}

    public function getBlogBySlug($slug)
    {
        $page_data['blog'] = Page::where('slug', '=', $slug)->first();
        return view('templates.base_blog_template')->with($page_data);
    }

    public function getBlog($id)
    {
        $page_data['page_class'] = 'blog';
        $page_data['page'] = Page::where('id', '=', $id)->first();

        return view('templatess.base_blog_template')->with($page_data);
    }

    public function getBlogs()
    {
        $page_data['pages'] = Page::where('page_template_id', '=', '1')->get();

        return view('admin.blogs.blogs_list_view')->with($page_data);
    }

    public function createBlog(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $page = new Page($request->all());
        $page->save();

        return redirect('admin/blog/edit/'.$page->id)->with('message', '<div class="alert alert-success">Successfully created blog '.$page->name.'</div>');
    }

    public function updateBlog($page_id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $page = Page::find($page_id);
        $page->update($request->all());

        return redirect('admin/blog/edit/'.$page->id)->with('message', '<div class="alert alert-success">Successfully updated blog</div>');
    }

    public function getEditBlog($page_id)
    {
        $page_data['pages'] = Page::all();
        $page_data['page'] = Page::find($page_id);

        return view('admin.blogs.blog_edit_view')->with($page_data);
    }

    /**
    * @param Request $request
    * CKEDITOR image upload handler
    */ 
    public function getUploadedPhoto(Request $request)
    {
        if($request->file('upload')->isValid())
        {
            $file = $request->file('upload');
            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            $path = $file->move('uploads/blog', $filename);

            $filedata =  [
                'uploaded'  => 1,
                'fileName'  => $filename,
                'url'       => url('/').'/uploads/blog/'.$filename
            ];

            // Required: anonymous function reference number as explained above.
            $funcNum = !empty($_GET['CKEditorFuncNum']) ? $_GET['CKEditorFuncNum'] : 0;
            $message = '';
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '" . $filedata['url'] . "', '');</script>";
        } else {
           echo json_encode(['uploaded' => 0]);
        }
    }
}