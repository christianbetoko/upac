<!DOCTYPE html>
<html>
<head>
    <title>Message de contact reçu - U.PA.C</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>{{ $message->first_name }} {{ $message->last_name }}</h2>
    <p>{{ $message->message }}</p>
    
</body>
</html>