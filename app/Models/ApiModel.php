<?php

namespace App\Models;
use CodeIgniter\Model;

class ApiModel extends Model {
    public function nextText() {
        $db = \Config\Database::connect();
            $res = $db->query("SELECT 
            a.id dataset_id, 
            a.text, 
            b.polarity 
        FROM dataset a 
        LEFT JOIN polarity b ON a.id = b.dataset_id 
        WHERE a.id = (SELECT MIN(id) FROM dataset) AND b.polarity IS NULL")->getResultArray();
        return $res;
    }
}