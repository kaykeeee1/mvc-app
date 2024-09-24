<?php

class App {
    // Definir controlador e método padrão
    protected $controller = 'Usercontroller';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        // Obtem a URL e a transforma em um array 
        $url = $this->parse_url();       

        // Verifica se o controlador existe no diretório de controladores
        if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')) {
            // Define o controlador a partir da URL
            $this->controller = $url[0];
            // Remove o primeiro elemento do array (controlador) para continuar processando
            unset($url[0]);
        } 

        // Requerer o arquivo controlador
        require_once '../app/controllers/'.$this->controller . '.php';

        // Instanciando o controlador
        $this->controller = new $this->controller;

        // Verificar se existe o método (ação) no controlador a ser chamado
        if (isset($url[1]) && file_exists('../app/controllers/' . $url[1] . '.php')) {
            // Define o controlador a partir da URL
            $this->controller = $url[1];
            // Remove o primeiro elemento do array (controlador) para continuar processando
            unset($url[1]);
        }

        // Requer o arquivo do controlador
        require_once '../app/controllers/Usercontroller.php';

        // Instancia o controlador
        $this->controller = new $this->controller;

        // Verifica se existe o método (ação) no controlador a ser chamado
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            // Define o método (ação) a ser chamado
            $this->method = $url[1];
            // Remove o segundo elemento do array (método)
            unset($url[1]);
        }

        // Define os parâmetros restantes como parâmetros para o método
        $this->params = $url ? array_values($url) : [];

        // Chama o método do controlador com os seguintes parâmetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Função para quebrar a url em partes (controlador, método e parâmetro)
    public function parse_url() {
        if (isset($_GET['url'])) {
            // Remove barras extras e sanitiza a URL
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
