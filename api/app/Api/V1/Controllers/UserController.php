<?php namespace App\Api\V1\Controllers;

use App\Api\V1\Models\User;

class UserController extends BaseController {

	public function show($id)
    {
		$User = User::find($id);

		if(empty($User)){
			return $this->response->errorNotFound("User Not Found");
		}
		return $User;
	}
}
