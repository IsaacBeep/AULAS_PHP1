<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $name = "Stefanie Hatcher";
        $length = strlen($name);
        $cmp = strcmp ($name, "Brian Le");
        $index = strpos ($name, "e");
        $first = substr ($name, 9, 5);
        $name = strtoupper($name);
        echo $name; 
        echo $length; 
        echo $cmp; 
        echo $index; 
        echo $first; 
    ?>
</body>
</html>