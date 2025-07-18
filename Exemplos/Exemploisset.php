<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $name = "Xenia";
        #$name = NULL;
        if (isset($name)) {
            echo "essa linha esta sendo impressa porque a variavel name possui o valo:$name. \n";
        }
    ?>
</body>
</html>