<?php    
$title="Enquiry Car Quote | Maruti Suzuki Showroom in Nashik, Nagpur | SEVA"; 
?>

<?php 
 $pgDesc="Get A Car Quote or Enquiries about car at SEVA Maruti Suzuki ARENA Car Showroom in Nashik, Nagpur, Nanded, Dhule, Wardha, Nandurbar. Reply to your inquiry in time";
 $pgKeywords="Maruti Suzuki, Maruti Suzuki Insurance, Maruti Service Center, Maruti Suzuki Finance, services, service center,Maruti Suzuki Showroom, Nashik, Nagpur, car service, maruti suzuki service center, Maruti Insurance, enquiry, inquiry, get a quote, car quote, wardha, nanded, dhule, nandurbar";
 include 'header.php'; 
?>
<style type="text/css">
  .parsley-required{
    color: red;
  }
  .parsley-type{
    color:red;
  }
  .parsley-pattern{
    color: red;
  }
  .parsley-range{
    color: red;
  }
</style>
<main>

  <div class="container"> 
  <h2 class="innerpageHeading mt-5">Enquiry</h2>
  <div class="my-5">
  
  
    
  <div class="formsection">
    <form action="send_mail_enquiry.php" method="post" data-parsley-validate="parsley">
    <div class="my-4"><h5>Your Details</h5></div>
  <div class="form-row">
   
    <div class="form-group col-md-4">
    <label for="inputAddress2">Full Name  <span class="parsley-required" style="color:red">*</span></label>
     <input type="text" class="form-control" name="full_name" id="inputAddress" placeholder="Full Name" required="true" data-parsley-required-message="Please Enter Name"  data-parsley-pattern="^[a-zA-Z.,/ $()]+$" data-parsley-pattern-message="Name should be in text only">
    </div>
    <div class="form-group col-md-4">
    <label for="inputAddress2">Email  <span class="parsley-required" style="color:red">*</span></label>

    <input type="text" class="form-control" name="email" id="inputAddress2" placeholder="Enter your Email " required="true" data-parsley-required-message="Please Enter Email Id" data-parsley-type="email">  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Phone No  <span class="parsley-required" style="color:red">*</span></label>
    <input type="text" class="form-control" name="phone_no" id="inputAddress2" placeholder="Enter your Phone No." required="true" data-parsley-type="digits" maxlength="10" data-parsley-required-message="Please Enter Contact No" data-parsley-pattern=^[6-9]\d{9}$  data-parsley-pattern-message="Mobile no should starts with 6/7/8/9 AND 10 Digit">
    </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">City<span class="parsley-required" style="color:red">*</span></label>
    <select class="form-control city" required="true"  aria-required="true" aria-invalid="false" name="city" id="city" onchange="check(event);">
    <option value="Nagpur">Nagpur</option>
    <option value="Nanded">Nanded</option>
    <option value="Dhule">Dhule</option>
    <option value="Nandurbar">Nandurbar</option>
    <option value="Nashik">Nashik</option>
    <option value="Hinganghat">Hinganghat</option>
    </select>
  </div>
    <div class="form-group col-md-4">
    <label for="inputAddress2">Description</label>
  <textarea class="form-control" name="desc" aria-label="With textarea"></textarea>
    </div>
  </div>
<div class="form-group">
          <p style="font-size:12px"><span class="parsley-required">*</span><input type="checkbox" id="FormChkBoxBook6" name="FormChkBox" style="vertical-align: sub;" required="true" data-parsley-required-message="Please indicate that you accept the Terms and Conditions">
                    I agree <a href="disclaimer.php" style="color: blue">Terms and Conditions.</a> by clicking the ‘Continue’ button below and I am explicitly soliciting a call from Seva Maruti. Or its partners on my ‘Mobile’.</p>
          </div>
          
        <input type="submit" name="submit" class ="button button-purple button-180 triggerBookAShowRoomVisitButton" value="Submit">
</form>
    </div>
</div>
  
    
  </div>
  
  
  
</main>
<script src="assets/js/jquery1.12.0-min.js"></script> 
<script src="assets/js/parsley.js"></script>
<?php  
require_once('footer.php');
?>
