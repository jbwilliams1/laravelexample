<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page_Template extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'page_templates';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'view_path', 'type'];


    public function pages()
    {
		return $this->belongsToMany('App\Models\Page', 'page_template_id');
    }
}
