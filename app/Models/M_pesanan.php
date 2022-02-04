<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_pesanan extends Model	{
	 	protected $table      = 'tb_order';
    protected $primaryKey = 'idorder';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    function __construct(){
      $this->db = db_connect();
    }
    
    public function getAllOrder(){
      $sql = "SELECT * FROM tb_umkm
                JOIN tb_order USING (idumkm)
                LEFT JOIN tr_discount USING (iddiscount)
                LEFT JOIN tr_statusorder USING (idstatus)
                LEFT JOIN tr_prodcat USING (idprodcat)
                LEFT JOIN tr_grouporder USING (idgrouporder)
                ORDER BY orderdate DESC
              ";

      return $this->db->query($sql)->getResult();
    }

    public function getOrderById($idorder){
      $sql = "SELECT tb_order.*, tb_umkm.umkm_name as umkm_name, tb_umkm.umkm_pic as umkm_pic, tb_designer.name as designer_name, tb_designer.designer_pic as designer_pic, tb_cs.name as cs_name, tb_cs.cs_pic as cs_pic, tr_discount.*, tr_grouporder.*, tr_prodcat.*, tr_statusorder.*
                FROM tb_order 
                LEFT JOIN tb_umkm USING (idumkm)
                LEFT JOIN tb_designer USING (iddesigner)
                LEFT JOIN tb_cs USING (idcs)
                LEFT JOIN tr_discount USING (iddiscount)
                LEFT JOIN tr_statusorder USING (idstatus)
                LEFT JOIN tr_prodcat USING (idprodcat)
                LEFT JOIN tr_grouporder USING (idgrouporder)
                WHERE idorder = $idorder
              ";
                
      return $this->db->query($sql)->getResult();
    }

    public function getOrderByIdUmkm($idumkm){
      $sql = "SELECT * FROM tb_umkm
                JOIN tb_order USING (idumkm)
                LEFT JOIN tr_discount USING (iddiscount)
                LEFT JOIN tr_statusorder USING (idstatus)
                LEFT JOIN tr_prodcat USING (idprodcat)
                LEFT JOIN tr_grouporder USING (idgrouporder)
                WHERE idumkm = $idumkm
                ORDER BY orderdate DESC
              ";

      return $this->db->query($sql)->getResult();
    }

    public function getOrderByDesigner($iddesigner){
      $sql = "SELECT * FROM tb_umkm
                JOIN tb_order USING (idumkm)
                LEFT JOIN tr_discount USING (iddiscount)
                LEFT JOIN tr_statusorder USING (idstatus)
                LEFT JOIN tr_prodcat USING (idprodcat)
                LEFT JOIN tr_grouporder USING (idgrouporder)
                WHERE iddesigner = $iddesigner
                ORDER BY orderdate DESC
              ";

      return $this->db->query($sql)->getResult();
    }

    public function getGroupOrder(){
      $sql = "SELECT * FROM tr_grouporder";
      return $this->db->query($sql)->getResult();
    }

    public function getProdCat(){
      $sql = "SELECT * FROM tr_prodcat";
      return $this->db->query($sql)->getResult();
    }

    public function countDiscountByCode($discountcode){
      $sql = "SELECT count(iddiscount) as hitung FROM tr_discount WHERE discountcode = '$discountcode'";
      return $this->db->query($sql)->getResult();
    }

    public function getDiscountByCode($discountcode){
      $sql = "SELECT * FROM tr_discount WHERE discountcode = '$discountcode'";
      return $this->db->query($sql)->getResult();
    }

    public function getPriceByIdgrouporder($idgrouporder){
      $sql = "SELECT * FROM tr_grouporder WHERE idgrouporder = $idgrouporder";
      return $this->db->query($sql)->getResult();
    }

    public function insertOrder($data){
      $builder = $this->db->table('tb_order');
      $builder->insert($data);
    }

    public function uploadPaymentProof($paymentproof, $idorder){
      $builder = $this->db->table('tb_order');
      $builder->set('paymentproof', $paymentproof);
      $builder->where('idorder', $idorder);
      $builder->update();
    }

    public function verifyPaymentByCs($idorder, $idcs){
      $builder = $this->db->table('tb_order');
      $builder->set('idstatus', 2);
      $builder->set('idcs', $idcs);
      $builder->where('idorder', $idorder);
      $builder->update();
    }

    public function approveUmkmByCs($idorder){
      $builder = $this->db->table('tb_order');
      $builder->set('idstatus', 3);
      $builder->where('idorder', $idorder);
      $builder->update();
    }

    public function SetDesignerByCs($idorder, $iddesigner){
      $builder = $this->db->table('tb_order');
      $builder->set('idstatus', 4);
      $builder->set('iddesigner', $iddesigner);
      $builder->where('idorder', $idorder);
      $builder->update();
    }
	}

?>