<!DOCTYPE html>
<html>
<head>
    <title>Register Baru</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>
        <a href="{{route('entrance.verified', $details['user']->id)}}">Klik di sini untuk memverifikasi akun baru</a>
    </p>
    <p>Email ini dikirim dari aplikasi Sigelatik.</p>
</body>
</html>
