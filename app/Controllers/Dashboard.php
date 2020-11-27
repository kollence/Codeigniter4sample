<?php namespace App\Controllers;

use App\Models\ClanciModel;


class Dashboard extends BaseController
{
	public function index()
	{
		$model = new ClanciModel();
		$data = [
			'title' =>'Dashboard',
			'clanci' => $model->paginate(8, 'dashboard'),
			'pager' => $model->pager
        ];
		return view('pages/dashboard', $data);
	}

	public function clanak($id)
	{
		$model = new ClanciModel();

		$clanak = $model->find($id);
        if ($clanak) {
		$galery = glob("uploads/posts/".$clanak['img_file']."/*.{jpg,gif,png}", GLOB_BRACE);

            $data = [
                'clanak' => $clanak,
				'title' => $clanak['naslov'],
				'naslov' => $clanak['naslov'],
				'tekst' => $clanak['tekst'],
				'img_file' => $clanak['img_file'],
				'galery' => $galery
				];
             
        }else {
            $data = [
                'title' => 'Empty',
                'naslov' => 'Clanak prvo mora da se kreira',
				'tekst' => 'Logovati se pa kreirati prvo sadrzaj',
				
            ]; 

		}
		return view('pages/single', $data);
	}
    
    public function create()
    {
        $data = [
			'title' =>'Create'
		];
		helper(['form']);

		if($this->request->getMethod() == 'post') {
			$rules = [
				'naslov' => 'required',
				'tekst' => 'required',
				'file' => [
					'rules' => 'uploaded[file.0]|is_image[file]',
					'label' => 'Image',
					'errors' => [
						'is_image' => 'Choosen file need to be an Image',
						'max_size' => 'Size of file is too large, need to be less then 50mb',
						'uploaded' => 'You need to press button Choose File and add Image from your device',
						'max_dims' => 'Too big'
					]
				]
			];
			if ($this->validate($rules)) {
				// FOR MULTIPLE FILES
				$rand =  substr(str_shuffle(MD5(microtime())), 0, 10);
				
				$path = './uploads/posts/'.$rand.'/';
                $model = new ClanciModel();
                $newClanak = [

					'naslov' => $this->request->getVar('naslov'),
					'tekst' => $this->request->getVar('tekst'),
					'img_file' => $rand
				];
				$model->save($newClanak);
				
                $files = $this->request->getFiles();
				foreach($files['file'] as $file) {
					if($file->isValid() && !$file->hasMoved()){

						$file->move($path);
						// $fileName = $file->getName();

					}
				}
				
				// $data['success'] = $this->success();
				return redirect()->to('/dashboard');

			}else {
				$data['err_valid'] = $this->validator;
			}
			
			return redirect()->to('/dashboard');

		}

		return view('pages/create', $data);
	}

	public function edit($id)
	{
		$model = new ClanciModel();
		helper(['form']);

		$clanak = $model->find($id);
		$galery = glob("uploads/posts/".$clanak['img_file']."/*.{jpg,gif,png}", GLOB_BRACE);
		$data = [
			'clanak' => $clanak,
			'title' => 'Edit',
			'naslov' => $clanak['naslov'],
			'tekst' => $clanak['tekst'],
			'img_file' => $clanak['img_file'],
			'galery' => $galery
		];

		if($this->request->getMethod() == 'post') {
			$rules = [
				'naslov' => 'required',
				'tekst' => 'required',
				'file' => [
					'rules' => 'is_image[file]',
					'label' => 'Image',
					'errors' => [
						'is_image' => 'Choosen file need to be an Image',
						'max_size' => 'Size of file is too large, need to be less then 50mb',
						'max_dims' => 'Too big'
					]
				]
			];
			if ($this->validate($rules)) {
				// FOR MULTIPLE FILES
				$model = new ClanciModel();
				
				$path = './uploads/posts/'.$clanak['img_file'].'/';
                
                $newClanak = [

					'naslov' => $this->request->getVar('naslov'),
					'tekst' => $this->request->getVar('tekst'),
				];
				$model->update($id,$newClanak);
				
                $files = $this->request->getFiles();
				foreach($files['file'] as $file) {
					if($file->isValid() && !$file->hasMoved()){

						$file->move($path);
						// $fileName = $file->getName();

					}
				}
				$galery = glob("uploads/posts/".$clanak['img_file']."/*.{jpg,gif,png}", GLOB_BRACE);

				$data['galery'] = $galery;
				$data['success'] = $this->success();
				return view('pages/create', $data);
			}else {
				$data['err_valid'] = $this->validator;
			}
			

		}
		return view('pages/create', $data);
	}

	public function removeimg()
	{
		if (array_key_exists('delete_file', $_POST)) {
			$filename = $_POST['delete_file'];
			if (file_exists($filename)) {
			  unlink($filename);
			  return redirect()->back();
			} else {
			  echo 'Could not delete '.$filename.', file does not exist';
			}
		  }
	}


	public function delete($id)
    {
        $model = new ClanciModel();

		$clanak = $model->find($id);
		

		
        if($clanak) {
			$file = './uploads/posts/'.$clanak['img_file'];
		if(is_dir($file)){
			$dir_hand = opendir($file);
			if($dir_hand){
				while($img = readdir($dir_hand)){
					if($img != '.' && $img != '..'){
						if(!is_dir($file.'/'.$img))
							unlink($file.'/'.$img);
					}
				}
			}	
			closedir($dir_hand);
			rmdir($file);
		}
		$model->delete($id);
		return redirect()->to($_SERVER['HTTP_REFERER']); 
        }
    }

	function success() {
		return 'You have successfuly save data';
	}

}