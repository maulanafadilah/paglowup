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

		public function send_comment_csde($idorder){
			$this->newUser();
			$iduser = session()->get('iduser');
			$iddesigner = $this->m_designer->getJoinUserDesigner($iduser)[0]->iddesigner;
			$comment = $_POST['comment'];
			$commenttime = date('Y-m-d h:i:s');

			$dataset = [
				'iddesigner' => $iddesigner,
				'comment' => $comment,
				'commenttime' => $commenttime
			];

			$this->m_comment_csde->sendComment($dataset);

			return redirect()->to(base_url('designer/pesanan/detail/'.$idorder.'?t=2'));
		}
	}
?>