<?php

namespace Partiel;
include 'Controller.php';

class ControllerAuthentification extends Controller
{

    public function ActionIndex()
    {
        if (($_POST)) {
            $useraccess = new UserAcess();
            $users = $useraccess->Authe($_POST['username'], $_POST['password']);
            if ($users) {
                if ($users['etat'] == 1) {
                    $_SESSION['id'] = $users['id'];
                    $_SESSION['email'] = $users['email'];
                    $_SESSION['username'] = $users['username'];
                    $_SESSION['password'] = $users['password'];
                    $_SESSION['date_inscription'] = $users['date_inscription'];
                    if (strcmp($_SESSION['date_inscription'], 'admin') == 0)
                        header('location:' . $this->getServerAndProjectName() . '/home/indexadmin');
                    else
                        header('location:' . $this->getServerAndProjectName() . '/home/index');
                } else {
                    return new View('viewdefault', array('err' => true, 'message1' => 'Problème d\'authentification!', 'message2' => 'Vous êtes suspendue'));
                }

            } else {
                return new View('viewdefault', array('err' => true, 'message1' => 'Problème d\'authentification!', 'message2' => 'Le nom d\'utilisateur ou le mot de passe incorrect'));
            }
        }
        if ($_SESSION) {
            if (strcmp($_SESSION['type'], 'admin') == 0)
                header('location:' . $this->getServerAndProjectName() . '/home/indexadmin');
            else
                header('location:' . $this->getServerAndProjectName() . '/home/index');

        }
        return new View('viewdefault');
    }

    public function ActionInscrire()
    {
        if ($_POST) {
            if (strcmp($_POST['register-submit'], 'Inscrire') == 0) {
                $useraccess = new UserAcess();
                $userexsiste = $useraccess->usernameexiste($_POST['username']);
                if (!$userexsiste) {
                    if (strcmp($_POST['password'], $_POST['cpassword']) == 0) {
                        $users = $useraccess->Insert(new \User($_POST['email'], $_POST['username'], $_POST['password'], 'date'));
                        if ($users) {
                            $_SESSION['id'] = $users;
                            $_SESSION['email'] = $_POST['email'];
                            $_SESSION['username'] = $_POST['username'];
                            $_SESSION['password'] = $_POST['password'];
                            $_SESSION['date_inscription'] = 'date';
                            header('location:' . $this->getServerAndProjectName() . '/home/index');
                        }
                    } else {

                        return new View('viewinscrire', array('err2' => true, $_POST, "mesg" => " <strong>Mot de pass incorrect !!</strong> vous avez saisie deux mot passe différent"));
                    }
                } else {
                    return new View('viewinscrire', array('err2' => true, $_POST, "mesg" => "Le nom d'utilisateur que vous avez saisie est déja réserve "));

                }
            }
        }
        return new View('viewinscrire');

    }

    public
    function ActionDeconnexion()
    {
        session_destroy();
        header('location:' . $this->getServerAndProjectName());
    }
}
