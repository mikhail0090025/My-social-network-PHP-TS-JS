<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
    <div class="form-group">
        <form action="server.php" method="post">
            <div class="form-group">
                <label for="username">Write your username: </label>
                <input type="text" id="username" name="username" min="8" required>
            </div>
            <div class="form-group">
                <label for="password1">Come up with password: </label>
                <input type="text" id="password1" name="password1" min="8" required>
            </div>
            <div class="form-group">
                <label for="password2">Confirm password: </label>
                <input type="text" id="password2" name="password2" min="8" required>
            </div>
            <div class="form-group">
                <label for="birthday">Your birthday: </label>
                <input type="date" name="birthday" id="birthday" required>
            </div>
            <div class="form-group">
                <label for="bio">Bio: </label><br>
                <textarea name="bio" id="bio" cols="50" rows="5"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Registrate" class="btn btn-success" id="Registration" name="Registration">
                <input type="reset" value="Reset form" class="btn btn-danger">
            </div>
        </form>
        <p>Do you have an acoount? <a href="login.php">Login</a></p>
        <p>&copy</p>
    </div>
</body>
</html>