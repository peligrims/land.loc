<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //
    
    public function execute() {
		
		
		if(view()->exists('admin.portfolio')) {
			
			$portfolio = \App\Portfolio::all();
			
			$data = [
					
					'title' => 'Страницы',
					'portfolio' => $portfolio
					
					];
			
			return view('admin.portfolio',$data);		
			
		}
		
		abort(404);
	}
}
