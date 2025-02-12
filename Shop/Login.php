<!DOCTYPE html>
<html>


<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <img class="mb-4" src="https://img.freepik.com/premium-vector/login-icon-vector_942802-6316.jpg" alt="" width="100"
                height="100">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <?php
            if ($_POST) {
                include 'config/database.php';
                $email = $_POST['email'];
                $password = $_POST['password'];

                $errors = [];

                if (empty($email)) {
                    $errors[] = "Email is required.";
                }
                if (empty($password)) {
                    $errors[] = "Password is required.";
                }

                if (!empty($errors)) {
                    echo "<div class='alert alert-danger'><ul>";
                    foreach ($errors as $error) {
                        echo "<li>{$error}</li>";
                    }
                    echo "</ul></div>";
                } else {
                    $check_query = "SELECT email ,password, account_status FROM customers WHERE email = :email";
                    $stmt = $con->prepare($check_query);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $emails = $row['email'];
                        $passwords = $row['password'];
                        $account_statuss = $row['account_status'];

                        if ($passwords == $password) {
                            if ($account_statuss == 1) {
                                $_SESSION['user_id'] = 1; // Example user ID
                                $_SESSION['username'] = $username;
                                $_SESSION['is_logged_in'] = true; // Login flag

                                header('Location: product_listing.php');
                                exit();
                            } else {
                                echo "<div class='alert alert-danger'>Your account is inactive. Please contact support.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Invalid email or password.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Invalid email or password.</div>";
                    }
                }
            }

            ?>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>

</body>

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