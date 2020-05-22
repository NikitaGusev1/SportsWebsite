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
   <?php for ($i = 0; $i<sizeof($teams); $i++ ) {
       if((string) $teams[$i]->name==(string) $compared['teamOne']) {?>
   <br>
   <table class="table table-bordered table-striped">
       <th>Team</th>
       <th>Wins</th> 
       <th>Losses</th>
       <th>Points</th>
       <th>Competition</th>
       <tr>
       <td><?php echo $teams[$i]->name;?></td>
       <td><?php echo $teams[$i]->wins;?></td>
       <td><?php echo $teams[$i]->losses;?></td>
       <td><?php echo $teams[$i]->points;?></td>
       <td><?php echo $teams[$i]->competition;?></td>
       </tr>
       <tr>
       <?php for ($i = 0; $i<sizeof($teams); $i++ ) {
       if((string) $teams[$i]->name==(string) $compared['teamTwo']) {?>
       <tr>
       <td><?php echo $teams[$i]->name;?></td>
       <td><?php echo $teams[$i]->wins;?></td>
       <td><?php echo $teams[$i]->losses;?></td>
       <td><?php echo $teams[$i]->points;?></td>
       <td><?php echo $teams[$i]->competition;?></td>
       </tr>
   </table>
       <?php }
   }?> 
       </tr>
   </table>
       <?php }
   }?>
 </body>
</html>

