<?php include("dbConfig.php"); ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Export data to Excel using PHP - Pure Coding</title>
</head>

<body>
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-5">
      <h1 class="mb-0 fw-bold">Employees List</h1>
      <a href="export.php" class="btn btn-primary">Export to Excel</a>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Position</th>
          <th scope="col">Email Address</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Location</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = 0;
        $sql = "SELECT * FROM employees";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
          foreach ($res as $row) {
            $id++;
        ?>
            <tr>
              <th scope="row"><?php echo $id; ?></th>
              <td><?php echo $row['first_name']; ?></td>
              <td><?php echo $row['last_name']; ?></td>
              <td><?php echo $row['position']; ?></td>
              <td><?php echo $row['email_address']; ?></td>
              <td><?php echo $row['phone_number']; ?></td>
              <td><?php echo $row['location']; ?></td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>