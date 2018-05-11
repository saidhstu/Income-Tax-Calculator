<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" media="print" href="<?= base_url('assets/css/media.css') ?>" />
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/css/style2.css') ?>" >

<script type="text/javascript"><?= base_url('assets/js/jquery.js')?></script>
<script type="text/javascript"><?= base_url('assets/js/jquery.min.js')?></script>


</head>

<body>
 

<div id="container" style="margin-top:30px;">

<?php echo form_open('Report/data_submitted'); ?>


            <div id="menue">
         
               
                          <div id="left">
                            <label style="font-weight:bold;margin-right:7px; "><?php echo $this->lang->line('city1'); ?>  <?php 
                            
                            if($input6=='Dhaka'){
                                echo $this->lang->line('dhaka');
                            }
                            
                            else if($input6=='Chittagong')
                            {
                                echo $this->lang->line('ctg');
                            }
                            else if($input6=='Others City'){
                                echo $this->lang->line('other');
                            }
                            
                            else if($input6=='Outside City')
                            {
                                echo $this->lang->line('outside');
                            }
                            ?></label>
                              
                          
                              </div>
                            <div id="center">
                            
                             <label style="font-weight:bold;margin-right:7px; "><?php echo $this->lang->line('gender1'); ?>
                             <?php 
                             
                             if($gender=='Male'){
                                 echo $this->lang->line('male');
                             }
                             else if($gender=='Female'){
                                 echo $this->lang->line('female');
                             }
                             
                             ?></label>
                              
                            </div>
                            
                            <div id="right">
                            <label style="font-weight:bold;margin-right:10px;"><?php echo $this->lang->line('age1'); ?>
                            <?php 
                            if($age=='Avobe 65 Years'){
                                echo $this->lang->line('grater');
                            }
                            else if($age=='Bellow 65 Years'){
                                echo $this->lang->line('less');
                            }
                            ?>
                            
                            </label>
                            
                          </div>
                        </div>
<div id="firm">


<div id="input1">
<h1><?php echo $this->lang->line('after'); ?></h1>
<table >
      <tr>
          <td> <?php echo $this->lang->line('basic');?> </td>
          <td><?php echo number_format($input1,2); ?>  </td>
  
          <td><?php echo $this->lang->line('basic_tax');?></td>
          <td style="text-align: right;"><?php echo number_format($tax1,2) ;?></td>
      </tr>

      <tr>
              
              <td><?php echo $this->lang->line('home');?> </td>
        
              <td><?php echo number_format($input2,2); ?></td>
            
              <td><?php echo $this->lang->line('home_tax') ;?></td>
              <td style="text-align: right;"><?php echo number_format($tax2,2) ;?></td>
              
      </tr>
        <tr>
              <td><?php echo $this->lang->line('transport');?></td>
               <td><?php echo number_format($input3,2); ?></td>
             
              <td><?php echo $this->lang->line('transport_tax') ;?></td>
              <td style="text-align: right;"><?php echo number_format($tax3,2) ;?></td>
        </tr>
        <tr>

              <td><?php echo $this->lang->line('medical');?></td>
               <td><?php echo number_format($input4,2); ?></td>
             
              <td><?php echo $this->lang->line('medical_tax') ;?></td>
              <td style="text-align: right;"><?php echo number_format($tax4,2) ;?></td>
        </tr>
        <tr>
              <td><?php echo $this->lang->line('others');?></td>
               <td><?php echo number_format($input5,2); ?></td>
              
              <td><?php echo $this->lang->line('others_tax');?></td>
              <td style="text-align: right;"><?php echo number_format($tax5,2) ;?></td>
        </tr>

      <tr>
           
            <td></td>
            <td></td>
            <td><?php echo $this->lang->line('total');?></td>
            <td style="text-align: right;"><?php echo number_format($total,2 );?></td>
        </tr>

                   


  

</table>


      

<?php echo form_close(); ?>





</div>
 </div>

</body>
</html>