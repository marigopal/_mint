<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mints</title>
        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <!-- Main css -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="">
            <!-- Sign up form -->
            <section class="">
                <div class="">
                    <div class="">
                        <div class="signup-form"  id="language_selection">
                            <h1 class="form-title">Choose your preferred Language</h1>
                           <input type="hidden" id="lang_value"name="lang_value"/> 
                        </div>
                        
                        <div class="signup-form"  id="phonenumber_selection" hidden>
                            <h1 class="form-title">Register Mobile No</h1>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="input_mobileno" id="input_mobileno" placeholder="Your Mobile Number" onclick="remove_notification('mob_notification')"/>
                            </div>
                            <div class="form-group" id="otp_div" hidden>
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="input_otp" id="input_otp" placeholder="Your OTP"/>
                            </div>
                            <span style='color:red' id='mob_notification'></span>
                            <div class="form-group form-button" id="validate_mobno">
                                <input type="button" name="validate_mobno" id="validate_mobno" class="form-submit" value="Validate"/>
                            </div>
                        </div>
                        <div class="signup-form"  id="name_selection" hidden>
                            <h1 class="form-title">Full Name</h1>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="input_fullname" id="input_fullname" placeholder="Your Fullname" onclick="remove_notification('name_notification')"/>
                            </div>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="input_shopname" id="input_shopname" placeholder="Your Shopname" onclick="remove_notification('name_notification')"/>
                            </div>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="input_referral" id="input_referral" placeholder="Referral Code" onclick="remove_notification('name_notification')"/>
                            </div>
                            <span style='color:red' id='name_notification'></span>
                            <div class="form-group form-button" id="">
                                <input type="button" name="name_button" id="name_button" class="form-submit" value="Register"/>
                            </div>
                        </div>
                        <div class="signup-form"  id="shop_selection" hidden>
                            <h1 class="form-title">Choose Shop</h1>
                           <input type="hidden" id="shop_value"name="shop_value"/>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<script src="js/_index.js" type="text/javascript"></script>