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
   <h2 align="center">Compare Teams</h2><br />
   <br>
   Select team one
   <br>
   <div>
   <select name="dropdown" onchange="teamOne(this);">
       <option value="" disabled selected>Select team 1</option>
       <?php foreach($teams as $team) {?>
       <option value=""><?php echo $team->name;?></option>
<?php }?>
</select>
   </div>
   <div>
       Select team two
       <br>
       <select name="dropdown" onchange="teamTwo(this);">
           <option value="" disabled selected>Select team 2</option>
            <?php foreach($teams as $team) {?>
           <option value=""><?php echo $team->name;?></option>
<?php }?>
</select>
       <form action="<?php echo site_url('comparison/compare'); ?>" method="post">
           <input type="hidden" name="teamOne" id="teamOne" value="">
    <form action="<?php echo site_url('comparison/compare'); ?>" method="post">
        <input type="hidden" name="teamTwo" id="teamTwo" value="">
       <button type="submit" name="submit" value="Compare">Compare</button>
   </div>
 </body>
</html>
<script>
    function teamOne(sel) {
  var e = sel.options[sel.selectedIndex].text;
  document.getElementById('teamOne').value = e;
}
</script>
<script>
    function teamTwo(sel) {
  var e = sel.options[sel.selectedIndex].text;
  document.getElementById('teamTwo').value = e;
}
</script>
