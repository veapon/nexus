<?php if(!isset($_GET['id'])|| !isset($_GET['u'])){
		exit;
		}
		$id = $_GET['id'];
		$u = $_GET['u'];
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<div style="text-align:center">v6Speed和播放插件 <a href="http://www.hd4fans.org/v6speed.exe">下载</a></div>
<object 
        classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
        width="0"
        height="0"
        id="vlc"
        events="True">
<param name="MRL" value="" />
<param name="ShowDisplay" value="True" />
<param name="AutoLoop" value="False" />
<param name="AutoPlay" value="False" />
<param name="Volume" value="50" />
<param name="toolbar" value="true" />
<param name="StartTime" value="0" />
<EMBED pluginspage="http://www.hd4fans.org/v6speed.exe"
       type="application/x-vlc-plugin"
       version="VideoLAN.VLCPlugin.2"
       width="0"
       height="0"
       toolbar="true"
       align="left"
       loop="true"
       text="Waiting for video"
       name="vlc"></EMBED>
</object> 
<script language="javascript">
function getOs()
{
    var OsObject = "";
   if(navigator.userAgent.indexOf("MSIE")>0) {
        return "MSIE";
   }
   if(isFirefox=navigator.userAgent.indexOf("Firefox")>0){
        return "Firefox";
   }
   if(isSafari=navigator.userAgent.indexOf("Safari")>0) {
        return "Safari";
   } 
   if(isCamino=navigator.userAgent.indexOf("Camino")>0){
        return "Camino";
   }
   if(isMozilla=navigator.userAgent.indexOf("Gecko/")>0){
        return "Gecko";
   }
  
}
var s="MSIE";
if(getOs()==s)
{
 var vlcObj = document.getElementById("vlc"); 

         if( vlcObj.object != null ){ 
           
window.location.href = "v6player://<?php echo $id;?>&ty=1&ro=2&url=www.hd4fans.org&id=<?php echo $id;?>&ua=<?php echo $u; ?>";

            }
         else {
             alert("请先安装v6Speed和播放插件"); 
            window.location.href="http://www.hd4fans.org/v6speed.exe";
        }        
      
} 

else
  {
           if(!navigator.plugins["VLC Web Plugin"])
               {
                 alert("请先安装v6Speed和播放插件"); 
                   window.location.href="http://www.hd4fans.org/v6speed.exe";
               }
         
            else
          {
window.location.href = "v6player://<?php echo $id;?>&ty=1&ro=2&url=www.hd4fans.org&id=<?php echo $id;?>&ua=<?php echo $u; ?>"

          }     
  }

//window.location.href = "v6player://<?php echo $id;?>&ty=1&ro=2&url=www.hd4fans.org&id=<?php echo $id;?>&ua=<?php echo $u; ?>";


</script>
</body>
</html>
</body>
</html>
