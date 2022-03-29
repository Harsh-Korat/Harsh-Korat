<?php include('./header.php'); ?>
 
      <title>Service Schedule</title>
      <link rel="stylesheet" href="../assets/css/calender.css">

</head>

<body>

<header>
  
<?php include('./nav.php'); ?>

</header>


<div class="welcome">
   <p>Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
</div>

 <div class="hr"></div>

    <div class="middle">

  <div class="vertical-nav">

    <ul class="list-group">
    <a class="list-group-item" href="#">Dashboard</a>
    <a class="list-group-item" href="./NewService.php">New Service Requests</a>
    <a class="list-group-item" href="./Upcoming.php">Upcoming Services</a>
    <a class="list-group-item active" href="./Service-Scheduling.php">Service Schedule</a>
    <a class="list-group-item" href="./ServiceProviderHistory.php">Service History</a>
    <a class="list-group-item" href="./ProviderRating.php">My Ratings</a>
    <a class="list-group-item" href="./BlockCustomer.php">Block Customer</a>
    <a class="list-group-item" href="#">Invoices</a>
    <a class="list-group-item" href="#">Notifications</a>
  </ul>

</div>


<?php

include '../Controller/Calender.php';

include '../Controller/ServiceSchedulingController.php';

$calendar = new Calendar();
$schedule = new ServiceSchedulingController();
$result = $schedule->getScheduleDetail();

foreach($result as $val){
    $id = $val['ServiceRequestId'];
    $date = $val['ServiceStartDate'];
    $calendar->add_event('Service: '.$id, $date , 1, 'green');

}

?>


<!-- Service Scheduling -->


  <div class="dov-content" id="dov">
    <?= $calendar ?>
  </div>

</div>


<!-- Footer -->


<?php include('./Footer.php'); ?>

</body>
</html>