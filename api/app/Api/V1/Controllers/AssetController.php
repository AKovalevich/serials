<?php namespace App\Api\V1\Controllers;

use Share\Asset;

class AssetController extends BaseController {

    public function show($id)
    {
        $asset = Asset::find($id);

        if (empty($asset)){
            return $this->response->errorNotFound("User Not Found");
        }

        return $asset;
    }
}


