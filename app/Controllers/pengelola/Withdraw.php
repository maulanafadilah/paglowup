<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\m_withdraw;

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
			$l_withdraw = $this->m_withdraw->getAllWithdrawFiltered();

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Permintaan Withdraw']),
				'l_withdraw' => $l_withdraw,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/wth/list-withdraw', $data);
		}

		public function bayar($idwithdraw){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idpengelola = $this->m_pengelola->getJoinUserPengelola($iduser)[0]->idpengelola;

			define('MB', 1048576);
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
				'idpengelola' => $idpengelola,
				'transferproof' => $img_path,
				'status' => 'Processed'
			];

			$this->m_withdraw->payDesigner($dataset, $idwithdraw);
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				upload bukti transfer berhasil
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/withdraw'));
		}

    public function upload_img(){
      $validationRule = [
        'transferproof' => [
          'label' => 'Image File',
          'rules' => 'uploaded[transferproof]'
            . '|is_image[transferproof]'
            . '|mime_in[transferproof,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[transferproof,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('pengelola/withdraw'));
      }else{
      	$img = $this->request->getFile('transferproof');
      	$newName = $img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/pengelola/withdrawproof/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

		public function list_wth(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$withdraw = $this->m_withdraw->getWithdrawById($id)[0];
				$data = ['with' => $withdraw];
				echo view('pengelola/wth/part-mod-withdraw', $data);
			}
		}
	}

?>