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
     <select id="Favteam" name="dropdown" onchange="myNewFunction(this);">
<?php foreach($teams as $team) {?>
       <option value=""><?php echo $team->name;?></option>
<?php }?>
</select>
   <form action="<?php echo site_url('clubPage/favouriteTeams'); ?>" method="post">
       <input type="hidden" name="userId" id="userId" value="<?php print_r ($this->session->userdata('userId'))?>"
    <form action="<?php echo site_url('clubPage/favouriteTeams'); ?>" method="post">
        <input type="hidden" name="teamName" id="teamName" value="">
       <button type="submit" name="submit" value="Save">Save</button>
 </body>
</html>
<script>
    function myNewFunction(sel) {
  var e = sel.options[sel.selectedIndex].text;
  document.getElementById('teamName').value = e;
}
</script>