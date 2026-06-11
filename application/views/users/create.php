
<!DOCTYPE html>
<html>
<head>

    <title>User Registration</title>

    <style>

        body{

            font-family: Arial;
            background:#f2f2f2;
        }

        .form-box{

            width:350px;

            background:white;

            padding:30px;

            margin:50px auto;

            border-radius:10px;

            box-shadow:0px 0px 10px gray;
        }

        input{

            width:100%;

            padding:10px;

            margin-top:5px;

            margin-bottom:15px;
        }

        button{

            width:100%;

            padding:10px;

            background:blue;

            color:white;

            border:none;

            cursor:pointer;
        }

        h2{

            text-align:center;
        }

    </style>

</head>

<body>

<div class="form-box">

    <h2>User Registration</h2>

    <form method="post"
          action="<?= base_url('index.php/users/store') ?>"
          enctype="multipart/form-data">

        Name:
        <input type="text" name="name" required>

        Email:
        <input type="email" name="email" required>

        Phone:
        <input type="text" name="phone" required>

        Password:
        <input type="password" name="password" required>

        City:
        <input type="text" name="city" required>

        Profile Image:
        <input type="file" name="profile_image">

        <button type="submit">

            Register

        </button>

    </form>

</div>

</body>
</html>