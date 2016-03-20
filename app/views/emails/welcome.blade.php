<?php
?>
<html>
<head>
    <title>KeepTrack Welcomes you</title>
</head>
<body>
<div style="font-family:Tahoma,Ubuntu,serif;width:600px;border:1px solid #ccc">
    <div style="background-color:#5cb85c;color:#ffffff;font-size:14px;padding:10px;width:580px">&nbsp;KeepTrack</div>
    <div style="padding:0px 10px 10px;font-size:12px;line-height:2;width:580px">
        <div>
            <div>
                <p style="padding-top: 5px;">Dear {{$first_name.' '.$last_name}}</p>
                <p>Greetings from KeepTrack</p>
                <p>We wish to welcome you to our application {{URL::to('/')}}</p>
            </div>
            <p>
                Click {{ HTML::link('login', 'here', array('title' => 'KeepTrack Login Link'))}} to login.
            </p>
            <p>Please ignore this email if you did not register</p>
            <p>We are always open to feedback and would love to hear from you</p>
            <p>Send your valuable feedback to support@track-maadu.rhcloud.com/</p>
        </div>
    </div>
</div>
</body>
</html>
