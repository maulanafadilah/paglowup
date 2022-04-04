<?php namespace App\Controllers\designer;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_designer;
	use App\Models\M_withdraw;
	use App\Models\M_pesanan;

	class Dashboard extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_designer = new M_designer();
			$this->m_withdraw = new M_withdraw();
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
			$detilUser = $this->m_designer->getJoinUserDesigner($iduser)[0];

			$pendapatan = $this->m_withdraw->getTotalIncomesByDesigner($detilUser->iddesigner)[0]->incomes;
			$pengeluaran = $this->m_withdraw->getTotalOutcomesByDesigner($detilUser->iddesigner)[0]->outcomes;
			$total_order = $this->m_pesanan->countOrderByDesigner($detilUser->iddesigner)[0]->hitung;
			$canceled_order = $this->m_pesanan->countCancelOrderByDesigner($detilUser->iddesigner)[0]->hitung;
			$closed_order = $this->m_pesanan->countClosedOrderByDesigner($detilUser->iddesigner)[0]->hitung;
			$inwork_order = $this->m_pesanan->countPendingOrderByDesigner($detilUser->iddesigner)[0]->hitung;
			$des_rate = $this->m_designer->getRatingDesignerById($detilUser->iddesigner)[0]->rating;
			$l_testimoni = $this->m_pesanan->getTestimoniByDesigner($detilUser->iddesigner);

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
				'detail_user' => $detilUser,
				'pendapatan' => $pendapatan,
				'pengeluaran' => $pengeluaran,
				'total_order' => $total_order,
				'total_order' => $total_order,
				'canceled_order' => $canceled_order,
				'closed_order' => $closed_order,
				'inwork_order' => $inwork_order,
				'des_rate' => $des_rate,
				'l_testimoni' => $l_testimoni
			];
			
			return view('designer/dashboard', $data);
		}
	}

?>