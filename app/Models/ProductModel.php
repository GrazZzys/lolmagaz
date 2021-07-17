<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'products';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['title', 'description', 'img_href', 'price'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function addProduct($myRequest)
    {
        $data = [
            'title' => $myRequest['title'],
            'description' => $myRequest['description'],
            'img_href' => $myRequest['img_href'],
            'price' => $myRequest['price'],
        ];

        $this->insert($data);
    }
    public function deleteProduct($id)
    {
        $res = $this->getProduct($id);
        $this->delete($id);
        return $res['img_href'];
    }
    public function getProduct($id = NULL)
    {
        if($id !== NULL)
            return $this->where('id', $id)->first();
        else{
            $res = $this->get();
            if($res->getRow())
                return $res;
        }
    }

}
