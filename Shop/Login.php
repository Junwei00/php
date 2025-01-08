<!DOCTYPE html>
<html>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

    <main class="form-signin w-100 m-auto">

        <form method="POST" action="">
            <?php
            if ($_POST) {
                include 'config/database.php';
                $email = $_POST['email'];
                $password = $_POST['password'];

                $errors = [];

                // 验证字段是否为空
                if (empty($email)) $errors[] = "Email is required.";
                if (empty($password)) $errors[] = "Password is required.";

                try {
                    // 检查 Email 是否存在
                    if (empty($errors)) {
                        $check_query = "SELECT email FROM customer WHERE email = :email";
                        $stmt = $con->prepare($check_query);
                        $stmt->bindParam(':email', $email);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            $errors[] = "Email already exists.";
                        }
                    }

                    // 插入新用户
                    if (empty($errors)) {
                        $query = "INSERT INTO customer SET email=:email, password=:password";
                        $stmt = $con->prepare($query);
                        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':password', $hashed_password);

                        if ($stmt->execute()) {
                            echo "<div class='alert alert-success'>User registered successfully.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Unable to save record.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'><ul>";
                        foreach ($errors as $error) {
                            echo "<li>{$error}</li>";
                        }
                        echo "</ul></div>";
                    }
                } catch (PDOException $exception) {
                    echo "<div class='alert alert-danger'>ERROR: " . $exception->getMessage() . "</div>";
                }
            }
            ?>
            <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="" width="100"
                height="100">
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        </form>
    </main>

</body>

</html>