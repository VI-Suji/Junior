<?php
//echo "<script type='text/javascript'>alert('Registration Site would be under maintenance between 10:30pm and 07:00am');</script>";
//echo "<script type='text/javascript'> document.location = 'index.html'; </script>";
//exit(0);
include('includes/config.php');
if (isset($_POST['Save'])) {
    $flag = 0;
    $temp = $_POST['interest'];
    if ((count($temp) < 2)) {
        $error = "Enter atleast 2";
        $flag = 1;
    } else {
        $inter1 = $temp[0];
        $inter2 = $temp[1];
    }
    $temp = $_POST['career'];
    if ((count($temp) < 2)) {
        echo "<script type='text/javascript'>alert('Enter 2 career preferences');</script>";
        $flag = 1;
    } else {
        $car1 = $temp[0];
        $car2 = $temp[1];
    }
    $temp = $_POST['services'];
    if ((count($temp) < 3)) {
        echo "<script type='text/javascript'>alert('Enter 3 Services');</script>";
        $flag = 1;
    } else {
        $ser1 = $temp[0];
        $ser2 = $temp[1];
        $ser3 = $temp[2];
    }
    if ($flag == 0) {
        echo "<script type='text/javascript'>alert('Flag error');</script>";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $batch = strtoupper($_POST['batch']);
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM `register` WHERE `email` = :email ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            echo "<script type='text/javascript'>alert('Sorry already registerd Thankyou');</script>";
            header('location:register.php');
        } else {

            $sql = "SELECT COUNT(*) as total FROM `register` WHERE `batch` = :batch ";
            $query = $dbh->prepare($sql);
            $query->bindParam(':batch', $batch, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($results as $result) {
                $cnt = $result->total;
            }
            if ($cnt < 10) {
                $cnt = "0" . $cnt;
            }
            $id = "ISTETKMCE/20/" . $batch . "/" . $cnt;

            // :id, :name, :email, :dob, :batch, :address, :mobile, :inter1, :inter2, :car1, :car2, :ser1, :ser2, :ser3, :pass

            $sql = "INSERT INTO `register`(`id`, `name`, `email`, `dob`, `batch`, `address`, `mobile`, `inter1`, `inter2`, `car1`, `car2`, `ser1`, `ser2`, `ser3`, `password`) VALUES (:id, :name, :email, :dob, :batch, :address, :mobile, :inter1, :inter2, :car1, :car2, :ser1, :ser2, :ser3, :pass)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':dob', $dob, PDO::PARAM_STR);
            $query->bindParam(':batch', $batch, PDO::PARAM_STR);
            $query->bindParam(':address', $address, PDO::PARAM_STR);
            $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $query->bindParam(':inter1', $inter1, PDO::PARAM_STR);
            $query->bindParam(':inter2', $inter2, PDO::PARAM_STR);
            $query->bindParam(':car1', $car1, PDO::PARAM_STR);
            $query->bindParam(':car2', $car2, PDO::PARAM_STR);
            $query->bindParam(':ser1', $ser1, PDO::PARAM_STR);
            $query->bindParam(':ser2', $ser2, PDO::PARAM_STR);
            $query->bindParam(':ser3', $ser3, PDO::PARAM_STR);
            $query->bindParam(':pass', $password, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo "<script type='text/javascript'>alert('Successfully registered for ISTE TKMCE');</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function checkboxlimit(checkgroup, limit) {
            var checkgroup = checkgroup;
            var limit = limit
            for (var i = 0; i < checkgroup.length; i++) {
                checkgroup[i].onclick = function() {
                    var checkedcount = 0
                    for (var i = 0; i < checkgroup.length; i++)
                        checkedcount += (checkgroup[i].checked) ? 1 : 0
                    if (checkedcount > limit) {
                        alert("You can only select a maximum of " + limit + " items from this section")
                        this.checked = false
                    }
                }
            }
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Registration form for students " />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>ISTE REGISTRATION FORM</title>
    <style>
        .fa,
        .fas {
            color: rgb(47, 56, 65);
        }

        .btn {
            background-color: rgb(47, 56, 65);
            color: white;
        }
    </style>
</head>

<body>
    <form method="post">

        <div class="container-fluid">

            <div class="form-row mx-auto text-center mb-4" style="border-bottom: 1px solid rgb(47, 56, 65);">
                <div class="col-12 mx-auto pt-4 pl-2 pr-2 pb-0 rounded mb-3">
                    <h5 class="mx-auto">REGISTRATION FORM FOR STUDENT MEMBERSHIP</h5>
                </div>
            </div>

            <div class="form-row ">
                <div class="form-group col-sm-5 col-12">
                    <label for=""><i class="fas fa-address-book "> Name</i></label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter name" aria-describedby="helpId">
                </div>

                <div class="form-group col-sm-7 col-12">
                    <label for="email"><i class="fas fa-mail-bulk"> Email</i></label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" onkeyup="validation()" placeholder=" gmail.com/tkmce.ac.in">
                    <!-- <small id = "smail"style = "display :none;color:red;">please enter a valid mail id</small> -->
                    <div class="alert" role="alert" style="display:none;" id="alerting">
                        <h6 class="p-0 m-0">please enter a valid mail id</h6>
                    </div>

                </div>
            </div>

            <div class="form-row  mt-2 rounded">

                <div class="col-12 col-sm-4">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-12">
                            <label for="dob"><i class="fa fa-calendar" aria-hidden="true"> Date of Birth</i></label>
                            <input type="date" class="form-control" name="dob" id="" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-12">
                            <label for=""><i class="fa fa-book" aria-hidden="true"> Batch</i></label>
                            <input type="text" name="batch" id="" class="form-control" placeholder="T2A/T5B" aria-describedby="helpId">

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-8">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-12">
                            <label for="address"><i class="fa fa-address-card" aria-hidden="true"> Address</i></label>
                            <textarea class="form-control" name="address" id="" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <h5 style="color:red;">Select atleast 2 Interests, 2 Career preferences and 3 Services</h5>


            <div class="form-row mt-1 mb-1">

                <div class=" form-group col-sm-4 col-12 p-2">

                    <div class="dropdown open drop-1">
                        <button class="btn  dropdown-toggle w-100" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h5>Special Interest</h5>
                        </button>
                        <div class="dropdown-menu w-100 pl-3 pr-3" aria-labelledby="triggerId">
                            <p class="dropdown-item pt-0 pb-0">
                                <div class="form-check">
                                    <div id="check1">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="interest[]" id="" value="Sports">
                                            Sports
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="interest[]" id="" value="Games">
                                            Games
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="interest[]" id="" value="Reading">
                                            Reading
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="interest[]" id="" value="Literacy">
                                            Literary
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="interest[]" id="" value="Drama">
                                            Drama
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="interest[]" id="" value="Music">
                                            Music
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="interest[]" id="" value="Photography">
                                            Photography
                                        </label>
                                    </div>
                                    <script type="text/javascript">
                                        var array = []
                                        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
                                        if (checkboxes.length < 2) {
                                            alert("You can only select a maximum of " + limit + " items from this section")
                                            this.checked = false
                                        }
                                        // checkboxlimit(array, 2)
                                    </script>
                                </div>

                            </p>

                        </div>
                    </div>
                </div>



                <div class=" form-group col-sm-4 col-12 p-2">

                    <div class="dropdown open  drop-1">
                        <button class="btn  dropdown-toggle w-100" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h5>Career Preference</h5>
                        </button>
                        <div class="dropdown-menu w-100 pr-3 pl-3" aria-labelledby="triggerId">
                            <p class="dropdown-item" href="#">
                                <div class="form-check">
                                    <div id="check2" name="check2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="career[]" id="" value="Teaching">
                                            Teaching
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="career[]" id="" value="Research Work">
                                            Research Work
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="career[]" id="" value="Government Job">
                                            Govt. Job
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="career[]" id="" value="Public Sector">
                                            Public Sector Undertaking
                                        </label>
                                    </div>


                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="career[]" id="" value="Private">
                                            Private Industry
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="career[]" id="" value="Studies">
                                            Higher Studies
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="career[]" id="" value="Management Studies">
                                            Management Studies
                                        </label>
                                    </div>
                                    <script type="text/javascript">
                                        checkboxlimit(document.forms.check2.career, 2)
                                    </script>
                                </div>

                            </p>

                        </div>
                    </div>
                </div>

                <div class=" form-group col-sm-4 col-12  p-2">
                    <div class="dropdown open drop-1">
                        <button class="btn dropdown-toggle w-100" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h5>Type of services</h5>
                        </button>
                        <div class="dropdown-menu w-100 pr-3 pl-3" aria-labelledby="triggerId">
                            <p class="dropdown-item" href="#">
                                <div class="form-check">
                                    <div id="check3">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="services[]" id="" value="Coaching for competitive examination, job interview">
                                            Coaching for competitive <br> examination, job interview
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="services[]" id="" value="Supervisory and
                                            communication skill development">
                                            Supervisory and
                                            communication <br> skill development
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="services[]" id="" value="Training for self-employment">
                                            Training for self-employment
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="services[]" id="" value="Guidance on job opportunities in India and abroad">
                                            Guidance on job opportunities
                                            <br>in India and abroad
                                        </label>
                                    </div>


                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="services[]" id="" value="Arranging training in industries and visit to industry">
                                            Arranging training in industries <br> and visit to industry
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="services[]" id="" value="Awareness on social, cultural and ethical values and norms">
                                            Awareness on social, cultural <br> and ethical values and norms
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="services[]" id="" value="General counselling services">
                                            General counselling services
                                        </label>
                                    </div>
                                    <script type="text/javascript">
                                        checkboxlimit(document.forms.check3.services, 3)
                                    </script>
                                </div>
                            </p>


                        </div>
                    </div>
                </div>





            </div>


            <div class="form-row">
                <div class="form-group col-6 p-2">




                    <label for=""> <i class="fas fa-mobile"> Mobile No </i></label>
                    <input type="text" name="mobile" id="phone" class="form-control" placeholder="mobile no " aria-describedby="helpId" onkeyup="validationPhone()">


                </div>
                <div class="alert" role="alert" style="display:none;" id="alertingp">
                    <h6 class="p-0 m-0">please enter a valid phone number</h6>
                </div>

                <div class="form-group col-6 p-2">

                    <label for=""><i class="fas fa-lock"> Password </i></label>
                    <input type="password" name="password" id="" class="form-control " placeholder="password" aria-describedby="helpId">


                </div>

            </div>

            <div class="form-row pl-4 pr-4 mt-4 pt-3">

                <p style="font-size:small;font-weight:500;font-family:sans-serif d-flex text-align-justify">
                    <input type="checkbox" class="form-check-input mt-2 " name="" id="" value="checkedValue">I agree to
                    abide by the rules and the regulations of the ISTE regarding Student Membership and
                    functioning of Student Chapters.Single Student Membership will not be entertained. <br> Kindly apply
                    along with all Students and through ISTE Student Chapter only </p>


            </div>

            <div class="form-row pb-3">

                <div class="form-check">


                    <button name="Save" type="submit" class="btn btn-sm pt-1 pb-1">Save</button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js">
    </script>
</body>

</html>