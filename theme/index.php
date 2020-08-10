<?php
  // Show PHP errors
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);

  #Ligação Base de Dados
  require_once 'db/dbase.php';
  $objUser = new User();

  #LOGIN
  /* Displays user information and some useful messages */
  session_start();
  // Check if user is logged in using the session variable
  if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "Deve efetuar o login antes de visitar o seu portal!";
      header("location: ../login/error.php");    
  } else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
  }
 
   // Display message about account verification link only once
 if ( isset($_SESSION['message']) ) {
   echo $_SESSION['message'];
               
   // Don't annoy the user with more messages upon page refresh
   unset( $_SESSION['message'] );
 }
 
 // Keep reminding the user this account is not active, until they activate
 if ( !$active ){
   echo '<div class="info"> A sua conta não foi verificada, por favor confirme no seu e-mail clicando no link!</div>';
 }
 

?>

<!DOCTYPE html>
<html lang="pt">
  <?php require_once 'includes/head.php'; ?>
  <body onload="startTime()">
    <!-- Loader starts-->
    <?php require_once 'includes/loader.php'; ?>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <?php require_once 'includes/header.php'; ?>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <?php require_once 'includes/sidebar.php'; ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6">
                  <h3>
                     Default</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Principal</li>
                  </ol>
                </div>
                <div class="col-lg-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark pull-right">
                    <ul>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                      <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                        <form class="form-inline search-form">
                          <div class="form-group form-control-search">
                            <input type="text" placeholder="Search..">
                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row second-chart-list third-news-update">
              <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                <div class="card o-hidden profile-greeting">
                  <div class="card-body">
                    <div class="media">
                      <div class="badge-groups w-100">
                        <div class="badge f-12"><i class="mr-1" data-feather="clock"></i><span id="txt"></span></div>
                        <!--<div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>-->
                      </div>
                    </div>
                    <div class="greeting-user text-center">
                      <div class="profile-vector"><img class="img-fluid" src="../assets/images/dashboard/welcome.png" alt=""></div>
                      <h4 class="f-w-600"><span id="greeting">Bom dia</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                      <p><span> You have done 57.6% more sales today. Check your new badge in your profile.</span></p>
                      <div class="whatsnew-btn"><a class="btn btn-primary">Novidades !</a></div>
                      <div class="left-icon"><i class="fa fa-bell"> </i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
                <div class="card earning-card">
                  <div class="card-body p-0">
                    <div class="row m-0">
                      <div class="col-xl-3 earning-content p-0">
                        <div class="row m-0 chart-left">
                          <div class="col-xl-12 p-0 left_side_earning">
                            <h5>Dashboard</h5>
                            <p class="font-roboto">Visão geral da Gestão do Condomínio</p>
                          </div>
                          <div class="col-xl-12 p-0 left_side_earning">
                            <?php
                              $query = "SELECT FORMAT(SUM(IF (id_despesa>0, -1*valor, valor)),2) as saldo from banco";
                              $stmt = $objUser->runQuery($query);
                              $stmt->execute();
                            ?>  
                            <h5>
                              <?php 
                                if($stmt->rowCount() > 0){
                                  while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    print($rowUser['saldo']);
                                  }
                                }
                              ?>  
                             € </h5>
                            <p class="font-roboto">Saldo Conta Corrente</p>
                          </div>
                          <div class="col-xl-12 p-0 left_side_earning">
                            <?php
                              $query = "SELECT FORMAT(SUM(IF (id_despesa>0, 0, valor)),2) as receita from banco where MONTH(data) = (MONTH(current_date())-1) and year(data) = year(current_date())";
                              $stmt = $objUser->runQuery($query);
                              $stmt->execute();
                            ?> 
                            <h5>
                              <?php 
                                  if($stmt->rowCount() > 0){
                                    while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
                                      print($rowUser['receita']);
                                    }
                                  }
                                ?>  
                              € 
                            </h5>
                            <p class="font-roboto">Receita no último mês</p>
                          </div>
                          <div class="col-xl-12 p-0 left_side_earning">
                            <?php
                                $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = (MONTH(current_date())-1) and year(data) = year(current_date())";
                                $stmt = $objUser->runQuery($query);
                                $stmt->execute();
                              ?> 
                              <h5>
                                <?php 
                                    if($stmt->rowCount() > 0){
                                      while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        print($rowUser['despesa']);
                                      }
                                    }
                                  ?>  
                                € 
                              </h5>
                            <p class="font-roboto">Despesa no último mês</p>
                          </div>
                          <div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div>
                        </div>
                      </div>
                      <div class="col-xl-9 p-0">
                        <div class="chart-right">
                          <div class="row m-0 p-tb">
                            <div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
                              <div class="inner-top-left">
                                <ul class="d-flex list-unstyled">
                                  <li>Daily</li>
                                  <li>Weekly</li>
                                  <li class="active">Monthly</li>
                                  <li>Yearly</li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
                              <div class="inner-top-right">
                                <ul class="d-flex list-unstyled justify-content-end">
                                  <li>Receita</li>
                                  <li>Despesa</li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xl-12">
                              <div class="card-body p-0">
                                <div class="current-sale-container">
                                  <div id="chart-currently"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row border-top m-0">
                          <div class="col-xl-4 pl-0 col-md-6 col-sm-6">
                            <div class="media p-0">
                              <div class="media-left"><i class="icofont icofont-crown"></i></div>
                              <div class="media-body">
                                <h6>Referral Earning</h6>
                                <p>$5,000.20</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-6 col-sm-6">
                            <div class="media p-0">
                              <div class="media-left bg-secondary"><i class="icofont icofont-heart-alt"></i></div>
                              <div class="media-body">
                                <h6>Cash Balance</h6>
                                <p>$2,657.21</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-12 pr-0">
                            <div class="media p-0">
                              <div class="media-left"><i class="icofont icofont-cur-dollar"></i></div>
                              <div class="media-body">
                                <h6>Sales forcasting</h6>
                                <p>$9,478.50     </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="row m-0 chart-main">
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                          <div class="hospital-small-chart">
                            <div class="small-bar">
                              <div class="small-chart flot-chart-container"></div>
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="right-chart-content">
                              <h4>1001</h4><span>purchase </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                          <div class="hospital-small-chart">
                            <div class="small-bar">
                              <div class="small-chart1 flot-chart-container"></div>
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="right-chart-content">
                              <h4>1005</h4><span>Sales</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                          <div class="hospital-small-chart">
                            <div class="small-bar">
                              <div class="small-chart2 flot-chart-container"></div>
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="right-chart-content">
                              <h4>100</h4><span>Sales return</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media border-none align-items-center">
                          <div class="hospital-small-chart">
                            <div class="small-bar">
                              <div class="small-chart3 flot-chart-container"></div>
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="right-chart-content">
                              <h4>101</h4><span>Purchase ret</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="media align-items-center">
                      <div class="media-body right-chart-content">
                        <h4>$95,900<span class="new-box">Hot</span></h4><span>Purchase Order Value</span>
                      </div>
                      <div class="knob-block text-center">
                        <input class="knob1" data-width="10" data-height="70" data-thickness=".3" data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff" data-bgcolor="#eef5fb" value="60">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 xl-50 chart_data_right second d-none"> 
                <div class="card">
                  <div class="card-body">
                    <div class="media align-items-center">
                      <div class="media-body right-chart-content"> 
                        <h4>$95,000<span class="new-box">New</span></h4><span>Product Order Value</span>
                      </div>
                      <div class="knob-block text-center">
                        <input class="knob1" data-width="50" data-height="70" data-thickness=".3" data-fgcolor="#7366ff" data-linecap="round" data-angleoffset="0" value="60">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 news box-col-6">
                <div class="card">
                  <div class="card-header">
                    <div class="header-top">
                      <h5 class="m-0">News & Update</h5>
                      <div class="card-header-right-icon">
                        <select class="button btn btn-primary">
                          <option>Today</option>
                          <option>Tomorrow</option>
                          <option>Yesterday</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="news-update">
                      <h6>36% off For pixel lights Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                    </div>
                    <div class="news-update">
                      <h6>We are produce new product this</h6><span> Lorem Ipsum is simply text of the printing... </span>
                    </div>
                    <div class="news-update">
                      <h6>50% off For COVID Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="bottom-btn"><a href="#">More...</a></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                <div class="row"> 
                  <div class="col-xl-12 appointment">
                    <div class="card">
                      <div class="card-header card-no-border">
                        <div class="header-top">
                          <h5 class="m-0">appointment</h5>
                          <div class="card-header-right-icon">
                            <select class="button btn btn-primary">
                              <option>Today</option>
                              <option>Tomorrow</option>
                              <option>Yesterday</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="appointment-table table-responsive">
                          <table class="table table-bordernone">
                            <tbody>
                              <tr>
                                <td><img class="img-fluid img-40 rounded-circle mb-3" src="../assets/images/appointment/app-ent.jpg" alt="Image description">
                                  <div class="status-circle bg-primary"></div>
                                </td>
                                <td class="img-content-box"><span class="d-block">Venter Loren</span><span class="font-roboto">Now</span></td>
                                <td>
                                  <p class="m-0 font-primary">28 Sept</p>
                                </td>
                                <td class="text-right">
                                  <div class="button btn btn-primary">Done<i class="fa fa-check-circle ml-2"></i></div>
                                </td>
                              </tr>
                              <tr>
                                <td><img class="img-fluid img-40 rounded-circle" src="../assets/images/appointment/app-ent.jpg" alt="Image description">
                                  <div class="status-circle bg-primary"></div>
                                </td>
                                <td class="img-content-box"><span class="d-block">John Loren</span><span class="font-roboto">11:00</span></td>
                                <td>
                                  <p class="m-0 font-primary">22 Sept</p>
                                </td>
                                <td class="text-right">
                                  <div class="button btn btn-danger">Pending<i class="fa fa-check-circle ml-2"></i></div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 alert-sec">
                    <div class="card bg-img">
                      <div class="card-header">
                        <div class="header-top">
                          <h5 class="m-0">Alert  </h5>
                          <div class="dot-right-icon"><i class="fa fa-ellipsis-h"></i></div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="body-bottom">
                          <h6>  10% off For drama lights Couslations...</h6><span class="font-roboto">Lorem Ipsum is simply dummy...It is a long established fact that a reader will be distracted by  </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 notification box-col-6">
                <div class="card">
                  <div class="card-header card-no-border">
                    <div class="header-top">
                      <h5 class="m-0">notification</h5>
                      <div class="card-header-right-icon">
                        <select class="button btn btn-primary">
                          <option>Today</option>
                          <option>Tomorrow</option>
                          <option>Yesterday</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="media">
                      <div class="media-body">
                        <p>20-04-2020 <span>10:10</span></p>
                        <h6>Updated Product<span class="dot-notification"></span></h6><span>Quisque a consequat ante sit amet magna...</span>
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-body">
                        <p>20-04-2020<span class="pl-1">Today</span><span class="badge badge-secondary">New</span></p>
                        <h6>Tello just like your product<span class="dot-notification"></span></h6><span>Quisque a consequat ante sit amet magna... </span>
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-body">
                        <div class="d-flex mb-3">
                          <div class="inner-img"><img class="img-fluid" src="../assets/images/notification/1.jpg" alt="Product-1"></div>
                          <div class="inner-img"><img class="img-fluid" src="../assets/images/notification/2.jpg" alt="Product-2"></div>
                        </div><span class="mt-3">Quisque a consequat ante sit amet magna...</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 appointment box-col-6">
                <div class="card">
                  <div class="card-header">
                    <div class="header-top">
                      <h5 class="m-0">Market Value</h5>
                      <div class="card-header-right-icon">
                        <select class="button btn btn-primary">
                          <option>Year</option>
                          <option>Month</option>
                          <option>Day</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-Body">
                    <div class="radar-chart">
                      <div id="marketchart">       </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-100 chat-sec box-col-6">
                <div class="card chat-default">
                  <div class="card-header card-no-border">
                    <div class="media media-dashboard">
                      <div class="media-body"> 
                        <h5 class="mb-0">Chat</h5>
                      </div>
                      <div class="icon-box"><i class="fa fa-ellipsis-h"></i></div>
                    </div>
                  </div>
                  <div class="card-body chat-box">
                    <div class="chat">
                      <div class="media left-side-chat">
                        <div class="media-body d-flex">
                          <div class="img-profile"> <img class="img-fluid" src="../assets/images/User.jpg" alt="Profile"></div>
                          <div class="main-chat">
                            <div class="message-main"><span class="mb-0">Hi deo, Please send me link.</span></div>
                            <div class="sub-message message-main"><span class="mb-0">Right Now</span></div>
                          </div>
                        </div>
                        <p class="f-w-400">7:28 PM</p>
                      </div>
                      <div class="media right-side-chat">
                        <p class="f-w-400">7:28 PM</p>
                        <div class="media-body text-right">
                          <div class="message-main pull-right"><span class="mb-0 text-left">How can do for you</span>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                      <div class="media left-side-chat">
                        <div class="media-body d-flex">
                          <div class="img-profile"> <img class="img-fluid" src="../assets/images/User.jpg" alt="Profile"></div>
                          <div class="main-chat">
                            <div class="sub-message message-main mt-0"><span>It's argenty</span></div>
                          </div>
                        </div>
                        <p class="f-w-400">7:28 PM</p>
                      </div>
                      <div class="media right-side-chat">
                        <div class="media-body text-right">
                          <div class="message-main pull-right"><span class="loader-span mb-0 text-left" id="wave"><span class="dot"></span><span class="dot"></span><span class="dot"></span></span></div>
                        </div>
                      </div>
                      <div class="input-group">
                        <input class="form-control" id="mail" type="text" placeholder="Type Your Message..." name="text">
                        <div class="send-msg"><i data-feather="send"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
                <div class="card gradient-primary o-hidden">
                  <div class="card-body">
                    <div class="setting-dot">
                      <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                    </div>
                    <div class="default-datepicker">
                      <div class="datepicker-here" data-language="pt"></div>
                    </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                </span></span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2018 © Cuba All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = MONTH(current_date()) and year(data) = year(current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
            if ($rowUser['despesa'] == null){
              echo "0,00";  
            } print($rowUser['despesa']);
            }
        }
        ?>  
    </h5>
    <?php 
    $query = "SELECT FORMAT(SUM(IF (id_receita>0, 0, valor)),2) as despesa from banco where MONTH(data) = (MONTH(current_date())-1) and year(data) = year(current_date())";
    $stmt = $objUser->runQuery($query);
    $stmt->execute();
    ?> 
    <h5 id="des2">
    <?php 
        if($stmt->rowCount() > 0){
            while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
              if ($rowUser['despesa'] == null){
                echo "0,00";  
              } print($rowUser['despesa']);
              }
        }
        ?>  
    </h5>


    <p id="demo"></p>
    <p id="demo2"></p>
    <p id="demo3"></p>
    <p id="demo4"></p>
    <p id="demo5"></p>
    <p id="demo6"></p>
    <p id="demo7"></p>
    <p id="demo8"></p>
    <p id="demo9"></p>
    <p id="demo10"></p>
    <p id="demo11"></p>
    <p id="demo12"></p>
    <p id="demo13"></p>

    <script>
      var month = new Array();
      month[0] = "jan";
      month[1] = "fev";
      month[2] = "mar";
      month[3] = "abr";
      month[4] = "mai";
      month[5] = "jun";
      month[6] = "jul";
      month[7] = "ago";
      month[8] = "set";
      month[9] = "out";
      month[10] = "nov";
      month[11] = "dez";
      month[-1] = "dez";
      month[-2] = "nov";
      month[-3] = "out";
      month[-4] = "set";
      month[-5] = "ago";
      month[-6] = "jul";
      month[-7] = "jun";
      month[-8] = "mai";
      month[-9] = "abr";
      month[-10] = "mar";
      month[-11] = "fev";
      month[-12] = "jan";
    
      var d = new Date();
      var n = month[d.getMonth()];
      document.getElementById("demo").innerHTML = n;
      var d1= Number(d.getMonth());
      var d2 = d1-1;
      var n12 = month[d2];
      document.getElementById("demo2").innerHTML = n12;
      var d3 = d1-2;
      var n11 = month[d3];
      document.getElementById("demo3").innerHTML = n11;
      var d4 = d1-3;
      var n10 = month[d4];
      document.getElementById("demo4").innerHTML = n10;
      var d5 = d1-4;
      var n9 = month[d5];
      document.getElementById("demo5").innerHTML = n9;
      var d6 = d1-5;
      var n8 = month[d6];
      document.getElementById("demo6").innerHTML = n8;
      var d7 = d1-6;
      var n7 = month[d7];
      document.getElementById("demo7").innerHTML = n7;
      var d8 = d1-7;
      var n6 = month[d8];
      document.getElementById("demo8").innerHTML = n6;
      var d9 = d1-8;
      var n5 = month[d9];
      document.getElementById("demo9").innerHTML = n5;
      var d10 = d1-9;
      var n4 = month[d10];
      document.getElementById("demo10").innerHTML = n4;
      var d11 = d1-10;
      var n3 = month[d11];
      document.getElementById("demo11").innerHTML = n3;
      var d12 = d1-11;
      var n2 = month[d12];
      document.getElementById("demo12").innerHTML = n2;
      var d13 = d1-12;
      var n1 = month[d13];
      document.getElementById("demo13").innerHTML = n1;



    </script>

    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/popper.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/sidebar-menu.js"></script>
    <script src="../assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/chart/chartist/chartist.js"></script>
    <script src="../assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="../assets/js/chart/knob/knob.min.js"></script>
    <script src="../assets/js/chart/knob/knob-chart.js"></script>
    <script src="../assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="../assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="../assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="../assets/js/dashboard/default.js"></script>
    <script src="../assets/js/notify/index.js"></script>
    <script src="../assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="../assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="../assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="../assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>