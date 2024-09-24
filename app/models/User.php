<?php
//este arquivo sera responsavel por lidar com os dados dos usuarios.

class user{
    //Simulando a obtenção de dados do usuario
    public function getUsers(){
        // Em um caso real, voce teria a conexão com o banco de dados
        return[
            ['id'=>1,'nome'=>'joão','email'=>'joão@email.com'], 
            ['id'=>2, 'nome'=> 'maria','email'=>'maria@email.com'],
        ];
    }
}
?>