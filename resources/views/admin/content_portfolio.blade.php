<div style="margin:0px 50px 0px 50px;">   

@if($portfolio)
 
	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>filter</th>
				 <th>images</th>
                
                
               
            </tr>
        </thead>
        <tbody>
        
        @foreach($portfolio as $k => $portfolio)
        
        	<tr>
        	
        		<td>{{ $portfolio->id }}</td>
        		<td>{!! Html::link(route('pagesEdit',['portfolio'=>$portfolio->id]),$portfolio->name,['alt'=>$portfolio->name]) !!}</td>
        		<td>{{ $portfolio->filter }}</td>
        		<td>{{ $portfolio->images }}</td>
        		<td>{{ $portfolio->created_at }}</td>
        		
        		<td>
	        		{!! Form::open(['url'=>route('portfolioEdit',['portfolio'=>$portfolio->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

	        			{{ method_field('DELETE') }}
	        			{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
	        			
	        		{!! Form::close() !!}
        		</td>
        	</tr>
        
        @endforeach
        
		
        </tbody>
    </table>
@endif 

{!! Html::link(route('portfolioAdd'),'Новая страница') !!}
   
</div>