<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sports</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
     <div>
    <a href="javascript:window.history.go(-1);">Back to the mainpage</a>
   </div>
     <h1>Event 1</h1>
     <div><?php foreach($comments as $row){
         if (($row->eventid)==1) {
             echo($row-> username);
             echo(" wrote: ");
             echo($row->commtext);
             if(strlen(trim($row->commtext)) == 0)
            echo "<script type='text/javascript'>alert('$message');</script>";?>
         <br> <?php
         }
     }
     ?></div>
     <div>Write your comment here:</div>
     <form name="eventid" id="eventid" action="<?php echo site_url('clubPage/comment'); ?>" method="post">
     <form id="commtext" action="<?php echo site_url('clubPage/comment'); ?>" method="post">
         <input type="text" name="commtext">
     <br>
     <button type="submit" name="submit" value="Submit">Submit</button>
     <input name="eventid" form="eventid" type="hidden" value="1">
 </body>
</html>
<!--<script>
    var comment = document.getElementById("commtext").innerHTML;

</script>-->