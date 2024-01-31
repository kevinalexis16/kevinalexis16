<?php
$filelink='https://ok.ru/videoembed/'.$_GET['v'].'';
if (strpos($filelink,"ok.ru") !==false) {
  //$user_agent = player user_agent !!!!!
  if ($flash=="flash")
  $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
  else {
  $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36';
  }
  $pattern = '/(?:\/\/|\.)(ok\.ru|odnoklassniki\.ru)\/(?:videoembed|video)\/(\d+)/';
  preg_match($pattern,$filelink,$m);
  $id=$m[2];
  $l="http://www.ok.ru/dk";
  $post="cmd=videoPlayerMetadata&mid=".$id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_REFERER,"http://www.ok.ru");
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  $h = curl_exec($ch);
  curl_close($ch);
  $z=json_decode($h,1);

  $vids=$z["videos"];
  $c=count($vids);
  $link=$vids[$c-1]["url"];
  if ($link) {
    $t1=explode("?",$link);
    $link=$t1[0]."/ok.mp4?".$t1[1];
  }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8"/>
<title>OKRU</title>
<meta name="robots" content="noindex" />
<META NAME="GOOGLEBOT" CONTENT="NOINDEX" />
<meta name="referrer" content="never">
<meta http-equiv="X-UA-Compatible" content="IE=11" />
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" id="viewport" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href="https://cdn.rawgit.com/ufilestorage/a/master/skins/jw-logo-bar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.rawgit.com/ufilestorage/a/master/jquery-2.2.3.min.js"></script>
<script src="https://ssl.p.jwpcdn.com/player/v/8.13.0/jwplayer.js"></script>
<script>jwplayer.key="64HPbvSQorQcd52B8XFuhMtEoitbvY/EXJmMBfKcXZQU2Rnn";</script>
   <style>

      .jw-svg-icon-cc-off path,
.jw-svg-icon-cc-on path {
    display: none;
}

.jw-svg-icon-cc-off,
.jw-svg-icon-cc-on {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwSDI0VjI0SDB6Ii8+PHBhdGggZD0iTTIxIDNjLjU1MiAwIDEgLjQ0OCAxIDF2MTZjMCAuNTUyLS40NDggMS0xIDFIM2MtLjU1MiAwLTEtLjQ0OC0xLTFWNGMwLS41NTIuNDQ4LTEgMS0xaDE4ek05IDhjLTIuMjA4IDAtNCAxLjc5Mi00IDRzMS43OTIgNCA0IDRjMS4xIDAgMi4xLS40NSAyLjgyOC0xLjE3MmwtMS40MTQtMS40MTRDMTAuMDUzIDEzLjc3NiA5LjU1MyAxNCA5IDE0Yy0xLjEwNSAwLTItLjg5NS0yLTJzLjg5NS0yIDItMmMuNTUgMCAxLjA0OC4yMiAxLjQxNS41ODdsMS40MTQtMS40MTRDMTEuMTA1IDguNDQ4IDEwLjEwNSA4IDkgOHptNyAwYy0yLjIwOCAwLTQgMS43OTItNCA0czEuNzkyIDQgNCA0YzEuMTA0IDAgMi4xMDQtLjQ0OCAyLjgyOC0xLjE3MmwtMS40MTQtMS40MTRjLS4zNjIuMzYyLS44NjIuNTg2LTEuNDE0LjU4Ni0xLjEwNSAwLTItLjg5NS0yLTJzLjg5NS0yIDItMmMuNTUzIDAgMS4wNTMuMjI0IDEuNDE1LjU4N2wxLjQxNC0xLjQxNEMxOC4xMDUgOC40NDggMTcuMTA1IDggMTYgOHoiIGZpbGw9InJnYmEoMjQ3LDI0NiwyNDcsMSkiLz48L3N2Zz4=");
    background-size: contain;
    background-repeat: no-repeat;
}

