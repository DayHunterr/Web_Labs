<?php

include('connect.php');

$date_start = $_GET['dateStart'];
$date_end = $_GET['dateEnd'];

try {
    $sqlSelect = "SELECT literature.NAME,author.NAME,literature.YEAR,literature.LITERATE,resourse.IMG FROM literature JOIN resourse ON literature.FID_RES = resourse.Id JOIN book_authrs ON literature.Id = book_authrs.FID_BOOK JOIN author ON book_authrs.FID_AUTH = author.Id  WHERE DAT >= ? AND DAT <= ?";

    $stmt = $dbh->prepare($sqlSelect);

    $stmt->bindValue(1, $date_start);
    $stmt->bindValue(2, $date_end);
    $stmt->execute();
    $res = $stmt->fetchAll();

    echo "<table border='1'>";
    echo "<thead><tr><th>Name</th><th>Author</th><th>Year</th><th>Literate</th><th>IMG</th></tr></thead>";
    echo "<tbody>";

    foreach ($res as $row) {
        echo '<tr>';
        echo '<td>' . $row[0] . '</td>';
        echo '<td>' . $row[1] . '</td>';
        echo '<td>' . $row[2] . '</td>';
        echo '<td>' . $row[3] . '</td>';
        echo '<td style="text-align: center" >' .
            '<img  src = "data:image/png;base64,' . base64_encode($row[4]) . '" height = "100px"/>' .'</td>';
        echo '</tr>';
    }

    echo "</tbody>";
    echo "</table>";
} catch (PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;

