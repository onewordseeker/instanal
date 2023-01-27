<?php
function getInstagramUser($data) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,'https://i.instagram.com/api/v1/users/web_profile_info/?username='.$data['username']);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 105.0.0.11.118 (iPhone11,8; iOS 12_3_1; en_US; en-US; scale=2.00; 828x1792; 165586599)');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Instagram-GIS" => md5("fc2e73d4fd7dddcd31d28bea5cb2df59:/onewordseeking/") ,"Cookie: ds_user_id=4347876543245; Domain=instagram.com; expires=Fri, 22-Apr-2023 13:55:24 GMT; Max-Age=7776000; Path=/; Secure"));

  $response = curl_exec($ch);
  $result = json_decode($response);
  curl_close($ch);
  return $result;
}

function getInstagramUserFollowerHistory($data) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,'https://business.notjustanalytics.com/analyze/getProfileHistory?instagram_id='.$data['id'].'&username='.$data['username']);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 105.0.0.11.118 (iPhone11,8; iOS 12_3_1; en_US; en-US; scale=2.00; 828x1792; 165586599)');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);

  $response = curl_exec($ch);
  $result = json_decode($response);
  curl_close($ch);
  return $result;
}

function postList(){
  
}

function getPost($short_code) {
  
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL,'https://www.instagram.com/p/'.$short_code.'/?__a=1&__d=dis');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 105.0.0.11.118 (iPhone11,8; iOS 12_3_1; en_US; en-US; scale=2.00; 828x1792; 165586599)');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Instagram-GIS" => md5("fc2e73d4fd7dddcd31d28bea5cb2df59:/onewordseeking/") ,"Cookie: ds_user_id=4347876543245; Domain=instagram.com; expires=Fri, 22-Apr-2023 13:55:24 GMT; Max-Age=7776000; Path=/; Secure"));
  $response = curl_exec($ch);
  $result = json_decode($response);
  curl_close($ch);
  return $result;
}


//".(strtotime(date('d-m-Y H:i:s')))."
// "Cookie: ds_user_id=4369458810; Domain=.instagram.com; expires=Fri, ".date('d-m-Y', strtotime(date('d-m-Y'). ' + 30 day'))." 22:10:24 GMT; Max-Age=7776000; Path=/; Secure"






?>
