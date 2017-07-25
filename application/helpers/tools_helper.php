<?php
if (!function_exists('tools')) {
  
  function firstwords($str,$num)
   {
	   $output = "";
	   
	   if(!empty($str)){
			$arr = explode(' ',trim($str));   
		   	if(!empty($arr)){
				for($i=0;$i <= count($arr);$i++){	
					if($i <= $num && !empty($arr[$i])){
						$output .= " ".$arr[$i];
					}else{
						break;
					}
				}
			}
		}

	  return $output;
	}
	
}