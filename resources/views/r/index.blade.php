<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="/r" method="post">
    用户名称:<input type="text" name="username"><br />
    密码:<input type="password" name="pwd"><br />
    <input type="submit" name="" value="提交">
    {{csrf_field()}}
</form>
</body>
</html>