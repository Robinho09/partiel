<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gestion des utilisateurs</title>
    <link href="<?= $serverProjectName ?>/dist/CSS/style.css" rel="stylesheet">
    <link href="<?= $serverProjectName ?>/dist/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: #f6f5f3">

<table class="table">

    <thead>
    <td><b>Nom d'utilisateur</b></td>
    <td><b>Email</b></td>
    <td><b>Date_inscription</b></td>
    </thead>
    <tbody>

    <?php
    if (isset($values['users'])) {
        foreach ($values['users'] as $users) {
            ?>
            <tr>
                <td><?= $users['username'] ?></td>
                <td><?= $users['email'] ?></td>
                <td><?= $users['date_inscription'] ?></td>
                <td>
                    <button class="btn btn-primary btn-xs" data-title="Show"
                            data-id="<?= implode($user, ";") ?>" data-toggle="modal"
                            title="afficher plus d'informations"
                            data-target="#show">
                        <span class="glyphicon glyphicon-list-alt"></span>
                    </button>
                    <button class="btn btn-info btn-xs" data-title="Sendmesg" data-toggle="modal"
                            title="envoyé un message"
                            data-target="#sendmesg" data-id="<?= $user['id'] . ';' . $user['username'] ?>">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </button>
                    <?php

                    if (strcmp($_SESSION['date_inscription'],"admin")==0) {
                        if ((strcmp($user['date_inscription'], 'admin') == 0)) {
                            ?>
                            <button class="btn btn-success btn-xs" data-title="Rendreadmin" data-toggle="modal"
                                    disabled data-target="#rendreadmin"
                                    data-id="<?= $user['id'] . ';' . $user['username'] ?>">
                                <span class="glyphicon glyphicon-user"></span>
                            </button>
                            <?php
                        } else {
                            ?>
                            <button class="btn btn-success btn-xs" data-title="Rendreadmin" data-toggle="modal"
                                    title="rendre administrateur"
                                    data-target="#rendreadmin"
                                    data-id="<?= $user['id'] . ';' . $user['username'] ?>">
                                <span class="glyphicon glyphicon-user"></span>
                            </button>
                            <?php
                        }
                        if ($user['etat']) {
                            ?>
                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                    title="supprimer ou suspendue"
                                    data-id="<?= $user['id'] . ';' . $user['username'] ?>"
                                    data-target="#delete">
                                <span class="glyphicon glyphicon-ban-circle"></span>
                            </button>
                            <?php
                        } else {
                            ?>
                            <button class="btn btn-warning btn-xs" data-title="Debloquer" data-toggle="modal"
                                    title="débloquer l'utilisateur"
                                    data-id="<?= $user['id'] . ';' . $user['username'] ?>"
                                    data-target="#debloquer">
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>


    </tbody>

</table>



<script type="text/javascript" src="<?= $serverProjectName ?>/dist/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?= $serverProjectName ?>/dist/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $serverProjectName ?>/dist/javascript/scriptModal.js"></script>
</body>
</html>
