<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_withdraw;

	class Withdraw extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_pengelola = new M_pengelola();
			$this->m_withdraw = new M_withdraw();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_pengelola->countPengelolaByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/pengelola/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];
			$l_withdraw = $this->m_withdraw->getAllWithdraw();

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Histori Withdraw']),
				'l_withdraw' => $l_withdraw,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/wth/list-withdraw', $data);
		}

		public function requested(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];
			$l_withdraw = $this->m_withdraw->getAllReqWithdraw();

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Permintaan Withdraw']),
				'l_withdraw' => $l_withdraw,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/wth/list-requested', $data);
		}

		public function bayar($idwithdraw){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			define('MB', 1000000);
			if ($_FILES['transferproof']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/withdraw'));
			}
			elseif ($_FILES['transferproof']['size'] != 0) {
				$img_path = $this->upload_img()['name'];
			}
			else{
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					harus upload file!
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/withdraw'));
			}

			$dataset = [
				'transferproof' => $img_path,
				'status' => 'Confirmed'
			];

			$this->m_withdraw->payDesigner($dataset, $idwithdraw);
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				upload bukti transfer berhasil
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/withdraw'));
		}

		public function cancel($idwithdraw){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;
			$cancelledreason = $_POST['cancelledreason'];

			$dataset = [
				'cancelledreason' => $cancelledreason,
				'status' => 'Cancelled'
			];

			$this->m_withdraw->payDesigner($dataset, $idwithdraw);
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Permohonan berhasil dibatalkan
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/withdraw'));
		}

		public function processing($idwithdraw){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			$dataset = [
				'idpengelola' => $idpengelola,
				'status' => 'Processed'
			];

			$this->m_withdraw->payDesigner($dataset, $idwithdraw);
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Permohonan berhasil diproses
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/withdraw/requested'));
		}

    public function upload_img(){
    	$img = $this->request->getFile('transferproof');
    	$newName = $img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/images/pengelola/withdrawproof/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }

		public function list_wth(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$withdraw = $this->m_withdraw->getWithdrawById($id)[0];
				$data = ['with' => $withdraw];
				echo view('pengelola/wth/part-mod-withdraw', $data);
			}
		}

		public function list_wth_confirm(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$incomes = $this->m_withdraw->getTotalIncomesByDesigner($id)[0]->incomes;
				$outcomes = $this->m_withdraw->getTotalOutcomesByDesigner($id)[0]->outcomes;
				$total_deposit = $incomes - $outcomes;
				$withdraw = $this->m_withdraw->getWithdrawById($id)[0];
				$data = [
					'with' => $withdraw,
					'total_deposit' => $total_deposit
				];
				echo view('pengelola/wth/part-mod-confirm', $data);
			}
		}

		public function list_wth_cancel(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$withdraw = $this->m_withdraw->getWithdrawById($id)[0];
				$data = ['with' => $withdraw];
				echo view('pengelola/wth/part-mod-cancel', $data);
			}
		}

		public function list_wth_proc(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$withdraw = $this->m_withdraw->getWithdrawById($id)[0];
				$data = ['with' => $withdraw];
				echo view('pengelola/wth/part-mod-process', $data);
			}
		}
	}

?>