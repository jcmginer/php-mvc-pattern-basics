<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1>Reserved Dashboard page!</h1>
    <style type="text/css">

    </style>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">ID</th>
                <th class="tg-0pky">Brand</th>
                <th class="tg-0lax">Model</th>
                <th class="tg-0lax">Plate</th>
                <th class="tg-0lax">Year</th>
                <th class="tg-0lax">Color</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->data as $index => $reserved) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $reserved["id"] . "</td>";
                echo "<td class='tg-0lax'>" . $reserved["brand"] . "</td>";
                echo "<td class='tg-0lax'>" . $reserved["model"] . "</td>";
                echo "<td class='tg-0lax'>" . $reserved["plate"] . "</td>";
                echo "<td class='tg-0lax'>" . $reserved["year"] . "</td>";
                echo "<td class='tg-0lax'>" . $reserved["color"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=Reserved&action=getReserved&id=" . $reserved["id"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=Reserved&action=deleteReserved&id=" . $reserved["id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=Reserved&action=createReserved">Create</a>
    <a id="home" class="btn btn-secondary" href="./">Back</a>
</body>

</html>