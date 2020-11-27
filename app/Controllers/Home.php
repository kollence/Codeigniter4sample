<?php namespace App\Controllers;

use App\Models\ClanciModel;

class Home extends BaseController
{
	public function index()
	{
		$model = new ClanciModel();
		$data = [
			'title' =>'Pocetna',
			'clanci' => $model->paginate(6, 'clanci'),
            'pager' => $model->pager
		];
		return view('pages/home', $data);
	}

	public function clanak($id)
	{
		$model = new ClanciModel();

		$clanak = $model->find($id);
        if ($clanak) {
		$galery = glob("uploads/posts/".$clanak['img_file']."/*.{jpg,gif,png}", GLOB_BRACE);

            $data = [
                'title' => $clanak['naslov'],
                'naslov' => $clanak['naslov'],
				'tekst' => $clanak['tekst'],
				'img_file' => $clanak['img_file'],
				'clanak' => $clanak,
                'galery' => $galery
            ];
             
        }else {
            $data = [
                'title' => 'Empty',
                'naslov' => 'Clanak prvo mora da se kreira',
                'tekst' => 'Logovati se pa kreirati prvo sadrzaj'
            ]; 

		}
		return view('pages/single', $data);
	}


	//--------------------------------------------------------------------

}
