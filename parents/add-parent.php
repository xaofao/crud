<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parent</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="database.php" method="POST">
    <h2> Parents Data</h2>
        <div class="form-field">
        <input type="text" name="name" placeholder="name">
        </div>
       
        <div class="form-field">
        <input type="email" name="email" placeholder="email">
        </div>
         <div class="form-field">
        <input type="number" name="contact" placeholder="contact">
        </div>
        <input type="hidden" name="add_parent" value="1">
        <input type="submit" value="submit">
    </form>
</body>
</html>