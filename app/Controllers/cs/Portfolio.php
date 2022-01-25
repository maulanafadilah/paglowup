<?php namespace App\Controllers\cs;

	use CodeIgniter\Controller;
	use App\Controllers\BaseController;
	use App\Models\M_cs;
	use App\Models\M_designer;
	use App\Models\M_user;
	use CodeIgniter\Files\File;

	class Portfolio extends \App\Controllers\BaseController{

		function __construct(){
			$this->m_designer = new M_designer();
			$this->m_cs = new M_cs();
			$this->m_user = new M_user();
			$this->request = \Config\Services::request();
		}

		public function index(){
			return redirect()->to(base_url('cs/designer/list'));
		}

		public function newUser(){
	    $iduser = session()->get('iduser');
	    $is_new = $this->m_cs->countCsByIdUser($iduser)[0]->hitung;

    	if ($is_new == 0){
    		echo "<script>alert('Isi data diri terlebih dahulu'); window.location.href = '".base_url()."/cs/profile/add';</script>";
    		exit;
    	}
		}

		public function delete_proc($idportfolio){
			$this->newUser();

			$img = $this->m_designer->getPortfolioById($idportfolio)[0]->img;
			$iddesigner = $this->m_designer->getPortfolioById($idportfolio)[0]->iddesigner;
			$iduser = $this->m_designer->getDesignerById($iddesigner)[0]->iduser;

			if ($img != 'image.jpg') {
				unlink(ROOTPATH.'public/webdata/uploads/images/designer/portfolio/'.$img);
			}

			$this->m_designer->deletePortfolio($idportfolio);

			$alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
				portfolio berhasil dihapus
			</div>';
			session()->setFlashdata('notif', $alert);

			return redirect()->to(base_url('cs/designer/detail/'.$iduser));
		}

		public function list_portfolio(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$portfolio = $this->m_designer->getPortfolioById($id);
				foreach ($portfolio as $data) {
					echo '<table class="table">
					<tr>
						<td></td>
						<td class="text-center text-uppercase"><b>' . $data->description . '</b></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="3"><img src="'.base_url().'/webdata/uploads/images/designer/portfolio/'.$data->img.'" class="rounded mx-auto d-block" style="max-height: 90%; max-width: 90%;"></td>
					</tr>
					</table>';
				}
			}
		}

		public function accDelPortfolio(){
			if ($_POST['rowid']) {
				$id = $_POST['rowid'];
				$portfolio = $this->m_designer->getPortfolioById($id);
				foreach ($portfolio as $data) {
					echo '<a href="'.base_url().'/cs/portfolio/delete_proc/'.$data->idportfolio.'" class="btn btn-danger">
                    Hapus
                </a>';
				}
			}
		}
	}
?>