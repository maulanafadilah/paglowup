<?php namespace App\Controllers\pengelola;

  use CodeIgniter\Controller;
  use App\Controllers\BaseController;
  use App\Models\M_pengelola;
  use App\Models\M_pesanan;
  use App\Models\M_designer;
  use App\Models\M_comment_csum;
  use App\Models\M_comment_csde;

  class Pesanan2 extends \App\Controllers\BaseController{

    public function __construct(){
      $this->m_pengelola = new M_pengelola();
      $this->m_pesanan = new M_pesanan();
      $this->m_designer = new M_designer();
      $this->m_comment_csde = new M_comment_csde();
      $this->m_comment_csum = new M_comment_csum();
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
      return view('pengelola/transaksi/list');
    }

    public function list(){
      $this->newUser();
      $iduser = session()->get('iduser');
      $detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

      $l_pesanan_batal = $this->m_pesanan->getAllCanceledOrder();

      $data = [
        'title_meta' => view('partials/title-meta', ['title' => 'List Pemesanan']),
        'l_pesanan_batal' => $l_pesanan_batal,
        'detail_user' => $detilUser
      ];
      
      return view('pengelola/transaksi/list-transaksi-batal', $data);
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
      return redirect()->to(base_url('pengelola/pesanan2/list'));
    }

    public function list_ord_cancel(){
      if ($_POST['rowid']) {
        $id = $_POST['rowid'];
        $order = $this->m_pesanan->getOrderById($id)[0];
        $data = ['ord' => $order];
        echo view('pengelola/pesanan/part-mod-cancel2', $data);
      }
    }
  }
?>