<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
<button type="button" id="start" onclick="start()">start</button>
<script>
    function start() {
        var client = new WebSocket('ws://localhost:8080/', 'echo-protocol');
        client.onerror = function() {
            console.log('Connection Error');
        };
        client.onopen = function() {
            console.log('WebSocket Client Connected');

            function sendNumber() {
                if (client.readyState === client.OPEN) {
                    var number = Math.round(Math.random() * 0xFFFFFF);
                    client.send(number.toString());
                    setTimeout(sendNumber, 1000);
                }
            }
            sendNumber();
        };
        client.onclose = function() {
            console.log('echo-protocol Client Closed');
        };
        client.onmessage = function(e) {
            if (typeof e.data === 'string') {
                console.log("Received: '" + e.data + "'");
                document.write("Received: '" + e.data + "'" + "</br>");
                // alert(e.data);
            }
        };
    }
</script>
</body>

</html>
