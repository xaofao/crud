<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .form-field {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-type {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="file"] {
        pad

</head>
<body>
    <form><div class="form-field">
        <div class="form-type">
            <label for="name">Name:</label>
        <input type="name" name="name" placeholder="name">
       </div>
         <div class="form-type">
            <label for="email">Email:</label>
        <input type="email" name="email" placeholder="email">
        </div>
         <div class="form-type">
        <label for="imageUpload">Upload an image:</label>
  <input type="file" id="imageUpload" name="image" accept="image/*" required>
  <input type="submit" value="Submit">
    </form>
</body>
</html>