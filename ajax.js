/**
 * Created by Naman on 27-11-2016.
 */

function suggest(str)
{

    if(str=="")
        document.getElementById('suggestions').innerHTML = "";
    else
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function()
        {
            if(this.readyState == 4 && this.status==200)
                document.getElementById('suggestions').innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "dictionary.php?q=" + str, true);
        xmlhttp.send();
    }
    
}
