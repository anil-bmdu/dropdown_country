<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Country</h1>
    <div class="row" style="padding:100px;">
        <form action="">
            <select class="form-select" name="country" id="country" aria-label="Default select example">
            <option value="">Select Country</option>
            <?php 
                include('config.php');
                $query = "select * from countries order by name ASC";
                $result = mysqli_query($conn,$query);                
                while($row = mysqli_fetch_array($result)){
                   ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                  <?php 
                }
            ?>
            </select><br>
            <select class="form-select" name="state" id="state">
            <option value="">Select State</option>
         
            </select><br>
            <select class="form-select" name="city" id="city">
            <option value="">Select City</option>
         
            </select>
            </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#country").change(function(){
            var country_id = this.value;
            // alert(country_id);
            $.ajax({
                url: "state.php",
                type:"POST",
                data:{
                    country_id:country_id
                },
                cache: false,
                success:function(result){
                    $("#state").html(result);
                    // $("#city").html(<option value="">Select State</option>)
                }
            });
        });

        $("#state").change(function(){
            var state_id = this.value;
            // alert(country_id);
            $.ajax({
                url: "city.php",
                type:"POST",
                data:{
                    state_id:state_id
                },
                cache: false,
                success:function(result){
                    $("#city").html(result);
                }
            });
        });
    });
</script>

</body>
</html>
