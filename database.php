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
    https://laravel.com/docs/8.x/migrations
    $table->id('id_venda');
    $table->unsignedBigInteger('cliente');
    $table->string('produto');
    $table->integer('preco');
    $table->timestamps();
    $table->foreign('cliente')->references('id_cliente')->on('usuario');
