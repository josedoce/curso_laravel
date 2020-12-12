//O route do laravel pode retornar qualquer tipo de dado atravês dessa estrutura:

//enviando dados:

Route::get('/about', function(){
	$animais = ['gato','cachorro','galinha','veado'];
	return $animais[0];
});

//renderizando views:

Route::get('/rota', function(){
	return view('nome_elemento_view');
});

//renderizando subviews:

Route::get('/admin',function(){
	return view('admin/admin');
});

//renderizando subvires utilizando ponto em vez da barra

Route::get('/admin',function(){
	return view('admin.admin');
});

//renderizando variaveis atraves das views

//forma indireta
Route::get('/admin',function(){
	$animais = [
		'mamifero'=>'Baleia',
		'reptil'=>'Cobra'
	];
	
	return view('admin.admin', $animais);
});

//forma direta
Route::get('/admin',function(){
	return view('admin.admin', [
		'mamifero'=>'Baleia',
		'reptil'=>'Cobra'
	]);
});
//forma de metodo
Route::get('/admin',function(){
	return view('admin.admin')->with('nome','valor');
});
