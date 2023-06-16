<!DOCTYPE html>
<html>

<head>
    <title>SRS Notification!</title>
</head>

<body>
    <h1>New E-Jobsheet Management</h1>
    <p>Dear {{ $data['name'] }},</p>

    <p>I hope this email finds you well. I am writing to inform you that you have been assigned to manage a new e-jobsheet in
        our system. Please log in to the system and review the details of the form.</p>

    <p>Thank you</p>
    <br>{{Auth::user()->name}}
</body>

</html>