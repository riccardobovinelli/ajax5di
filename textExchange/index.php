<!DOCTYPE html>
<html>
    <head>
        <title></title>
        
        <script>
            function loadDoc(filename) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("userForm").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", filename, true);
                xhttp.send();
            }
        </script>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
        <div class="login-page">
            <div class="form" id="userForm">
                <form class="login-form">
                    <input type="text" placeholder="username" required/>
                    <input type="password" placeholder="password" required/>
                    <button>login</button>
                    <p class="message">Not registered? <a onclick="return loadDoc('register.txt')">Create an account</a></p>
                </form>
            </div>
        </div>
    </body>
</html>