<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'page_template_id', 'slug', 'description', 'content', 'allow_menu', 'parent_id'];


	public function template()
	{
		return $this->hasOne('App\Models\Page_Template', 'id', 'page_template_id');
	}

    public function subpages()
    {
        return $this->hasMany('App\Models\Page', 'parent_id', 'id');
    }
}
