<html>
<head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <style >
      .view {
        height: 100%;
      }

      .view { background-image: linear-gradient(to right, #314755 0%, #26a0da 51%, #314755 100%)}
      .btn-grad:hover { background-position: right center;
      }
      ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: #141f1f;
      }
      input {
        text-align: center;
      }

    </style>
  </head>
  

  <script type="text/javascript" src="jquery-2.2.0.min.js"></script>
  <script type="text/javascript">
    function sendOTP() {
      $("#sendOtp").attr("disabled", true);
      var data = {
       /* "countryCode": $('#country_code').val(),*/
       "mobileNumber": $('#number').val()
     };
     $.ajax({
      url: 'https://refuel.site/projects/tutorapp/sendOTPSample-PHP-master/sendotp.php?action=submitOTP',
      type: 'POST',
      data: data,
      success: function (response) {
        if (response == 'OTP SENT SUCCESSFULLY') {
          $('#hiddenCode').val($('#country_code').val());
          $('#hiddenNumber').val($('#number').val());
          $('#verifyOtpForm').show();
          $('#sendOtpForm').hide();
          $('#alertMessage').html(response+ " PLEASE VERIFY.");

          $("#sendOtp").attr("disabled", false);
        }
      },
      error: function (jqXHR, textStatus, ex) {
        console.log(textStatus + "," + ex + "," + jqXHR.responseText);
      }
    });
   }
   function verifyBySendOtp() {
    $("#sendOtp").attr("disabled", true);
    var data = {
     /* countryCode: $('#hiddenCode').val(),*/
     mobileNumber: $('#hiddenNumber').val(),
     oneTimePassword: $('#oneTimePassword').val()
   };
   $.ajax({
    url: 'https://refuel.site/projects/tutorapp/sendOTPSample-PHP-master/sendotp.php?action=verifyBySendOtp',
    type: 'POST',
    data: data,
    success: function (response) {
      if (response == 'NUMBER VERIFIED SUCCESSFULLY') {
        $('#verifyOtpForm').hide();
        $('#sendOtpForm').show();
        $('#alertMessage').html(response+ " TRY AGAIN.");

        $("#sendOtp").attr("disabled", true);
      }else{
        $('#alertMessage').html(response+ " TRY AGAIN.");
      }
    },
    error: function (jqXHR, textStatus, ex) {
      console.log(textStatus + "," + ex + "," + jqXHR.responseText);
    }
  });
 }

</script>
</head>
<body class="view">
  <pre>

    <!-- Start your project here-->
    <div >
    <div class="flex-center flex-column flex-row z-depth-5 white"  style="margin: auto; max-width: 850px; height: auto; " >
        <br />
        <h1 class="animated fadeIn mb-4  z-depth-2 h1-responsive blue-text" style="padding: 5px 15px; ">TEST SendOTP Service</h1>
        <hr />
        <h6 class="animated h6-responsive fadeIn mb-1 ">Thank you for using our product. We're glad you're with us.</h6>

        <div id="alertMessage" class="-text" ></div>

        <form id="sendOtpForm" role="form" >
         <input type="text" name="number" placeholder="Enter Mobile number" id="number" ><br />
         <center><input type="button" class="btn btn-info  waves-effect -text" name="sendOtp" id="sendOtp" value="Request OTP" onclick="sendOTP()"> </center> 
       </form>

       <form id="verifyOtpForm" role="form"  style="display:none">
        <input type="hidden" name="hiddenCode" id="hiddenCode">
        <input type="hidden" name="hiddenNumber" id="hiddenNumber">
        <input type="text" name="oneTimePassword" placeholder="Enter OTP" id="oneTimePassword"  class="-text"><br />
        <center><input type="button" class="btn btn-info waves-effect -text" name="verifyOtp" id="verifyOtp" value="Verify OTP" onclick="verifyBySendOtp()"></center>
      </form>
      <br />
      <p class="animated fadeIn white-text">Msg91 Team</p> <br /><br />
    </div>
  </div>
  <!-- /Start your project here-->


</pre>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/tether.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>
