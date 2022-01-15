<!doctype html>
<html lang="en">
  <head>
    <title>MotoService</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scaleable=no" />

    <!-- Bootstrap CSS -->
     <!-- Font Awesome -->
           <!--Import Google Icon Font-->
     
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
     <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/css/bootstrap-material-design.min.css" integrity="sha384-R80DC0KVBO4GSTw+wZ5x2zn2pu4POSErBkf8/fSFhPXHxvHJydT0CSgAP2Yo2r4I" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <link rel="stylesheet" href="css/main.css" />
         <!-- Material Design Bootstrap -->
     <link href="css/mdb.min.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
    <div class="container">
        <a href="./" class="navbar-brand" id="text">MotoService</a>
        <ul class="nav navbar-nav">
          <!-- Drop down meniu -->
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menutext" >Užsakymai<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu" id="navbar">
        <li><a href="#" id="menutext">Variklio</a></li>
        <li><a href="#" id="menutext">Dažymas</a></li>
        <li><a href="#" id="menutext">Važiuoklė</a></li>
        <li><a href="#" id="menutext">Ratų montavimas</a></li>
     </ul>
   </li>
  </ul>
</div>
</nav>

</p>
<!-- produktai -->
<div class="col-md-8">
  <div class="row">
    <h2 class="text-center">Siūlomos paslaugos<h2>
      <div class="col-md-3">
        <h4>Variklio tvarkymas</h4>
        <img src="images/engine.jpg" alt="Variklio perrinkimas" id="images"/>
        <p class="list-price text-danger">Kaina <s>15€</s></p>
        <p class="price">Kaina 1€</p>
        <button type="button" class="btn btn-success" data-toogle="modal" data-target="#details-1">Daugiau</button>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/js/bootstrap-material-design.js" integrity="sha384-3xciOSDAlaXneEmyOo0ME/2grfpqzhhTcM4cE32Ce9+8DW/04AGoTACzQpphYGYe" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>