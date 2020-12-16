<!DOCTYPE html>
<html>
<head>
    <title>Internship Manage - One School</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>Đây là tài khoản đăng nhập của bạn</p>
    <strong>User Name :</strong><p>{{ $details['user_name'] }}</p>
    <strong>Click this link to change your password :</strong>
    <a href="{{$details['link']}}" class="btn btn-outline-primary mb-1">Click </a>
    <p>Chức năng này do có ít thời gian nên chưa validate được username nên bạn thông cảm chỉ đổi được password thôi nhé !</p>
    <p>Thank you</p>
</body>
</html>