<?php
// dump($_GET['id']);
// dump($_GET['delete']);

function delete(PDO $db, AltoRouter $router): void
{
    if (!empty($_GET['delete'])) {
        $data = ['id' => $_GET['id']];
        $sql = 'DELETE FROM invtoll WHERE id = :id';
        $request = $db->prepare($sql);
        $request->execute($data);

        // alert('La catégorie a bien été supprimé.');
        header('Location: ' . $router->generate('whiteadmin'));
        // $router->generate('addInvoiceMenu');
        die;
    }
}
delete($db, $router);
