<?php namespace App\Controllers\umkm;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_umkm;
	use App\Models\M_pesanan;

	class Dashboard extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_umkm = new M_umkm();
			$this->m_pesanan = new M_pesanan();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_umkm->countUmkmByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/umkm/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$total_order = $this->m_pesanan->countOrderByUmkm($detilUser->idumkm)[0]->hitung;
			$canceled_order = $this->m_pesanan->countCancelOrderByUmkm($detilUser->idumkm)[0]->hitung;
			$inwork_order = $this->m_pesanan->countPendingOrderByUmkm($detilUser->idumkm)[0]->hitung;
			$closed_order = $this->m_pesanan->countClosedOrderByUmkm($detilUser->idumkm)[0]->hitung;
			$totalcsrate = $this->m_umkm->getRatingCsByUmkm($detilUser->idumkm)[0]->rating;
			$totaldesrate = $this->m_umkm->getRatingDesignerByUmkm($detilUser->idumkm)[0]->rating;
			$preview_order = $this->m_pesanan->getOrderByIdUmkmLimit($detilUser->idumkm);

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
				'detail_user' => $detilUser,
				'total_order' => $total_order,
				'canceled_order' => $canceled_order,
				'inwork_order' => $inwork_order,
				'closed_order' => $closed_order,
				'totalcsrate' => $totalcsrate,
				'totaldesrate' => $totaldesrate,
				'preview_order' => $preview_order
			];
			
			return view('umkm/dashboard', $data);
		}
	}

?>