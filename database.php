importante
    O que são migrations? migratio é uma forma simples de subir uma estrutura pre-pronta para o banco de dados, seja qual for.
    o que é possivel fazer com as migrations? é possivel fazer estruturas relacionais, e versionamento de estrutura de banco de dados de forma simples.
    
    alguns comandos basicos
    para upar a migração: php artisan migrate
    para criar uma migração não estruturada: php artisan make:migration nome_da_migracao
    para criar uma migração estruturada: php artisan make:migration nome_da_migracao create=nome_da_tabela
    para atualizar a estrutura: php artisan migrate:refresh
    para mais detalhes: php artisan make:migration -h
    
    
//metodos de criação de tabela na migração
    documento: https://laravel.com/docs/8.x/migrations
    $table->id('id_venda');
    $table->unsignedBigInteger('cliente');
    $table->string('produto');
    $table->integer('preco');
    $table->timestamps();
    $table->foreign('cliente')->references('id_cliente')->on('usuario');
    ao excluir migrações, é recomendavel fazer um dump do autoload da aplicaçao
    comando: composer dump-autoload
//querybuilder (muito verboso)
    documento: https://laravel.com/docs/8.x/queries
    Route::get('teste', function(){
    //para apagar dados do banco de dados
        DB::table('cliente')->delete();
	//pegar todos os registros da bd
		//$dados = DB::table('cliente')->get();
	//pegar registro especifico
		$dados = DB::table('cliente')->where('nome_cliente','joao')->get();
		if(empty($dados[0])){
			return 'Nenhum dado foi encontrado.'; //retorna dado não encontrado se o array estiver vazio
		}else{
			return $dados; //retorna dados se o array não estiver vazio
		}
    });
//seeding
    documento: https://laravel.com/docs/8.x/seeding
    comando:
    php artisan make:seeder nome_da_seederTableSeeder /para criar uma seed
    php artisan db:seed /para rodar todas as seeds
    php artisan db:seed class=nomedaseed /para rodar uma seed especifica
    class ClientesTableSeeder extends Seeder
    {
        public function run()
        {	
            $nomes = ['joao','antonio','jose','larissa','fernanda','ricardo','vitoria','carlota'];
            $cidades = ['recife','são paulo','rio de janeiro','campinas','tocantins','terezina','limoeiro','distrito federal'];

            for($i=0;$i<count($nomes);$i++){
                $dados = [
                    'nome_cliente'=>$nomes[$i],
                    'cidade'=>$cidades[$i]
                ];

                DB::table('cliente')->insert($dados);
            }
        }
    }

//tinker o console do laravel para testes de comandos database
                comandos: php artisan tinker
        exemplo:  DB::table('cliente')->get(); irá funcionar no shell tinker, é bom para testes
                  DB::table('cliente')->where('id_cliente',19)->get();
        exercicios: 
        	insira db
//querybuilder exercicios
		    documento: https://laravel.com/docs/8.x/queries
	use Illuminate\Support\Facades\DB; //obirgatorio colocar no controller 
	//seleciona uma coluna select() aceita
	    // um ou mais cmapos //$dados = DB::table('clientes')->select('nome')->get();
	    // $dados = DB::table('clientes')
	    //     ->where('id_cliente', '=',$id)
	    //     ->select('email')
	    //     ->get();
		$dados = DB::table('clientes')
		    ->where('cidade','Petrópolis')
		    ->where('nome','Antonio')
		    ->get();
		    
		    
//eloquente ORM
	Criando uma migration e um model com : php artisan make:model vendas -m
		   os models ficam na pasta app
		    cuidado com os s
		    
//eloquente Orm relação entre model e table
	importando o model
		use App\cliente;
		//query builder
	//$dados = DB::table('clientes')->get();
		//eloquente orm
	$dados = cliente::where('nome','Joao')->get();
		    
