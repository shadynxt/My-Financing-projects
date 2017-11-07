
<?php
function reset_email($user){
  \Mail::send('Site.emails.password',['user' => $user] ,
    function ($msg) use($user){
    $msg->from('khalijalbarmaja@gmail.com', 'Finance');
    $msg->to($user->email)->subject('Reset password');
  });
}

function time_string($datetime, $full = false) {
   $now = new DateTime;
   $ago = new DateTime($datetime);
   $diff = $now->diff($ago);
     $diff->w = floor($diff->d / 7);
   $diff->d -= $diff->w * 7;    $string = array(
       'y' => 'سنه',
       'm' => 'شهر',
       'w' => 'اسبوع',
       'd' => 'يوم',
       'h' => 'ساعة',
       'i' => 'دقيقة',
//        's' => 'ثانية',
   );
   foreach ($string as $k => &$v) {
       if ($diff->$k) {
           $v = $diff->$k . ' ' . $v;
       } else {
           unset($string[$k]);
       }
   }    if (!$full) $string = array_slice($string, 0, 1);
   return $string ? implode('  ,  ', $string) . '' : 'الأن';
}


function uploadImgFromMobile($base64,$path_folder)
{
    $image = base64_decode($base64);
    $image_name =  date("Y-m-d").'_'.str_random(5).'.jpg';
    $path = public_path() .$path_folder. $image_name;
    file_put_contents($path, $image);

    return $image_name;
}


?>
