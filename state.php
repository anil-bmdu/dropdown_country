<?php 
    include('config.php');

    // Check if country_id is set in the POST data
    if(isset($_POST['country_id'])) {
        $country_id = $_POST['country_id'];
        // echo $country_id;exit;
        // Query to select states for the given country_id
        $query = "SELECT * FROM states WHERE country_id='" . $country_id . "' ORDER BY name ASC";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if query executed successfully
        if($result) {
            // Loop through the results and create options
            while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php 
            }
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        echo "Country ID is not set.";
    }
?>

