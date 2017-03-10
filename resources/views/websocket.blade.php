<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
<button type="button" id="start" onclick="start()">start</button>
<br>
<h1 id="key">{{ $key }}</h1>
<br>
{{--<form action="{{action("WebsocketController@index")}}">--}}
    {{--<input name="key">--}}
    {{--<button type="submit" onclick="sendkey()">提交</button>--}}
{{--</form>--}}

<script>
//    var key = document.getElementById("key").innerHTML;
    //client.send(number.toString());
    var number = Math.round(Math.random() * 0xFFFFFF);
    var client;
    function start() {
        client = new WebSocket('ws://localhost:8080/', 'echo-protocol');
        client.onerror = function() {
            console.log('Connection Error');
        };
        client.onopen = function() {
            console.log('WebSocket Client Connected');

        };
        client.onclose = function() {
            console.log('echo-protocol Client Closed');
        };
        client.onmessage = function(e) {
            if (typeof e.data === 'string') {
                console.log("Received: '" + e.data + "'");
            }
        };
    }
//    function sendkey() {
//        client.send(key);
//    }
</script>
</body>

</html>
