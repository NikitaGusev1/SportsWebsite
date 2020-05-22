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
     <form id="delfavs1" action="<?php echo site_url('clubPage/deleteFavs'); ?>" method="post">
         <form id="delfavs2" action="<?php echo site_url('clubPage/deleteFavs'); ?>" method="post">
        <table class="table table-bordered table-striped">
            <?php foreach($favouriteteams as $row){
                if(($row->userId)==($this->session->userdata(userId))){?>
            <tr>
                <td id="Favteam"> <?php echo $row ->teamName;?>
                </td>
                <th><button class="use-address" type="submit" name="submit" value="Remove">Remove</button></th>
            </tr>
                    <?php
                }
            }?>  
   <input type="hidden" name="userId" id="userId" form="delfavs1" value="<?php print_r ($this->session->userdata('userId'))?>">
   <input type="hidden" name="teamName" id="teamName" form="delfavs2">
        </table>
 </body>
</html>
<script>
    var teamname = document.getElementById("Favteam").innerHTML;
</script>
<script>
    $(".use-address").click(function() {
    var $item = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".nr")     // Gets a descendent with class="nr"
                       .text();         // Retrieves the text within <td>

    $("#resultas").append($item);       // Outputs the answer
});
</script>
