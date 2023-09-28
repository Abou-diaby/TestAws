<?php
require_once('Dbconnect.php');


// Liste des enregistrements
$result = "";

$selecting = (new Dbconnect)->req(
        "SELECT `ID`,`NOM`, `PRENOM`, `TEL`,`EMAIL`,`DATECRE` FROM `participants`");
    
$listes= $selecting->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($listes as $e): ?>
    <tr>
        <td><?= $e['ID'] ?></td>
        <td><?= $e['NOM'] ?></td>
        <td><?= $e['PRENOM'] ?></td>
        <td><?= $e['TEL'] ?></td>
        <td><?= $e['EMAIL'] ?></td>
        <td><?= $e['DATECRE'] ?></td>
    </tr>
<?php endforeach; ?>

