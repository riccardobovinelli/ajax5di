<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Client 2</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            var id = 2;
            var version = 0;

            function updateServer(string) {
                var xhttp = new XMLHttpRequest();
                //non è necessario gestirla
                version++;
                xhttp.open("POST", "server.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("update=true&id=" + id + "&text=" + string);
            }
            
            function requestData(){
                var xhttp = new XMLHttpRequest();
                xhttp.overrideMimeType("text/xml");    
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        version = this.responseXML.getElementsByTagName("ver")[0].childNodes[0].nodeValue;
                        document.getElementById("content").innerHTML = this.responseXML.getElementsByTagName("content")[0].childNodes[0].nodeValue;
                    }
                };
                xhttp.open("POST", "server.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + id );
            }

            function polling() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (!this.responseText){
                            requestData();
                        }
                    }
                };
                xhttp.open("POST", "server.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("polling=true&id=1&ver="+version);
            }
            

            $(document).ready(function () {
                setInterval(polling, 1000);
            });
            
        </script>
    </head>
    <body>
        <input type="text" onkeyup="updateServer(this.value)"/>
        <span id="content"></span>
    </body>
</html>