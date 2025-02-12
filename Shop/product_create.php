<!DOCTYPE HTML>
<html>
<?php include 'menu.php'; ?>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Create Product</h1>
        </div>

        <!-- html form to create product will be here -->
        <!-- PHP insert code will be here -->
        <?php
        include 'config/database.php';
        $query = "SELECT product_cat_id, product_cat_name, product_cat_description FROM product_cat";
        $stmt = $con->prepare($query);
        $stmt->execute();

        if ($_POST) {
            // include database connection
            include 'config/database.php';
            try {
                // posted values
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $promotion_price = !empty($_POST['promotion_price']) ? $_POST['promotion_price'] : NULL;
                $manufacture_date = $_POST['manufacture_date'];
                $expired_date = $_POST['expired_date'];
                $product_category = $_POST['product_cat'];

                // Validation
                $errors = [];
                if (empty($name)) {
                    $errors[] = "Name is required.";
                }
                if (empty($description)) {
                    $errors[] = "Description is required.";
                }
                if (empty($price)) {
                    $errors[] = "Price is required.";
                }
                if (empty($manufacture_date)) {
                    $errors[] = "Manufacture date is required.";
                }
                // If there are errors, display them
                if (!empty($errors)) {
                    echo "<div class='alert alert-danger'><ul>";
                    foreach ($errors as $error) {
                        echo "<li>{$error}</li>";
                    }
                    echo "</ul></div>";
                } else {
                    // Insert query

                    // insert query
                    $query = "INSERT INTO products SET name=:name, description=:description, price=:price, promotion_price=:promotion_price, product_cat=:product_cat, manufacture_date=:manufacture_date,expired_date=:expired_date, created=:created";
                    // prepare query for execution
                    $stmt = $con->prepare($query);
                    // bind the parameters
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':manufacture_date', $manufacture_date);
                    $stmt->bindParam(':product_cat', $product_category);
                    if (!empty($expired_date)) {
                        $stmt->bindParam(':expired_date', $expired_date);
                    } else {
                        $stmt->bindValue(':expired_date', null, PDO::PARAM_NULL);
                    }
                    // specify when this record was inserted to the database
                    $created = date('Y-m-d H:i:s');
                    $stmt->bindParam(':created', $created);
                    if (!empty($promotion_price)) {
                        $stmt->bindParam(':promotion_price', $promotion_price);
                    } else {
                        $stmt->bindValue(':promotion_price', null, PDO::PARAM_NULL);
                    }
                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Product was added.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Unable to save record.</div>";
                    }
                }
            }
            // show error
            catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>


        <!-- html form here where the product information will be entered -->
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='name' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'></textarea></td>
                </tr>
                <tr>
                    <td>Product Category</td>
                    <td>
                        <select name="product_cat" id="product_cat">
                            <?php
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                echo "<option value ='$product_cat_id'>$product_cat_name</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type='text' name='price' class='form-control' /></td>
                </tr>
                </tr>
                <td>Promotion pirce</td>
                <td><input type='text' name='promotion_price' class='form-control' /></td>
                <tr>
                    <td>Manufacture_date</td>
                    <td><input type='date' name='manufacture_date' class='form-control' /></td>
                <tr>
                </tr>
                <td>Expired_date</td>
                <td><input type='date' name='expired_date' class='form-control' /></td>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        <a href='index.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <!-- end .container -->
</body>

</html>