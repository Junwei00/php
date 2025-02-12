<!DOCTYPE HTML>
<html>
<?php include 'menu.php'; ?>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Product Listing</h1>
        </div>

        <!-- Search Form -->
        <form action="product_listing.php" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name or description"
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button class="btn btn-primary" type="submit">Search</button>
                <a href="product_listing.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <!-- PHP code to read records will be here -->
        <?php
        // include database connection
        include 'config/database.php';

        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
        $sort_order = isset($_GET['order']) ? $_GET['order'] : 'asc';

        $orderBy = "ORDER BY id DESC";
        if ($sort == "name") {
            $orderBy = "ORDER BY name " . ($sort_order == "asc" ? "ASC" : "DESC");
        } elseif ($sort == "price") {
            $orderBy = "ORDER BY price " . ($sort_order == "asc" ? "ASC" : "DESC");
        }

        // select all data
        $query = "SELECT id, name, description, price FROM products WHERE name LIKE :search OR description LIKE :search $orderBy";
        $stmt = $con->prepare($query);
        $searchParam = "%{$search}%";
        $stmt->bindParam(':search', $searchParam);
        $stmt->execute();

        // this is how to get number of rows returned
        $num = $stmt->rowCount();

        // link to create record form
        echo "<a href='product_create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";

        //check if more than 0 record found
        if ($num > 0) {

            $new_name_order = ($sort == "name" && $sort_order == "asc") ? "desc" : "asc";
            $new_price_order = ($sort == "price" && $sort_order == "asc") ? "desc" : "asc";

            // data from database will be here
            echo "<table class='table table-hover table-responsive table-bordered'>"; //start table

            //creating our table heading
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th><a href='?search=$search&sort=name&order=$new_name_order' class='text-decoration-none'>";
            echo "Name";
            if ($sort == "name") {
                echo $sort_order == "asc" ? "▲" : "▼";
            }
            echo "</a></th>";
            echo "<th>Description</th>";
            echo "<th><a href='?search=$search&sort=price&order=$new_price_order' class='text-decoration-none'>";
            echo "Price";
            if ($sort == "price") {
                echo $sort_order == "asc" ? "▲" : "▼";
            }
            echo "</a></th>";
            echo "<th>Action</th>";
            echo "</tr>";

            // table body will be here
            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // extract row
                // this will make $row['firstname'] to just $firstname only
                extract($row);
                // creating new table row per record
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
                echo "<td>{$price}</td>";
                echo "<td>";
                // read one record
                echo "<a href='product_details.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";

                // we will use this links on next part of this post
                echo "<a href='product_update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

                // we will use this links on next part of this post
                echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }


            // end table
            echo "</table>";
        } else {
            // if no records found
            echo "<div class='alert alert-danger'>No records found.</div>";
        }
        ?>


    </div> <!-- end .container -->

    <!-- confirm delete record will be here -->
    <script>
        function delete_product(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                window.location = 'product_delete.php?id=' + id;
            }
        }
    </script>
</body>

</html>