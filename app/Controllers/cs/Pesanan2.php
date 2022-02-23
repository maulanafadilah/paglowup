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

  class Pesanan2 extends \App\Controllers\BaseController{

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

      $l_pesanan = $this->m_pesanan->getAllOrderFiltered();
      $l_pesanan_batal = $this->m_pesanan->getAllCanceledOrder();
      $detilUser = $this->m_cs->getJoinUserCs($iduser)[0];

      $data = [
        'title_meta' => view('partials/title-meta', ['title' => 'List Pemesanan']),
        'l_pesanan' => $l_pesanan,
        'l_pesanan_batal' => $l_pesanan_batal,
        'detail_user' => $detilUser
      ];
      
      return view('cs/pesanan/list-pesanan-batal', $data);
    }

    public function detail($idorder){
      $this->newUser();
      $iduser = session()->get('iduser');

      $l_detail = $this->m_pesanan->getOrderById($idorder)[0];
      $l_designer = $this->m_designer->getAllDesigner();
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

    public function cancel_order($idorder){
      $this->newUser();
      $iduser = session()->get('iduser');
      $idcs = $this->m_cs->getJoinUserCs($iduser)[0]->idcs;

      $this->m_pesanan->cancelOrderById($idorder, $idcs);

      $alert = '<div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert">
        Pesanan berhasil dibatalkan
      </div>';
      session()->setFlashdata('notif', $alert);
      return redirect()->to(base_url('cs/pesanan2/list'));
    }

    public function list_ord_cancel(){
      if ($_POST['rowid']) {
        $id = $_POST['rowid'];
        $order = $this->m_pesanan->getOrderById($id)[0];
        $data = ['ord' => $order];
        echo view('cs/pesanan/part-mod-cancel2', $data);
      }
    }
  }
?>