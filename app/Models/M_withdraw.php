<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_withdraw extends Model	{
	 	protected $table      = 'tb_withdraw';
    protected $primaryKey = 'idwithdraw';

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
    
    public function getAllWithdraw(){
      $sql = "SELECT tb_withdraw.*, tb_pengelola.name AS pengelola_name, tb_designer.name AS designer_name,
        tb_designer.bankname AS bankname,
        tb_designer.bankaccount AS bankaccount,
        tb_designer.bankaccname AS bankaccname
          FROM tb_withdraw LEFT JOIN tb_designer USING(iddesigner) 
          LEFT JOIN tb_pengelola USING(idpengelola)
        ORDER BY timerequest DESC";
      return $this->db->query($sql)->getResult();
    }

    public function getAllReqWithdraw(){
      $sql = "SELECT tb_withdraw.*, tb_pengelola.name AS pengelola_name, tb_designer.name AS designer_name,
        tb_designer.bankname AS bankname,
        tb_designer.bankaccount AS bankaccount,
        tb_designer.bankaccname AS bankaccname
          FROM tb_withdraw LEFT JOIN tb_designer USING(iddesigner) 
          LEFT JOIN tb_pengelola USING(idpengelola)
        WHERE tb_withdraw.status = 'Requested'
        ORDER BY timerequest";
      return $this->db->query($sql)->getResult();
    }

    public function getWithdrawByIdDesigner($iddesigner){
      $sql = "SELECT tb_withdraw.*, tb_pengelola.name AS pengelola_name, tb_designer.name AS designer_name,
        tb_designer.bankname AS bankname,
        tb_designer.bankaccount AS bankaccount,
        tb_designer.bankaccname AS bankaccname
          FROM tb_withdraw LEFT JOIN tb_designer USING(iddesigner) 
          LEFT JOIN tb_pengelola USING(idpengelola)
        WHERE iddesigner = $iddesigner
        ORDER BY timerequest DESC";
      return $this->db->query($sql)->getResult();
    }

    public function getReqWithdraw($iddesigner){
      $sql = "SELECT tb_withdraw.*, tb_pengelola.name AS pengelola_name, tb_designer.name AS designer_name,
        tb_designer.bankname AS bankname,
        tb_designer.bankaccount AS bankaccount,
        tb_designer.bankaccname AS bankaccname
          FROM tb_withdraw LEFT JOIN tb_designer USING(iddesigner) 
          LEFT JOIN tb_pengelola USING(idpengelola)
        WHERE iddesigner = $iddesigner
        AND tb_withdraw.status = 'Requested'
        ORDER BY timerequest";
      return $this->db->query($sql)->getResult();
    }

    public function getWithdrawById($idwithdraw){
      $sql = "SELECT tb_withdraw.*, tb_pengelola.name AS pengelola_name, tb_designer.name AS designer_name,
        tb_designer.bankname AS bankname,
        tb_designer.bankaccount AS bankaccount,
        tb_designer.bankaccname AS bankaccname
          FROM tb_withdraw LEFT JOIN tb_designer USING(iddesigner) 
          LEFT JOIN tb_pengelola USING(idpengelola) 
        WHERE idwithdraw = $idwithdraw";
      return $this->db->query($sql)->getResult();
    }

    public function getTotalIncomesByDesigner($iddesigner){
      $sql = "SELECT sum(tr_grouporder.price) AS incomes FROM tb_order 
        LEFT JOIN tr_grouporder USING(idgrouporder) 
        WHERE idstatus = 8 
        AND iddesigner = $iddesigner";
      return $this->db->query($sql)->getResult();
    }

    public function getDailyIncomesDesigner($iddesigner){
      $sql = "SELECT SUM(tr_grouporder.price) as daily_incomes FROM tb_order 
        LEFT JOIN tr_grouporder USING (idgrouporder) 
        WHERE YEAR(orderdate) = ".date('Y')." 
        AND MONTH(orderdate) = ".date('m')." 
        AND DAY(orderdate) = ".date('d')."
        AND idstatus = 8
        AND tb_order.iddesigner = $iddesigner";

      return $this->db->query($sql)->getResult();
    }

    public function getTotalOutcomesByDesigner($iddesigner){
      $sql = "SELECT sum(amount) as outcomes FROM tb_withdraw WHERE iddesigner = $iddesigner AND status = 'Confirmed'";
      return $this->db->query($sql)->getResult();
    }

    public function payDesigner($dataset, $idwithdraw){
      $builder = $this->db->table('tb_withdraw');
      $builder->where('idwithdraw', $idwithdraw);
      $builder->update($dataset);
    }

    public function requestWithdraw($dataset){
      $builder = $this->db->table('tb_withdraw');
      $builder->insert($dataset);
    }
	}

?>