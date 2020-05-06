<?php
        // put your code here
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>XML and ajax</title>
        <script type="text/javascript">
            function loadXml(){
                var xhttp = new XMLHttpRequest();
                xhttp.overrideMimeType("text/xml");    
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("name").innerHTML = this.responseXML.getElementsByTagName("name")[0].childNodes[0].nodeValue;
                        console.log(this.responseXML.getElementsByTagName("name")[0].childNodes[0].nodeValue);
                        document.getElementById("surname").innerHTML = this.responseXML.getElementsByTagName("surname")[0].childNodes[0].nodeValue;
                        document.getElementById("email").innerHTML = this.responseXML.getElementsByTagName("email")[0].childNodes[0].nodeValue;
                        document.getElementById("class").innerHTML = this.responseXML.getElementsByTagName("class")[0].childNodes[0].nodeValue;

                    }
                };
                xhttp.open("GET","user.xhtml", true);
                xhttp.send();
            }
        </script>
    </head>
    <body>
        name:<span id="name"></span><br>
        surname:<span id="surname"></span><br>
        email:<span id="email"></span><br>
        class:<span id="class"></span><rr>
            <button onclick="loadXml()">Carica XML</button>
    </body>
</html>
