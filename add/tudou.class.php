<?php
class tudou{
	public function get_Src($tudou_url){
		$fp = @fopen($tudou_url,"r") or $this->failed();
		if($fp){
		$fcontents = file_get_contents($tudou_url);
		$src = "/\,itemData=\{\siid\: (.*?)\s\,cdn\: (.*?)\s\,/";
		$src2 = "/\,itemData=\{\siid\: (.*?)\s\,/";
		if(preg_match_all($src,$fcontents,$arr)){	
			return $arr;
	    }else if(preg_match_all($src2,$fcontents,$arr)){
			return $arr;
		}else{
			echo "采集失败！";
			failed();
		}
	}
	}
	function failed(){
		echo '<script>alert("地址无效或不符合要求，，请修改地址！！！");</script>';
		$url = "http://42.96.145.45/add/form.php";
		echo '<script language="javascript" type="text/javascript">';
		echo 'window.location.href="'.$url.'"';  
		echo '</script>';
		die("");
	}
}
?>