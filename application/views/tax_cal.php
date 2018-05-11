<!DOCTYPE html>
<html>
<head>
<title>Income Tax Calculator</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>" >

<script type="text/javascript"><?= base_url('assets/js/jquery.js')?></script>
<script type="text/javascript"><?= base_url('assets/js/jquery.min.js')?></script>

<script>

function hideerror(){
   var selectBox=document.getElementById('city');
   var userInput=selectBox.options[selectBox.selectedIndex].value;
   if(userInput!="none"){
	   document.getElementById('error').style.visibility='hidden';
	   }
   else{
	   document.getElementById('error').style.visibility='visible';
	   }
   return false;
}
function hideerror2(){
	   var selectBox=document.getElementById('gender');
	   var userInput=selectBox.options[selectBox.selectedIndex].value;
	   if(userInput!="non"){
		   document.getElementById('error1').style.visibility='hidden';
		   }
	   else{
		   document.getElementById('error1').style.visibility='visible';
		   }
	   return false;
	}
 function hideerror3(){
	   var selectBox=document.getElementById('age');
	   var userInput=selectBox.options[selectBox.selectedIndex].value;
	   if(userInput!="none"){
		   document.getElementById('error2').style.visibility='hidden';
		   }
	   else{
		   document.getElementById('error2').style.visibility='visible';
		   }
	   return false;
	} 

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>

<body>


<div id="container">

<?php echo form_open('Report/data_submitted'); ?>

            <div id="menue">
            
            
             
             
      
                <h5 ><?php echo $this->lang->line('receive_text'); ?>
                
              <select onchange="javascript:window.location.href='<?php echo base_url(); ?>Report/switchLang/'+this.value;" style="float:right;background:#ddd;color:black;">
                	<option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
                	<option value="bengali" <?php if($this->session->userdata('site_lang') == 'bengali') echo 'selected="selected"'; ?>>Bangla</option>
                	
             </select>
                </h5>
                          <div id="left">
                            <label style="font-weight:bold;margin-right:7px; "><?php echo $this->lang->line('city'); ?></label>
                          
                          
                              <select name="selected1" id="city" onchange="return hideerror();"> 
                              
                                <option value="none"><?php echo $this->lang->line('s1'); ?></option>
                                <option value="Dhaka" <?php echo  set_select('selected1', 'Dhaka'); ?> ><?php echo $this->lang->line('dhaka'); ?></option>
                                <option value="Chittagong" <?php echo  set_select('selected1', 'Chittagong'); ?> ><?php echo $this->lang->line('ctg'); ?></option>
                                <option value="Others City" <?php echo  set_select('selected1', 'Others City'); ?> ><?php echo $this->lang->line('other'); ?></option>
                                <option value="Outside City" <?php echo  set_select('selected1', 'Outside City'); ?> ><?php echo $this->lang->line('outside'); ?></option>
                                </select>  
                             <?php echo form_error('selected1', '<div id="error">', '</div>'); ?>
                              </div>
                            <div id="center">
                            
                             <label style="font-weight:bold;margin-right:7px; "><?php echo $this->lang->line('Gender'); ?></label>
                            
                            
                              <select name="selected2" id="gender" onchange="return hideerror2();">
                                <option value="non"><?php echo $this->lang->line('s2'); ?></option>
                                <option value="Male" <?php echo  set_select('selected2', 'Male'); ?> ><?php echo $this->lang->line('male'); ?></option>
                                <option value="Female" <?php echo  set_select('selected2', 'Female'); ?> ><?php echo $this->lang->line('female'); ?></option>
                                 
                               </select>
                                <?php echo form_error('selected2', '<div id="error1">', '</div>'); ?>
                            </div>
                            
                            <div id="right">
                            <label style="font-weight:bold;margin-right:10px;"> <?php echo $this->lang->line('age'); ?></label>
                            
                            
                            <select name="selected3" id="age" onchange="return hideerror3();">
                                <option value="none"> <?php echo $this->lang->line('s3'); ?></option>
                                <option value="Avobe 65 Years" <?php echo  set_select('selected3', 'Avobe 65 Years'); ?> ><?php echo $this->lang->line('grater'); ?></option>
                                <option value="Bellow 65 Years" <?php echo  set_select('selected3', 'Bellow 65 Years'); ?> ><?php echo $this->lang->line('less'); ?></option>
                   
                            </select>
                            <?php echo form_error('selected3', '<div id="error2">', '</div>'); ?>
                          </div>
                        </div>
