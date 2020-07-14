<?php

     include_once 'handler.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  #logo {
    float:left;
}
#menu {
    float:left;
}
#header {
    clear: both;
    overflow: auto;
}
    .highlightme {
      background-color: #4CAF50;
    }
    .navbar {
      overflow: hidden;
      background-color: #333;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .navbar a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .navbar a:hover {
      background-color: #ddd;
      color: black;
    }

    .navbar a.active {
      background-color: #4CAF50;
      color: white;
    }

    .navbar .icon {
      display: none;
    }

    @media screen and (max-width: 600px) {
      .navbar a:not(:first-child) {
        display: none;
      }

      .navbar a.icon {
        float: right;
        display:block;
      }
    }

    @media screen and (max-width: 600px) {
      .navbar.responsive .icon {
        position: absolute;
        right: 0;
        bottom: 0;
      }

      .navbar.responsive a {
        float: none;
        display: block;
        text-align: left;
      }

    }



    .button {
      background-color: #000000;
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-left: auto;
      margin-right: auto;
      -webkit-transition-duration: 0.4s;
      /* Safari */
      transition-duration: 0.4s;
      cursor: pointer;
      position:relative;
      left: auto;right: auto;
      top: auto; bottom: auto;
    }

    .button1:hover {
      background-color: red;
      color: white;
    }

    body {
      background-image: url('trashland.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
      background-color: #FFFFFF
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: Verdana, sans-serif;
    }

    .mySlides {
      display: none;
    }

    img {
      vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {
        font-size: 11px
      }
    }


    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: transparency;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #C5CB03;
    }


    footer {
  color: #666;
  background: #222;
  position: fixed;
  bottom: 0px;
  padding: 1px 0 18px 0;
  border-top: 1px solid #000;
  text-align: center;
  width: 100%;
  bottom: 0px;
}
footer a {
  color: #999;
}
footer a:hover {
  color: #efefef;
}

/* responsive footer fix by Aalaap Ghag
This is where the magic happens */
@media (max-width: 1000px) {

  footer  {
    padding-left: 20px;
    padding-right: 20px;
  }
}

.container {
  max-width: 1500px;
}
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PayPal Integration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #container{
            width: 100%;
            max-width: 500px;
            display: table;
            margin: 150px auto 0;
        }
        .productBlock{
            width: 100%;
            max-width: 200px;
            display: table;
            margin: 0 auto;
            border: 3px solid #666;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div class="productBlock">
            <div id="paypal-button-container"></div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'gold',
            layout: 'vertical',
            label: 'pay',

        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '1'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container');
  </script>
        </div>
    </div>
</body>
</html>
