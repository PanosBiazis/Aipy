<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Model Visualization</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>AI Model Visualization</h1>
    <section>
        <fieldset style="border: 20px solid black; background-color:white; position:relative; left:400px;">
            <h1 style="color:green; position:relative; left:40px;  width:150px; height: 40px;"><u>Bike Race Table</u></h1>
            <br><br><br><br><br><br><br><br>
            <fieldset style="height:70px; width:auto;  position:relative; bottom:170px; background-color: blue; border: 5px solid blue;"></fieldset>
            <tr>
                <?php 
                include "connect.php";
                // Perform database query
                $query = "SELECT * FROM model_data";
                $result = mysqli_query($conn, $query);

                // Check if sort button is clicked
                if(isset($_POST['sort_asc']) || isset($_POST['sort_desc'])) {
                    // Sort records by ID in ascending order
                    if(isset($_POST['sort_asc'])) {
                        $query .= " ORDER BY id ASC";
                    }
                    // Sort records by ID in descending order
                    elseif(isset($_POST['sort_desc'])) {
                        $query .= " ORDER BY id DESC";
                    }
                }

                // Check if query was successful
                if (!$result) {
                    die("Error executing the query: " . mysqli_error($conn));
                }

                // Check if there are rows returned
                $total_records = mysqli_num_rows($result);
                $records_per_page = 10; // Number of records per page
                $total_pages = ceil($total_records / $records_per_page); // Calculate total pages

                // Calculate current page number
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Calculate offset
                $offset = ($current_page - 1) * $records_per_page;

                // Fetch records with LIMIT and OFFSET
                $query .= " LIMIT $records_per_page OFFSET $offset";
                $result = mysqli_query($conn, $query);

                // Display table header
                if ($result->num_rows > 0) {
                    echo "<table style='position:relative; bottom:170px; border: 15px solid red;'><tr>";
                    $columns = $result->fetch_fields();
                    foreach ($columns as $column) {
                        echo "<th>" . $column->name . "</th>";
                    }
                    echo "</tr>";
                    // Display each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        foreach ($row as $cell) {
                            echo "<td>" . $cell . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='position:relative; bottom:170px; text-align:center;'><b>No results found.</b></p><br/>";
                }

                // Display pagination links
                // echo "<div class='pagination'>";
                // for ($i = 1; $i <= $total_pages; $i++) {
                //     echo "<a href='?page=" . $i . "' class='" . ($i == $current_page ? "active" : "") . "'>" . $i . "</a>"; // Display pagination links
                // }
                // echo "</div>";
                echo "<div class='pagination'>";
$links_to_show = 5; // Number of links to display
$start_link = max(1, $current_page - floor($links_to_show / 2));
$end_link = min($total_pages, $start_link + $links_to_show - 1);

for ($i = $start_link; $i <= $end_link; $i++) {
    echo "<a href='?page=" . $i . "' class='" . ($i == $current_page ? "active" : "") . "'>" . $i . "</a>";
}

if ($start_link > 1) {
    echo "<a href='?page=1' class=''>1</a>";
    echo "<a href='?page=" . ($start_link - 1) . "' class=''>...</a>";
}

if ($end_link < $total_pages) {
    echo "<a href='?page=" . ($end_link + 1) . "' class=''>...</a>";
    echo "<a href='?page=" . $total_pages . "' class=''>" . $total_pages . "</a>";
}

echo "</div>";
                ?>
            </tr>
        </fieldset>
        <table style="background-color: green; border: 5px solid green; height: 170px; position:relative; left: 430px; bottom: 230px; width:990px;">
    </table>
    </section>
</body>
</html>