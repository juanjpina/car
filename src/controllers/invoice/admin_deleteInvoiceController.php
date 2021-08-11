<?php
// dump($_GET['id']);
dump($_GET['db']);
dump($_GET['id']);

function delete(PDO $db, AltoRouter $router): void
{
    if (!empty($_GET['db']) && !empty($_GET['id']) ) {
        $data = ['id' => $_GET['id']];
        $sql = 'DELETE FROM $_GET['db'] WHERE id = :id';
        $request = $db->prepare($sql);
        $request->execute($data);

        // alert('La catégorie a bien été supprimé.');
        header('Location: ' . $router->generate('whiteadmin'));
        // $router->generate('addInvoiceMenu');
        die;
    }
}


if (!empty($_GET['db']) && !empty($_GET['id'])) {

    delete($db, $router);
}
