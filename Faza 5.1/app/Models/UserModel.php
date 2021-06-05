<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'idK';
   // protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $allowedFields = ['username', 'isValid', 'name','surname','mail','password','country','num','date','rating'];
}