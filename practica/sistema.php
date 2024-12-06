<?php
    require_once("Autoload.php");

    $objUsuario = new Usuario();

    //Insertar usuario
    /*$inser = $objUsuario->insertUsuario("Carlos", "2646234348", "carlos@gmail.com", "hola");
    print_r($users);
    echo $inser;*/

    //Extrae  todos los registros
    $users = $objUsuario->getUsuarios();
    print_r("<pre>");
    print_r($users);
    print_r("</pre>");

    //Actualizar los registros
    $updateUsers = $objUsuario->updateUsers(1, "Marta", "123213123", "marta@gmail.com", "JAJAJAJ");
    echo $updateUsers;

    //Extraer un registro
    $user = $objUsuario->getUser(1);
    print_r("<pre>");
    print_r($user);
    print_r("</pre>");

    //Eliminar un registro
    $delete = $objUsuario->delUser(2);
    echo $delete;
?>