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
        <div class="main">
            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form"  id="language_selection">
                            <h1 class="form-title">Choose your preferred Language</h1>
                            <div class="form-group">
                                <input type="radio" name="input_language" id="input_language" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>English </label>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="input_language" id="input_language" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>தமிழ்</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="button" name="language_button" id="language_button" class="form-submit" value="Next"/>
                            </div>
                        </div>
                        <div class="signup-form"  id="phonenumber_selection" hidden="">
                            <h1 class="form-title">Register Mobile No</h1>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Mobile Number"/>
                            </div>
                            <div class="form-group" id="otp_div" hidden>
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="your_pass" id="your_pass" placeholder="Your OTP"/>
                            </div>
                            <!-- <span style="color:red">Your Mobile number already registered with us. Please do validate your One Time Password.</span> -->
                            <div class="form-group form-button" id="getotp_button_div" hidden="">
                                <input type="button" name="input_otp" id="input_otp" class="form-submit" value="Get OTP"/>
                            </div>
                            <div class="form-group form-button" hidden="">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Next"/>
                            </div>
                        </div>
                        <div class="signup-image">
                            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
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