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

//De Route para Controller e de Controller para View
	1-rota, crie os dados e mande para o controller!

		Route::get('tratar_usuario/{usuario}/{senha}','usuarioController@trateUsuario');
	
	2-controller, receba os dados da rota e mande para a view!
		
		class usuarioController extends Controller{	
		    //mande esses dados para a view
		    function trateUsuario($nome=null,$senha=null){
			//$nome e $senha vem da rota;
			$usuario_tratado = 'Bem vindo, '.$nome;
			$senha_tratada = md5($senha);
			return view('usuario',compact('usuario_tratado','senha_tratada'));
		    }
		}

	3-view, exiba para o usuario os dados tratados pelo controller

		//usuario
		echo '<p>usuario: '.$usuario_tratado.'</p>';
		//senha
		echo '<p>senha: '.$senha_tratada.'</p>';


//resources controller 
	criação automatica de CRUD
	php artisan make:controller --resource NomeController
	//associação ao controller
	Route::resource('usuarios','usuarioController');
	conexão ao crud
	php artisan route:list
