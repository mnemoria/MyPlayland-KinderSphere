<?php
session_start();

$baseURL = '';
if (isset($_SERVER['SERVER_NAME'])) {
    $baseURL = ($_SERVER['SERVER_NAME'] === 'localhost') ? '/playland' : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="<?php echo $baseURL; ?>/img/logo.png" type="image/x-icon" />
    <title>
        <?php if (isset($title)) echo $title . ' |'; ?> KinderSphere
    </title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo $baseURL; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href="<?php echo $baseURL; ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for dataTable-->
    <link href="<?php echo $baseURL; ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body id="page-top">
    <!-- <h1>HEADER TEST FROM BASE</h1> -->
