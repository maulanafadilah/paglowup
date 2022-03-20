<?php namespace App\Controllers\cs;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_cs;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Profile extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_cs = new M_cs();
			$this->m_user = new M_user();
			$this->request = \Config\Services::request();
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_cs->countCsByIdUser($iduser)[0]->hitung;

    	if ($is_new > 0){
    		echo "<script>alert('restricted'); window.location.href = '".base_url()."/cs/dashboard';</script>";
    		exit;
    	}
		}

		public function index(){
			$iduser = session()->get('iduser');
			$detilUser = $this->m_cs->getJoinUserCs($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP' , 'li_2' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('cs/prof/detail-profile', $data);
		}

		public function add(){
			$this->newUser();

			$iduser = session()->get('iduser');
			$detilUser = $this->m_user->getUserById($iduser)[0];
			$detilUser->cs_pic = 'image.jpg';

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP' , 'li_2' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('cs/prof/add-profile', $data);
		}

		public function update_proc($iduser){
			$iduser2 = session()->get('iduser');
			
			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('cs/dashboard'));
			}

			define('MB', 1048576);
			if ($_FILES['cs_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('cs/profile'));
			}
			elseif ($_FILES['cs_pic']['size'] != 0) {
				$old_img = $this->m_cs->getJoinUserCs($iduser)[0]->cs_pic;
				if ($old_img != 'image.jpg') {
					unlink(ROOTPATH.'public/webdata/uploads/images/designer/'.$old_img);
				}
				$img_path = $this->upload_img()['name'];
			}
			else{
				$img_path = $this->m_cs->getJoinUserCs($iduser)[0]->cs_pic;
			}

			$name = $_POST['nama'];
			$phone = $_POST['notelp'];
			$whatsapp = $_POST['whatsapp'];

			$email = $_POST['email'];
			$old_email = $_POST['old_email'];

			if ($email != $old_email) {
				$cekEmail = $this->m_user->cekEmailTerdaftar($email, $iduser)[0]->hitung;
				if ($cekEmail > 0) {
					$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
						Email telah terdaftar
					</div>';
					session()->setFlashdata('notif', $alert);
					return redirect()->to(base_url('cs/profile'));
				}
				$this->m_user->updateEmail($email, $iduser);
			}

			$dataset = [
				'name' => $name,
				'phone' => $phone,
				'whatsapp' => $whatsapp,
				'cs_pic' => $img_path
			];
			
			$this->m_cs->updateCs($dataset, $iduser);
			
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Profil berhasil diubah
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('cs/profile'));
		}

		public function create_proc($iduser){
			$this->newUser();

			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('cs/dashboard'));
			}

			define('MB', 1048576);
			if ($_FILES['cs_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('cs/profile'));
			}
			elseif ($_FILES['cs_pic']['size'] != 0) {
				$img_path = $this->upload_img()['name'];
			}
			else{
				$img_path = 'image.jpg';
			}

			$name = $_POST['nama'];
			$phone = $_POST['notelp'];
			$whatsapp = $_POST['whatsapp'];

			$dataset = [
				'name' => $name,
				'phone' => $phone,
				'cs_pic' => $img_path,
				'iduser' => $iduser
			];
			
			$this->m_cs->insertCs($dataset);

			return redirect()->to(base_url('cs/dashboard'));
		}

		public function update_pass($iduser){
			$this->newUser();

			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('cs/dashboard'));
			}

			$old_pass = md5($_POST['old_pass']);
			$new_pass = md5($_POST['new_pass']);
			$auth_pass = md5($_POST['auth_pass']);

			$db_pass = $this->m_user->getUserById($iduser)[0]->pass;

			if ($old_pass != $db_pass) {
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Password lama tidak sesuai
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('cs/profile'));
			}

			if($new_pass != $auth_pass){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Ulang password baru salah
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('cs/profile'));	
			}

			$this->m_user->updatePassword($new_pass, $iduser);
			if ($old_pass != $db_pass) {
				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Password berhasil diubah
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('cs/profile'));
			}
		}

    public function upload_img(){
      $validationRule = [
        'cs_pic' => [
          'label' => 'Image File',
          'rules' => 'uploaded[cs_pic]'
            . '|is_image[cs_pic]'
            . '|mime_in[cs_pic,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[cs_pic,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('cs/profile'));
      }else{
      	$img = $this->request->getFile('cs_pic');
      	$newName = $img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/cs/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }
	}
?>