.jw-icon-cc:hover .jw-svg-icon-cc-off,
.jw-icon-cc:hover .jw-svg-icon-cc-on,
.jw-settings-captions:hover .jw-svg-icon-cc-off,
.jw-settings-captions:hover .jw-svg-icon-cc-on,
.jw-settings-captions[aria-expanded="true"] .jw-svg-icon-cc-off,
.jw-settings-captions[aria-expanded="true"] .jw-svg-icon-cc-on {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwSDI0VjI0SDB6Ii8+PHBhdGggZD0iTTIxIDNjLjU1MiAwIDEgLjQ0OCAxIDF2MTZjMCAuNTUyLS40NDggMS0xIDFIM2MtLjU1MiAwLTEtLjQ0OC0xLTFWNGMwLS41NTIuNDQ4LTEgMS0xaDE4ek05IDhjLTIuMjA4IDAtNCAxLjc5Mi00IDRzMS43OTIgNCA0IDRjMS4xIDAgMi4xLS40NSAyLjgyOC0xLjE3MmwtMS40MTQtMS40MTRDMTAuMDUzIDEzLjc3NiA5LjU1MyAxNCA5IDE0Yy0xLjEwNSAwLTItLjg5NS0yLTJzLjg5NS0yIDItMmMuNTUgMCAxLjA0OC4yMiAxLjQxNS41ODdsMS40MTQtMS40MTRDMTEuMTA1IDguNDQ4IDEwLjEwNSA4IDkgOHptNyAwYy0yLjIwOCAwLTQgMS43OTItNCA0czEuNzkyIDQgNCA0YzEuMTA0IDAgMi4xMDQtLjQ0OCAyLjgyOC0xLjE3MmwtMS40MTQtMS40MTRjLS4zNjIuMzYyLS44NjIuNTg2LTEuNDE0LjU4Ni0xLjEwNSAwLTItLjg5NS0yLTJzLjg5NS0yIDItMmMuNTUzIDAgMS4wNTMuMjI0IDEuNDE1LjU4N2wxLjQxNC0xLjQxNEMxOC4xMDUgOC40NDggMTcuMTA1IDggMTYgOHoiIGZpbGw9InJnYmEoMjI5LDksMjAsMSkiLz48L3N2Zz4=");
}

.jw-svg-icon-pause path {
    display: none;
}

.jw-svg-icon-pause {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTYgNWgydjE0SDZWNXptMTAgMGgydjE0aC0yVjV6IiBmaWxsPSJyZ2JhKDI0NywyNDYsMjQ3LDEpIi8+PC9zdmc+");
    background-size: contain;
    background-repeat: no-repeat;
}

.jw-icon-display:hover .jw-svg-icon-pause,
.jw-icon-playback:hover .jw-svg-icon-pause {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTYgNWgydjE0SDZWNXptMTAgMGgydjE0aC0yVjV6IiBmaWxsPSJyZ2JhKDIyOSw5LDIwLDEpIi8+PC9zdmc+");
}

.jw-svg-icon-volume-100 path {
    display: none;
}

.jw-svg-icon-volume-100 {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTEwIDcuMjJMNi42MDMgMTBIM3Y0aDMuNjAzTDEwIDE2Ljc4VjcuMjJ6TTUuODg5IDE2SDJhMSAxIDAgMCAxLTEtMVY5YTEgMSAwIDAgMSAxLTFoMy44ODlsNS4yOTQtNC4zMzJhLjUuNSAwIDAgMSAuODE3LjM4N3YxNS44OWEuNS41IDAgMCAxLS44MTcuMzg3TDUuODkgMTZ6bTEzLjUxNyA0LjEzNGwtMS40MTYtMS40MTZBOC45NzggOC45NzggMCAwIDAgMjEgMTJhOC45ODIgOC45ODIgMCAwIDAtMy4zMDQtNi45NjhsMS40Mi0xLjQyQTEwLjk3NiAxMC45NzYgMCAwIDEgMjMgMTJjMCAzLjIyMy0xLjM4NiA2LjEyMi0zLjU5NCA4LjEzNHptLTMuNTQzLTMuNTQzbC0xLjQyMi0xLjQyMkEzLjk5MyAzLjk5MyAwIDAgMCAxNiAxMmMwLTEuNDMtLjc1LTIuNjg1LTEuODgtMy4zOTJsMS40MzktMS40MzlBNS45OTEgNS45OTEgMCAwIDEgMTggMTJjMCAxLjg0Mi0uODMgMy40OS0yLjEzNyA0LjU5MXoiIGZpbGw9InJnYmEoMjQ3LDI0NiwyNDcsMSkiLz48L3N2Zz4=");
    background-size: contain;
    background-repeat: no-repeat;
}

