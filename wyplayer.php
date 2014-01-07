<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>6速网页播放</TITLE>
<style>
  .inputTrackerInput {
        height:20;
        width:30;
        font-family : Arial, Helvetica, sans-serif;
        font-size : 12px;
  }
</style>

<script language="JavaScript"><!--

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


function init()
{
    if( navigator.appName.indexOf("Microsoft Internet")==-1 )
    {
        onVLCPluginReady()
    }
    else if( document.readyState == 'complete' )
    {
        onVLCPluginReady();
    }
    else
    {
        /* Explorer loads plugins asynchronously */
        document.onreadystatechange=function()
        {
            if( document.readyState == 'complete' )
            {
                onVLCPluginReady();
            }
        }
    }
}

function getVLC(name)
{
    if (window.document[name])
    {
        return window.document[name];
    }
    if (navigator.appName.indexOf("Microsoft Internet")==-1)
    {
        if (document.embeds && document.embeds[name])
            return document.embeds[name];
    }
    else // if (navigator.appName.indexOf("Microsoft Internet")!=-1)
    {
        return document.getElementById(name);
    }
}

function registerVLCEvent(event, handler)
{
    var vlc = getVLC("vlc");

    if (vlc) {
        if (vlc.attachEvent) {
            // Microsoft
            vlc.attachEvent (event, handler);
        } else if (vlc.addEventListener) {
            // Mozilla: DOM level 2
            vlc.addEventListener (event, handler, true);
        } else {
            // DOM level 0
            eval("vlc.on" + event + " = handler");
        }
    }
}

function unregisterVLCEvent(event, handler)
{
    var vlc = getVLC("vlc");

    if (vlc) {
        if (vlc.detachEvent) {
            // Microsoft
            vlc.detachEvent (event, handler);
        } else if (vlc.removeEventListener) {
            // Mozilla: DOM level 2
            vlc.removeEventListener (event, handler, true);
        } else {
            // DOM level 0
            eval("vlc.on" + event + " = null");
        }
    }
}

// JS VLC API callbacks
function handleMediaPlayerMediaChanged()
{
    document.getElementById("info").innerHTML = "Media Changed";
}

function handle_MediaPlayerNothingSpecial()
{
    document.getElementById("state").innerHTML = "Idle...";
}

function handle_MediaPlayerOpening()
{
    onOpen();
}

function handle_MediaPlayerBuffering(val)
{
    document.getElementById("info").innerHTML = val + "%";
}

function handle_MediaPlayerPlaying()
{
    onPlay();
}

function handle_MediaPlayerPaused()
{
    onPause();
}

function handle_MediaPlayerStopped()
{
    onStop();
}

function handle_MediaPlayerForward()
{
    document.getElementById("state").innerHTML = "Forward...";
}

function handle_MediaPlayerBackward()
{
    document.getElementById("state").innerHTML = "Backward...";
}

function handle_MediaPlayerEndReached()
{
    onEnd();
}

function handle_MediaPlayerEncounteredError()
{
    onError();
}

function handle_MediaPlayerTimeChanged(time)
{
    var vlc = getVLC("vlc");
    var info = document.getElementById("info");
    if( vlc )
    {
        var mediaLen = vlc.input.length;
        if( mediaLen > 0 )
        {
            // seekable media
            info.innerHTML = formatTime(time)+"/"+formatTime(mediaLen);
        }
    }
}

function handle_MediaPlayerPositionChanged(val)
{
    // set javascript slider to correct position
}

function handle_MediaPlayerSeekableChanged(val)
{
    setSeekable(val);
}

function handle_MediaPlayerPausableChanged(val)
{
    setPauseable(val);
}

function handle_MediaPlayerTitleChanged(val)
{
    //setTitle(val);
    document.getElementById("info").innerHTML = "Title: " + val;
}

function handle_MediaPlayerLengthChanged(val)
{
    //setMediaLength(val);
}

