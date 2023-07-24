function GetXmlHttpObject() 
{
   var xmlHttp=null;
   try
   {
	   
     xmlHttp=new XMLHttpRequest();

	 
	}
	catch(e)
	{
	  try
	  {

	   xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	   
	  }
	  catch(e)
	  {
	    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	   }
	} 
	return xmlHttp;
}
var xmlHttp;
function onCatChange(id)
{
	  xmlHttp = GetXmlHttpObject();
	  if(xmlHttp==null)
	  {
		  alert("There was a problem accessing the server: " + xmlHttp.statusText);
		  return;
	  }
		
		xmlHttp.open("GET", "sub_cate.php?id=" + id, true);  
		xmlHttp.onreadystatechange = LoadCategory;
		xmlHttp.send(null);
	
}
function LoadCategory()
{
	if (xmlHttp.readyState == 4 && xmlHttp.status==200) 
	{
		var browser =  navigator.appName;
		if(browser == 'Microsoft Internet Explorer')
		{
			document.getElementById("cat").innerHTML = xmlHttp.responseText ;
		}
		else
		{
		//alert(xmlHttp.responseText);
		document.getElementById("sub_id").innerHTML = xmlHttp.responseText ;
		//document.getElementById("c_id").innerHTML = "<select name='subitem' id='sub_item'><option value=''>Please Select One...</option></select>";
		}
	
	 }

}

