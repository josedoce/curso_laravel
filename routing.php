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

//passando um array multidimensional e lendo atravês de views
	//na view
foreach($funcionarios as $value) {
	echo $value['nome'] . " - " . $value['especialidade'] . "<br>";
};

	//na rota
Route::get('/medicos',function(){
	$medicos = [
					0=>[
							'nome'=>'Antônio',
							'especialidade'=>'Ortopodista'
						],
					1=>[
							'nome'=>'Carla',
							'especialidade'=>'Pediatra'
					],
					2=>[
							'nome'=>'Antônio',
							'especialidade'=>'Ginecologia'
					]
				];
	return view('medicos')->with('defina_variavel_a_ser_usada_na_view',$medicos);
});
//passando arrays independentes atraves do compact()
Route::get('/medicos',function(){
		
	$nomes = ['jose','joão','maria'];
	$sobrenomes = ['medeiros','oliveira','ferreira'];
	return view('medicos', compact('nomes','sobrenomes'));
});


//rotas com passagem de parametros

Route::get('/medico/{id}',function($id){
	return view('medicos')->with('listagem',$id);
});
 //Routes com múltiplos parâmetros e valores por defeito
Route::get('/dados/{id_usuario}/{data}',function($id_usuario,$data){
	return view('dados')->with('usuario',$id_usuario)->with('agendamento',$data);
});

//routes com parametros opcionais(para funcionar, defina um valor null para o callback)
Route::get('/dados/{id_usuario?}',function($id_usuario=null){
	return view('dados')->with('usuario',$id_usuario);
});
