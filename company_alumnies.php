<?php include('conn.php') ?>
<?php

$cname = $_GET['company'];
// echo $cname;

$sql = "select * from alumnisignup where jobposition='$cname'";
$result = mysqli_query($conn, $sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Careers</title>
    <style>
        body {
            background-color: #f6f7fd;
            background-color: #A9C9FF;
            background-image: linear-gradient(180deg, #A9C9FF 0%, #ffbbeca6 100%);
            height: 100vh;
        }

        #tag,
        p,
        h5 {
            text-align: center;
        }

        #h {
            width: 25px;
            height: 7px;
            margin: auto;
            background-color: red;
        }

        table {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
            background-color: white;
            border-radius: 20px;

            width: 55%;
            margin: auto;
            /* border: 1px solid black; */
        }

        td {
            /* margin:10px 10px; */
            padding: 12px 18px 14px 38px;
            text-align: center;
        }

        #job {
            background-color: #dee2e6;
            ;
        }

        span {
            padding: 8px 8px;
            border-radius: 20px;

        }

        #link {
            float: right;
        }

        button {
            background-image: linear-gradient(90deg, #A9C9FF 0%, #ffbbeca6 80%) !important;
        }

        a {
            text-decoration: none;
            color: black;
        }

        /* <td */
    </style>
</head>

<body>
    <br>
    <h3 id="tag"> Gems of
        <?php echo $cname ?>
    </h3>
    <p>"It's time to start living the life we've imagined."</p>
    <!-- <hr id="h"> -->
    <br>
    <br>
    <table>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            // echo $name;
            $name = trim($name);
            ?>
            <tr>
                <td>
                    <?php echo $row['name'] ?>
                </td>
                <td>
                    <a href=""><span id="job">
                            <?php echo $row['session'] ?>
                        </span></a>
                </td>
                <td id="link">

                    <a href="visit_alumni_profile.php?user=<?php echo $name ?>"> <button type="button"
                            class="btn btn-warning">Visit Profile</button></a>
                </td>
            </tr>
            <?php
        }
        ?>

    </table>
</body>

</html>