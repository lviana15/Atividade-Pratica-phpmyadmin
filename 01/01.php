<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercise 1</title>
</head>
<body>
<h1>Membros das Equipes</h1>
<?php
$host = 'localhost';
$user = 'aluno';
$passw = 'aluno';
$dbname = 'atv_prt_041_bd';


$conn = mysqli_connect($host, $user, $passw, $dbname) or die ("Unable to connect!");

$query = "SELECT membros.nome, membros.email, membros.nome_esc, escolas.estado, membros.funcao, equipes.nome_eqp FROM membros,escolas,equipes WHERE membros.nome_esc = escolas.nome_esc AND membros.num_eqp = equipes.num_eqp ";
$result = mysqli_query( $conn, $query ) or die ("Error in query");


while ( $row = mysqli_fetch_assoc( $result ) ) {
    $table[] = $row;
}

?>

<table>
    <tr>
        <td><strong>Membro</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Email</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Escola</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Estado</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Função</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Nome da Equipe</strong></td>
        <td width="10">&nbsp;</td>
    </tr>
    <?php

    if ($table) {
        foreach($table as $d_row) {

            ?>
            <tr>
                <td><?php echo($d_row["nome"]); ?></td>
                <td width="10">&nbsp;</td>
                <td><?php echo($d_row["email"]); ?></td>
                <td width="10">&nbsp;</td>
                <td><?php echo($d_row["nome_esc"]); ?></td>
                <td width="10">&nbsp;</td>
                <td><?php echo($d_row["estado"]); ?></td>
                <td><?php echo($d_row["funcao"]); ?></td>
                <td><?php echo($d_row["nome_eqp"]); ?></td>
            </tr>

            <?php
        }
    }
    ?>
</table>

<?php
mysqli_close($conn);
?>

</body>
</html>