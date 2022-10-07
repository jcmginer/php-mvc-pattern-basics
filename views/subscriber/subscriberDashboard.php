<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1>Subscriber Dashboard page!</h1>
    <style type="text/css">

    </style>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">ID</th>
                <th class="tg-0pky">Brand</th>
                <th class="tg-0lax">Model</th>
                <th class="tg-0lax">Plate number</th>
                <th class="tg-0lax">Year</th>
                <th class="tg-0lax">Color</th>
                <th class="tg-0lax">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->data as $index => $subscriber) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $subscriber["id"] . "</td>";
                echo "<td class='tg-0lax'>" . $subscriber["brand"] . "</td>";
                echo "<td class='tg-0lax'>" . $subscriber["model"] . "</td>";
                echo "<td class='tg-0lax'>" . $subscriber["plate"] . "</td>";
                echo "<td class='tg-0lax'>" . $subscriber["year"] . "</td>";
                echo "<td class='tg-0lax'>" . $subscriber["color"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=Subscriber&action=getSubscriber&id=" . $subscriber["id"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=Subscriber&action=deleteSubscriber&id=" . $subscriber["id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=Subscriber&action=createSubscriber">Create</a>
    <a id="home" class="btn btn-secondary" href="./">Back</a>
</body>

</html>