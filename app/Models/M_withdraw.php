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
      $sql = "SELECT * FROM tb_withdraw";
      return $this->db->query($sql)->getResult();
    }

    public function getAllWithdrawFiltered(){
      $sql = "SELECT tb_withdraw.*, tb_pengelola.name AS pengelola_name, tb_designer.name AS designer_name,
        tb_designer.bankname AS bankname,
        tb_designer.bankaccount AS bankaccount,
        tb_designer.bankaccname AS bankaccname
          FROM tb_withdraw LEFT JOIN tb_designer USING(iddesigner) 
          LEFT JOIN tb_pengelola USING(idpengelola) 
        ORDER BY FIELD(status, 'requested'), timerequest;";
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

    public function payDesigner($dataset, $idwithdraw){
      $builder = $this->db->table('tb_withdraw');
      $builder->where('idwithdraw', $idwithdraw);
      $builder->update($dataset);
    }
	}

?>