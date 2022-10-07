<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Reserved's page!</h1>
        </br>

        <?php
        if ($this->action == "getReserved" && (!isset($this->data) || !$this->data || sizeof($this->data) == 0)) {
            echo "<p>The reserved does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=Reserved&action=<?php echo isset($this->data['id']) ? "updateReserved" : "createReserved" ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($this->data['id']) ? $this->data['id'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input required type="text" value="<?php echo isset($this->data['brand']) ? $this->data['brand'] : null ?>" class="form-control" id="name" name="brand" aria-describedby="brand" placeholder="Enter brand">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Model</label>
                        <input required type="text" value="<?php echo isset($this->data['model']) ? $this->data['model'] : null ?>" class="form-control" id="lastName" name="model" aria-describedby="lastnameHelp" placeholder="Enter last name">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputPlate1">Plate</label>
                        <input required type="text" value="<?php echo isset($this->data['plate']) ? $this->data['plate'] : null ?>" class="form-control" id="plate" name="plate" aria-describedby="plateHelp" placeholder="Enter plate">
                        <small id="plateHelp" class="form-text text-muted">We'll never share your plate with anyone else.</small>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" value="<?php echo isset($this->data['year']) ? $this->data['year'] : null ?>" class="form-control" id="year" name="year" aria-describedby="YearHelp" placeholder="Enter Year">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" value="<?php echo isset($this->data['color']) ? $this->data['color'] : null ?>" class="form-control" id="color" name="color" aria-describedby="colorHelp" placeholder="Enter color">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="<?php echo "?controller=Reserved&action=getAllReserveds&action=getAllReserveds"; ?>">Return</a>
        </form>
    </div>
</body>

</html>