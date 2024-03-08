<?php
include('../api/connect.php');

// echo $_SESSION['userdata'];
// print_r( $_SESSION['userdata']);
if (!isset($_SESSION['userdata'])) {
    header("location:../");
}
$userdata = $_SESSION['userdata'];
// echo  $userdata['photo '];
// echo  $userdata['name'];
// echo  $userdata;
// print_r($userdata);
$groupsdata = $_SESSION['groupsdata'];
/*
if ($userdata['status'] == 0) {
    $status = "<b style='color:red'>No Voted</b>";
} else {
    $status = "<b style='color:green'>Voted</b>";
}
*/
if ($_SESSION['userdata']['status'] == 0) {
    $status = "<b style='color:red'>No Voted</b>";
} else {
    $status = "<b style='color:green'>Voted</b>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">

</head>

<body>
    <style>
        #backbtn {
            padding: 10px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            background-color: #48bdfb;
            color: white;
            font-size: 15px;
            float: left;
            margin: 15px;
        }

        #loginbtn {
            padding: 10px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            background-color: #48bdfb;
            color: white;
            font-size: 15px;
            float: right;
            margin: 15px;
        }

        #Profile {
            background: white;
            width: 30%;
            padding: 20px;
            float: left;
        }

        #Group {
            background: white;
            width: 60%;
            padding: 20px;
            float: right;
        }

        #mainpanel {
            padding: 10px;
        }
    </style>
    <div id="mainSection">
        <div id="headerSection">
            <button id="backbtn"><a href="../">Back</a></button>
             <button id="loginbtn"><a href="../api/logout.php">Logout</a></button>
            <center>
                <h1>Online Voting System</h1>
            </center>
        </div>
        <hr>

        <div id="mainpanel">
            <div id="Profile">
                <img src="../uploads/<?php echo  $userdata['photo'] ?>" alt="" height="150" width="150" srcset=""><br><br>
                <b>Name:</b> <?php echo  $userdata['name'] ?><br><br>
                <b>Mobile</b> <?php echo  $userdata['mobile'] ?><br><br>
                <b>Address</b> <?php echo  $userdata['address'] ?><br><br>
                <!-- <b>Status</b> <?php //echo  $userdata['status'] 
                                    ?><br><br> -->
                <b>Status</b> <?php echo  $status ?><br><br>
            </div>
            <div id="Group">
                <?php
                if ($_SESSION['groupsdata']) {
                    // print_r($groupsdata);

                    for ($i = 0; $i < count($groupsdata); $i++) {
                ?>

                        <div>
                            <img style="float: right;" src="../uploads/<?php echo  $groupsdata[$i]['photo'] ?>" alt="" height="100" width="100" srcset="">
                            <b>Group Name</b> <?php echo  $groupsdata[$i]['name'] ?> <br><br>
                            <b>Voted</b> <?php echo  $groupsdata[$i]['votes'] ?> <br><br>
                            <form action="../api/votes.php" method="post">
                                <input type="hidden" name="gvotes" value="<?php echo  $groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo  $groupsdata[$i]['id'] ?>">
                                <input type="submit" name="votebtn" value="Vote" id="votebtn">

                            </form>
                        </div>
                        <hr>
                <?php
                    }
                } else {
                }

                ?>


            </div>
        </div>
    </div>


</body>

</html>