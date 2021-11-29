var gloabl_url= "http://retailpro.enflowapp.com/";
$( document ).ready(function() {
    get_language();
});
function get_language()
{
    $.ajax
    ({
        type: "POST",
        url: gloabl_url +"api/get_language.php",
        data: {},
        dataType: 'json',
        success: function (result)
        {
            var status = result.status;
            if(status == 200)
            {
               var response_length = result.response.length;
               strHTML = "";
               i=0;
               for (var i = 0; i < response_length; i++)
                {
                            var language_id = result.response[i]['language_id'];
                            var language_name = result.response[i]['language_name'];
                            strHTML += "<div class='form-group'><input type='radio' name='input_language' id='input_language' class='agree-term input_language' value= '"+language_id+"'onclick='assign_langval(this.value)'/><label for='agree-term' class='label-agree-term'><span><span></span></span>"+ language_name + "</label></div>";
                }
                strHTML += "<span style='color:red' id='lang_notification'></span><div class='form-group form-button'><input type='button' name='language_button' id='language_button' class='form-submit' value='Next' onclick = 'language_button()'/></div>";
                $("#language_selection").append(strHTML);
            }
        }
    });
}
function assign_langval(lang)
{
    $("#lang_value").val(lang);
    $("#lang_notification").attr("hidden",true);
}
function language_button()
{
    var lang_val = $("#lang_value").val();
    if(lang_val == '')
    {
        $("#lang_notification").html("Please select one Language");
    }else{
            $("#language_selection").attr("hidden",true);
            $("#phonenumber_selection").removeAttr('hidden');
         }   
}
$("#validate_mobno").click(function(){
    var mobileno = $("#input_mobileno").val();
    if(mobileno == '')
    {
        $("#mob_notification").html("Please Enter your Mobile Number");
    }else{
        var mobArr = {'mobilenumber': mobileno};
        $.ajax
        ({
            type: "POST",
            url: gloabl_url +"api/validate_user.php",
            data: JSON.stringify(mobArr),
            dataType: 'json',
            success: function (result)
            {
                var status = result.status;
                if(status == 200)
                {
                    var response_length = result.response.length;
                    i=0;
                    for (var i = 0; i < response_length; i++)
                        {
                                    var is_blocked = result.response[i]['is_blocked'];
                                    var is_releaved = result.response[i]['is_releaved'];
                                    var is_deleted = result.response[i]['is_deleted'];
                                    var is_admin = result.response[i]['is_admin'];
                                    var is_active = result.response[i]['is_active'];
                                    if(is_blocked == 1)
                                    {
                                        $("#mob_notification").html("User Blocked. Please contact Administrator.");
                                    }else if(is_releaved == 1)
                                    {
                                        $("#mob_notification").html("User Releaved. Please contact Administrator.");
                                    }else if(is_active == 1)
                                    {
                                        $("#otp_div").removeAttr('hidden');
                                    }
                                    
                                    
                                    
                        }
                        
                }
                
            }
        });
    }
});