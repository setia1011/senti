<?php

namespace App\Controllers;

use App\Models\ApiModel;

class Api extends BaseController {
    
    public function nextText() {
        $model = new ApiModel();
        $nextText = $model->nextText();
        return json_encode($nextText);
    }
}
