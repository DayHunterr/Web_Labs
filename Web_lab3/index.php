<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
<body>
	<form action="request1.php" method="get">
		<label for="publisher">Выберите издателя:</label>
		<select name="publisher" id="publisher">
			<?php
				include('connect.php');
				try {
                    $stmt = $dbh->query("SELECT DISTINCT literature.PUBLISHER FROM literature");
					$res = $stmt->fetchall();

					foreach($res as $row)
					{
						echo "<option value='$row[0]'>$row[0]</option>";
					}
				}
				catch(PDOException $ex) {
					echo $ex->GetMessage();
				}
			?>
		</select>
		<input type="submit" value="Найти издателя">
	</form>
	<form action="request2.php" method="get">
		<label for="dateStart">Выберите временной промежуток: от </label>
		<select name="dateStart" id="dateStart">
<?php
				include('connect.php');
				try {

                    $stmt = $dbh->query("SELECT literature.DAT FROM literature");
					$res = $stmt->fetchAll();

					foreach($res as $row)
					{
						echo "<option value='$row[0]'>$row[0]</option>";
					}

				}
				catch(PDOException $ex) {
					echo $ex->GetMessage();
				}
?>
        </select>
         до
        <select name="dateEnd" id="dateEnd">

<?php
				include('connect.php');
				try {

                    $stmt = $dbh->query("SELECT literature.DAT FROM literature");
					$res = $stmt->fetchAll();

					foreach($res as $row)
					{
						echo "<option value='$row[0]'>$row[0]</option>";
					}

				}
				catch(PDOException $ex) {
					echo $ex->GetMessage();
				}
?>
        </select>
		<input type="submit" value="Найти книги">
	</form>
    <form action="request3.php" method="get">
        <label for="author">Выберите автора </label>
        <select name="author" id="author">
            <?php
            include('connect.php');
            try {

                $stmt = $dbh->query("SELECT author.NAME FROM author ");
                $res = $stmt->fetchAll();

                foreach($res as $row)
                {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }

            }
            catch(PDOException $ex) {
                echo $ex->GetMessage();
            }
            ?>
        </select>
        <input type="submit" value="Найти книги автора">
	</form>
</body>
</html>
