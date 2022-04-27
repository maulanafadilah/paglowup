<?php namespace App\Controllers\designer;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_cs;
	use App\Models\M_pesanan;
	use App\Models\M_user;
	use App\Models\M_comment_csde;
	use App\Models\M_designer;
	use CodeIgniter\Files\File;

	class Pesanan extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_cs = new M_cs();
			$this->m_user = new M_user();
			$this->m_designer = new M_designer();
			$this->m_pesanan = new M_pesanan();
			$this->m_comment_csde = new M_comment_csde();
			$this->request = \Config\Services::request();
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
			return redirect()->to(base_url('designer/pesanan/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;

			$l_pesanan = $this->m_pesanan->getOrderByDesigner($iddesigner);
			$detilUser = $this->m_designer->getJoinUserDesigner($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Pekerjaan']),
				'l_pesanan' => $l_pesanan,
				'detail_user' => $detilUser
			];
			
			return view('designer/pesanan/list-pesanan', $data);
		}

		public function detail($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');

			$l_detail = $this->m_pesanan->getOrderById($idorder)[0];
			$l_comments_csde = $this->m_comment_csde->getCommentsByIdOrder($idorder);
			$detilUser = $this->m_designer->getJoinUserDesigner($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Detail Pekerjaan']),
				'l_detail' => $l_detail,
				'l_comments_csde' => $l_comments_csde,
				'detail_user' => $detilUser
			];

			return view('designer/pesanan/detail-pesanan', $data);
		}

		public function send_prev_umkm($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;
			$v_file = FALSE;
			$dataset = [
				'idstatus' => 6
			];

			define('MB', 1000000);
			if ($_FILES['prev1']['size'] > 20*MB) {
				$v_file = TRUE;
			}
			elseif ($_FILES['prev1']['size'] != 0) {
				$prev1 = $this->upload_prev1($dataset)['name'];
				$dataset += ['designpreview1' => $prev1];
			}

			if ($_FILES['prev2']['size'] > 20*MB) {
				$v_file = TRUE;
			}
			elseif ($_FILES['prev2']['size'] != 0) {
				$prev2 = $this->upload_prev2($dataset)['name'];
				$dataset += ['designpreview2' => $prev2];
			}

			if ($v_file){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar, max size 512kb
				</div>';
				$data_session = [
					'notif' => $alert
				];

				session()->setFlashdata($data_session);
				return redirect()->to(base_url('designer/pesanan/detail/'.$idorder));
			}

			$this->m_pesanan->uploadPreview($dataset, $idorder);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				File preview telah dikirim ke UMKM
			</div>';

			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('designer/pesanan/detail/'.$idorder));
		}

		public function upload_work($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;
			$v_file = FALSE;

			$dataset = [
				'idstatus' => 6
			];

			define('MB', 1000000);
			if ($_FILES['orderedfile1']['size'] > 20*MB) {
				$v_file = TRUE;
			}
			elseif ($_FILES['orderedfile1']['size'] != 0) {
				$orderedfile1 = $this->upload_orderedfile1()['name'];
				$dataset += ['orderedfile1' => $orderedfile1];
			}

			if ($_FILES['orderedfile2']['size'] > 20*MB) {
				$v_file = TRUE;
			}
			elseif ($_FILES['orderedfile2']['size'] != 0) {
				$orderedfile2 = $this->upload_orderedfile2()['name'];
				$dataset += ['orderedfile2' => $orderedfile2];
			}

			if ($v_file){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				$data_session = [
					'alert' => $alert
				];

				session()->setFlashdata($data_session);
				return redirect()->to(base_url('designer/pesanan/detail/'.$idorder));
			}


			$this->m_pesanan->uploadPreview($dataset, $idorder);
			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				File HD telah dikirim ke UMKM
			</div>';

			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('designer/pesanan/detail/'.$idorder));
		}

		public function send_comment_csde($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');

			$dataset = [
				'iddesigner' => $iddesigner,
				'comment' => $comment,
				'commenttime' => $commenttime,
				'idorder' => $idorder
			];
			
			$this->m_comment_csde->sendComment($dataset);
			return redirect()->to(base_url('designer/pesanan/detail/'.$idorder));
		}

		public function send_comment_csde_img($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');
			$v_foto = FALSE;

			$dataset = [
				'iddesigner' => $iddesigner,
				'comment' => $comment,
				'commenttime' => $commenttime,
				'idorder' => $idorder
			];

			define('MB', 1000000);
			if ($_FILES['file1']['size'] > 20*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['file1']['size'] != 0) {
				$file1 = $this->upload_file1($dataset)['name'];
				$dataset += ['file1' => $file1];
			}

			if ($_FILES['file2']['size'] > 20*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['file2']['size'] != 0) {
				$file2 = $this->upload_file2($dataset)['name'];
				$dataset += ['file2' => $file2];
			}

			if ($v_foto){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar
				</div>';
				$data_session = [
					'alert' => $alert
				];

				session()->setFlashdata($data_session);
				return redirect()->to(base_url('designer/pesanan/detail/'.$idorder));
			}
			
			$this->m_comment_csde->sendComment($dataset);
			return redirect()->to(base_url('designer/pesanan/detail/'.$idorder));
		}

		public function req_review_cs($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;

			$this->m_pesanan->reqReviewCsByDesigner($idorder);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Telah meminta pengajuan review desain ke CS
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('designer/pesanan/detail/'.$idorder));
		}

    public function upload_file1($dataset){
    	$img = $this->request->getFile('file1');
    	$newName = 'file1_'.'_'.$dataset['iddesigner'].$img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/comment/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }

    public function upload_file2($dataset){
    	$img = $this->request->getFile('file2');
    	$newName = 'file2_'.'_'.$dataset['iddesigner'].$img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/comment/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }

    public function upload_prev1(){
    	$img = $this->request->getFile('prev1');
    	$newName = 'prev1_'.$img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/prev_data/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }

    public function upload_prev2(){
    	$img = $this->request->getFile('prev2');
    	$newName = 'prev2_'.$img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/prev_data/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }

    public function upload_orderedfile1(){
    	$img = $this->request->getFile('orderedfile1');
    	$newName = 'orderedfile1_'.$img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/works/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }

    public function upload_orderedfile2(){
    	$img = $this->request->getFile('orderedfile2');
    	$newName = 'orderedfile2_'.$img->getRandomName();

    	$img->move(ROOTPATH.'public/webdata/uploads/works/', $newName);
    	$data = [
    		'name' => $img->getName(),
    		'type' => $img->getClientMimeType()
    	];

    	return $data;
    }
	}
?>