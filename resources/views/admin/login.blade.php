<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/libraries/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/libraries/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Admin login</title>
</head>

<body>
    <div class="container-form">
        <form action="#" method="POST" id="login-form">
            @csrf
            <h1>Đăng nhập</h1>
            <div class="mb-3 form-group">
                <label for="username" class="form-label">Tên tài khoản</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
                    autocomplete="off" placeholder="Nhập tên tài khoản">
                <p class="error err-username"></p>
            </div>
            <div class="mb-3 form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                    placeholder="Nhập mật khẩu">
                <p class="error err-password"></p>
            </div>
            <div class="g-recaptcha" data-sitekey="6Lexkq4cAAAAAP99zDTo7_5QJlymmgvYVtJGXmn_"></div>
            <p class="error err-not-robot"></p>
            <button type="submit" class="btn btn-primary btn-login">Đăng nhập</button>
        </form>
    </div>
</body>

</html>
<script src="/libraries/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/libraries/fontawesome-free-5.15.4-web/js/all.min.js"></script>
<script src="/libraries/jquery/dist/jquery.min.js"></script>

<script>
    //remove error when typing
    $("#username").on('keyup', function(e) {
        if (this.value != "")
            $(".err-username").text("");
    });
    $("#password").on('keyup', function(e) {
        if (this.value != "")
            $(".err-password").text("");
    });

    //validate form
    $("#login-form").on('submit', function(e) {
        let isPass = true;
        const formData = $(this).serializeArray();

        //Check captcha is checked
        let isCheckRobot = false;
        for (let i = 0; i < formData.length; i++) {
            if (formData[i]['name'] == "g-recaptcha-response" && formData[i]['value'] != "")
                isCheckRobot = true;
        }
        if (!isCheckRobot) {
            $(".err-not-robot").text("Vui lòng xác thực!");
            isPass = false;
        } else {
            $(".err-not-robot").text("");
        }
        if ($("#username").val() == "") {
            $(".err-username").text("Vui lòng nhập đủ trường này!");
            isPass = false;
        }
        if ($("#password").val() == "") {
            $(".err-password").text("Vui lòng nhập đủ trường này!");
            isPass = false;
        }
        if (!isPass)
            e.preventDefault();
    });
</script>
