<?php 
	namespace App\Controllers;
	
	use CodeIgniter\Controller;
	
	class login extends BaseController{
		
		public function cs(){
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Login | Customer Service'])
			];
			echo view('auth-login', $data);
		}

		public function pengelola(){
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Login | Pengelola'])
			];
			return view('auth-login', $data);
		}

		public function umkm(){
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Login | UMKM'])
			];
			return view('auth-login', $data);
		}

		public function designer(){
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Login | Designer'])
			];
			return view('auth-login', $data);
		}
	}

?>