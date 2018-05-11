<?php
class Calculation extends CI_Model{
    
    public function Basic_tax($input1,$gender,$age){
                $this->load->database(); 
                $this->db->select('*');
                $query = $this->db->query('SELECT min_income FROM basic_income where id=1'); $row = $query->row();$a= $row->min_income;
                $query = $this->db->query('SELECT max_income FROM basic_income where id=1'); $row = $query->row();$b= $row->max_income;
                $query = $this->db->query('SELECT tax_rates FROM basic_income where id=1'); $row = $query->row();$c= $row->tax_rates;
                $query = $this->db->query('SELECT max_tax FROM basic_income where id=1'); $row = $query->row();$m1= $row->max_tax;

                $query = $this->db->query('SELECT min_income FROM basic_income where id=2'); $row = $query->row();$d= $row->min_income;
                $query = $this->db->query('SELECT max_income FROM basic_income where id=2'); $row = $query->row();$e= $row->max_income;
                $query = $this->db->query('SELECT tax_rates FROM basic_income where id=2'); $row = $query->row();$f= $row->tax_rates;
                $query = $this->db->query('SELECT max_tax FROM basic_income where id=2'); $row = $query->row();$m2= $row->max_tax;

                $query = $this->db->query('SELECT min_income FROM basic_income where id=3'); $row = $query->row();$g= $row->min_income;
                $query = $this->db->query('SELECT max_income FROM basic_income where id=3'); $row = $query->row();$h= $row->max_income;
                $query = $this->db->query('SELECT tax_rates FROM basic_income where id=3'); $row = $query->row();$i= $row->tax_rates;
                $query = $this->db->query('SELECT max_tax FROM basic_income where id=3'); $row = $query->row();$m3= $row->max_tax;

                $query = $this->db->query('SELECT min_income FROM basic_income where id=4'); $row = $query->row();$j= $row->min_income;
                $query = $this->db->query('SELECT max_income FROM basic_income where id=4'); $row = $query->row();$k= $row->max_income;
                $query = $this->db->query('SELECT tax_rates FROM basic_income where id=4'); $row = $query->row();$l= $row->tax_rates;
                $query = $this->db->query('SELECT max_tax FROM basic_income where id=4'); $row = $query->row();$m4= $row->max_tax;

                $query = $this->db->query('SELECT min_income FROM basic_income where id=5'); $row = $query->row();$m= $row->min_income;
                $query = $this->db->query('SELECT max_income FROM basic_income where id=5'); $row = $query->row();$n= $row->max_income;
                $query = $this->db->query('SELECT tax_rates FROM basic_income where id=5'); $row = $query->row();$o= $row->tax_rates;
                $query = $this->db->query('SELECT max_tax FROM basic_income where id=5'); $row = $query->row();$m5= $row->max_tax;

                $query = $this->db->query('SELECT min_income FROM basic_income where id=6'); $row = $query->row();$p= $row->min_income;
                $query = $this->db->query('SELECT max_income FROM basic_income where id=6'); $row = $query->row();$q= $row->max_income;
                $query = $this->db->query('SELECT tax_rates FROM basic_income where id=6'); $row = $query->row();$r= $row->tax_rates;
                $query = $this->db->query('SELECT max_tax FROM basic_income where id=6'); $row = $query->row();$m6= $row->max_tax;

                $query = $this->db->query('SELECT min_income FROM basic_income where id=7'); $row = $query->row();$s= $row->min_income;
                $query = $this->db->query('SELECT max_income FROM basic_income where id=7'); $row = $query->row();$t= $row->max_income;
                $query = $this->db->query('SELECT tax_rates FROM basic_income where id=7'); $row = $query->row();$u= $row->tax_rates;
                $query = $this->db->query('SELECT max_tax FROM basic_income where id=7'); $row = $query->row();$m7= $row->max_tax;
          
               
                $tax1=0;
                
                
                if ($input1>=$a && $input1<$b) {
                
                   $tax1=0;
                }

                else if (($input1<$s&& $gender=='Female') || (($input1<$s) &&($gender=='Male' && $age=='Avobe 65 Years' ))){
               
                    $tax1=0;
                } 
                

                else if((($input1>$s && $input1<$t)&& $gender=='Female') || (($input1>$s && $input1<$t) &&($gender=='Male' && $age=='Avobe 65 Years'))){
              
                   $tax1=($input1-$s)*$u;
                }

                elseif($input1>=$d && $input1<=$e){
                    $tax1=($input1-$d)*$f;
                    
                }

                elseif ((($input1>$g && $input1<$h)&& $gender=='Female') || (($input1>$g && $input1<$h) &&($gender=='Male' && $age=='Avobe 65 Years' ))){
                
                    $tax1+=($m7+($input1-$g)*$i);
                }


                elseif($input1>=$g && $input1 <$h){
                    $tax1=($m2+($input1-$g)*$i);
                    
                }

          else if ((($input1>$j && $input1<$k)&& $gender=='Female') || (($input1>$j && $input1<$k) &&($gender=='Male' && $age=='Avobe 65 Years' ))){
                
                     $tax1=($m7+$m3+($input1-$j)*$l);
                }
        else if($input1>=$j && $input1 <$k){
                    $tax1=($m2+$m3+($input1-$j)*$l);
                    
                }
                else if ((($input1>$m && $input1<$n)&& $gender=='Female') || (($input1>$m && $input1<$n) &&($gender=='Male' && $age=='Avobe 65 Years' ))){
                
                    $tax1=($m7+$m3+$m4+($input1-$m)*$o);
                }
                else if($input1>=$m && $input1< $n){
                    $tax1=($m2+$m3+$m4+($input1-$m)*$o);
                    
                }

                else if (($input1>=$p  && $gender=='Female') || ($input1>=$p &&($gender=='Male' && $age=='Avobe 65 Years' ))){
                
                    $tax1=($m7+$m3+$m4+$m5+($input1-$p)*$r);
                }
                 else if($input1>=$p){
                    $tax1=($m2+$m3+$m4+$m5+($input1-$p)*$r);
                    
                }

                

                return $tax1;
             }
    
