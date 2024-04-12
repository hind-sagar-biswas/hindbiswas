<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>[Contacted From Portfolio] {{ $contact->subject }}</title>
</head>

<body>
    <h1>[Contacted From Portfolio] {{ $contact->subject }}</h1>
    <h3>{{ $contact->name }}</h3>
    <p>{{ $contact->email }}</p>
    <hr>
    <p>{{ $contact->body }}</p>
    <hr>
</body>

</html>
