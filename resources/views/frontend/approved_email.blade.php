<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="bg-primary p-[15px]">
            <h1>Request Approved</h1>
        </div>
        <div>
            <h1>Welcome!</h1>

            <p>Your shop has been approved. You can now log in using the temporary password below:</p>

            <p><strong>Temporary Password:</strong> {{ $password }}</p>

            <p>Please log in and change your password as soon as possible.</p>

            <p>Thank you for being a part of our platform!</p>

        </div>
    </div>
</body>
</html>
