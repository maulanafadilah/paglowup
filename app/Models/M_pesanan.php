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
    
    public function getAllOrderFiltered(){
      $sql = "SELECT * FROM tb_umkm
                JOIN tb_order USING (idumkm)
                LEFT JOIN tr_discount USING (iddiscount)
                LEFT JOIN tr_statusorder USING (idstatus)
                LEFT JOIN tr_prodcat USING (idprodcat)
                LEFT JOIN tr_grouporder USING (idgrouporder)
                WHERE tb_order.paymentproof IS NULL 
                AND now() > (DATE_ADD(tb_order.orderdate, INTERVAL 2 DAY))
                AND tb_order.idstatus = 1
                ORDER BY orderdate DESC
              ";

      return $this->db->query($sql)->getResult();
    }
    
    public function getAllCanceledOrder(){
      $sql = "SELECT * FROM tb_umkm
                JOIN tb_order USING (idumkm)
                LEFT JOIN tr_discount USING (iddiscount)
                LEFT JOIN tr_statusorder USING (idstatus)
                LEFT JOIN tr_prodcat USING (idprodcat)
                LEFT JOIN tr_grouporder USING (idgrouporder)
                WHERE tb_order.idstatus = 9 
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

    public function countOrderByUmkm($idumkm){
      $sql = "SELECT count(idorder) as hitung FROM tb_order WHERE idumkm = $idumkm";
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

    public function getOrderByCs($idcs){
      $sql = "SELECT * FROM tb_umkm
                JOIN tb_order USING (idumkm)
                LEFT JOIN tr_discount USING (iddiscount)
                LEFT JOIN tr_statusorder USING (idstatus)
                LEFT JOIN tr_prodcat USING (idprodcat)
                LEFT JOIN tr_grouporder USING (idgrouporder)
                WHERE idcs = $idcs
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

    public function reqReviewCsByDesigner($idorder){
      $builder = $this->db->table('tb_order');
      $builder->set('idstatus', 5);
      $builder->where('idorder', $idorder);
      $builder->update();
    }

    public function reqRevision($idorder){
      $builder = $this->db->table('tb_order');
      $builder->set('idstatus', 7);
      $builder->where('idorder', $idorder);
      $builder->update();
    }

    public function cancelOrderById($idorder, $idcs){
      $builder = $this->db->table('tb_order');
      $builder->set('idstatus', 9);
      $builder->set('idcs', $idcs);
      $builder->where('idorder', $idorder);
      $builder->update();
    }

    public function uploadPreview($dataset, $idorder){
      $builder = $this->db->table('tb_order');
      $builder->where('idorder', $idorder);
      $builder->update($dataset);
    }

    public function sendReviewByUmkm($dataset, $idorder){
      $builder = $this->db->table('tb_order');
      $builder->where('idorder', $idorder);
      $builder->update($dataset);
    }
    
    public function addDepositDesigner($dataset){
      $builder = $this->db->table('tb_deposit');
      $builder->insert($dataset);
    }

    public function getDailyIncomes(){
      $sql = "SELECT SUM(tr_grouporder.price) as daily_incomes FROM tb_order 
        LEFT JOIN tr_grouporder USING (idgrouporder) 
        WHERE YEAR(orderdate) = ".date('Y')." 
        AND MONTH(orderdate) = ".date('m')." 
        AND DAY(orderdate) = ".date('d')."
        AND idstatus = 8";

      return $this->db->query($sql)->getResult();
    }

    public function getAllIncomes(){
      $sql = "SELECT * FROM tb_order JOIN tr_grouporder USING (idgrouporder) WHERE idstatus = 8";
      return $this->db->query($sql)->getResult();
    }

    public function getTotalIncomes(){
      $sql = "SELECT sum(tr_grouporder.price) AS incomes FROM tb_order 
        JOIN tr_grouporder USING (idgrouporder)
        WHERE idstatus = 8
        ORDER BY orderdate DESC";
      return $this->db->query($sql)->getResult();
    }

    public function getAllCsRating(){
      $sql = "SELECT ROUND(AVG(csrating)) AS csrate FROM tb_order WHERE idstatus = 8";
      return $this->db->query($sql)->getResult();
    }

    public function getAllDesignerRating(){
      $sql = "SELECT ROUND(AVG(designerrating)) AS desrate FROM tb_order WHERE idstatus = 8";
      return $this->db->query($sql)->getResult();
    }

    public function getAllClosedOrder(){
      $sql = "SELECT count(idorder) AS hitung FROM tb_order where idstatus = 8";
      return $this->db->query($sql)->getResult();
    }

    public function getTop10Cs(){
      $sql = "SELECT tb_user.iduser AS iduser, tb_cs.name AS cs_name, tb_cs.cs_pic AS cs_pic, ROUND(AVG(tb_order.csrating)) AS rating, count(tb_order.idcs) AS total_transaksi 
        FROM tb_cs JOIN tb_order USING (idcs)
        JOIN tb_user USING (iduser) 
        GROUP BY cs_name 
        ORDER BY rating, total_transaksi
        LIMIT 10";

      return $this->db->query($sql)->getResult();
    }

    public function getTop10Designer(){
      $sql = "SELECT tb_user.iduser AS iduser, tb_designer.name AS designer_name, tb_designer.designer_pic AS designer_pic, ROUND(AVG(tb_order.designerrating)) AS rating, count(tb_order.iddesigner) AS total_transaksi 
        FROM tb_designer JOIN tb_order USING (iddesigner)
        JOIN tb_user USING(iduser) 
        GROUP BY designer_name 
        ORDER BY rating, total_transaksi
        LIMIT 10";

      return $this->db->query($sql)->getResult();
    }

    public function getRepByIddesigner($iddesigner){
      $sql = "SELECT idorder, designerrating, reviewdesigner FROM tb_order WHERE idstatus = 8 AND iddesigner = $iddesigner";
      return $this->db->query($sql)->getResult();
    }
	}

?>