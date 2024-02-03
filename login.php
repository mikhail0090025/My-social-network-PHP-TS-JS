<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
    <div class="form-group">
        <form action="server.php" method="post">
            <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" id="username" name="username" min="8" required>
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="text" id="password" name="password" min="8" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-success" id="Login" name="Login">
                <input type="reset" value="Reset form" class="btn btn-danger">
            </div>
        </form>
        <p>Are you new here? <a href="registration.php">Registrate here</a></p>
    </div>
</body>
</html>