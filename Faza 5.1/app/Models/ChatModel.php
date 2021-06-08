<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table      = 'chats';
    protected $primaryKey = 'idc';
   // protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $allowedFields = ['user_to', 'user_from', 'message', 'datetime', 'status'];
    
    public function getFriends($userId) 
    {
        $friends = $this->where('user_to', $userId)
                    ->orWhere('user_from', $userId)->findAll();
        $i = 0;
        $length = count($friends);
        while ($i < $length - 1) 
        {
            if (!isset($friends[$i]))
            {
                $i++;
                continue;
            }
            $j = $i + 1;
            while ($j < $length)
            {   
                if (!isset($friends[$j]))
                {
                    $j++;
                    continue;
                }
                
                if (($friends[$i]->user_to == $friends[$j]->user_to && $friends[$i]->user_from == $friends[$j]->user_from) || 
                     ($friends[$i]->user_to == $friends[$j]->user_from && $friends[$i]->user_from == $friends[$j]->user_to))
                {
                    unset($friends[$j]);
                    continue;
                }
                $j++;
            }
            $i++;
        }
        
        return $friends;
    }
    
    public function getChat($userId1, $userId2)
    {
        $chats = $this->where('user_to', $userId1)
                    ->orWhere('user_from', $userId1)->findAll();
        
        $i = 0;
        foreach ($chats as $chat)
        {   
            if (!($chat->user_to == $userId2 || $chat->user_from == $userId2))
            {
                unset($chats[$i]);
            }
            $i++;
        }
        
        return $chats;
    }
}