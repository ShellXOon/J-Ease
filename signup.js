/**
 * Created by Naman on 25-11-2016.
 */

function checkform()
{
    var fname = mForm.fname.value;
    var pass = mForm.fpass.value;
    var pass2= mForm.fpass2.value;
    var email = mForm.email.value;

    if(fname == "" )
    {
        alert("Username not entered!");
        return false;
    }
    else if(pass=="" || pass2=="" || pass!=pass2)
    {
        alert("Password not entered/correct!");
        return false;
    }
    else if(email=="")
    {
        alert("Email not entered!");
        return false;
    }


    return true;
}