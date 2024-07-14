<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/addcomp.css"> -->
    <?php include_once 'includes/head.php' ?>
    <style>
        .table-responsive {
    overflow-x: auto; /* Ensures the table is responsive */
}

.table {
    width: 100%; /* Full width */
    border-collapse: separate; /* Use separate to allow border-radius */
    border-spacing: 0; /* Removes the default spacing */
    background-color: whitesmoke; /* White background for the table */
    color: black; /* Text color */
    border-radius: 10px; /* Curvy edges */
    overflow: hidden; /* Ensures the inner elements don't overflow the rounded corners */
}

.table th, .table td {
    text-align: left; /* Aligns text to the left */
    padding: 12px; /* Adds padding */
    border-bottom: 1px solid #dee2e6; /* Adds a subtle border to the bottom of each cell */
    color: black; /* White text color */
}

.table thead {
    background-color: lightgray; /* Blue background for the header */
    color: black; 
}

.table tbody tr:hover {
    background-color: #375a7f; /* Darker shade on hover */
}

.table tbody td a {
    display: inline-block; /* Allows padding and margin */
    margin: 0 5px; /* Space between buttons */
    padding: 5px 10px; /* Padding inside buttons */
    color: black; /* White text color */
}

.table tbody td a:hover {
    text-decoration: none; /* Removes underline on hover */
}
body {
    background-image: url('apply.png');
    background-size: cover; /* Cover the entire page */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Do not repeat the image */
}
    </style>

</head>
<body>

      <?php include_once 'includes/nav.php' ?>
    <div class="container">
      <h1 class="form-row justify-content-center">View Applied Company</h1> <br>
       <form>
     <!-- <img src="images/1.jpg"> -->
   
     <div class="table-responsive">
    <table class="table table-hover table-borderless table-dark">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Company Name</th>
          <th scope="col">Student Name</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
     <?php
            $user = $_SESSION['username'];
            $sql = "select * from applied where name='$user' and status='Selected';";
            $res = mysqli_query($conn, $sql);
            $rescheck = mysqli_num_rows($res);
            if($rescheck > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                ?>
          <?php
                  echo '<tr>';
                    echo '<td>'.$row['id'].'</td>';
                    echo '<td>'.$row['company'].'</td>';
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td>'.$row['status'].'</td>';
                  echo '</tr>';
                  ?>
                <?php
              }
            } else {
              ?>
               <p class="lead" align="center">You are not selected for any company<p>
                <?php
            }
           ?>
    
                </tr>
                  </tbody>
                </table>
                </div>
   </form>
    </div>
    <?php include_once 'includes/footer.php' ?>
    <script>
      $(document).ready(function() {
         $("#home").removeClass("active");
        $("#select").addClass("active");
        
      });
    </script>
</body>
</html>