<?php
 $notif = $this->session->flashdata('notifJS');
  echo "<script type=\"text/javascript\">
    $(document).ready(function () {
      $.toast({
       heading: '".$notif["heading"]."',
       text: '".$notif["text"]."',
       position: 'top-right',
       loaderBg:'#ff6849',
       icon: '".$notif["type"]."',
       hideAfter: 3000,
       stack: 6
     });
    });
  </script>";
 ?>
