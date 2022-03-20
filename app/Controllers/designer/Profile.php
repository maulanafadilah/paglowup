<?php namespace App\Controllers\designer;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_designer;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Profile extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_designer = new M_designer();
			$this->m_user = new M_user();
			$this->request = \Config\Services::request();
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_designer->countDesignerByIdUser($iduser)[0]->hitung;

    	if ($is_new > 0){
    		echo "<script>alert('restricted'); window.location.href = '".base_url()."/designer/dashboard';</script>";
    		exit;
    	}
		}

		public function index(){
			$iduser = session()->get('iduser');
			$detilUser = $this->m_designer->getJoinUserDesigner($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP' , 'li_2' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('designer/prof/detail-profile', $data);
		}

		public function add(){
			$this->newUser();

			$iduser = session()->get('iduser');
			$detilUser = $this->m_user->getUserById($iduser)[0];
			$detilUser->designer_pic = 'image.jpg';

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Profile']),
				'page_title' => view('partials/page-title', ['title' => 'Profile', 'li_1' => 'PAGlowUP' , 'li_2' => 'Profile']),
				'detail_user' => $detilUser
			];
			return view('designer/prof/add-profile', $data);
		}

		public function update_proc($iduser){
			$iduser2 = session()->get('iduser');
			
			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('designer/dashboard'));
			}

			define('MB', 1048576);
			if ($_FILES['designer_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('designer/profile'));
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
					return redirect()->to(base_url('designer/profile'));
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

			return redirect()->to(base_url('designer/profile'));
		}

		public function create_proc($iduser){
			$this->newUser();

			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('designer/dashboard'));
			}

			define('MB', 1048576);
			if ($_FILES['designer_pic']['size'] > 4*MB) { // JIKA FILE DI UPLOAD OLEH USER
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('designer/profile'));
			}
			elseif ($_FILES['designer_pic']['size'] != 0) {
				$img_path = $this->upload_img()['name'];
			}
			else{
				$img_path = 'image.jpg';
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
				'designer_pic' => $img_path,
				'iduser' => $iduser
			];
			
			$this->m_designer->insertDesigner($dataset);

			return redirect()->to(base_url('designer/dashboard'));
		}

		public function update_pass($iduser){
			$this->newUser();

			$iduser2 = session()->get('iduser');

			if ($iduser2 != $iduser) {
				return redirect()->to(base_url('designer/dashboard'));
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
				return redirect()->to(base_url('designer/profile'));
			}

			if($new_pass != $auth_pass){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Ulang password baru salah
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('designer/profile'));	
			}

			$this->m_user->updatePassword($new_pass, $iduser);
			if ($old_pass != $db_pass) {
				$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
					Password berhasil diubah
				</div>';
				session()->setFlashdata('notif', $alert);
				return redirect()->to(base_url('designer/profile'));
			}
		}

    public function upload_img(){
      $validationRule = [
        'designer_pic' => [
          'label' => 'Image File',
          'rules' => 'uploaded[designer_pic]'
            . '|is_image[designer_pic]'
            . '|mime_in[designer_pic,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[designer_pic,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					'.$data.'
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('designer/profile'));
      }else{
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
	}
?>