.jw-icon-volume:hover .jw-svg-icon-volume-100 {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTEwIDcuMjJMNi42MDMgMTBIM3Y0aDMuNjAzTDEwIDE2Ljc4VjcuMjJ6TTUuODg5IDE2SDJhMSAxIDAgMCAxLTEtMVY5YTEgMSAwIDAgMSAxLTFoMy44ODlsNS4yOTQtNC4zMzJhLjUuNSAwIDAgMSAuODE3LjM4N3YxNS44OWEuNS41IDAgMCAxLS44MTcuMzg3TDUuODkgMTZ6bTEzLjUxNyA0LjEzNGwtMS40MTYtMS40MTZBOC45NzggOC45NzggMCAwIDAgMjEgMTJhOC45ODIgOC45ODIgMCAwIDAtMy4zMDQtNi45NjhsMS40Mi0xLjQyQTEwLjk3NiAxMC45NzYgMCAwIDEgMjMgMTJjMCAzLjIyMy0xLjM4NiA2LjEyMi0zLjU5NCA4LjEzNHptLTMuNTQzLTMuNTQzbC0xLjQyMi0xLjQyMkEzLjk5MyAzLjk5MyAwIDAgMCAxNiAxMmMwLTEuNDMtLjc1LTIuNjg1LTEuODgtMy4zOTJsMS40MzktMS40MzlBNS45OTEgNS45OTEgMCAwIDEgMTggMTJjMCAxLjg0Mi0uODMgMy40OS0yLjEzNyA0LjU5MXoiIGZpbGw9InJnYmEoMjI5LDksMjAsMSkiLz48L3N2Zz4=");
}

.jw-svg-icon-volume-50 path {
    display: none;
}

.jw-svg-icon-volume-50 {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTEzIDcuMjJMOS42MDMgMTBINnY0aDMuNjAzTDEzIDE2Ljc4VjcuMjJ6TTguODg5IDE2SDVhMSAxIDAgMCAxLTEtMVY5YTEgMSAwIDAgMSAxLTFoMy44ODlsNS4yOTQtNC4zMzJhLjUuNSAwIDAgMSAuODE3LjM4N3YxNS44OWEuNS41IDAgMCAxLS44MTcuMzg3TDguODkgMTZ6bTkuOTc0LjU5MWwtMS40MjItMS40MjJBMy45OTMgMy45OTMgMCAwIDAgMTkgMTJjMC0xLjQzLS43NS0yLjY4NS0xLjg4LTMuMzkybDEuNDM5LTEuNDM5QTUuOTkxIDUuOTkxIDAgMCAxIDIxIDEyYzAgMS44NDItLjgzIDMuNDktMi4xMzcgNC41OTF6IiBmaWxsPSJyZ2JhKDI0NywyNDYsMjQ3LDEpIi8+PC9zdmc+");
    background-size: contain;
    background-repeat: no-repeat;
}

.jw-icon-volume:hover .jw-svg-icon-volume-50 {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTEzIDcuMjJMOS42MDMgMTBINnY0aDMuNjAzTDEzIDE2Ljc4VjcuMjJ6TTguODg5IDE2SDVhMSAxIDAgMCAxLTEtMVY5YTEgMSAwIDAgMSAxLTFoMy44ODlsNS4yOTQtNC4zMzJhLjUuNSAwIDAgMSAuODE3LjM4N3YxNS44OWEuNS41IDAgMCAxLS44MTcuMzg3TDguODkgMTZ6bTkuOTc0LjU5MWwtMS40MjItMS40MjJBMy45OTMgMy45OTMgMCAwIDAgMTkgMTJjMC0xLjQzLS43NS0yLjY4NS0xLjg4LTMuMzkybDEuNDM5LTEuNDM5QTUuOTkxIDUuOTkxIDAgMCAxIDIxIDEyYzAgMS44NDItLjgzIDMuNDktMi4xMzcgNC41OTF6IiBmaWxsPSJyZ2JhKDIyOSw5LDIwLDEpIi8+PC9zdmc+");
}

.jw-svg-icon-volume-0 path {
    display: none;
}

