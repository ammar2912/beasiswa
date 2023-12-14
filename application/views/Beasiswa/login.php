<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Login</title>

    <style>
        body {
            background: linear-gradient(to left, #2980b9, #6dd5fa, #ffffff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .logo {
            text-align: center;
        }

        .logo img {
            max-width: 100px;
            max-height: 100px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-login {
            background-color: #4169E1;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;

        }

        .btn-login:hover {
            background-color: #45a049;
        }

        .container-login{
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <img src="<?=base_url('desain/logo_polije.png') ?>" alt="Logo">
        </div>
        <h2>Login</h2>
        <form action="<?= base_url('loginuser/process_login') ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control"
                    placeholder="Enter your password">
            </div>
            <div class="form-group container-login">
                <button mx-auto type="submit" class="btn-login">Login</button>
            </div>
           
        </form>
        <?php
            if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-info" style="color: red">' . $this->session->flashdata('error') . '</div>';
            }
        ?>
    </div>

    
</body>

</html>