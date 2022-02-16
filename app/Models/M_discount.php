<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_discount extends Model	{
	 	protected $table      = 'tr_discount';
    protected $primaryKey = 'iddiscount';

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
    
    public function getAllDiscount(){
      $sql = "SELECT * FROM tr_discount";
      return $this->db->query($sql)->getResult();
    }

    public function getDiscountById($iddiscount){
      $sql = "SELECT * FROM tr_discount WHERE iddiscount = $iddiscount";
      return $this->db->query($sql)->getResult();
    }

    public function countDiscountByCode($discountcode){
      $sql = "SELECT count(iddiscount) as hitung FROM tr_discount WHERE discountcode = '$discountcode'";
      return $this->db->query($sql)->getResult();
    }

    public function insertDiscount($data){
      $builder = $this->db->table('tr_discount');
      $builder->insert($data);
    }

    public function aktifkanDiskon($iddiscount){
      $builder = $this->db->table('tr_discount');
      $builder->set('flag', 1);
      $builder->where('iddiscount', $iddiscount);
      $builder->update(); 
    }

    public function nonaktifkanDiskon($iddiscount){
      $builder = $this->db->table('tr_discount');
      $builder->set('flag', 0);
      $builder->where('iddiscount', $iddiscount);
      $builder->update(); 
    }
	}

?>