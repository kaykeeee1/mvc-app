<?php
// este é o controlador responsavel por interagir com o modelo de usarios e exibir as views relacionadas.

class Usercontroller extends controller
{
    //metodo padrão que será chamado na rota/users
    public function index()
    {
        //carregar o modelo de usuarios
        $userModel = $this->models("user");
        //obtem a lista de usuarios do modelo
        $users = $userModel->getUsers();
        //carrega a view 'users' passando os dados dos usuarios
        $this->view('userView', ['users' => $users]);
    }
}
