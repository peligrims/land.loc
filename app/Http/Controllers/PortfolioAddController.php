<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioAddController extends Controller
{
    //
    
    public function execute(Request $request) {
    	
    	if($request->isMethod('post')) {
		
			$input = $request->except('_token');
			
			
			$massages = [
			
				'required'=>'Поле :attribute обязательно к заполнению',
				'unique'=>'Поле :attribute должно быть уникальным'
			
			];
			
			
			$validator = Validator::make($input,[
			
				'name' => 'required|max:255',
				'filter'=> 'required'
			
			], $massages);
			
			if($validator->fails()) {
				return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
			}
		
			if($request->hasFile('images')) {
				$file = $request->file('images');
			
				$input['images'] = $file->getClientOriginalName();
				
				$file->move(public_path().'/assets/img',$input['images']);
			
			}
			
			$portfolio = new Portfolio();
			
			
			//$portfolio->unguard();
			
			$portfolio->fill($input);
			
			if($portfolio->save()) {
				return redirect('admin')->with('status','Страница добавлена');
			}
			
		}
    	
    
		if(view()->exists('admin.portfolio_add')) {
			
			$data = [
					
					'title' => 'Новая страница'
					
					];
			return view('admin.portfolios_add',$data);		
			
		}
		
		abort(404);
		
		
	}
}
