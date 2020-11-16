<?php

set_time_limit(0);
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

include "ccfg.php";

/* ANEKA WARNA */
$hitam="\033[0;30m";
$putih="\033[0;37m";
$putih2="\033[1;37m";
$red="\033[0;31m";
$red2="\033[1;31m";
$lblue="\033[0;36m";
$lblue2="\033[1;36m";
$green="\033[0;32m";
$green2="\033[1;32m";
$blue="\033[0;34m";
$blue2="\033[1;34m";
$purple="\033[0;35m";
$purple2="\033[1;35m";
$yellow="\033[0;33m";
$yellow2="\033[1;33m";
$abu2="\033[1;30m";

/* SIMBOL */

$nott = "{$abu2} [{$red}!{$abu2}]{$red2}";
$siip = "{$abu2} [{$green}√{$abu2}]{$green}";
$note = "{$lblue2} [{$yellow2}Ϟ{$lblue2}]{$yellow2}";
$cl = "{$lblue2} [{$yellow2}~{$lblue2}]{$yellow2}";
$titik2 = "{$lblue2} [{$green2}~{$lblue2}]{$lblue2}";
$add = "{$lblue2} [{$green2}+{$lblue2}]{$green}";
$titik4 = "{$lblue2} [{$putih2}^{$lblue2}]{$putih2}";


function curl_get($url,$headers){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);    
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

