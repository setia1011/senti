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
        WHERE b.polarity IS NULL ORDER BY a.id ASC LIMIT 1")->getResultArray();
        return $res;
    }

    public function textStatus($id) {
        $db = \Config\Database::connect();
        $res = $db->query("SELECT 
            a.id dataset_id, 
            a.text, 
            b.polarity 
        FROM dataset a 
        LEFT JOIN polarity b ON a.id = b.dataset_id 
        WHERE a.id = '$id'")->getResultArray();
        return $res;
    }

    public function saveStatus($did, $pid) {
        $db = \Config\Database::connect();
        $cek = $db->query("SELECT * FROM polarity WHERE dataset_id = '$did'")->getResultArray();
        
        if (count($cek) > 0) {
            foreach ($cek as $c) {
                if ($c['polarity']) {
                    $q1 = $db->query("UPDATE polarity SET polarity = '$pid' WHERE dataset_id = '$did'");
                    if ($db->affectedRows() > 0) {
                        return 1;
                    }
                }
            }
        } else {
            $q2 = $db->query("INSERT INTO polarity (dataset_id, polarity) VALUES ('$did', '$pid')");
            if ($db->affectedRows() > 0) {
                return 1;
            }
        }
    }

    public function findText($id) {
        $db = \Config\Database::connect();
        $res = $db->query("SELECT 
            a.id dataset_id, 
            a.text, 
            b.polarity 
        FROM dataset a 
        LEFT JOIN polarity b ON a.id = b.dataset_id 
        WHERE a.id = '$id'")->getResultArray();
        return $res;
    }

    public function textTotal() {
        $db = \Config\Database::connect();
        $res = $db->query("SELECT COUNT(id) total FROM dataset")->getResultArray();
        if (count($res) > 0) {
            return $res[0]['total'];
        } else {
            return 0;
        }
    }

    public function textDone() {
        $db = \Config\Database::connect();
        $res = $db->query("SELECT COUNT(id) done FROM polarity")->getResultArray();
        if (count($res) > 0) {
            return $res[0]['done'];
        } else {
            return 0;
        }
    }

    public function userAuth($username, $password) {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $res = $db->query("SELECT * FROM user WHERE username = '$username'")->getResultArray();
        if (count($res) > 0) {
            if ($res[0]['password'] === $password) {
                unset($res[0]['password']);
                $res[0]['credential'] = true;
                $session->set(['userInfo' => $res[0]]);
                return 'Berhasil';
            } else {
                return "Password does't valid";
            }
        } else {
            return "Username does't not found";
        }
    }
}