.jw-svg-icon-volume-0 {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTEwIDcuMjJMNi42MDMgMTBIM3Y0aDMuNjAzTDEwIDE2Ljc4VjcuMjJ6TTUuODg5IDE2SDJhMSAxIDAgMCAxLTEtMVY5YTEgMSAwIDAgMSAxLTFoMy44ODlsNS4yOTQtNC4zMzJhLjUuNSAwIDAgMSAuODE3LjM4N3YxNS44OWEuNS41IDAgMCAxLS44MTcuMzg3TDUuODkgMTZ6bTE0LjUyNS00bDMuNTM2IDMuNTM2LTEuNDE0IDEuNDE0TDE5IDEzLjQxNGwtMy41MzYgMy41MzYtMS40MTQtMS40MTRMMTcuNTg2IDEyIDE0LjA1IDguNDY0bDEuNDE0LTEuNDE0TDE5IDEwLjU4NmwzLjUzNi0zLjUzNiAxLjQxNCAxLjQxNEwyMC40MTQgMTJ6IiBmaWxsPSJyZ2JhKDI0NywyNDYsMjQ3LDEpIi8+PC9zdmc+");
    background-size: contain;
    background-repeat: no-repeat;
}

.jw-icon-volume:hover .jw-svg-icon-volume-0 {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTEwIDcuMjJMNi42MDMgMTBIM3Y0aDMuNjAzTDEwIDE2Ljc4VjcuMjJ6TTUuODg5IDE2SDJhMSAxIDAgMCAxLTEtMVY5YTEgMSAwIDAgMSAxLTFoMy44ODlsNS4yOTQtNC4zMzJhLjUuNSAwIDAgMSAuODE3LjM4N3YxNS44OWEuNS41IDAgMCAxLS44MTcuMzg3TDUuODkgMTZ6bTE0LjUyNS00bDMuNTM2IDMuNTM2LTEuNDE0IDEuNDE0TDE5IDEzLjQxNGwtMy41MzYgMy41MzYtMS40MTQtMS40MTRMMTcuNTg2IDEyIDE0LjA1IDguNDY0bDEuNDE0LTEuNDE0TDE5IDEwLjU4NmwzLjUzNi0zLjUzNiAxLjQxNCAxLjQxNEwyMC40MTQgMTJ6IiBmaWxsPSJyZ2JhKDIyOSw5LDIwLDEpIi8+PC9zdmc+");
}

.jw-svg-icon-fullscreen-on path {
    display: none;
}

.jw-svg-icon-fullscreen-on {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTIwIDNoMnY2aC0yVjVoLTRWM2g0ek00IDNoNHYySDR2NEgyVjNoMnptMTYgMTZ2LTRoMnY2aC02di0yaDR6TTQgMTloNHYySDJ2LTZoMnY0eiIgZmlsbD0icmdiYSgyNDcsMjQ2LDI0NywxKSIvPjwvc3ZnPg==");
    background-size: contain;
    background-repeat: no-repeat;
}

.jw-icon-fullscreen:hover .jw-svg-icon-fullscreen-on {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTIwIDNoMnY2aC0yVjVoLTRWM2g0ek00IDNoNHYySDR2NEgyVjNoMnptMTYgMTZ2LTRoMnY2aC02di0yaDR6TTQgMTloNHYySDJ2LTZoMnY0eiIgZmlsbD0icmdiYSgyMjksOSwyMCwxKSIvPjwvc3ZnPg==");
}

.jw-svg-icon-fullscreen-off path {
    display: none;
}

.jw-svg-icon-fullscreen-off {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTIwIDNoMnY2aC0yVjVoLTRWM2g0ek00IDNoNHYySDR2NEgyVjNoMnptMTYgMTZ2LTRoMnY2aC02di0yaDR6TTQgMTloNHYySDJ2LTZoMnY0eiIgZmlsbD0icmdiYSgyMjksOSwyMCwxKSIvPjwvc3ZnPg==");
    background-size: contain;
    background-repeat: no-repeat;
}

.jw-icon-fullscreen:hover .jw-svg-icon-fullscreen-off {
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0Ij48cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+PHBhdGggZD0iTTE4IDdoNHYyaC02VjNoMnY0ek04IDlIMlY3aDRWM2gydjZ6bTEwIDh2NGgtMnYtNmg2djJoLTR6TTggMTV2Nkg2di00SDJ2LTJoNnoiIGZpbGw9InJnYmEoMjQ3LDI0NiwyNDcsMSkiLz48L3N2Zz4=");
}

