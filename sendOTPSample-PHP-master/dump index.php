<div>
    <marquee><h1>TEST SendOTP Service</h1></marquee>
    <form id="sendOtpForm">
    <!--     <input type="text" name="country_code" placeholder="Country code" id="country_code"><br /> -->
        <input type="text" name="number" placeholder="Mobile number with country_code" id="number"><br />
        <input type="button" name="sendOtp" id="sendOtp" value="Request OTP" onclick="sendOTP()"> 
    </form>
    <form id="verifyOtpForm" style="display:none">
      <input type="text" name="oneTimePassword" placeholder="Enter OTP" id="oneTimePassword">
      <input type="hidden" name="hiddenCode" id="hiddenCode">
      <input type="hidden" name="hiddenNumber" id="hiddenNumber">
      <input type="button" name="verifyOtp" id="verifyOtp" value="Verify OTP" onclick="verifyBySendOtp()">
    </form>
</div> 
<hr>