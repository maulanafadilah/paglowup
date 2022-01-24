<?php namespace App\Controllers\designer;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_designer;

	class Dashboard extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_designer = new M_designer();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_designer->countdesignerByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/designer/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_designer->getJoinUserdesigner($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
				'detail_user' => $detilUser
			];
			
			return view('designer/dashboard', $data);
		}
	}

?>