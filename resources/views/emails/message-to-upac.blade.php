<!DOCTYPE html>
<html>
<head>
    <title>Message de contact reçu - U.PA.C</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>{{ $contactMessage->first_name }} {{ $contactMessage->last_name }}</h2>
    <p>{{ $contactMessage->message }}</p>
    
</body>
</html>