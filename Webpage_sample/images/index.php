<?php $screen_w = 0;
      $screen_h = 0;
      $img = $_SERVER['QUERY_STRING'];
      if (file_exists($img)) {

        if (isset($_COOKIE['screen_dimensions']))
        {
               $screen = explode('x', $_COOKIE['screen_dimensions']);
               if (count($screen)==2) {
                   $screen_w = intval($screen[0]);
                   $screen_h = intval($screen[1]);
               }
         }




     if ($screen_width> 1280) {
         $output = substr_replace($img, '-high', -strlen($theExt)-1,0);

     else if ($screen_width> 800 && $screen_width<=1280) {
         $output = substr_replace($img, '-med', -strlen($theExt)-1,0);
     }

     else if ($screen_width<= 800) {
         $output = substr_replace($img, '-low', -strlen($theExt)-1, 0);
     }

     if (isset($output) &&file_exists($output)) {
         $img = $output;
     }
   }

   readfile($img);
   }
?>
