<?php

namespace App\Controllers;

use App\Models\ApiModel;

class Api extends BaseController {

    public function nextText() {
        $model = new ApiModel();
        $nextText = $model->nextText();
        if (count($nextText) > 0) {
            $nextText[0]['total'] = $model->textTotal();
            $nextText[0]['done'] = $model->textDone();
        }
        return json_encode($nextText);
    }

    public function textStatus() {
        $d = json_decode(file_get_contents("php://input"), TRUE);
        $id = $d['id'];
        $model = new ApiModel();
        $textStatus = $model->textStatus($id);
        return json_encode($textStatus);
    }

    public function saveStatus() {
        $d = json_decode(file_get_contents("php://input"), TRUE);
        $did = $d['did'];
        $pid = $d['pid'];
        $model = new ApiModel();
        $textStatus = $model->saveStatus($did, $pid);
        return json_encode($textStatus);
    }

    public function findText() {
        $d = json_decode(file_get_contents("php://input"), TRUE);
        $id = $d['id'];
        $model = new ApiModel();
        $textStatus = $model->findText($id);
        return json_encode($textStatus);
    }
}