             public function Home_tax($input2){


                $this->load->database(); 
               
                $query = $this->db->query('SELECT min_income FROM home_rant where id=2'); $row = $query->row();$a= $row->min_income;
                $query = $this->db->query('SELECT tax_rates FROM home_rant where id=2'); $row = $query->row();$b= $row->tax_rates;

                  $tax2=0;
                 if ($input2<$a) {
                 
                    $tax2=0;
                 }
                 elseif($input2>=$a){
                     $tax2=($input2-$a)*$b;
                     
                 }
                 
                 return $tax2;
             
             }
             public function Transport_tax($input3){

                $this->load->database(); 
                $query = $this->db->query('SELECT min_income FROM transport_cost where id=2'); $row = $query->row();$a= $row->min_income;
                $query = $this->db->query('SELECT tax_rates FROM transport_cost where id=2'); $row = $query->row();$b= $row->tax_rates;
                 $tax3=0;
                 
               
                 if ($input3<$a) {
                 
                     $tax3=0;
                 }
                 elseif($input3>=$a){
                     $tax3=($input3-$a)*$b;
                     
                 }
                 
                 return $tax3;
             }
             
             public function Medicare_tax($input4){

                 $this->load->database(); 
                $query = $this->db->query('SELECT min_income FROM medicare where id=2'); $row = $query->row();$a= $row->min_income;
                $query = $this->db->query('SELECT tax_rates FROM medicare where id=2'); $row = $query->row();$b= $row->tax_rates;
                  $tax4=0;
                 if ($input4<$a) {
                 
                     $tax4=0;
                 }
                 elseif($input4>=$a){
                     $tax4=($input4-$a)*$b;
                     
                 }
                   
                 return $tax4;
             }
             
             public function Other_tax($input5){
                   $this->load->database(); 
                $query = $this->db->query('SELECT min_income FROM other_income where id=2'); $row = $query->row();$a= $row->min_income;
                $query = $this->db->query('SELECT tax_rates FROM other_income where id=2'); $row = $query->row();$b= $row->tax_rates;
                 $tax5=0;
                 if ($input5<$a) {
                      
                     $tax5=0;
                 }
                 elseif($input5>=$a){
                     $tax5=($input5-$a)*$b;
                      
                 }
                  
                 return $tax5;
             }
        

}