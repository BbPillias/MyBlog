<?php
require('src/controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        }
        elseif ($_GET['action'] == 'showComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                showComment($_GET['id']);
            }
            else
            {
                throw new Exception('Aucun identifiant de post modifié envoyé');
            }
        }
        elseif ($_GET['action'] == 'editComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['post_id']) && $_GET['post_id'] > 0)
            {
                if (!empty($_POST['comment'])) 
                {
                    editComment($_GET['id'],$_POST['comment'],$_GET['post_id']); 
                }
                else
                    {
                        throw new Exception('Tous les champs doivent être remplis');
                    }
            }
            else
            {
                throw new Exception('Impossible de récupérer l\'id');
            }
        }  
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
