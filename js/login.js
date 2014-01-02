function forgot() {
    $('.loginContainer').hide();
    $('.forgotContainer').show();
}
function checkForgot(){
    if(!isValidEmailAddress($('input[name=email]').val()))
    {
        $('#emailError').text('Invalid Email!');
    }
    else
        document.forms[1].submit();
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}
$(function(){
    var temp1 = true;
    var temp2 = true;
    var temp3 = true;
    $(".numb").hover(function(){
        $(this).attr("id","selectd");
    },function(){
        $(this).attr("id","");
    });

    $('input').focus(function() {
        if(temp1 && $(this).attr('name') == 'userId')
        {
            $(this).val('');
            temp1 = false;
            $(this).css('color','black');
        }
        else if(temp2 && $(this).attr('name') == 'password')
        {
            $(this).val('');
            temp2 = false;                
            $(this).css('color','black');
        }
        else if(temp3 && $(this).attr('name') == 'email')
        {
            $(this).val('');
            temp3 = false;                
            $(this).css('color','black');
        }


    });

    $('input').blur(function(){
        if($(this).val() == "" && $(this).attr('name') == 'userId')
        {
            temp1 = true;
            $(this).val('Username');
            $(this).css('color','gray');
        }
        if($(this).val() == "" && $(this).attr('name') == 'password')
        {
            temp2 = true;
            $(this).val('Password');
            $(this).css('color','gray');                
        }
        if($(this).val() == "" && $(this).attr('name') == 'email')
        {
            temp3 = true;
            $(this).val('Enter your email address!');
            $(this).css('color','gray');                
        }
    });

});