<?php
if (!empty($_GET)) {
    echo $_GET["country"];
    echo "</br>";
    echo $_GET["day"];
    echo $_GET["month"];
    echo $_GET["year"];
    echo "</br>";
    echo isset($_GET["gender"]) ? $_GET["gender"] : "Please select gender";
    echo $_GET["age"];
}
?>
<!DOCTYPE html>
<html>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <label for="country">Country: </label>
        <select name="country" id="country">
            <option value="">--- Choose a Country ---</option>
            <option value="Malaysia">Malaysia</option>
            <option value="China">China</option>
            <option value="Taiwan">Taiwan</option>
            <option value="Japan">Japan</option>
            <option value="Hongkong">HongKong</option>
            <option value="Korea">Korea</option>
            <option value="USA">USA</option>
            <option value="Rusia">Rusia</option>
            <option value="UK">UK</option>
            <option value="AUE">AUE</option>
            <option value="Thailand">Thailand</option>
        </select><br>
        <label for="date">Date of Birth: </label>
        <select name="day">
            <option>Day</option>
            <?php
            for ($day = 1; $day <= 31; $day++) {
                echo "<option value = '" . $day . "'>" . $day . "</option>";
            }
            ?>
        </select>
        <select name="month">
            <option>Month</option>
            <?php
            for ($month = 1; $month <= 12; $month++)
                echo "<option value = '" . $month . "'>" . $month . "</option>";
            ?>
        </select>
        <select name="year">
            <option>Year</option>
            <?php
            for ($year = 2000; $year <= 2024; $year++) {
                echo "<option value = '" . $year . "'>" . $year . "</option>";
            }
            ?>
        </select><br>
        Gender:
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <br>
        <input type="submit">
    </form>
</body>

</html>