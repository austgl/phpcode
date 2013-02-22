<?php
header("content-type:text/html;charset=utf-8");
?>
<form action="adress.php" METHOD="send">
视 频 名 称：<input type="text" name="label">
<select name="typel">
						<option value="youku" >youku</option>
						<option value="tudou" >tudou</option>
					
</select>
<br>
播放页地址 ：<textarea rows="1" cols="100" name="src"></textarea><br>
		<script type='text/javascript'>
		var YXM_PUBLIC_KEY = 'e65ec7da07019e81419474397e4763be';//这里填写PUBLIC_KEY
		document.write("<input type='hidden' id='YXM_here' /><script type='text/javascript' charset='gbk' id='YXM_script' async src='http://api.yinxiangma.com/api2/yzm.yinxiangma.php?pk="+YXM_PUBLIC_KEY+"&v=YinXiangMaJsSDK_1.0'><"+"/script>");
		function YXM_valided_true()
		{
			//验证码输入正确后的操作
			document.getElementById("YXM_submit_btn").disabled="";	
		}
		function YXM_valided_false()
		{
			//验证码输入错误后的操作
			document.getElementById("YXM_submit_btn").disabled="disabled";	
		}
		</script>
<input type="submit" name="add" value="添加" id="YXM_submit_btn" disabled="disabled">
        
</form>