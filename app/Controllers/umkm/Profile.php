<?php namespace App\Controllers\umkm;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_umkm;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Profile extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_umkm = new M_umkm();
			$this->m_user = new M_user();
			$this->request = \Config\Services::request();
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_umkm->countUmkmByIdUser($iduser)[0]->hitung;

    	if ($is_new > 0){
    		echo "<script>alert('restricted'); window.location.href = '".base_url()."/umkm/dashboard';</script>";
    		exit;
    	}
		}

		public function index(){
			$iduser = session()->get('iduser');
			$detilUser = $this->m_umkm->getJoinUserUmkm($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP' , 'li_2' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('umkm/prof/detail-profile', $data);
		}

		public function add(){
			$this->newUser();

			$iduser = session()->get('iduser');
			$detilUser = $this->m_user->getUserById($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP' , 'li_2' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('umkm/prof/add-profile', $data);
		}

		public function update_proc($iduser){
			$iduser2 = session()->get('iduser');
			
			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('umkm/dashboard'));
			}

			define('MB', 1048576);
			if ($_FILES['umkm_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('umkm/profile'));
			}
			elseif ($_FILES['umkm_pic']['size'] != 0) {
				$old_img = $this->m_umkm->getJoinUserUmkm($iduser)[0]->umkm_pic;
				if ($old_img != 'image.jpg') {
					unlink(ROOTPATH.'public/webdata/uploads/images/umkm/'.$old_img);
				}
				$img_path = $this->upload_img()['name'];
			}
			else{
				$img_path = $this->m_umkm->getJoinUserUmkm($iduser)[0]->umkm_pic;
			}

			$umkm_name = $_POST['nama'];
			$description = $_POST['description'];
			$address = $_POST['alamat'];
			$phone = $_POST['notelp'];
			$whatsapp = $_POST['whatsapp'];
			$instagram = $_POST['instagram'];
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
					return redirect()->to(base_url('umkm/profile'));
				}
				$this->m_user->updateEmail($email, $iduser);
			}

			$dataset = [
				'umkm_name' => $umkm_name,
				'description' => $description,
				'address' => $address,
				'phone' => $phone,
				'whatsapp' => $whatsapp,
				'instagram' => $instagram,
				'web' => $web,
				'umkm_pic' => $img_path
			];
			
			$this->m_umkm->updateUmkm($dataset, $iduser);
			
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Profil berhasil diubah
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('umkm/profile'));
		}

		public function create_proc($iduser){
			$this->newUser();

			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('umkm/dashboard'));
			}

			define('MB', 1048576);
			if ($_FILES['umkm_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('umkm/profile'));
			}
			elseif ($_FILES['umkm_pic']['size'] != 0) {
				$img_path = $this->upload_img()['name'];
			}
			else{
				$img_path = 'image.jpg';
			}

			$umkm_name = $_POST['nama'];
			$description = $_POST['description'];
			$address = $_POST['alamat'];
			$phone = $_POST['notelp'];
			$whatsapp = $_POST['whatsapp'];
			$instagram = $_POST['instagram'];
			$web = $_POST['web'];

			$dataset = [
				'umkm_name' => $umkm_name,
				'description' => $description,
				'address' => $address,
				'phone' => $phone,
				'whatsapp' => $whatsapp,
				'instagram' => $instagram,
				'web' => $web,
				'umkm_pic' => $img_path,
				'iduser' => $iduser
			];
			
			$this->m_umkm->insertUmkm($dataset);

			return redirect()->to(base_url('umkm/dashboard'));
		}

		public function update_pass($iduser){
			$this->newUser();

			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('umkm/dashboard'));
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
				return redirect()->to(base_url('umkm/profile'));
			}

			if($new_pass != $auth_pass){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Ulang password baru salah
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('umkm/profile'));	
			}

			$this->m_user->updatePassword($new_pass, $iduser);
			if ($old_pass != $db_pass) {
				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Password berhasil diubah
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('umkm/profile'));
			}
		}

    public function upload_img(){
      $validationRule = [
        'umkm_pic' => [
          'label' => 'Image File',
          'rules' => 'uploaded[umkm_pic]'
            . '|is_image[umkm_pic]'
            . '|mime_in[umkm_pic,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[umkm_pic,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('umkm/profile'));
      }else{
      	$img = $this->request->getFile('umkm_pic');
      	$newName = $img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/images/umkm/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }
	}
?>