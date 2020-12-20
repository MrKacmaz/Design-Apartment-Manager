<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="css/log-in.css">
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-b" onclick="login()">Log-in</button>
                <button type="button" class="toggle-b" onclick="register()">Register</button>
                <button type="button" class="toggle-b" onclick="admin()">Admin</button>
            </div>

            <form id="log-in" class="input-group">

                <input type="text" class="input-field" placeholder="User Name" required>
                <input type="password" class="input-field" placeholder="Password" required>
                <input type="checkbox" class="chechk-box"><span>Remember Me</span>
                <button type="submit" class="submit-b">Log-in</button><br><br>
            </form>

            <form id="register" class="input-group">

                <input type="text" class="input-field" placeholder="Name" required>
                <input type="text" class="input-field" placeholder="Surname" required>
                <input type="text" class="input-field" placeholder="Username" required>
                <input type="number" class="input-field" placeholder="Flat No (1-8)" pattern="[0-8]{1}" required>
                <input type="text" class="input-field" placeholder="P.Number (555-555-55-55)" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
                <input type="text" class="input-field" placeholder="Email (asd@asd.com)" required>
                <input type="password" class="input-field" placeholder="Password" required>
                <input type="checkbox" class="chechk-box"><p id="terms">I agree to the terms</p>
                <button type="button" class="submit-b" onclick="window.location.href = 'main.html'">Register</button>
            </form>

            <form id="admin" class="input-group">

                <input type="text" class="input-field" placeholder="Admin ID" required>
                <input type="password" class="input-field" placeholder="Password" required>
                <br><br><button type="submit" class="submit-b">Log-in</button><br><br>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("log-in");
        var y = document.getElementById("register");
        var a = document.getElementById("admin");
        var z = document.getElementById("btn");
        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            a.style.left = "850px";
            z.style.left = "0px";
        }
        function register() {
            x.style.left = "-480px";
            y.style.left = "50px";
            a.style.left = "450px"
            z.style.left = "110px";
        }
        function admin(){
            x.style.left = "-1210px";
            y.style.left = "-350px";
            a.style.left = "50px";
            z.style.left = "220px";
        }
    </script>

</body>

</html>