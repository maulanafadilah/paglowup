<?php namespace App\Controllers\designer;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_designer;
	use App\Models\M_withdraw;

	class Withdraw extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_designer = new M_designer();
			$this->m_withdraw = new M_withdraw();
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
			$l_withdraw = $this->m_withdraw->getWithdrawByIdDesigner($iddesigner);
			$incomes = $this->m_withdraw->getTotalIncomesByDesigner($iddesigner)[0]->incomes;
			$outcomes = $this->m_withdraw->getTotalOutcomesByDesigner($iddesigner)[0]->outcomes;
			$total_deposit = $incomes - $outcomes;

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Histori Withdraw']),
				'total_deposit' => $total_deposit,
				'l_withdraw' => $l_withdraw,
				'detail_user' => $detilUser
			];
			
			return view('designer/wth/list-withdraw', $data);
		}

		public function requested(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;
			$detilUser = $this->m_designer->getJoinUserDesigner($iduser)[0];
			$l_withdraw = $this->m_withdraw->getReqWithdraw($iddesigner);
			$incomes = $this->m_withdraw->getTotalIncomesByDesigner($iddesigner)[0]->incomes;
			$outcomes = $this->m_withdraw->getTotalOutcomesByDesigner($iddesigner)[0]->outcomes;
			$total_deposit = $incomes - $outcomes;

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Permintaan Withdraw']),
				'total_deposit' => $total_deposit,
				'l_withdraw' => $l_withdraw,
				'detail_user' => $detilUser
			];
			
			return view('designer/wth/list-requested', $data);
		}

		public function add_proc(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;

			$amount = $_POST['amount'];
			$description = $_POST['description'];

			$dataset = [
				'iddesigner' => $iddesigner,
				'amount' => $amount,
				'description' => $description,
				'timerequest' => date('Y-m-d h:i:s'),
				'status' => 'Requested'
			];

			$this->m_withdraw->requestWithdraw($dataset);


			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Permohonan penarikan uang berhasil dibuat
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('designer/withdraw/requested'));
		}

		public function list_wth(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$withdraw = $this->m_withdraw->getWithdrawById($id)[0];
				$data = ['with' => $withdraw];
				echo view('designer/wth/part-mod-withdraw', $data);
			}
		}
	}
?>