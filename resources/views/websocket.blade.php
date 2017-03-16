<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
{{--<button type="button" id="start" onclick="start()">start</button>--}}
<br>
{{--<h1 id="key">{{ $key }}</h1>--}}
<h1 id="username" hidden>{{ Auth::user()->name }}</h1>
{{--{{ Request::getClientIp() }}--}}
<br>
{{--<button type="submit" onclick="sendkey()">提交</button>--}}
<br>
{{--<form action="{{action("WebsocketController@index")}}">--}}
    {{--<input name="key">--}}
    {{--<button type="submit" onclick="sendkey()">提交</button>--}}
{{--</form>--}}

<script>
    var key = document.getElementById("username").innerHTML;
    var client;
    function start() {
        client = new WebSocket('ws://localhost:3000/', 'echo-protocol');
        client.onerror = function() {
            console.log('Connection Error');
        };
        client.onopen = function() {
            console.log('WebSocket Client Connected');
            client.send(key);
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
    start();

</script>
</body>

</html>
