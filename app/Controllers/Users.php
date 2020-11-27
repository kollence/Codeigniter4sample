<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{

	
	
	public function login()
	{
		helper(['form']);
		$data = [
			'title' => 'Login'
		];
		if($this->request->getMethod() == 'post'){
			$rules = [
				'email' => 'required|max_length[40]|valid_email',
				'password' => 'required|min_length[6]|max_length[100]|someThingPass[email,password]',
				
			];
			$errors = [
				'password' => [
					'someThingPass' => 'Email or Password don\'t match'
				]
			];
			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else {
				$model = new UserModel();
				$user = $model->where('email', $this->request->getVar('email'))
							  ->first();
				
							  
				
				$this->userSession($user);
				// $session = session();
				// $session->setFlashdata('success', 'Hi '.$user['name']);
				return redirect()->to('dashboard');
			}

		}

		return view('pages/login', $data);
	}
	public function register()
	{
		helper(['form']);

		$data = [
			'title' => 'Register'
		];

		if($this->request->getMethod() == 'post'){
			$rules = [
				'name' => 'required|min_length[3]|max_length[30]',
				'email' => 'required|max_length[40]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[6]|max_length[100]',
				'confirmpassword' => 'matches[password]'
			];
			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else {
				$model = new UserModel();

				$newUser = [
					'name' => $this->request->getVar('name'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password')
				];
				$model->save($newUser);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration :)');
				return redirect()->to('/');
			}

		}

		return view('pages/register', $data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}

	private function userSession($user)
	{
		$data = [
			'id' => $user['id'],
			'name' => $user['name'],
			'email' => $user['email'],
			'isLogged' => true,
		];

		session()->set($data);

		return true;
	}

}