.jw-state-idle .jw-display-controls .jw-display-icon-container {
    background: 0 0;
    margin-bottom: 0;
    border-radius: 50%;
    animation-name: scaling;
    -webkit-animation-name: scaling;
    animation-duration: 0.6s;
    -webkit-animation-duration: 0.6s;
    animation-timing-function: linear;
    -webkit-animation-timing-function: linear;
    animation-iteration-count: infinite;
    -webkit-animation-iteration-count: infinite;
    animation-direction: alternate;
    -webkit-animation-direction: alternate;
    background-color: rgba(0, 0, 0, 0.4);
    border: solid 0.125rem #f7f7f7;
    height: 75px;
    width: 75px;
}

.jw-state-idle .jw-display-controls .jw-display-icon-container .jw-icon {
    color: #ff0000 !important;
    height: 50px;
    width: 50px;
    padding: 12px;
}

.jw-progress,
.lds-ellipsis div {
    background: #ff0000 !important;
}

.jw-settings-menu {
    border-radius: 0.3em;
}

.jw-sharing-link:active,
.jw-sharing-copy:active.jw-sharing-link:hover,
.jw-button-color.jw-toggle.jw-off:active:not(.jw-icon-cast),
.jw-button-color.jw-toggle.jw-off:focus:not(.jw-icon-cast),
.jw-button-color.jw-toggle.jw-off:hover:not(.jw-icon-cast),
.jw-button-color.jw-toggle:not(.jw-icon-cast),
.jw-button-color:active:not(.jw-icon-cast),
.jw-button-color:focus:not(.jw-icon-cast),
.jw-button-color:hover:not(.jw-icon-cast),
.jw-button-color[aria-expanded=true]:not(.jw-icon-cast),
.jw-settings-content-item.jw-settings-item-active,
.jw-settings-menu .jw-icon.jw-button-color[aria-checked="true"] .jw-svg-icon {
    fill: #ff0000 !important;
    color: #ff0000 !important;
    background-color: transparent !important;
}

.jw-button-color {
    -webkit-transition: opacity 0.25s,
        -webkit-transform 0.25s cubic-bezier(0.5, 0, 0.1, 1);
    -o-transition: opacity 0.25s,
        -o-transform 0.25s cubic-bezier(0.5, 0, 0.1, 1);
    -moz-transition: transform 0.25s cubic-bezier(0.5, 0, 0.1, 1), opacity 0.25s,
        -moz-transform 0.25s cubic-bezier(0.5, 0, 0.1, 1);
    transition: transform 0.25s cubic-bezier(0.5, 0, 0.1, 1), opacity 0.25s,
        -webkit-transform 0.25s cubic-bezier(0.5, 0, 0.1, 1),
        -moz-transform 0.25s cubic-bezier(0.5, 0, 0.1, 1),
        -o-transform 0.25s cubic-bezier(0.5, 0, 0.1, 1);
    -webkit-transform: translateZ(0) scale(1);
    -moz-transform: translateZ(0) scale(1);
    transform: translateZ(0) scale(1);
}

.jw-button-color:hover {
    -webkit-transform: translateZ(0) scale(1.2);
    -moz-transform: translateZ(0) scale(1.2);
    transform: translateZ(0) scale(1.2);
}

.jw-buffer {
    background-color: rgba(255, 255, 255, 0.2) !important;
}

.jw-slider-horizontal .jw-slider-container {
    height: 0.5em !important;
    margin: 0 !important;
    padding: 0 !important;
}

.jw-slider-vertical .jw-slider-container {
    width: 0.4em !important;
}

.jw-volume-tip {
    padding: 1em 0 !important;
    background: #262626 !important;
    border-radius: 0.3em;
    max-width: 2.2em;
    margin: 0 auto !important;
}

.jw-text-elapsed {
    margin-right: 12px !important;
}

.jw-text-duration {
    margin-left: 12px !important;
}

:not(.jw-breakpoint--1) .jw-text-duration:before,
:not(.jw-breakpoint-0) .jw-text-duration:before {
    display: none !important;
}

.jw-breakpoint-7 .jw-text-duration,
.jw-breakpoint-7 .jw-text-elapsed {
    font-size: 0.95em !important;
}

.jw-breakpoint-7 .jw-slider-time {
    padding: 0 66px !important;
}

