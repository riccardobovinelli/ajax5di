<html>
	<head>
            <title>DatabaseExchange</title>

            <script>
                function loadDoc(id) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("bodyText").
                                        innerHTML = this.responseText;
                            }
                    };
                    xhttp.open("GET", "body.php?id=" + id, true);
                    xhttp.send();
                }
            </script>
	</head>

	<body onload="loadDoc(1)">
		<label for="cars">Choose an invoice :</label>
                    <select id="cars">
                      <option value="apples">Apples</option>
                      <option value=""></option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                    </select>
		<div>
               <h1 id = "bodyText"></h1>
		<div>
	</body>
</html>

