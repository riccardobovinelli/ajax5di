<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Client 1</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            var id = 1;
            var version = 0;

            function updateServer(string) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //document.getElementById("demo").innerHTML = this.responseText;
                        console.log("version="+version);
                    }
                };
                version++;
                xhttp.open("POST", "server.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("update=true&id=" + id + "&text=" + string);
            }
            
            function requestData(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                    }
                };
                xhttp.open("POST", "server.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("notMuchToSay=true");
            }

            function polling() {
                /*var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (!this.responseText){
                            requestData();
                        }
                    }
                };
                xhttp.open("POST", "server.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("polling=true&id=2&ver="+version);*/
            }
            

            $(document).ready(function () {
                setInterval(polling, 5000);
            });
            
        </script>
    </head>
    <body>
        <input type="text" onkeyup="updateServer(this.value)"/>
        <?php
        // put your code here
        ?>
    </body>
</html>