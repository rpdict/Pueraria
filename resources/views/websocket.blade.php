<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    {{--<script src="{{ asset('/js/qrcode.js') }}"></script>--}}
    <script src="{{ asset('/js/qart.js') }}"></script>
</head>

<body>
<div id="key">{{ $key }}</div>
<br>
{{--<div id="qrcode"></div>--}}
<div id="qart"></div>
<input type="text" name="input1"><br>
<input type="text" name="input2">

<script>
    var key = document.getElementById("key").innerHTML;
    var json = JSON.stringify({
        type: 'message',
        event: 'connect',
        userId: key
    });
    var message;
    var url;

    var client = new WebSocket('ws://localhost:3000/', 'echo-protocol');
    client.onerror = function () {
        console.log('Connection Error');
    };
    client.onopen = function () {
        console.log('WebSocket Client Connected');
        client.send(json);
    };
    client.onclose = function () {
        console.log('echo-protocol Client Closed');
    };
    client.onmessage = function (e) {
        if (typeof e.data === 'string') {
            console.log("Received: '" + e.data + "'");
            message = JSON.parse(e.data);
            if (message.event === 'success') {
                url = 'http://127.0.0.1:3000/' + 'login?id=' + message.user;
                console.log(url);
//            var qrcode = new QRCode(document.getElementById("qrcode"));
//            qrcode.makeCode(url);
                new QArt({
                    value: url,
                    imagePath: '/img/bdf.jpg'
                }).make(document.getElementById('qart'));
            } else if (message.event === 'email') {
                document.getElementsByName("input1")[0].value = message.message;
//                alert(message.message);
            }
        }
    };


</script>
</body>

</html>
