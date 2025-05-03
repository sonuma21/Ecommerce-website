<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">

</head>
<body>
    <div class="container">
        <div class="bg-primary p-[15px]">
            <h1>New Vendor Request</h1>
        </div>
        <div>
            <h2>Action Required: Review New Vendor Application</h2>
            <p>Dear Admin,</p>
            <p>A new vendor has submitted a request to join the platform.</p>
            {{-- <p> Please review the details below</p>
            <p class="font-bold">Vendor Name:</p>{{$shop->name}}
            <p class="font-bold">Email:</p>{{$shop->email}}
            <p class="font-bold">Submitted at:</p>{{$shop->created_at}} --}}
            <p>Please login to the Admin Dashboard to review and approve or reject this request</p>
            <a href="http://127.0.0.1:8000/admin" class="btn-primary">Review Request</a>
        </div>
    </div>

</body>
</html>
