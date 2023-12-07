<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>   
    <div class="container my-5">
        <h2>Lists of clients</h2>
        <a class="btn btn-primary" href="/myshop/create.php" role="button">New Clients</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                // create connection
                $connection = mysqli_connect($servername, $username, $password, $database);
                // check connection
                if($connection->connect_error)
                {
                    die("Connection Failed:" . $connection->connect_error);
                }
                // read all row from database table
                $sql="SELECT * FROM clients";
                $result = $connection->query($sql);
                if(!$result)
                {
                    die("Invalid Query:".$connection->error);
                }

                // read data of each row
                while($row = $result->fetch_assoc())
                {
                    echo"
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id] '>Delete</a>
                    </td>
                </tr>
                    ";
                }
                ?>
               
            </tbody>
        </table>
    </div> 
</body>
</html>