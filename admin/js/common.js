// JavaScript Document

function CheckEmail(email)
{
	var myString = email;
	if ((myString.indexOf(".") < 1) || (myString.indexOf("@") < 0) || (myString.lastIndexOf(".") < myString.indexOf("@"))) 
	{
		return false;
	}
	else
	{
		return true;
	}
}

function CheckUserName(username)
{
	var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_.";
	var checkOK1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_";
	//var ctr=document.registration;
	var checkStr = username;

	var allValid = true;
	for (i = 0;  i < checkStr.length;  i++)
	{
		ch = checkStr.charAt(i);
		ch1 = checkStr.charAt(0);
		for (k=0; k < checkOK1.length; k++)
			if (ch1 == checkOK1.charAt(k))
				break;
			if (k == checkOK.length)
			{
				 allValid = false;
				 break;
			}
			for (j = 0;  j < checkOK.length;  j++)
				if (ch == checkOK.charAt(j))
					break;
				if (j == checkOK.length)
				{
					allValid = false;
					break;
				}
	}
	return allValid;
}

function ltrim(str, chars) {
    chars = chars || "\\s";
    return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}

function rtrim(str, chars) {
    chars = chars || "\\s";
    return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

function jtrim(str)
{
	str = ltrim(str, ' ');
	str = rtrim(str, ' ');
	return str;
}

function ConfirmDel()
{
		return confirm("Are you sure you want to delete?");
}

function textCounter(field, countfield, maxlimit)
{
	if (field.value.length > maxlimit) // if too long...trim it!
	{
		field.value = field.value.substring(0, maxlimit);
		// otherwise, update 'characters left' counter
	}
	else 
	{
		countfield.value = (maxlimit - field.value.length) + " chars left";
	}
	
	if(field.value.length = 0)
	{
		countfield.value = "Maximum " + maxlimit + " characters";
	}
}