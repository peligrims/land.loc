<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    
    public function execute() {
		
		
		if(view()->exists('admin.service')) {
			
			$service = \App\service::all();
			
			$data = [
					
					'title' => 'Страницы',
					'service' => $service
					
					];
			
			return view('admin.service',$data);		
			
		}
		
		abort(404);
	}
}