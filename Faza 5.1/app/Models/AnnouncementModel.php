<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table      = 'announcement';
    protected $primaryKey = 'idA';
   // protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $allowedFields = ['title', 'text', 'idAd', 'date'];
}