<div id="firm">
<div id="input1">
<h1><?php echo $this->lang->line('cal'); ?> </h1>

<table>
      <tr>
          <td> <?php echo $this->lang->line('basic');?> </td>
          <td><?php $data= array('name' => 'Basic_inc','value'=>$this->input->post('Basic_inc'),'rules' => 'required','type'=>'number','step'=>'0.01');
           echo form_input($data);?>
           <?php echo form_error('Basic_inc'); ?>
           </td>
  
          <td ><?php echo $this->lang->line('basic_tax');?></td>
          <td style="text-align: right;"><?php if(isset($tax1)){ echo number_format($tax1,2) ;}?></td>
      </tr>

      <tr>
              
              <td><?php echo $this->lang->line('home');?> </td>
        
              <td onkeypress="return CheckNumeric()">
              <?php  $data= array('name' => 'Home_Rant','value'=>set_value('Home_Rant'),'rules' => 'required','type'=>'number','step'=>'0.01');
              echo form_input($data); ?></td>
            
              <td><?php echo $this->lang->line('home_tax') ;?></td>
              <td style="text-align: right;"><?php if(isset($tax2)){ echo number_format($tax2,2) ;}?></td>
              
      </tr>
        <tr>
              <td><?php echo $this->lang->line('transport');?></td>
              <td><?php $data= array('name' => 'Trans_val','type'=>'number','step'=>'0.01','class'=>'number','rules' => 'required','value'=>set_value('Trans_val'));
              echo form_input($data);?></td>
             
              <td><?php echo $this->lang->line('transport_tax') ;?></td>
              <td style="text-align: right;"><?php if(isset($tax3)){ echo number_format($tax3,2) ;}?></td>
        </tr>
        <tr>

              <td><?php echo $this->lang->line('medical');?></td>
              <td><?php $data= array('name' => 'medical_cost','type'=>'number','step'=>'0.01','rules' => 'required','value'=>set_value('medical_cost'));
               echo form_input($data);?> </td>
             
              <td><?php echo $this->lang->line('medical_tax') ;?></td>
              <td style="text-align: right;"><?php if(isset($tax4)){ echo number_format($tax4,2) ;}?></td>
        </tr>
        <tr>
              <td><?php echo $this->lang->line('others');?></td>
              <td style="margin-right:300px"><?php $data= array('name' => 'other_income','type'=>'number','step'=>'0.01','rules' => 'required','value'=>set_value('other_income'));
              echo form_input($data);?></td>
              
              <td><?php echo $this->lang->line('others_tax');?></td>
              <td style="text-align: right;"><?php if(isset($tax5)){ echo number_format($tax5,2) ;}?></td>
        </tr>

      <tr>
           
            <td></td>
            <td></td>
            <td><?php echo $this->lang->line('total');?></td>
            <td style="text-align: right;"><?php if(isset($total)){ echo number_format($total,2) ;}?></td>
        </tr>


<tr>
  <td></td>
  <td class="calcul" style="width:120px;"><?php echo form_submit(array('id' => 'submit', 'value' => $this->lang->line('calculate'))); ?></td>

</tr>

  

</table>


                 
<div class="nop2">
 <label style="width:120px; float:right;"> <?php echo form_submit(array('id' => 'submit', 'value' => $this->lang->line('print'),'name'=>'save')); ?></label>
</div>
<?php echo form_close(); ?>





</div>
 </div>
 <!--
<script>
$('input.number').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});-->
</script>
</body>
</html>