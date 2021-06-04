<?php

namespace App\Models;

use CodeIgniter\Model;

class AdModel extends Model
{
    protected $table      = 'ads';
    protected $primaryKey = 'idO';
   // protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $allowedFields = ['title', 'text', 'type', 'isValid', 'idK', 'category', 'date', 'state', 'country', 'img0', 'img1', 'img2', 'img3', 'img4'];
    
    public function search($searched) 
    {
        return $this->like('title', $searched)
                    ->orLike('text', $searched)->findAll();
    }
    
    public function getAds($field, $value) 
    {
        return $this->like($field, $value)->findAll();
    }
}