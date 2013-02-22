<?php
include("tudou.class.php");
header("content-type:text/html;charset=utf-8");
function create_tudou($url){
		$td = new tudou();
		$result = $td->get_Src($url);
		return "http://v2.tudou.com/v2/cdn?id=".$result[1][0];
   }
function create_youku($url){
		$s = "/http\:\/\/v.youku.com\/v\_show\/id\_(.*?)\.html/";
		$hs = "/v.youku.com\/v\_show\/id\_(.*?)\.html/";

		if(preg_match_all($s,$url,$arr)){
			return $arr[1][0];
		}
		else if(preg_match_all($hs,$url,$arr)){
			return $arr[1][0];
		}
		else{
		    echo '地址错误，请复制<font color="red">浏览器地址栏</font>中的地址！！！';
			echo '<script>alert("请修改地址！！！");</script>';
			top();
			die();
		}
   }
 //if(!empty($_POST['add'])){
if(isset($_GET['add'])){
		$title = $_GET['label'];
		echo "视频名称：".$title."<br>";
		$source = $_GET['src'];
		echo "播放页地址:".$source."<br>";
		$type = $_GET['typel'];
		if($type== "youku"){
			$source = create_youku($source);
		}
		else{
			$source = create_tudou($source);
			}
		if($type == "youku" && $title !="" && $source != ""){
			create_xml($title,$source,$type);
		}else if($type == "tudou" && $title !="" && $source != ""){
			create_xml($title,$source,$type);
		}
		
		echo '<script>alert("添加成功！！！");</script>';
		top();
		
	
	
}
function create_xml($title,$source,$type){
	$doc = new DOMDocument("1.0","utf-8");
	$doc ->load("self_add.xml");
	
	$m = $doc ->createElement("m");
	$m ->setAttribute("type",utf8_encode("$type"));
	$m ->setAttribute("src",utf8_encode("$source"));
	$m ->setAttribute("label",$title);
	if($type == "tudou") $m ->setAttribute("brt","2");
	$x = $doc->documentElement;
	$y = $doc->getElementsByTagName("m") ->item(0);
	$x ->insertBefore($m,$y);
	$doc ->appendChild($x);
	$doc ->save("self_add.xml");
}
 function top(){
	$url = "http://42.96.145.45/add/form.php";
		
		echo '<script language="javascript" type="text/javascript">';  
		
		echo 'window.location.href="'.$url.'"';  
		echo '</script>';  	
 }
  
?>
