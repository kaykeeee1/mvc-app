<?Php

class app{
    //definir controlador e método padrão
    protected $controller = 'UserControler';

    protected $method = 'index';

    protected $params = [];

    public function __construct(){
        //Obtem a URl e a transforma em um array 

        $url = $this-> parse_url();

        //verifica se o controlador existe no diretorio de controladores

        if(file_exists('../app/Controllers/'.$url[0].'.php'))
        {
            //Remove o primeiro elemento do array (controlador)para continuar o processando
            unset($user[0]);
        }
        //Requerer o arquivo controlador
        require_once '../app/controllers/'.$this->controller;
        //Instanciando o controlador
        $this->controller = new $this->controller;
        //Verifica se o controlador existe no diretorio de controladores

        //verificar se existe o método (ação) mp controlador a ser chamado
        if(file_exists('../app/controller/'.$url[0].'php')){
            //define o controlador a partir da URL
            $this->controller=$url[0];
            //remove o primeiro elemento do ARRAY (controlador)para continuar procssando
            unset($url[0]);
        }
        //requer o arquivo do controlador
        require_once '../app/controller/'.$this->controller.'.php';
        //instancia o controlador
        $this->controller = new $this->controller;

        //verifica se existe o método (ação) no controlador a ser chamado
    }
}
?>