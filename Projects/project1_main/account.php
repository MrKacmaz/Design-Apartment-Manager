<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <header class="header">
        <div class="welcome">
            <p id="welcome"> Account Page</p>
        </div>
    </header>



    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
        <ul class="nav-ul">
            <li class="nav-ul-li"><a href="main.html">MAIN</a></li>
            <li class="nav-ul-li"><a href="information.html">INFORMATION</a></li>
            <li class="nav-ul-li"><a href="to-do.html">TO/DO</a></li>
            <li class="nav-ul-li"><a href="complaint.html">COMPLAINT</a></li>
            <li class="nav-ul-li"><a href="account.html">ACCOUNT</a></li>
            <li class="nav-ul-li"><a href="log.html">LOG-OUT</a></li>
        </ul>
    </nav>





    <main class="main-content">
        <div class="main-item">
            <h2>Account Transactions</h2>
            <p>You can change or update your account information.</p>
        </div>
    </main>

    <main class="main-content">
        <div class="main-item-3">
            <h2>Your Information is ;</h2>
            <p class="input-3">User name</p>
            <p class="input-3">Name</p>
            <p class="input-3">Surname</p>
            <p class="input-3">Phone</p>
            <p class="input-3">Email</p>
        </div>
    </main>


    <main class="main-content">
        <div class="main-item-2">
            <form action="#">
                <label for="username">User name</label>
                <input type="text" name="username" id="username" class="input" required><br><br>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="input" required><br><br>
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" class="input" required><br><br>
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="input" placeholder="555-555-55-55" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required><br><br>
                <label for="mail">E-mail</label>
                <input type="email" name="mail" id="mail" class="input" placeholder="asd@asd.com" required><br><br>
                <label for="password">Old Password</label>
                <input type="password" name="password" id="password" class="input" required><br><br>
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="input" required><br><br>
                <label for="submit"></label>
                <input type="submit" name="submit" id="submit" class="btn" required>
                <label for="reset"></label>
                <input type="reset" name="reset" id="reset" class="btn" required>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="links">
            <ul>
                <li class="link"><a href="https://www.linkedin.com/in/alperen-ka%C3%A7maz-2202/" title="LinkedIn"
                        target="_blanced"><img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTMdFqfhP3dTNKjtRennSsHXGUmiF9yJ2AfVQ&usqp=CAU"
                            height="50" width="50" alt="LinkedIn"></a></li>
                <li class="link"><a href="https://www.instagram.com/mr.kacmaz" title="Instagram" target="_blanced"><img
                            src="https://pazarlamasyon.com/wp-content/uploads/2018/01/new-instagram-logo-clipart-16.jpg"
                            height="50" width="50" alt="Instagram"></a></li>
                <li class="link"><a href="https://github.com/MrKacmaz" title="GitHub" target="_blanced"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSUP7RN0hZaqZpljtz9c0nz5eSc2DFY-XSRQA&usqp=CAU"
                            width="50" height="50" alt="GitHub"> </a></li>
            </ul>
        </div>

    </footer>
</body>

</html>