// VLC Plugin
function onVLCPluginReady()
{
    registerVLCEvent("MediaPlayerMediaChanged", handleMediaPlayerMediaChanged);
    registerVLCEvent("MediaPlayerNothingSpecial", handle_MediaPlayerNothingSpecial);
    registerVLCEvent("MediaPlayerOpening", handle_MediaPlayerOpening);
    registerVLCEvent("MediaPlayerBuffering", handle_MediaPlayerBuffering);
    registerVLCEvent("MediaPlayerPlaying", handle_MediaPlayerPlaying);
    registerVLCEvent("MediaPlayerPaused", handle_MediaPlayerPaused);
    registerVLCEvent("MediaPlayerStopped", handle_MediaPlayerStopped);
    registerVLCEvent("MediaPlayerForward", handle_MediaPlayerForward);
    registerVLCEvent("MediaPlayerBackward", handle_MediaPlayerBackward);
    registerVLCEvent("MediaPlayerEndReached", handle_MediaPlayerEndReached);
    registerVLCEvent("MediaPlayerEncounteredError", handle_MediaPlayerEncounteredError);
    registerVLCEvent("MediaPlayerTimeChanged", handle_MediaPlayerTimeChanged);
    registerVLCEvent("MediaPlayerPositionChanged", handle_MediaPlayerPositionChanged);
    registerVLCEvent("MediaPlayerSeekableChanged", handle_MediaPlayerSeekableChanged);
    registerVLCEvent("MediaPlayerPausableChanged", handle_MediaPlayerPausableChanged);
    registerVLCEvent("MediaPlayerTitleChanged", handle_MediaPlayerTitleChanged);
    registerVLCEvent("MediaPlayerLengthChanged", handle_MediaPlayerLengthChanged);
}

function close()
{
    unregisterVLCEvent("MediaPlayerMediaChanged", handleMediaPlayerMediaChanged);
    unregisterVLCEvent("MediaPlayerNothingSpecial", handle_MediaPlayerNothingSpecial);
    unregisterVLCEvent("MediaPlayerOpening", handle_MediaPlayerOpening);
    unregisterVLCEvent("MediaPlayerBuffering", handle_MediaPlayerBuffering);
    unregisterVLCEvent("MediaPlayerPlaying", handle_MediaPlayerPlaying);
    unregisterVLCEvent("MediaPlayerPaused", handle_MediaPlayerPaused);
    unregisterVLCEvent("MediaPlayerStopped", handle_MediaPlayerStopped);
    unregisterVLCEvent("MediaPlayerForward", handle_MediaPlayerForward);
    unregisterVLCEvent("MediaPlayerBackward", handle_MediaPlayerBackward);
    unregisterVLCEvent("MediaPlayerEndReached", handle_MediaPlayerEndReached);
    unregisterVLCEvent("MediaPlayerEncounteredError", handle_MediaPlayerEncounteredError);
    unregisterVLCEvent("MediaPlayerTimeChanged", handle_MediaPlayerTimeChanged);
    unregisterVLCEvent("MediaPlayerPositionChanged", handle_MediaPlayerPositionChanged);
    unregisterVLCEvent("MediaPlayerSeekableChanged", handle_MediaPlayerSeekableChanged);
    unregisterVLCEvent("MediaPlayerPausableChanged", handle_MediaPlayerPausableChanged);
    unregisterVLCEvent("MediaPlayerTitleChanged", handle_MediaPlayerTitleChanged);
    unregisterVLCEvent("MediaPlayerLengthChanged", handle_MediaPlayerLengthChanged);
}





//--></script>



<body onLoad="init();" onClose="close();">














<div style="width: 600; height: 200; top:200px; position: absolute; border: 1pt solid black; background: blue; border-radius: 5px; display: none;" id="overlay"></div>
<table width="1400">
<tr><td colspan="2">


<?php
$i=0;

$u = $_GET['u'];

$id=$_GET["id"];
echo "影片信息： ";
require_once("include/benc.php");
require_once("include/bittorrent.php");


function bark($msg) {
	global $lang_takeupload;
	genbark($msg, $lang_takeupload['std_upload_failed']);
	die;
}



function dict_get($d, $k, $t) {
	global $lang_takeupload;
	if ($d["type"] != "dictionary")
	bark($lang_takeupload['std_not_a_dictionary']);
	$dd = $d["value"];
	if (!isset($dd[$k]))
	return;
	$v = $dd[$k];
	if ($v["type"] != $t)
	bark($lang_takeupload['std_invalid_dictionary_entry_type']);
	return $v["value"];
}




