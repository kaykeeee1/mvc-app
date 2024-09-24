<?php
class controller{
    //metodo para carregar o modelo 
    public function models($model){
        //requerer o arquivo modelo
        require_once '../app/models/'.$model.'.php';
        //retorna uma nova instancia do modelo 
        return new $model();
    }
    //metodo para carregar a view

    public function view($view, $data=[]){
        //requerer o arquivo view
        require_once '../app/views/'.$view.'.php';
    }
}
?>