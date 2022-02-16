<?php namespace App\Controllers\designer;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_designer;
	use App\Models\M_pesanan;

	class Reputation extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_designer = new M_designer();
			$this->m_pesanan = new M_pesanan();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_designer->countDesignerByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/designer/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;
			$detilUser = $this->m_designer->getJoinUserDesigner($iduser)[0];

			$list_rating = $this->m_pesanan->getRepByIddesigner($iddesigner);

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Daftar Testimoni']),
				'list_rating' => $list_rating,
				'detail_user' => $detilUser
			];
			
			return view('designer/rep/list-rep', $data);
		}
	}

?>