function dict_check($d, $s) {
	global $lang_takeupload;
	if ($d["type"] != "dictionary")
	bark($lang_takeupload['std_not_a_dictionary']);
	$a = explode(":", $s);
	$dd = $d["value"];
	$ret = array();
	foreach ($a as $k) {
		unset($t);
		if (preg_match('/^(.*)\((.*)\)$/', $k, $m)) {
			$k = $m[1];
			$t = $m[2];
		}
		if (!isset($dd[$k]))
		bark($lang_takeupload['std_dictionary_is_missing_key']);
		if (isset($t)) {
			if ($dd[$k]["type"] != $t)
			bark($lang_takeupload['std_invalid_entry_in_dictionary']);
			$ret[] = $dd[$k]["value"];
		}
		else
		$ret[] = $dd[$k];
	}
	return $ret;
}


$filename="/var/www/nexus/torrents/".$id.".torrent";
//echo $filename;

if(file_exists($filename)==0)
echo "没发现种子";
else
{



$dict=bdec_file($filename,$max_torrent_size);


list($ann, $info) = dict_check($dict, "announce(string):info");
list($dname, $plen, $pieces) = dict_check($info, "name(string):piece length(integer):pieces(string)");


$filelist = array();
$totallen = dict_get($info, "length", "integer");
if (isset($totallen)){
	$filelist[] = array($dname, $totallen);
	$type = "single";
        //echo $dname;
        $ffa4=$dname;
        $ffa5[]=$dname;
        //echo '<br>';
}
else {
	$flist = dict_get($info, "files", "list");
	if (!isset($flist))
	bark($lang_takeupload['std_missing_length_and_files']);
	if (!count($flist))
	bark("no files");
	$totallen = 0;
	foreach ($flist as $fn) {
		list($ll, $ff) = dict_check($fn, "length(integer):path(list)");
		$totallen += $ll;
		$ffa = array();
		foreach ($ff as $ffe) {
			if ($ffe["type"] != "string")
			bark($lang_takeupload['std_filename_errors']);
			$ffa[] = $ffe["value"];
                      //  echo $ffe["value"];
//echo '<br>';
		}
		if (!count($ffa))
		bark($lang_takeupload['std_filename_errors']);
                //echo $ffa[0];
               // echo '<br>';
               // echo $ffa[1];
                
                foreach($ffa as $ffa1)
                { 
                   $ffa2=explode('.',$ffa1);
                   $numm=count($ffa2);
                   $ffa3=$ffa2[$numm-1];
                   $array1=array('mp4','wma','avi','mkv','3gp','mpg','vob','flv','swf','mov','rmvb');
                   if(in_array("$ffa3",$array1)){
                     // echo $ffa1;
                      
                     // if($i==0)
                      {
                      $ffa4=$ffa1;$ffa5[$i]=$ffa1;
                      $i++;
                      }
                      //echo '<br>';
                   }     
                 
                }
                
		$ffe = implode("/", $ffa);
                
                //echo $ffe;
                //echo '<br>';

		$filelist[] = array($ffe, $ll);

	}
	$type = "multi";
}
echo '<br>';
echo $dname;
echo '<br>';

}
?>






















</td></tr>
<tr><td align="left" colspan="2">

<!--
Insert VideoLAN.VLCPlugin.2
-->
<object 
        classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
        width="640"
        height="480"
        id="vlc"
        events="True">
<param name="MRL" value="" />
<param name="ShowDisplay" value="True" />
<param name="AutoLoop" value="False" />
<param name="AutoPlay" value="False" />
<param name="Volume" value="50" />
<param name="toolbar" value="true" />
<param name="StartTime" value="0" />
<EMBED pluginspage="http://www.v6speed.org/v6Speed/v6Speed0.68b.rar"
       type="application/x-vlc-plugin"
       version="VideoLAN.VLCPlugin.2"
       width="640"
       height="480"
       toolbar="true"
       align="left"
       loop="true"
       text="Waiting for video"
       name="vlc"></EMBED>
</object> 

      <select  id="menu1" size="30" multiple onChange='doGo(this.value)'>
