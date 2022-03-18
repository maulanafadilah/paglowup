<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_bank extends Model	{
	 	protected $table      = 'tb_bank';
    protected $primaryKey = 'idbank';

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
    
    public function getAllBank(){
      $sql = "SELECT * FROM tb_bank";
      return $this->db->query($sql)->getResult();
    }

    public function getAllActiveBank(){
      $sql = "SELECT * FROM tb_bank WHERE flag = 1";
      return $this->db->query($sql)->getResult();
    }

    public function countBankByRek($bankaccnumber){
      $sql = "SELECT count(idbank) as hitung FROM tb_bank WHERE bankaccnumber = '$bankaccnumber'";
      return $this->db->query($sql)->getResult();
    }

    public function getBankById($idbank){
      $sql = "SELECT * FROM tb_bank WHERE idbank = $idbank";
      return $this->db->query($sql)->getResult();
    }

    public function insertBank($data){
      $builder = $this->db->table('tb_bank');
      $builder->insert($data);
    }

    public function aktifkanBank($idbank){
      $builder = $this->db->table('tb_bank');
      $builder->set('flag', 1);
      $builder->where('idbank', $idbank);
      $builder->update(); 
    }

    public function nonaktifkanBank($idbank){
      $builder = $this->db->table('tb_bank');
      $builder->set('flag', 0);
      $builder->where('idbank', $idbank);
      $builder->update(); 
    }
	}

?>