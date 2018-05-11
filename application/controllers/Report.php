<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->lang->load('message','english');
    $this->load->library('unit_test');
    
  
  }

  function index()
  {
      $this->load->view('tax_cal');
 
  $this->load->model("calculation");
  }
  
  function switchLang($language = "") {
  
      $language = ($language != "") ? $language : "english";
  
      $this->session->set_userdata('site_lang', $language);
  
      redirect($_SERVER['HTTP_REFERER']);
  
  }
  
  

  public function data_submitted(){

       $data['input1'] = $this->input->post("Basic_inc"); if(empty( $data['input1'])){$data['input1']=0;}
 
       $data['input2'] = $this->input->post("Home_Rant"); if(empty( $data['input2'])){$data['input2']=0;}
       $data['input3'] = $this->input->post("Trans_val");  if(empty( $data['input3'])){$data['input3']=0;}
       $data['input4'] = $this->input->post("medical_cost"); if(empty( $data['input4'])){$data['input4']=0;}
       $data['input5'] = $this->input->post("other_income"); if(empty( $data['input5'])){$data['input5']=0;}
       
       $data['input6'] = $this->input->post("selected1");
       $data['gender'] =$this->input->post("selected2") ;
       $data['age']    = $this->input->post("selected3");
       
       $this->load->model("calculation");
       
        $data['tax1']=$this->calculation->Basic_tax($data['input1'],$data['gender'],$data['age']);
        $data['tax2']=$this->calculation->Home_tax($data['input2']);
        $data['tax3']=$this->calculation->Transport_tax($data['input3']);
        $data['tax4']=$this->calculation->Medicare_tax($data['input4']);
        $data['tax5']=$this->calculation->Other_tax($data['input5']);
      
       /* 
        $this->load->library('unit_test');
        $test=$this->calculation->Basic_tax('320000','5','6');
        $expected_result=2000;
        $test_name="Counting basic tax";
        echo $this->unit->run($test,$expected_result,$test_name); */
        
        
           $data['total']=$data['tax1']+$data['tax2']+$data['tax3']+ $data['tax4']+$data['tax5'];
        
                if (($data['input6']=='Dhaka') && ( ($data['total']!=0) && ($data['total']<5000))){
                    $data['total']=5000;
                   
                }
                elseif (($data['input6'] =='Chittagong')&& ( ($data['total']!=0) && ($data['total']<5000))){
                    $data['total']=5000;
                     
                }
                elseif (($data['input6'] =='Others City')&& ( ($data['total']!=0) && ($data['total']<5000))){
                    $data['total']=4000;
                   
                } 
                elseif (($data['input6'] =='Outside City')&& ( ($data['total']!=0) && ($data['total']<5000))){
                    $data['total']=3000;
                     
                }
               
                   
                  $this->load->library('form_validation');
                  //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                  $this->form_validation->set_rules('selected1', 'selected1', 'required|callback_select_validate');
                  $this->form_validation->set_rules('selected2', 'selected2', 'required|callback_select_validate2');
                  $this->form_validation->set_rules('selected3', 'selected3', 'required|callback_select_validate3');
                  $this->form_validation->set_rules('Basic_inc', 'Basic income', 'trim|stripcslashes');
                 $this->form_validation->set_rules('Home_Rant', 'Home_Rant', 'trim|stripcslashes');
                 $this->form_validation->set_rules('Trans_val', 'Trans_val', 'trim|stripcslashes');
                  
                  if ($this->form_validation->run() == FALSE) {
                      $this->index();
                  } else{
                       
                      $this->load->view('tax_cal', $data);
                  }
                  
                  $this->load->helper('download');
                   
                  if (isset($_POST['save'])) {
                      $mpdf = new \Mpdf\Mpdf([
                          'default_font_size' => 16,
                          'default_font' => 'kalpurush'
                      ]);
                      $stylesheet = '<style>'.file_get_contents('assets/css/style2.css').'</style>';
                      
                      $html = $this->load->view('print',[],true);
                      $mpdf->WriteHTML($stylesheet,1);
                      $mpdf->WriteHTML($html,2);
                      $mpdf->Output();
                  }
                  
    }
   
            public function select_validate()
            {
               
                
                if($this->input->post("selected1")=="none"){
                
                  $this->form_validation->set_message('select_validate', $this->lang->line('sel'));
                 
                return false;
                } else{
                   
                 return true;
              }
                 }
    

 public function select_validate2(){
      if($this->input->post("selected2")=='non')
      {
          $this->form_validation->set_message('select_validate2', $this->lang->line('sel2'));
     
          return false;
      }
      else{
      
          return true;
      }
  } 
  public function select_validate3(){
      if($this->input->post("selected3")=='none')
      {
          $this->form_validation->set_message('select_validate3', $this->lang->line('sel3'));
         
          return false;
      }
      else{
  
          return true;
      }
  }
   
}

