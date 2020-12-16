// primeiramente será necessario criar uma classe(model) mailController
  comando php artisan make:mail nomeDoController
  
  Mail/EnvioDeEmails
  <?php
    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class EnvioDeEmails extends Mailable
    {
        use Queueable, SerializesModels;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct()
        {
            //
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->view('emails.index');
        }
    }

  
  depois crie um controller responsavel por enviar emails
  php artisan make:controller enviarEmail
  
    http/controller/RecuperacaoController
    <?php
        namespace App\Http\Controllers;

        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Mail;
        use App\Mail\EnvioDeEmails;

        class RecuperacaoController extends Controller
        {
          public function index(){
            //index
            return view('index');
          }
            public function EnviarPrimeiroEmail(){
              //apresentar a view inicial da aplicação
              Mail::to('para_quem_será_enviado')->send(new EnvioDeEmails());
              return 'Email enviado!';
            }
            public function EnviarSegundoEmail(){
              return 'segundo';
            }
            public function EnviarTerceiroEmail(){
              return 'terceiro';
            }
        }

  depois uma view com o conteudo do email onde sera acrescentado no model
  view/mail/index
      <h3>Email enviado para testes</h3>

      <p>Estamos indo bem, uhul!</p>
  
  depois crie a rota com a interface de pedido de envio de email
      routes/web
      <?php
          use Illuminate\Support\Facades\Route;

          /*
          |--------------------------------------------------------------------------
          | Web Routes
          |--------------------------------------------------------------------------
          |
          | Here is where you can register web routes for your application. These
          | routes are loaded by the RouteServiceProvider within a group which
          | contains the "web" middleware group. Now create something great!
          |
          */

          Route::get('/','RecuperacaoController@index');

          Route::get('/primeiro','RecuperacaoController@EnviarPrimeiroEmail');
          Route::get('/segundo','RecuperacaoController@EnviarSegundoEmail');
          Route::get('/terceiro','RecuperacaoController@EnviarTerceiroEmail');

          
documentos: https://laravel.com/docs/8.x/mail#plain-text-emails
depois configure o .env e coloque os dados de serviço de email

depois no model, importe use Illuminate\Support\Facedes\Mail;


//forma simples de enviar emails sem o model mailer ser importado
      basta colocar isso no controller e pronto
        Mail::send('emails.index',[],function($message){
                $message->to('438405ca4f-8c6f84@inbox.mailtrap.io');
                $message->subject('Este é o assunto da mensagem');
                $message->bcc('ocultar o chefe que recebe confirmação do envio');
                $message->cc('email do chefe que sabe sobre o envio');
          
          
        });

//envio de anexos pelo email
Mail::send('emails.file',[],function($message){
            $message->to('438405ca4f-8c6f84@inbox.mailtrap.io');
            $message->subject('Este é o assunto da mensagem');
            $message->attach(url('/teste.txt'),[
                'as'=>'name.txt', //tipo de conteudo
                'mime'=>'application/txt'
            ]);
        });
