<?php

namespace App\Controllers;

class Dashboard_Page extends BaseController
{
	public function Dashboard()
	{
		$data = [
			'title' => 'Dashboard | Apotik Kita'
		];

		echo view('/Layout/Heading', $data);
		echo view('/Dashboard/Halaman/Dashboard');
	}

	//--------------------------------------------------------------------

}
