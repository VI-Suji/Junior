<?php
    require_once('config.php');
    require_once('database.php');
    
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Razorpay Integartion</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
        <style>
            .razorpay-payment-button{
                 background:#6c5ce7;
                 color:whitesmoke;
                 font-size:0.8rem;
                 text-transform:uppercase;
                 letter-spacing:1;
                 display:block;
                 width:15vw;
                 height:8vh;
                 border:none;
                 padding:0.3rem 0.3rem;
            }
            .img_size{
                 margin:0 auto;
                 width:180px;
                 height:180px;
            }
            figcaption{
                 text-align:center;
                 letter-spacing:1;
            }
            .card-body{
                 font-size:0.8rem;
                 font-weight:bold;
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
  <div class="card-body"><p>Pay 400 for the registration </p>
  <div class="card-footer"><span class="price-new"> &#8377; 400</span>
<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="400" data-id="5">Pay Now</a></div>
</div>

               </div>
         </div>

       </div>
        
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  
  $('body').on('click', '.buy_now', function(e){
    var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var contact_number = $("#contact").attr("value");
    var options = {
    "key": "rzp_live_ykPL0KfoECSN6h",
    "amount": totalAmount * 100, // 2000 paise = INR 20
    "name": "ISTE TKMCE",
    "description": "Registration",
    "currency":"INR",
    "image": "./img/eletter.png",
    "handler": function (response){
            $.ajax({
            url: 'razorPaySuccess.php',
            type: 'post',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
            }, 
            success: function (msg) {
               
                window.location.href = 'thankyou.php';
            }
        });
      
    },
 
    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
   rzp1.open();
  e.preventDefault();
  });
 
</script>
    </body>
</html>