<?php


foreach($ffa5 as $v)
{
	   echo "<option value='http://127.0.0.1:8889/".$v."'>".$v."</option>";
  }

//onChange="MM_jumpMenu('parent',this,0)"   document.getElementById('menu1').value
 //document.getElementById('targetTextField').value
?>            

        </select>


</td></tr>
<tr><td colspan="2">
<table><tr>
<td valign="top" width="550">
<!--
Insert Slider widget
-->
<!--
<div id="inputTrackerDiv"></div>
</td><td width="15%">
<div id="info" style="text-align:center">-:--:--/-:--:--</div>
<div id="state" style="text-align:center">Stopped...</div>
-->
</td></tr></table>
</td></tr>
<tr><td>

&nbsp;

&nbsp;

</td><td align="left">

</td>
</tr>
<tr><td>

   

</td>
</tr>
<tr><td>
</td>
<td>

</td>
</tr>
<tr><td> 
</td>
<td>

</td>
</tr>
<tr>
<td>

</td>
</tr>
<tr>
<td>

</td>
</tr>
<tr>
<td>


</td>
</tr>
<tr>
<td>


</td>
</tr>
<tr>
<td>
   
</td>
</tr>
</table>
<SCRIPT language="javascript">
<!--

var rate = 0;
var prevState = 0;
var telxState = false;
var canPause = true;
var canSeek = true;

function setPauseable(val)
{
    canPause = val;
}

function setSeekable(val)
{
    canSeek = val;
}

function doSetSlider()
{
    var vlc = getVLC("vlc");

    // set slider to new position
    if( vlc )
        vlc.input.time = (vlc.input.length/2);
}

function doGetPosition()
{
    var vlc = getVLC("vlc");

    // set slider to new position
    if (vlc)
        alert( "position is " + vlc.input.time);
}

function doReverse(rate)
{
    var vlc = getVLC("vlc");
    if( vlc )
        vlc.input.rate = -1.0 * vlc.input.rate;
}

function doAudioChannel(value)
{
    var vlc = getVLC("vlc");
    if( vlc )
        vlc.audio.channel = parseInt(value);
}

function doAudioTrack(value)
{
    var vlc = getVLC("vlc");
    if( vlc )
    {
        vlc.audio.track = vlc.audio.track + value;
        document.getElementById("trackTextField").innerHTML = vlc.audio.track;
    }
}

function doAspectRatio(value)
{
    var vlc = getVLC("vlc");
    if( vlc )
        vlc.video.aspectRatio = value;
}

function doSubtitle(value)
{
    var vlc = getVLC("vlc");
    if( vlc )
    {
        vlc.subtitle.track = vlc.subtitle.track + value;
        document.getElementById("spuTextField").innerHTML = vlc.subtitle.track;
    }
}

function doTelxPage(value)
{
    var vlc = getVLC("vlc");
    if( vlc )
        vlc.video.teletext = parseInt(value);
}

function doToggleTeletext()
{
    var vlc = getVLC("vlc");

    if( vlc )
    {
        vlc.video.toggleTeletext();
        if (telxState)
        {
            document.getElementById("telx").innerHTML = "Teletext on";
            telxState = true;
        }
        else
        {
            document.getElementById("telx").innerHTML = "Teletext off";
            telxState = false;
        }
    }
}

function doItemCount()
{
    var vlc = getVLC("vlc");
    if( vlc )
    {
        var count = vlc.playlist.items.count;
        document.getElementById("itemCount").value = " Items " + count + " ";
    }
}

function doRemoveItem(item)
{
    var vlc = getVLC("vlc");
    if( vlc )
        vlc.playlist.items.remove(item);
}

function doPlaylistClearAll()
{
    var vlc = getVLC("vlc");
    if( vlc )
    {
        vlc.playlist.items.clear();
        while( vlc.playlist.items.count > 0)
        {
            // wait till playlist empties.
        }
        doItemCount();
    }
}

function updateVolume(deltaVol)
{
    var vlc = getVLC("vlc");
    if( vlc )
    {
        vlc.audio.volume += deltaVol;
        document.getElementById("volumeTextField").innerHTML = vlc.audio.volume+"%";
    }
}

