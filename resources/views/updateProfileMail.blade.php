<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>{{ $data['name'] }}</th>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{ $data['email'] }}</th>
        </tr>
    </table>
    <p><b>Note:- </b>use your old password!</p>
    <a href="$data['url']">Click here to Login Account</a>
    <p>Thanks!!</p>
    
</body>
</html>