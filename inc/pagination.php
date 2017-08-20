<?php

defined('ADESFLASH') or exit('404 Access Blocked!');
if(FLASHWEBTECHINC !== 1) {
	echo 'No Direct Script Access!';
	exit('Access Forbiden!');
}
class Ben{
	public static function page($query, $per_page,$page, $url)
	{
		$query = "SELECT COUNT(*) as `ben` FROM {$query}";
		
    	$row = mysql_fetch_array(mysql_query($query));
    	$total = $row['ben'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
		if ($page <> $counter - 1 && $page != 1){ 
		$pagination.= "<a class='paging' href='{$url}page=$prev'><b>«Prev</b></a>";
				}
    	if($lastpage > 1)
    	{	
    		$pagination .= "";
                   // $pagination .= "<span class='details'>(Page $page of $lastpage)</span>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= "
					<a class='current'>$counter</a>";
    				else
    					$pagination.= "
					<a class='paging' href='{$url}page=$counter'>$counter</a>";					
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<a class='current'>$counter</a>";
    					else
    						$pagination.= "
						<a class='paging' href='{$url}page=$counter'>$counter</a>";					
    				}
    				$pagination.= "<span class='dot'>...</span>";
    				$pagination.= "<a class='paging' href='{$url}page=$lpm1'>$lpm1</a>";
    				$pagination.= "<a class='paging' href='{$url}page=$lastpage'>$lastpage</a>";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
					//$pagination.= "<a class='paging' href='{$set['url']}/{$url}/$prev'><b>«Prev</b></a>";
    				$pagination.= "<a class='paging' href='{$url}page=1'>1</a>";
    				$pagination.= "<a class='paging' href='{$url}page=2'>2</a>";
    				$pagination.= "<span class='dot'>...</span>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<a class='current'>$counter</a>";
    					else
    						$pagination.= "<a class='paging' href='{$url}page=$counter'>$counter</a>";					
    				}
    				$pagination.= "<span class='dot'>...</span>";
    				$pagination.= "<a class='paging' href='{$url}page=$lpm1'>$lpm1</a>";
    				$pagination.= "<a class='paging' href='{$url}page=$lastpage'>$lastpage</a>";		
    			}
    			else
    			{
					//$pagination.= "<a class='paging' href='{$set['url']}/{$url}/$prev'><b>«Prev</b></a>";
    				$pagination.= "<a class='paging' href='{$url}page=1'>1</a>";
    				$pagination.= "<a class='paging' href='{$url}page=2'>2</a>";
    				$pagination.= "<span class='dot'>...</span>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<a class='current'>$counter</a>";
    					else
    						$pagination.= "<a class='paging' href='{$url}page=$counter'>$counter
						</a>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$pagination.= "<a class='paging' href='{$url}page=$next'><b>Next»</b></a>";
                $pagination.= "<a class='paging' href='{$url}page=$lastpage'><b>Last»»</b></a>";
    		}else{
    			$pagination.= "<a class='current'><b>Next»<b></a>";
                $pagination.= "<a class='current'><b>Last»»</b></a>";
				
            }
			$pagination .= "<span class='details'>(Page $page of $lastpage)</span>";
    		$pagination.= "\n";		
    	}
    
    
        return "<div class='page' align='center'>".$pagination."</div>";
    } 
	
	}
	?>