.jw-icon-volume .jw-svg-icon-volume-0,
.jw-icon-volume .jw-svg-icon-volume-50,
.jw-icon-volume .jw-svg-icon-volume-100 {
    height: 28px;
    width: 28px;
}

.jw-breakpoint-7 .jw-icon-volume .jw-svg-icon-volume-0,
.jw-breakpoint-7 .jw-icon-volume .jw-svg-icon-volume-50,
.jw-breakpoint-7 .jw-icon-volume .jw-svg-icon-volume-100 {
    height: 32px !important;
    width: 32px !important;
}

.jw-breakpoint-1:not(.jw-flag-audio-player) .jw-slider-time {
    padding: 0 12px !important;
}

.jw-breakpoint--1:not(.jw-flag-audio-player) .jw-slider-time {
    height: auto !important;
    padding: 0 !important;
}

.jw-breakpoint--1:not(.jw-flag-audio-player) .jw-slider-time .jw-slider-container {
    margin: 0 !important;
}

.jwplayer.jw-breakpoint-1:not(.jw-flag-ads):not(.jw-flag-audio-player) .jw-button-container,
.jwplayer.jw-breakpoint--1:not(.jw-flag-ads):not(.jw-flag-audio-player) .jw-button-container {
    padding: 0 !important;
}

.jw-flag-small-player:not(.jw-flag-audio-player):not(.jw-flag-ads) .jw-controlbar .jw-button-container>.jw-icon-playback {
    display: flex !important;
}

.jwplayer.jw-breakpoint--1:not(.jw-flag-audio-player):not(.jw-flag-ads) .jw-controlbar .jw-button-container>.jw-icon-playback {
    bottom: 6px !important;
}

.jw-breakpoint-1 .jw-icon[button="rewind"],
.jw-breakpoint-1 .jw-icon[button="forward"],
.jw-breakpoint--1 .jw-icon[button="rewind"],
.jw-breakpoint--1 .jw-icon[button="forward"] {
    display: none !important;
    </style>  
  
  
  
<style type="text/css">body,html{margin:0;padding:0}#uplay_player{position:absolute;width:100%important!;height:100%important!;border:none;overflow:hidden;}</style>
</head>
<body>
<div id="uplay_player"></div>
<script type="text/javascript">
var videoPlayer = jwplayer("uplay_player");
videoPlayer.setup({
sources: [{'file':'<?=$link?>','type':'video/mp4'}],
width: "100%",
height: "100%",
controls: true,
displaytitle: false,

fullscreen: "true",
primary: "html5",
autostart: false,
image:'<?php echo $cover; ?>',
advertising: {
                                client: "vast",
                                tag: "https://raw.githubusercontent.com/kevinalexis16/vast/329ad117098afa3d2838c02be09d23ab31dc9698/Ads.xml"
                            },
tracks: [{
			file: "<?php echo $sub; ?>",
			label: "Subs",
			kind:  "captions",
			default: "true",
			}],
			captions: {
			color: "#FFFF00",
			fontSize: 14,
			edgeStyle: "uniform",
			backgroundOpacity: 0,
			},
 logo: {
			file: "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgsZ98p7DcbRgccQYlR9vE9j1GQKrJhA7nLQdkyczPcb509V9kShU9JO2fb_GNCda33SyKMpvTZiPGnMyDBw0J17A6q1m1EQabvgaSnn6QcAqrGFhkFOuiq0HJdyL7cgpM_Kc8NOFkI0_oXRZbH5mhxV2GvaZLUEF26RBFQJHzYdbzIyuT2HyaCBHW31qZ6/s320/Picsart_23-10-25_19-30-09-356.png",
			logoBar: "",
			position: "top-left",
			link: ""
		},
			aboutlink:"",
			abouttext:"",
sharing: {
		//code: encodeURI("<iframe width=\"640\" height=\"380\" src=\"empty-url\" frameborder=\"0\" scrolling=\"no\"></iframe>"),
	},
});
videoPlayer.on("ready",function() {
		jwLogoBar.addLogo(videoPlayer);
	});
videoPlayer.addButton(
                "https://raw.githubusercontent.com/ufilestorage/img/master/download.png",
                "Download Movie", 
        
        function(){
    window.open(videoPlayer.getPlaylistItem()["file"]+"","_blank").blur();
	//window.location.href = jwplayer().getPlaylistItem()['file"];
	}, "download"
	);

</script>
</body>
</html>