1-para criar controler utiliza-se php artisan make:controller nome_do_controler função do controller é guardar a logica da aplicação

declare uma funcao publica com um retorno na class controller

public function getMedicos(){
    	//ir consultar o db {exemplo}
    	$medicos = ['jose','fernanda','maria'];
		  return $medicos;
}

e chame da seguinte forma no web.php em routes
            url        'use'  'classe' com(@) ' metodo'
Route::get('medicos',['uses'=>'medicosController@GetMedicos']);

chamando um metodo controller sem o public definido

Route::get('usuario', 'usuarioController@apresentarUsuario');

//pegando parametros do route con controller
defina o parametro a ser pego na rota
Route::get('usuario/{parametrocontroller}', 'usuarioController@apresentarUsuario');


depois coloque um parametro na função dentro do metodo no controller
function apresentarUsuario($parametrocontroler=null){
    	return "Estou na apresentacão do usuario: ".$nome;
}
