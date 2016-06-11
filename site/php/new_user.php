<?php
/**
 * Created by PhpStorm.
 * User: ldimovska
 * Date: 10.06.2016
 * Time: 22:53
 */
$hostname="localhost";
$username="root";
$password="";

$dbhandle=mysqli_connect($hostname, $username, $password) or die("Could not connect to database");
$selected=mysqli_select_db($dbhandle, "foodify_database");


if(isset($_POST['email']) && isset($_POST['password'])) {
    $mail=$_POST['email'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $pass=$_POST['password'];

    mysqli_query($dbhandle, "INSERT INTO klient (EMAIL, PASSWORD, IME, PREZIME) VALUES ('$mail', '$pass', '$name', '$surname')");

    echo "User added successfuly";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Нов корисник</title>
    <meta charset="utf-8">

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/newUser.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


    <!--Javascripts -->
    <script src="../js/newUser.js"></script>


    <link rel="icon" href="../images/favicon.ico">
    <link rel="shortcut icon" href="../images/favicon.ico" />
    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-migrate-1.1.1.js"></script>
    <script src="../js/jquery.equalheights.js"></script>
    <script src="../js/jquery.ui.totop.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script>
        $(document).ready(function(){

            $().UItoTop({ easingType: 'easeOutQuart' });
        })
    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>

    <![endif]-->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="../css/ie.css">
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="../js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="../css/ie1.css">
    <![endif]-->

</head>
<body  class="">

<!--==============================header=================================-->
<header>
    <div class="container_12">
        <div class="grid_12">
            <div class="socials">
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"> </a>
                <a href="#" class="last"></a>
            </div>
            <h1><a href="index.html"><img src="../images/logo.png" alt="Boo House"></a> </h1>
            <div class="menu_block">


                <nav id="bt-menu" class="bt-menu">
                    <a href="#" class="bt-menu-trigger"><span>Мени</span></a>
                    <ul>
                        <li class="bt-icon "><a href="../index.html">Дома</a></li>
                        <li class="bt-icon"><a href="../index-1.html">За нас</a></li>
                        <li class="bt-icon"><a href="../index-2.html">Мени</a></li>
                        <li class="current bt-icon"><a href="../index-3.html">Најава</a></li>
                        <li class="bt-icon"><a href="../index-4.html">Нарачај</a></li>
                        <li class="bt-icon"><a href="../index-5.html">Контакт</a></li>
                    </ul>
                </nav>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>

<!--==============================Content=================================-->

<div class="content">
    <div class="container ">
        <div class="row">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="step1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Confirm Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Mobile Number</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <div class="row">
                                                <div class="col-md-3 col-xs-3">
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                                </div>
                                                <div class="col-md-9 col-xs-9">
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="step2">
                                    <div class="step_21">
                                        <div class="row">

                                        </div>
                                    </div>
                                    <div class="step-22">

                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <div class="step33">
                                    <h5><strong>Basic Details</strong></h5>
                                    <hr>
                                    <div class="row mar_ned">

                                    </div>
                                    <div class="row mar_ned">
                                        <div class="col-md-4 col-xs-3">
                                            <p align="right"><stong>Date of birth</stong></p>
                                        </div>
                                        <div class="col-md-8 col-xs-9">
                                            <div class="row">
                                                <div class="col-md-4 col-xs-4 wdth">
                                                    <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                        <option value="">Date</option>
                                                        <option value="2">1</option>
                                                        <option value="1">2</option>
                                                        <option value="4">3</option>
                                                        <option value="5">4</option>
                                                        <option value="6">5</option>
                                                        <option value="3">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-xs-4 wdth">
                                                    <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                        <option value="">Month</option>
                                                        <option value="2">Jan</option>
                                                        <option value="1">Feb</option>
                                                        <option value="4">Mar</option>
                                                        <option value="5">Apr</option>
                                                        <option value="6">May</option>
                                                        <option value="3">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">Aug</option>
                                                        <option value="9">Sept</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-xs-4 wdth">
                                                    <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                        <option value="">Year</option>
                                                        <option value="2">1990</option>
                                                        <option value="1">1991</option>
                                                        <option value="4">1992</option>
                                                        <option value="5">1993</option>
                                                        <option value="6">1994</option>
                                                        <option value="3">1995</option>
                                                        <option value="7">1996</option>
                                                        <option value="8">1997</option>
                                                        <option value="9">1998</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mar_ned">
                                        <div class="col-md-4 col-xs-3">
                                            <p align="right"><stong>Marital Status</stong></p>
                                        </div>
                                        <div class="col-md-8 col-xs-9">
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Single
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Married
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mar_ned">
                                        <div class="col-md-4 col-xs-3">
                                            <p align="right"><stong>Highest Education</stong></p>
                                        </div>
                                        <div class="col-md-8 col-xs-9">
                                            <select name="highest_qualification" id="highest_qualification" class="dropselectsec">
                                                <option value=""> Select Highest Education</option>
                                                <option value="1">Ph.D</option>
                                                <option value="2">Masters Degree</option>
                                                <option value="3">PG Diploma</option>
                                                <option value="4">Bachelors Degree</option>
                                                <option value="5">Diploma</option>
                                                <option value="6">Intermediate / (10+2)</option>
                                                <option value="7">Secondary</option>
                                                <option value="8">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mar_ned">
                                        <div class="col-md-4 col-xs-3">
                                            <p align="right"><stong>Specialization</stong></p>
                                        </div>
                                        <div class="col-md-8 col-xs-9">
                                            <input type="text" name="specialization" id="specialization" placeholder="Specialization" class="dropselectsec" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mar_ned">
                                        <div class="col-md-4 col-xs-3">
                                            <p align="right"><stong>Year of Passed Out</stong></p>
                                        </div>
                                        <div class="col-md-8 col-xs-9">
                                            <select name="year_of_passedout" id="year_of_passedout" class="birthdrop">
                                                <option value="">Year</option>
                                                <option value="1980">1980</option>
                                                <option value="1981">1981</option>
                                                <option value="1982">1982</option>
                                                <option value="1983">1983</option>
                                                <option value="1984">1984</option>
                                                <option value="1985">1985</option>
                                                <option value="1986">1986</option>
                                                <option value="1987">1987</option>
                                                <option value="1988">1988</option>
                                                <option value="1989">1989</option>
                                                <option value="1990">1990</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mar_ned">
                                        <div class="col-md-4 col-xs-3">
                                            <p align="right"><stong>Total Experience</stong></p>
                                        </div>
                                        <div class="col-md-8 col-xs-9">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6 wdth">
                                                    <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                        <option value="">Month</option>
                                                        <option value="2">Jan</option>
                                                        <option value="1">Feb</option>
                                                        <option value="4">Mar</option>
                                                        <option value="5">Apr</option>
                                                        <option value="6">May</option>
                                                        <option value="3">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">Aug</option>
                                                        <option value="9">Sept</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-xs-6 wdth">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mar_ned">

                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="step44">
                                    <h5>Completed</h5>


                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
<!--    <div class="container_12">-->
<!--        <div class="grid_12">-->
<!--            <h3 class="">Нов корисник</h3>-->
<!--            <!-- You only need this form and the form-login.css -->-->
<!---->
<!--            <form class="form-login" method="POST" action="new_user.php">-->
<!---->
<!--                <div class="form-log-in-with-email">-->
<!---->
<!--                    <div class="form-white-background">-->
<!---->
<!--                        <div class="form-title-row">-->
<!--                            <h1>Sign in</h1>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-row">-->
<!--                            <label>-->
<!--                                <span>Име</span>-->
<!--                                <input type="text" name="name">-->
<!--                            </label>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-row">-->
<!--                            <label>-->
<!--                                <span>Презиме</span>-->
<!--                                <input type="text" name="surname">-->
<!--                            </label>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-row">-->
<!--                            <label>-->
<!--                                <span>Е-маил</span>-->
<!--                                <input type="email" name="email">-->
<!--                            </label>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-row">-->
<!--                            <label>-->
<!--                                <span>Лозинка</span>-->
<!--                                <input type="password" name="password">-->
<!--                            </label>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-row">-->
<!--                            <button type="submit">Sign in</button>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--            </form>-->
<!---->
<!--        </div>-->
<!--    </div>-->
</div>


<!--==============================footer=================================-->

<footer>
    <div class="container_12">
        <div class="grid_6 prefix_3">
            <a href="../index.html" class="f_logo"><img src="../images/f_logo.png" alt=""></a>
            <div class="copy">
                Website дизајниран од Тим 13
                <br>
                Управување на ИКТ
                <br>
                &copy; 2016

            </div>
        </div>
    </div>
</footer>
<script>
    $(document).ready(function(){
        $(".bt-menu-trigger").toggle(
            function(){
                $('.bt-menu').addClass('bt-menu-open');
            },
            function(){
                $('.bt-menu').removeClass('bt-menu-open');
            }
        );
    })

</script>
</body>

</html>
