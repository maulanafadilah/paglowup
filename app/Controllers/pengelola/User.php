<?php namespace App\Controllers\pengelola;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_pengelola;
	use App\Models\M_designer;
	use App\Models\M_pesanan;
	use App\Models\M_user;

	class User extends \App\Controllers\BaseController{

		public function __construct(){
			$this->m_designer = new M_designer();
			$this->m_pesanan = new M_pesanan();
			$this->m_pengelola = new M_pengelola();
			$this->m_user = new M_user();
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
			return redirect()->to(base_url('pengelola/user/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$l_user = $this->m_user->getAllNewUser();
			$detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List User']),
				'l_user' => $l_user,
				'detail_user' => $detilUser
			];
			
			return view('pengelola/user/list-user', $data);
		}

		public function add_proc(){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = md5($_POST['pass']);

			$cekUsername = $this->m_user->countUsername($username)[0]->hitung;
			$cekEmail = $this->m_user->countUserByEmail($email)[0]->hitung;

			if ($cekUsername != 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Username telah terdaftar
					</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/designer/list'));
			}

			if ($cekEmail != 0) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Email telah terdaftar
					</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/designer/list'));
			}

			$dataUser = [
				'username' => $username,
				'pass' => $password,
				'email' => $email,
				'flag' => 1,
				'idgroup' => 3
			];

			$this->m_user->insertUser($dataUser);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					User berhasil dibuat
				</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('pengelola/designer/list'));
		}

		public function update_proc($iduser){
			$this->newUser();

			define('MB', 1000000);
			if ($_FILES['designer_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('pengelola/designer/detail/'.$iduser));
			}
			elseif ($_FILES['designer_pic']['size'] != 0) {
				$old_img = $this->m_designer->getJoinUserDesigner($iduser)[0]->designer_pic;
				if ($old_img != 'image.jpg') {
					unlink(ROOTPATH.'public/webdata/uploads/images/designer/'.$old_img);
				}
				$img_path = $this->upload_img()['name'];
			}
			else{
				$img_path = $this->m_designer->getJoinUserDesigner($iduser)[0]->designer_pic;
			}

			$name = $_POST['nama'];
			$description = $_POST['description'];
			$phone = $_POST['notelp'];
			$whatsapp = $_POST['whatsapp'];
			$dribbble = $_POST['dribbble'];
			$bankaccount = $_POST['bankaccount'];
			$bankname = $_POST['bankname'];
			$bankaccname = $_POST['bankaccname'];
			$web = $_POST['web'];

			$email = $_POST['email'];
			$old_email = $_POST['old_email'];

			if ($email != $old_email) {
				$cekEmail = $this->m_user->cekEmailTerdaftar($email, $iduser)[0]->hitung;
				if ($cekEmail > 0) {
					$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Email telah terdaftar
					</div>';
					session()->setFlashdata('notif', $alert);
					return redirect()->to(base_url('pengelola/designer/detail/'.$iduser));
				}
				$this->m_user->updateEmail($email, $iduser);
			}

			$dataset = [
				'name' => $name,
				'description' => $description,
				'phone' => $phone,
				'whatsapp' => $whatsapp,
				'dribbble' => $dribbble,
				'web' => $web,
				'bankaccount' => $bankaccount,
				'bankname' => $bankname,
				'bankaccname' => $bankaccname,
				'designer_pic' => $img_path
			];
			
			$this->m_designer->updateDesigner($dataset, $iduser);
			
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Profil berhasil diubah
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('pengelola/designer/detail/'.$iduser));
		}

		public function flag_switch($iduser){
			$flag = $this->m_designer->getJoinUserDesigner($iduser)[0]->flag;

			if ($flag == 0) {
				$this->m_user->aktifkanUser($iduser);

				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					User Diaktifkan
				</div>';
				session()->setFlashdata('notif', $alert);

			}elseif ($flag == 1) {
				$this->m_user->nonaktifkanUser($iduser);

				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					User Dinonaktifkan
				</div>';
				session()->setFlashdata('notif', $alert);
			}
			
			return redirect()->to(base_url('pengelola/designer/detail/'.$iduser));
		}

		public function upload_img(){
    	$img = $this->request->getFile('designer_pic');
    	$newName = $img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/images/designer/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }
	}

?>