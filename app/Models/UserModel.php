<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'user_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['user_name', 'user_mail', 'user_password', 'session_id'];

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

	public function registerUser($myRequest): int
    {
        $data = [
            'user_name' => $myRequest['name'],
            'user_mail' => $myRequest['email'],
            'user_password' => $myRequest['password'],
            'session_id' => session_id()
        ];

        $this->insert($data);

        return $this->insertID;
    }
    public function loginUser($myRequest)
    {
        $res = $this->where('user_mail', $myRequest['email'])->first();

            if ($res['user_password'] == $myRequest['password'])
                $this->update($res['user_id'], ['session_id' => session_id()]);

        return $res['user_id'];
    }
    public function getUser($id)
    {
        return $this->where('user_id', $id)->first();
    }

    public function changeUserData($id, $myRequest)
    {
        if ($myRequest['newPassword'])
            $data = [
                'user_name' => $myRequest['newName'],
                'user_mail' => $myRequest['newEmail'],
                'user_password' => $myRequest['newPassword'],
            ];
        else
            $data = [
                'user_name' => $myRequest['newName'],
                'user_mail' => $myRequest['newEmail'],
            ];

        $res = $this->update($id, $data);
        if ($res)
            return 1; //Успешно
        else
            return 0; //Не успешно
    }
}
