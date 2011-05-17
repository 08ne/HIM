function createXMLHttpRequest()
{
  if (window.XMLHttpRequest)
    return new XMLHttpRequest();
  else if (window.ActiveXObject)
  {
    var XMLVersions = ["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0", "MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp", "Microsoft.XMLHttp"];

    for (var i = 0; i < XMLVersions.length; i++)
    {
      try
      {
        return new ActiveXObject(XMLVersions[i]);
      }
      catch (error)
      {
        //不用做处理，纯粹为了预防程序出错终止
      }
    }
  }
  
  throw new Error("您的浏览器不支持 XMLHttpRequest 对象");
}