<?php

class Pagination {
	
	public $setTotalData;
	public $perPage;
	public $dataPerPage;
	public $totalPage;
	public $currentPage;
	public $base_url;
	
    function url(){
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI']
        );
    }
    
	function __construct($totalData,$perPage,$GETpath = 'page', $base_url = null) {
        //if ($base_url == null) {
        //    $this->base_url = $this->url();    
        //}
        //else {
            $this->base_url = $base_url;
		//}
        $this->totalData = $totalData;
		$this->perPage = $perPage;
		$this->dataPerPage = $this->dataPerPage($totalData, $perPage);
		$this->totalPage = count($this->dataPerPage);
		$this->GETpath = $GETpath;
		
		if($this->currentPage > $this->totalPage)
			$this->currentPage = $this->totalPage;
				
		if ($this->currentPage < 1)
			$this->currentPage = 1;		
           
        $this->setPage();
	}
    
    function generateGET() {
        
        $get = "?";
        foreach($_GET as $key => $value) {
            if ($key == $this->GETpath) continue;
            $get .= $key . "=" . $value . "&";
        }
        $get .= $this->GETpath . "=";
        return $get;
    }
	
	function setPage() {
        $currentPage = isset($_GET[$this->GETpath]) ? $_GET[$this->GETpath] : 1;
		if($currentPage > $this->totalPage)
			$this->currentPage = $this->totalPage;	
		elseif ($currentPage < 1)
			$this->currentPage = 1;
		else	
			$this->currentPage = $currentPage;
	}
	

	function getDataLimit() {
		if (!isset($this->dataPerPage[1])) {
			$returnVar['start'] = 0;
			$returnVar['end'] = 0; 	
		}
		else {
			$returnVar['start'] = (int)$this->dataPerPage[1] * (int)($this->currentPage - 1);
			//$returnVar['end'] = (int)$returnVar['start'] + (int)$this->perPage;
			//if($returnVar['end'] > $this->totalData)
			//{
			//	$returnVar['end'] = $this->totalData;
			//}
            $returnVar['end'] = $this->perPage;
		}
		return $returnVar;
	}
	
	function dataPerPage($totalData,$perPage) {
		$tempArray = Array();
		for($i=0,$count=1;$i < $totalData;$count++)
		{
			$i += $perPage;
			if($i > $totalData)
			{
				$i -= $perPage;
				$tempArray[$count] = $totalData-$i;
				break;
			}
			else
			{
				$tempArray[$count] = $perPage;
			}
		}
		return $tempArray;
	}

	function generateNaviModern($totalPagesToShow) {        
		$currentPage = $this->currentPage;
		print '<nav>
            <ul class="pager">';
					
			$selected = $currentPage;
			if($totalPagesToShow % 2 == 0) {
				#if $totalPagesToShow is even so change it to odd
				$totalPagesToShow++;
				}
			$midPoint = floor($totalPagesToShow / 2);
				if($currentPage-$midPoint > 2) {
					$currentPage -= $midPoint; 
				print '<a href="?' . $this->generateGET() . '=' . ($selected-1) . '"><h4 style="text-align:center">PREVIOUS</h4></a>';
				print '<a href="?' . $this->generateGET() . '=' . (1) . '">' . (1) . '</a>';
				print "<span>&hellip;</span>";
			}
			else {
				$currentPage = 1;
			}
			
			for($i=$currentPage,$p=1;$p<=$totalPagesToShow;$i++,$p++) {
				if($i <= $this->totalPage) {
					if($selected == $i)
						print '<span id="selected">' . $i . "</span>";
					else	
						print '<a href="?' . $this->generateGET() . '=' . $i. '">' . $i . "</a>";
				}
			}
			if($i <= $this->totalPage) {
				print "<span>&hellip;</span>";
				print '<a href="?' . $this->generateGET() . '=' . $this->totalPage . '">' . $this->totalPage . "</a>";
				print '<a href="?' . $this->generateGET() . '=' . ($selected+1) . '"><h4 style="text-align:center"><b>NEXT</b></h4></a>';
			}

			if ($this->currentPage <= 0) {
				echo "<table border='0' width='100%'><tr><td><h3 align='center'><b>SORRY, NO JOBS TO SHOW</b></h3></td></tr></table>";
			}
		print "</ul>
            </nav>";
	}

	function generateNaviClassic()
	{
		print '<nav>
            <ul class="pager">';
		if($this->currentPage < 1 && $this->currentPage > 0) {
			print '<li><a href="' . $this->generateGET() . 1 . '">First</a></li>';
		}
		elseif($this->currentPage == 1 && $this->currentPage != $this->totalPage) {
			print '<li><a href="' . $this->generateGET() . ($this->currentPage + 1) . '">Next</a></li>';
		}
		elseif ($this->currentPage > 1 && $this->currentPage < $this->totalPage) {
			print '<li><a href="' . $this->generateGET() . ($this->currentPage - 1) . '">Previous</a></li>';
			print '<li><a href="' . $this->generateGET() . ($this->currentPage + 1) . '"><b>Next</a></li>';
		}
		elseif ($this->currentPage == $this->totalPage && $this->currentPage > 1) {
			print '<li><a href="' . $this->generateGET() . ($this->currentPage - 1) . '">Previous</a></li>';
		}
		elseif ($this->currentPage > $this->totalPage) {
			print '<li><a href="' . $this->generateGET() . $this->totalPage . '">Last Page</a></li>';
		}
		else {
			echo '<li><a href="#">No more records</a></li>';
		}
		print "</ul>
            </nav>";
	}
}
?>