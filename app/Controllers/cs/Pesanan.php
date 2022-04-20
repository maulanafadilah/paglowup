<?php namespace App\Controllers\cs;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_cs;
	use App\Models\M_pesanan;
	use App\Models\M_user;
	use App\Models\M_comment_csum;
	use App\Models\M_comment_csde;
	use App\Models\M_designer;
	use CodeIgniter\Files\File;

	class Pesanan extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_cs = new M_cs();
			$this->m_user = new M_user();
			$this->m_designer = new M_designer();
			$this->m_pesanan = new M_pesanan();
			$this->m_comment_csum = new M_comment_csum();
			$this->m_comment_csde = new M_comment_csde();
			$this->request = \Config\Services::request();
		}
		
		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_cs->countCsByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/cs/profile/add';</script>";
    		exit;
    	}
		}

		public function index(){
			return redirect()->to(base_url('cs/pesanan/list'));
		}

		public function list(){
			$this->newUser();
	    $iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;

			$l_pesanan = $this->m_pesanan->getAllOrder();
			$detilUser = $this->m_cs->getJoinUserCs($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'List Pemesanan']),
				'l_pesanan' => $l_pesanan,
				'detail_user' => $detilUser
			];
			
			return view('cs/pesanan/list-pesanan', $data);
		}

		public function detail($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');

			$l_detail = $this->m_pesanan->getOrderById($idorder)[0];
			$l_designer = $this->m_designer->getAllActiveDesigner();
			$l_comments_csum = $this->m_comment_csum->getCommentsByIdOrder($idorder);
			$l_comments_csde = $this->m_comment_csde->getCommentsByIdOrder($idorder);
			$detilUser = $this->m_cs->getJoinUserCs($iduser)[0];

			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Detail Pemesanan']),
				'l_detail' => $l_detail,
				'l_designer' => $l_designer,
				'l_comments_csde' => $l_comments_csde,
				'l_comments_csum' => $l_comments_csum,
				'detail_user' => $detilUser
			];

			return view('cs/pesanan/detail-pesanan', $data);
		}

		public function verif_payment($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;

			$this->m_pesanan->verifyPaymentByCs($idorder, $idcs);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Pembayaran telah diverifikasi
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder));
		}

		public function send_comment_csum($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');

			$dataset = [
				'idcs' => $idcs,
				'idorder' => $idorder,
				'comment' => $comment,
				'commenttime' => $commenttime
			];

			$this->m_comment_csum->sendComment($dataset);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder.'#chat'));
		}

		public function send_comment_csum_img($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');
			$v_foto = FALSE;

			$dataset = [
				'idcs' => $idcs,
				'idorder' => $idorder,
				'comment' => $comment,
				'commenttime' => $commenttime
			];

			define('MB', 1048576);
			if ($_FILES['file1']['size'] > 4*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['file1']['size'] != 0) {
				$file1 = $this->upload_file1($dataset)['name'];
				$dataset += ['file1' => $file1];
			}

			if ($_FILES['file2']['size'] > 4*MB) {
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
				return redirect()->to(base_url('cs/pesanan/detail/'.$idorder.'?t=2'));
			}

			$this->m_comment_csum->sendComment($dataset);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder.'#chat'));
		}

		public function send_comment_csde($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');

			$dataset = [
				'idcs' => $idcs,
				'idorder' => $idorder,
				'comment' => $comment,
				'commenttime' => $commenttime
			];

			$this->m_comment_csde->sendComment($dataset);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder.'?t=2'));
		}

		public function send_comment_csde_img($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');
			$v_foto = FALSE;

			$dataset = [
				'idcs' => $idcs,
				'idorder' => $idorder,
				'comment' => $comment,
				'commenttime' => $commenttime
			];

			define('MB', 1048576);
			if ($_FILES['file1']['size'] > 4*MB) {
				$v_foto = TRUE;
			}
			elseif ($_FILES['file1']['size'] != 0) {
				$file1 = $this->upload_file1($dataset)['name'];
				$dataset += ['file1' => $file1];
			}

			if ($_FILES['file2']['size'] > 4*MB) {
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
				return redirect()->to(base_url('cs/pesanan/detail/'.$idorder.'?t=2'));
			}

			$this->m_comment_csde->sendComment($dataset);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder.'?t=2'));
		}

		public function approve_umkm($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;

			$this->m_pesanan->approveUmkmByCs($idorder);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Persetujuan dengan UMKM berhasil di approve, silahkan menuju tab designer untuk memilih designer
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder));
		}

		public function tolak_review($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;

			$this->m_pesanan->reqRevision($idorder);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Review berhasil ditolak
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder.'?t=2'));
		}
		
		public function set_designer($iddesigner, $idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;

			$this->m_pesanan->SetDesignerByCs($idorder, $iddesigner);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Designer berhasil dipilih
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder.'?t=2'));
		}
		
		public function send_prev_umkm($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;
			$v_file = FALSE;
			$dataset = [
				'idstatus' => 6
			];

			define('MB', 1048576);
			if ($_FILES['prev1']['size'] > 512000) {
				$v_file = TRUE;
			}
			elseif ($_FILES['prev1']['size'] != 0) {
				$prev1 = $this->upload_prev1($dataset)['name'];
				$dataset += ['designpreview1' => $prev1];
			}

			if ($_FILES['prev2']['size'] > 512000) {
				$v_file = TRUE;
			}
			elseif ($_FILES['prev2']['size'] != 0) {
				$prev2 = $this->upload_prev2($dataset)['name'];
				$dataset += ['designpreview2' => $prev2];
			}

			if ($v_file){
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					File terlalu besar, max file 256kb
				</div>';
				$data_session = [
					'notif' => $alert
				];

				session()->setFlashdata($data_session);
				return redirect()->to(base_url('cs/pesanan/detail/'.$idorder));
			}

			$this->m_pesanan->uploadPreview($dataset, $idorder);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				File preview telah dikirim ke UMKM
			</div>';

			session()->setFlashdata($alert);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder));
		}

		public function konfirSet($idorder){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$designer = $this->m_designer->getDesignerById($id);
				foreach ($designer as $data) {
					echo '<a href="'.base_url().'/cs/pesanan/set_designer/'.$data->iddesigner.'/'.$idorder.'" class="btn btn-success">
                    Pilih
                </a>';
				}
			}
		}

		public function cancel_order($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;

			$this->m_pesanan->cancelOrderById($idorder, $idcs);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Pesanan berhasil dibatalkan
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('cs/pesanan/list'));
		}

		public function close_order($idorder){
			$this->newUser();
			
			$designerrating = 5;
			$reviewdesigner = 'Closed By CS';
			$csrating = 5;
			$reviewcs = 'Closed By CS';

			$dataset = [
				'designerrating' => $designerrating,
				'reviewdesigner' => $reviewdesigner,
				'csrating' => $csrating,
				'reviewcs' => $reviewcs,
				'idstatus' => 8
			];

			$amount = $this->m_pesanan->getOrderById($idorder)[0]->price;
			$iddesigner = $this->m_pesanan->getOrderById($idorder)[0]->iddesigner;

			$deposit = [
				'amount' => $amount,
				'iddesigner' => $iddesigner,
				'idorder' => $idorder,
				'dateincome' => date('Y-m-d')
			];

			$this->m_pesanan->addDepositDesigner($deposit);
			$this->m_pesanan->sendReviewByUmkm($dataset, $idorder);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				Pesanan Telah Berhasil Ditutup
			</div>';
			session()->setFlashdata('notif', $alert);
			return redirect()->to(base_url('cs/pesanan/detail/'.$idorder));
		}

		public function list_ord_cancel(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$order = $this->m_pesanan->getOrderById($id)[0];
				$data = ['ord' => $order];
				echo view('cs/pesanan/part-mod-cancel', $data);
			}
		}

    public function upload_file1($dataset){
      $validationRule = [
        'file1' => [
          'label' => 'Image File',
          'rules' => 'uploaded[file1]'
            . '|is_image[file1]'
            . '|mime_in[file1,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[file1,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Format file salah
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('cs/pesanan/detail/'.$dataset['idorder'].'?t=2'));
      }else{
      	$img = $this->request->getFile('file1');
      	$newName = 'file1_'.'_'.$dataset['idcs'].$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/comment/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_file2($dataset){
      $validationRule = [
        'file2' => [
          'label' => 'Image File',
          'rules' => 'uploaded[file2]'
            . '|is_image[file2]'
            . '|mime_in[file2,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[file2,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Format file salah
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('cs/pesanan/detail/'.$dataset['idorder'].'?t=2'));
      }else{
      	$img = $this->request->getFile('file2');
      	$newName = 'file2_'.'_'.$dataset['idcs'].$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/comment/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_prev1(){
      $validationRule = [
        'prev1' => [
          'label' => 'Image File',
          'rules' => 'uploaded[prev1]'
            . '|is_image[prev1]'
            . '|mime_in[prev1,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[prev1,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Format file salah
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('cs/pesanan/list'));
      }else{
      	$img = $this->request->getFile('prev1');
      	$newName = 'prev1_'.$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/prev_data/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }

    public function upload_prev2(){
      $validationRule = [
        'prev2' => [
          'label' => 'Image File',
          'rules' => 'uploaded[prev2]'
            . '|is_image[prev2]'
            . '|mime_in[prev2,image/jpg,image/jpeg,image/png,image/webp]'
            . '|max_size[prev2,4000]',
        ],
      ];

      if (! $this->validate($validationRule)) {
        $data = $this->validator->getErrors();
				
				$alert = '<div class="alert alert-danger text-center mb-4 mt-4 pt-2" role="alert">
					Format file salah
				</div>';
				session()->setFlashdata('notif', $alert);

				return redirect()->to(base_url('cs/pesanan/list'));
      }else{
      	$img = $this->request->getFile('prev2');
      	$newName = 'file2_'.$img->getRandomName();

      	$img->move(ROOTPATH.'public/webdata/uploads/prev_data/', $newName);
      	$data = [
      		'name' => $img->getName(),
      		'type' => $img->getClientMimeType()
      	];

      	return $data;
      }
    }
	}
?>