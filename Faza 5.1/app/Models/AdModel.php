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
        $ads = $this->like('title', $searched)
                    ->orLike('text', $searched)->findAll();
        $i = 0;
        foreach ($ads as $ad)
        {
            if ($ad->isValid == false)
            {
                unset($ads[$i]);
            }
            $i++;
        }
        
        return $ads;
    }
    
    public function getAds($field, $value, $valid = false) 
    {
        $ads = $this->where($field, $value)->findAll();
        
        $i = 0;
        
        if ($valid == true)
        {
            return $ads;
        }
        
        
        foreach ($ads as $ad)
        {
            if ($ad->isValid == false)
            {
                unset($ads[$i]);
            }
            $i++;
        }
        
        return $ads;
    }
}