function formatTime(timeVal)
{
    if( typeof timeVal != 'number' )
        return "-:--:--";

    var timeHour = Math.round(timeVal / 1000);
    var timeSec = timeHour % 60;
    if( timeSec < 10 )
        timeSec = '0'+timeSec;
    timeHour = (timeHour - timeSec)/60;
    var timeMin = timeHour % 60;
    if( timeMin < 10 )
        timeMin = '0'+timeMin;
    timeHour = (timeHour - timeMin)/60;
    if( timeHour > 0 )
        return timeHour+":"+timeMin+":"+timeSec;
    else
        return timeMin+":"+timeSec;
}

// Old method of querying current state
// function doState() - depreceated
function doState()
{
    var vlc = getVLC("vlc");
    var newState = 0;

    if( vlc )
        newState = vlc.input.state;

    if( newState == 0 )
    {
        // current media has stopped
        onEnd();
    }
    else if( newState == 1 )
    {
        // current media is openning/connecting
        onOpen();
    }
    else if( newState == 2 )
    {
        // current media is buffering data
        onBuffer();
    }
    else if( newState == 3 )
    {
        // current media is now playing
        onPlay();
    }
    else if( newState == 4 )
    {
        // current media is now paused
        onPause();
    }
    else if( newState == 5 )
    {
        // current media has stopped
        onStop();
    }
    else if( newState == 6 )
    {
        // current media has ended
        onEnd();
    }
    else if( newState == 7 )
    {
        // current media encountered error
        onError();
    }
}

/* actions */

function doGo(targetURL)
{
getOs();
var s="MSIE";
if(getOs()==s)
{
 var vlcObj = document.getElementById("vlc"); 
 
         if( vlcObj.object != null ){ 
              
            //    window.location.href = "v6player://<?php echo $id;?>&ty=2&ro=2&url=www.hd4fans.org&id=<?php echo $id;?>&ua=<?php echo $u; ?>";
            }
         else {
             alert("请先安装v6Speed和播放插件"); 
            window.location.href="http://www.v6speed.org/v6Speed/v6Speed0.68b.rar";
           }        
      
} 
else
  {
     if(!navigator.plugins["VLC Web Plugin"])
       {
            alert("请先安装v6Speed和播放插件"); 
            window.location.href="http://www.v6speed.org/v6Speed/v6Speed0.68b.rar";
       }
      else
       {
          // window.location.href = "v6player://<?php echo $id;?>&ty=2&ro=2&url=www.hd4fans.org&id=<?php echo $id;?>&ua=<?php echo $u; ?>";
       }
  }


    var vlc = getVLC("vlc");
  
    if( vlc )
    {
        //vlc.playlist.items.clear();
  
       // var options = [":rtsp-tcp"];
 var options = [":vout-filter=deinterlace", ":deinterlace-mode=linear"];
        var itemId = vlc.playlist.add(targetURL,"",options);
        options = [];
        if( itemId != -1 )
        {
            // play MRL
            vlc.playlist.playItem(itemId);
        }
        else
        {
            alert("cannot play at the moment !");
        }
      
    }
}

function doAdd(targetURL)
{
    var vlc = getVLC("vlc");
    var options = [":vout-filter=deinterlace", ":deinterlace-mode=linear"];
    if( vlc )
    {
        vlc.playlist.add(targetURL, "", options);
        options = [];
        doItemCount();
    }
}

function doPlayOrPause()
{
    var vlc = getVLC("vlc");
    if( vlc )
    {
            vlc.playlist.togglePause();
    }
}

function doStop()
{
    var vlc = getVLC("vlc");
    if( vlc )
        vlc.playlist.stop();
}

function doPlaySlower()
{
    var vlc = getVLC("vlc");
    if( vlc )
        vlc.input.rate = vlc.input.rate / 2;
}

function doPlayFaster()
{
    var vlc = getVLC("vlc");
    if( vlc )
        vlc.input.rate = vlc.input.rate * 2;
}

