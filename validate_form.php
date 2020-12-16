//validação 
  documentos: https://laravel.com/docs/8.x/validation
//validação de formularios com o $this->validate($request, [
  'nome_do_campo_no_formulario'=>'bail|required|min:3', //nome do campo e a regra e a barra vertical serve para separar as regras
]); se o bail estiver definido, no primeiro erro, ele retornará sem continuar o resto

ele retorna automaticamente uma variavel $errors contendo todos os erros


//criação de hashing de senhas
  para criar o hash
  $hashed = Hash::make('password', [
    'rounds' => 12,
  ]);
  para checkar o hash
  if (Hash::check('dado_do_formulario', $hashedPassword)) {
    // The passwords match...
  }
