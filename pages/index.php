<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <form class="form" action="../traitement/inscription.php" methode="POST">
        <p class="title">WELCOME USER</p>
        <div class="flex">
            <label>
                <input class="input" type="text" name="name" required>
                <span>Name</span>
            </label>
            <label>
                <input class="input" type="text" name="gender" required>
                <span>Gender</span>
            </label>
        </div>  
        <label>
            <input class="input" type="email" name="email" required>
            <span>Email</span>
        </label> 
        <label>
            <input class="input" type="text" name="ville" required>
            <span>Ville</span>
        </label> 
        <label>
            <input class="input" type="password" name="password" required>
            <span>Password</span>
        </label>
        <label>
            <input class="input" type="date" name="naissance" required>
            <span>Birth Date</span>
        </label>
        <button class="submit">Submit</button>
        <p class="signin">Already have an acount ? <a href="#">Signin</a> </p>
    </form>
</body>
</html>