function doMarqueeOption(option, value)
{
    var vlc = getVLC("vlc");
    val = parseInt(value);
    if( vlc )
    {
        if (option == 1)
            vlc.video.marquee.color = val;
        if (option == 2)
            vlc.video.marquee.opacity = val;
        if (option == 3)
            vlc.video.marquee.position = value;
        if (option == 4)
            vlc.video.marquee.refresh = val;
        if (option == 5)
            vlc.video.marquee.size = val;
        if (option == 6)
            vlc.video.marquee.text = value;
        if (option == 7)
            vlc.video.marquee.timeout = val;
        if (option == 8)
            vlc.video.marquee.x = val;
        if (option == 9)
            vlc.video.marquee.y = val;
    }
}

function doLogoOption(option, value)
{
    var vlc = getVLC("vlc");
    if( vlc )
    {
        if (option == 1)
            vlc.video.logo.file(value);
        if (option == 2)
            vlc.video.logo.position = value;
        val = parseInt(value);
        if (option == 3)
            vlc.video.logo.opacity = val;
        if (option == 4)
            vlc.video.logo.repeat = val;
        if (option == 5)
            vlc.video.logo.delay = val;
        if (option == 6)
            vlc.video.logo.x = val;
        if (option == 7)
            vlc.video.logo.y = val;
    }
}

/* events */

function onOpen()
{
    document.getElementById("state").innerHTML = "Opening...";
    document.getElementById("PlayOrPause").value = "Pause";
}

function onBuffer()
{
    document.getElementById("state").innerHTML = "Buffering...";
    document.getElementById("PlayOrPause").value = "Pause";
}

function onPlay()
{
    document.getElementById("state").innerHTML = "Playing...";
    document.getElementById("PlayOrPause").value = "Pause";
    onPlaying();
}

function onEnd()
{
    document.getElementById("state").innerHTML = "End...";
}

var liveFeedText = ["Live", "((Live))", "(( Live ))", "((  Live  ))"];
var liveFeedRoll = 0;

function onPlaying()
{
        var vlc = getVLC("vlc");
        var info = document.getElementById("info");
        if( vlc )
        {
            var mediaLen = vlc.input.length;
            if( mediaLen > 0 )
            {
                // seekable media
                info.innerHTML = formatTime(vlc.input.time)+"/"+formatTime(mediaLen);
            }
            else
            {
                // non-seekable "live" media
                liveFeedRoll = liveFeedRoll & 3;
                info.innerHTML = liveFeedText[liveFeedRoll++];
            }
        }
}

function onPause()
{
    document.getElementById("state").innerHTML = "Paused...";
    document.getElementById("PlayOrPause").value = " Play ";
}

function onStop()
{
    var vlc = getVLC("vlc");

    document.getElementById("info").innerHTML = "-:--:--/-:--:--";
    document.getElementById("state").innerHTML = "Stopped...";
    document.getElementById("PlayOrPause").value = " Play ";
}

function onError()
{
    var vlc = getVLC("vlc");

    document.getElementById("state").innerHTML = "Error...";
}

//-->
</SCRIPT>
<script language="javascript">
getOs();
var s="MSIE";
if(getOs()==s)
{
 var vlcObj = document.getElementById("vlc"); 
 
         if( vlcObj.object != null ){ 
              
               window.location.href = "v6player://<?php echo $id;?>&ty=2&ro=2&url=www.hd4fans.org&id=<?php echo $id;?>&ua=<?php echo $u; ?>";
            }
         else {
             alert("请先安装v6Speed和播放插件"); 
            window.location.href="http://www.v6speed.org/v6Speed/v6Speed0.68b.rar";
           }        
      
} 
else
  {
     if(!navigator.plugins["VLC Web Plugin"])
       {
            alert("请先安装v6Speed和播放插件"); 
            window.location.href="http://www.v6speed.org/v6Speed/v6Speed0.68b.rar";
       }
      else
       {
           window.location.href = "v6player://<?php echo $id;?>&ty=2&ro=2&url=www.hd4fans.org&id=<?php echo $id;?>&ua=<?php echo $u; ?>";
       }
  }

//window.location.href = "v6player://<?php echo $id;?>&ty=2&ro=2&url=www.hd4fans.org&id=<?php echo $id;?>&ua=<?php echo $u; ?>";
</script>
</body>
</HTML>
