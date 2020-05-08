<?php
namespace App\Http\ViewComposer;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class MovieComposer
{
	public $movieList = [];
	public function __construct()
	{
		$this->movieList= ['A','B',];
	}
	public function compose(View $view)
	{
		$view->with('latestMovie', end($this->movieList));
	}
}