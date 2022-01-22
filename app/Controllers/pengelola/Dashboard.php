<?php

	namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;

	class Dashboard extends \App\Controllers\BaseController{

		public function __construct(){
			$this->session = \Config\Services::session();
		}
		
		public function index(){
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
				'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'Minia', 'li_2' => 'Dashboard'])
			];
			
			return view('pengelola/dashboard', $data);
		
		}
	}

?>