function curl_post($url,$headers,$data){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

$banner = "
{$note1} {$purple2}Author    {$red2}►►►  {$lblue2}[ {$yellow2}sᴜᴍɪᴛʀᴏ™ {$lblue2}]
{$note1} {$purple2}AppName   {$red2}►►►  {$lblue2}[ {$green2}ClipClap {$lblue2}]
{$note1} {$purple2}YouTube   {$red2}►►►  {$lblue2}[ {$red2}sᴜᴍɪᴛʀᴏ {$lblue2}]
{$blue2} ~{$red2}~{$green2}~{$red2}~{$blue2}~{$green2}~{$blue2}~{$red2}~{$green2}~{$red2}~{$blue2}~{$green2}~{$blue2}~{$red2}~{$green2}~{$red2}~{$blue2}~{$green2}~{$blue2}~{$red2}~{$green2}~{$red2}~{$blue2}~{$green2}~{$blue2}~{$red2}~{$green2}~{$red2}~{$blue2}~{$green2}~{$blue2}~{$red2}~{$green2}~{$red2}~{$blue2}~{$green2}~{$blue2}~{$red2}~{$green2}~{$red2}~{$blue2}~{$green2}~{$blue2}~{$red2}~{$green2}~{$red2}~{$blue2}~{$green2}~{$blue2}~{$red2}~{$green2}~{$blue2}~{$red2}~\n";

$spasi = " {$red2}=> ";
$time = "185";

echo os.system('clear');
echo $banner;
$head = array(
  "Host: api.cc.lerjin.com",
  "charset: UTF-8",
  "device-type: 2",
  "api-version: 2",
  "external-version: 2.2.9",
  "device: 10",
  "version: 42",
  "timezone: 7",
  "lang: in",
  "token: ".$token."",
  "uuid: ".$uuid."",
  "app-id: ClipClaps_gg",
  "cache-control: no-cache",
  "content-type: application/json; charset=UTF-8",
  "user-agent: okhttp/4.2.1 1");
$dtdash = array("userid" => "{$userid}","token" => "{$token}");
$jsdash = json_encode($dtdash);
$dash = curl_post("https://api.cc.lerjin.com/user/self/info", $head, $jsdash);
$j =json_decode($dash);
$nama = $j->data->nickname;
$koin = $j->data->coins;
$cash = $j->data->cash;
echo " {$putih2}Account {$red2}=> {$green2}".$nama." {$red2}[ {$lblue2}{$userid} {$red2}]\n";
echo " {$putih2}Balance {$red2}=> {$yellow2}[ ".$koin." Coin ]{$green2}[ $ ".$cash." ]\n";

$dt_list = array("finishCashOutGuide" => "false","userid" => "{$userid}","token" => "{$token}");
$js_list = json_encode($dt_list);
$list = curl_post("https://api.cc.lerjin.com/reward/list", $head, $js_list);
$j_list = json_decode($list);
echo " {$lblue2}ϞϞ {$green2}TREASURE LIST {$lblue2}ϞϞ\n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[0]->type."  {$red2}~> {$green2}".$j_list->data->treasureChest[0]->num."{$lblue2} \n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[1]->type."  {$red2}~> {$green2}".$j_list->data->treasureChest[1]->num."{$lblue2} \n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[2]->type."    {$red2}~> {$green2}".$j_list->data->treasureChest[2]->num."{$lblue2} \n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[3]->type."  {$red2}~> {$green2}".$j_list->data->treasureChest[3]->num."{$lblue2} \n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[4]->type." {$red2}~> {$green2}".$j_list->data->treasureChest[4]->num."{$lblue2} \n";
sleep(1);
echo "\n"," {$lblue2}Ϟ {$green2}BOT KEUR GAWE !!! {$lblue2}Ϟ\n";
echo "{$abu2} ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
$dt_rtimer = array("finishCashOutGuide" => "false","userid" => "{$userid}","token" => "{$token}");
$js_rtimer = json_encode($dt_rtimer);
$rtimer = curl_post("https://api.cc.lerjin.com/reading/timer", $head, $js_rtimer);
$j_rtimer = json_decode($rtimer);
$day = $j_rtimer->data->day;
$activeDay = $j_rtimer->data->activeDay;

while(True){
$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[0]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[0]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[0]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);
$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[0]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[0]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[0]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward1 = array("rewardTime" => "{$j_rtimer->data->config->timerReward[1]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[1]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[1]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward1 = json_encode($dt_reward1);
$reward1 = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward1);

$r1 = json_decode($reward1);
$msg1 = $r1->msg;
if ($msg1 == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[1]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[1]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[1]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward2 = array("rewardTime" => "{$j_rtimer->data->config->timerReward[2]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[2]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[2]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward2 = json_encode($dt_reward2);
$reward2 = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward2);

$r2 = json_decode($reward2);
$msg2 = $r2->msg;
if ($msg2 == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[2]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[2]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[2]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward3 = array("rewardTime" => "{$j_rtimer->data->config->timerReward[3]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[3]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[3]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward3 = json_encode($dt_reward3);
$reward3 = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward3);

$r3 = json_decode($reward3);
$msg3 = $r3->msg;
if ($msg3 == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[3]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[3]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[3]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[4]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[4]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[4]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[4]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[4]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[4]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[5]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[5]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[5]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[5]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[5]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[5]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[6]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[6]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[6]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[6]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[6]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[6]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[7]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[7]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[7]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[7]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[7]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[7]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[8]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[8]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[8]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[8]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[8]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[8]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[9]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[9]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[9]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[9]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[9]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[9]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[10]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[10]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[10]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[10]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[10]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[10]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[11]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[11]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[11]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[11]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[11]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[11]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[12]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[12]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[12]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[12]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[12]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[12]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[13]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[13]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[13]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[13]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[13]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[13]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[14]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[14]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[14]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[14]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[14]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[14]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[15]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[15]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[15]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[15]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[15]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[15]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[16]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[16]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[16]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[16]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[16]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[16]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[17]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[17]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[17]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[17]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[17]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[17]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[18]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[18]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[18]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[18]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[18]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[18]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[19]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[19]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[19]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[19]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[19]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[19]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[20]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[20]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[20]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[20]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[20]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[20]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[21]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[21]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[21]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[21]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[21]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[21]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[22]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[22]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[22]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[22]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[22]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[22]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[23]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[23]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[23]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[23]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[23]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[23]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[24]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[24]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[24]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[24]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[24]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[24]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[25]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[25]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[25]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[25]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[25]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[25]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[26]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[26]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[26]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[26]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[26]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[26]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[27]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[27]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[27]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[27]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[27]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[27]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[28]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[28]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[28]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[28]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[28]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[28]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[29]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[29]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[29]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[29]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[29]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[29]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[30]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[30]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[30]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[30]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[30]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[30]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[31]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[31]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[31]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[31]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[31]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[31]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[32]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[32]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[32]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[32]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[32]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[32]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[33]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[33]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[33]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[33]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[33]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[33]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[34]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[34]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[34]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[34]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[34]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[34]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(1);
}

$dt_reward = array("rewardTime" => "{$j_rtimer->data->config->timerReward[35]->time}","articleTime" => "0","rewardType" => "{$j_rtimer->data->config->timerReward[35]->rewardType}","activeDay" => "{$activeDay}","videoTime" => "{$j_rtimer->data->config->timerReward[35]->time}","specific" => "false","userid" => "{$userid}","version" => "7","day" => "{$day}","token" => "{$token}");
$js_reward = json_encode($dt_reward);
$reward = curl_post("https://api.cc.lerjin.com/reading/obtainReward", $head, $js_reward);

$r0 = json_decode($reward);
$msg = $r0->msg;
if ($msg == "Success"){
  echo " {$putih2}You Get {$red2}=> {$green2}{$j_rtimer->data->config->timerReward[35]->rewardType}".$spasi."{$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[35]->time}\n";
  for ($weth=$time;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " {$putih2}Timer Reward {$green2}{$j_rtimer->data->config->timerReward[35]->time} {$red2}=> {$putih2}Sudah Di Ambil !!!\n";
  sleep(2);
}
echo os.system('clear');
echo $banner;
$head1 = array(
  "Host: api.cc.lerjin.com",
  "charset: UTF-8",
  "device-type: 2",
  "api-version: 2",
  "external-version: 2.2.9",
  "device: 10",
  "version: 42",
  "timezone: 7",
  "lang: in",
  "token: ".$token."",
  "uuid: ".$uuid."",
  "app-id: ClipClaps_gg",
  "cache-control: no-cache",
  "content-type: application/json; charset=UTF-8",
  "user-agent: okhttp/4.2.1 1");
$dtdash1 = array("userid" => "{$userid}","token" => "{$token}");
$jsdash1 = json_encode($dtdash1);
$dash1 = curl_post("https://api.cc.lerjin.com/user/self/info", $head1, $jsdash1);
$j1 =json_decode($dash1);
$nama1 = $j1->data->nickname;
$koin1 = $j1->data->coins;
$cash1 = $j1->data->cash;
echo " {$putih2}Account {$red2}=> {$green2}".$nama1." {$red2}[ {$lblue2}{$userid} {$red2}]\n";
echo " {$putih2}Balance {$red2}=> {$yellow2}[ ".$koin1." Coin ]{$green2}[ $ ".$cash1." ]\n";

$dt_list1 = array("finishCashOutGuide" => "false","userid" => "{$userid}","token" => "{$token}");
$js_list1 = json_encode($dt_list1);
$list1 = curl_post("https://api.cc.lerjin.com/reward/list", $head1, $js_list1);
$j_list1 = json_decode($list1);
echo " {$lblue2}ϞϞ {$green2}TREASURE LIST {$lblue2}ϞϞ\n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[0]->type."  {$red2}~> {$green2}".$j_list->data->treasureChest[0]->num."{$lblue2} \n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[1]->type."  {$red2}~> {$green2}".$j_list->data->treasureChest[1]->num."{$lblue2} \n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[2]->type."    {$red2}~> {$green2}".$j_list->data->treasureChest[2]->num."{$lblue2} \n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[3]->type."  {$red2}~> {$green2}".$j_list->data->treasureChest[3]->num."{$lblue2} \n";
echo " {$lblue2}[ ]{$yellow2}".$j_list->data->treasureChest[4]->type." {$red2}~> {$green2}".$j_list->data->treasureChest[4]->num."{$lblue2} \n";
echo "\n";
sleep(1);
echo "\n"," {$lblue2}Ϟ {$green2}BOT KEUR GAWE !!! {$lblue2}Ϟ\n";
echo "{$abu2} ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";

echo " Ϟ {$putih2}Membuka Peti {$red2}=>=> {$green2}{$j_list->data->treasureChest[0]->type} Ϟ\n";
while($j_list->data->treasureChest[0]->num != 0){
if ($j_list->data->treasureChest[0]->num != 0){
  $dt_open = array("type" => "{$j_list->data->treasureChest[0]->type}","userid" => "{$userid}","token" => "{$token}");
  $js_open = json_encode($dt_open);
  $open = curl_post("https://api.cc.lerjin.com/reward/treasureChest/open", $head, $js_open);
  echo $open."\n";
  for ($weth=5;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}
echo " {$putih2}Peti {$red2}=> {$green2}{$j_list->data->treasureChest[0]->type} {$putih2}Kosong !!!\n";
sleep(1);
}

echo " Ϟ Membuka Peti => {$j_list->data->treasureChest[1]->type} Ϟ\n";
while(True){
if ($j_list->data->treasureChest[1]->num != 0){
  $dt_open = array("type" => "{$j_list->data->treasureChest[1]->type}","userid" => "{$userid}","token" => "{$token}");
  $js_open = json_encode($dt_open);
  $open = curl_post("https://api.cc.lerjin.com/reward/treasureChest/open", $head, $js_open);
  echo $open."\n";
  for ($weth=5;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " Peti => {$j_list->data->treasureChest[1]->type} Kosong !!!\n";
  continue;
  sleep(1);
}
}

echo " Ϟ Membuka Peti => {$j_list->data->treasureChest[2]->type} Ϟ\n";
while(True){
if ($j_list->data->treasureChest[2]->num != 0){
  $dt_open = array("type" => "{$j_list->data->treasureChest[2]->type}","userid" => "{$userid}","token" => "{$token}");
  $js_open = json_encode($dt_open);
  $open = curl_post("https://api.cc.lerjin.com/reward/treasureChest/open", $head, $js_open);
  echo $open."\n";
  for ($weth=5;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " Peti => {$j_list->data->treasureChest[2]->type} Kosong !!!\n";
  continue;
  sleep(1);
}
}

echo " Ϟ Membuka Peti => {$j_list->data->treasureChest[3]->type} Ϟ\n";
while(True){
if ($j_list->data->treasureChest[3]->num != 0){
  $dt_open = array("type" => "{$j_list->data->treasureChest[3]->type}","userid" => "{$userid}","token" => "{$token}");
  $js_open = json_encode($dt_open);
  $open = curl_post("https://api.cc.lerjin.com/reward/treasureChest/open", $head, $js_open);
  echo $open."\n";
  for ($weth=5;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " Peti => {$j_list->data->treasureChest[3]->type} Kosong !!!\n";
  continue;
  sleep(1);
}
}

echo " Ϟ Membuka Peti => {$j_list->data->treasureChest[4]->type} Ϟ\n";
while(True){
if ($j_list->data->treasureChest[4]->num != 0){
  $dt_open = array("type" => "{$j_list->data->treasureChest[4]->type}","userid" => "{$userid}","token" => "{$token}");
  $js_open = json_encode($dt_open);
  $open = curl_post("https://api.cc.lerjin.com/reward/treasureChest/open", $head, $js_open);
  echo $open."\n";
  for ($weth=5;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}else{
  echo " Peti => {$j_list->data->treasureChest[4]->type} Kosong !!!\n";
  continue;
  sleep(1);
}
}
for ($weth=86400;$weth>0;$weth--){
     echo "\r \r";
     echo $titik4."\r<<< Timer 24 Jam >>> ".$weth." Seconds ";
     echo "\r\r";
     sleep(1);
     }
}
}
/*
$dt_list = array('finishCashOutGuide' => 'false','userid' => '{$userid}','token' => '{$token}');
$js_list = json_encode($dt_list);
$list = curl_post("https://api.cc.lerjin.com/reward/list", $head, $js_list);
$j_list = json_decode($list);


$dt_list = array('finishCashOutGuide' => 'false','userid' => '{$userid}','token' => '{$token}');
$js_list = json_encode($dt_list);
$list = curl_post("https://api.cc.lerjin.com/reward/list", $head, $js_list);
$j_list = json_decode($list);
$day = $j_list













$p = json_decode($dash);
echo $note." {$yellow2}Your Point {$red2}==> {$green2}".$p->result[1]," Coins\n";
sleep(1);
echo "\n"," {$lblue2}Ϟ {$green2}BOT IS RUNNING {$lblue2}Ϟ\n";
echo "{$abu2} ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n";
sleep(1);
*/
