<?php namespace App\Controllers\cs;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_cs;
	use App\Models\M_umkm;
	use App\Models\M_user;

	class Umkm extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_umkm = new M_umkm();
			$this->m_cs = new M_cs();
			$this->m_user = new M_user();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_cs->countCsByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/cs/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			return redirect()->to(base_url('cs/umkm/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$l_umkm = $this->m_umkm->getAllUmkm();
			$detilUser = $this->m_cs->getJoinUserCs($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List UMKM']),
				'l_umkm' => $l_umkm,
				'detail_user' => $detilUser
			];
			
			return view('cs/user/list-umkm', $data);
		}

		public function rdr_detail($idumkm){
			$iduser = $this->m_umkm->getUmkmByIdUmkm($idumkm)[0]->iduser;
			return redirect()->to(base_url('cs/umkm/detail/'.$iduser));
		}

		public function detail($iduser){
			$this->newUser();
			$detilUser = $this->m_cs->getJoinUserCs(session()->get('iduser'))[0];
			$detail_umkm = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Detail UMKM']),
				'detail_umkm' => $detail_umkm,
				'detail_user' => $detilUser
			];

			return view('cs/user/detail-umkm', $data);
		}

	}

?>