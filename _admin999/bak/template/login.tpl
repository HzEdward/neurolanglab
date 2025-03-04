<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{$siteTitle}网站内容管理系统</title>
<script src="../js/jquery.min.js"></script>
<script src="../plugins/layer/layer.min.js"></script>
<script src="../js/zzzcms.js"></script>
<script src="../plugins/changebg/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugins/changebg/main.css" />
<link rel="stylesheet" type="text/css" href="../plugins/changebg/bgstretcher.css" />
<script src="../plugins/changebg/bgstretcher.js"></script>
<link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../plugins/bootstrap/font-awesome.min.css" rel="stylesheet">
<link href="../plugins/bootstrap/animate.min.css" rel="stylesheet">
<link href="../plugins/bootstrap/style.min.css" rel="stylesheet">
<link href="css/adminstyle.css" rel="stylesheet">
<!--[if lte IE 9]>
<script src="../js/respond.min.js"></script>
<script src="../js/html5.js"></script>
<![endif]-->
</head>
<body>
<div class="middle-box loginscreen  animated fadeInDown">
  <div>
   {if (isnul(get_session('adminid'))  && isnul(get_cookie('adminname')))}
    <h1 class="logo-name"><img src="images/logo300.png"></h1>
  </div>
  <form class="form-horizontal m-t" method="post" action="?act=loginon">
    <div class="form-group noborder ">
      <div class="col-sm-12">
        <div class="input-group">
         <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
          <input type="text" name="adminname" class="form-control" placeholder="用户名" autocomplete="off"  data-required="*" tabindex="1">
        </div>
      </div>
    </div>
    <div class="form-group adminpass noborder ">
      <div class="col-sm-12">      
      <div class="input-group">
         <span class="input-group-addon toques"  title="忘记登陆密码？"><i class="fa fa-keyboard-o"></i></span>
        <input type="text" name="adminpass"  id="adminpass" autocomplete="off" class="form-control" placeholder="密码" tabindex="2">        
        <span class="input-group-addon eye"  onClick="hideShowPsw()"><i class="fa fa-eye"></i></a></span>
        </div>
        </div>
    </div>
    <div class="form-group question noborder " style="display:none">
      <div class="col-sm-12">
        <div class="input-group">
          <span class="input-group-addon topass"><i class="fa fa-key"></i></span>
          <input type="text" name="question" class="form-control" placeholder="密码问题" >
          </div>
      </div>
    </div>
    <div class="form-group answer noborder " style="display:none">
      <div class="col-sm-12">
          <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
          <input type="text" name="answer" class="form-control" autocomplete="off" placeholder="密码答案" >
          </div>         
      </div>
    </div>
    {if (conf('iscode')==1)}
    <div class="form-group">
      <div class="col-sm-6">
      <div class="input-group">
         <span class="input-group-addon"><i class="fa fa-code"></i></span>
        <input type="text" name="code" id="imgcode" class="form-control" placeholder="验证码" data-required="*" tabindex="3">
        </div>
      </div>
      <div class="col-sm-6 imgcode"> <img id="SeedCode" src="../inc/imgcode.php" align="absmiddle" style="cursor:pointer;" border="0"/> </div>
    </div>
    {end if}
    <input  name="submit" type="submit" class="btn btn-primary block full-width  m-t-10" value="登陆" tabindex="4">
  </form>
  {elseif  isnul(get_session("adminid"))  && !isnul(get_cookie("adminname"))}
  <h3>请输入密码直接登陆</h3>
</div>
<div class="m-b-md"> <img alt="image" class="img-circle circle-border face" src=""> </div>
<h3>{php echo get_cookie("adminname")}，<a href="./login.php?act=loginout">切换账号</a></h3>
<p>欢迎您回来，请输入管理密码</p>
<form  class="form-horizontal m-t" method="post" action="?act=loginon">
  <div class="form-group">
    <div class="col-sm-12">
      <input type="hidden" name="adminname" value="{php echo get_cookie("adminname")}"> 
         <input type="text" name="adminpass"  id="adminpass" autocomplete="off" class="form-control" placeholder="密码" tabindex="2">
         <a href="javascript:void(0)" onClick="hideShowPsw()" class="passico eye" style="right: 15px"><i class="fa fa-eye"></i></a>      
    </div>
  </div>
  <button type="submit" class="btn btn-primary block full-width m-t-10">登录</button>
</form>
{end if}
</div>
</div>
<!--<div class="signup-footer"> Powered by <a href="http://lab.zjgjxh.cn" target="_blank">webcms</a>! Copyright &copy;2015-{$date 'Y'} </div>-->
<script language="javascript">
var demoInput = document.getElementById("adminpass");
function hideShowPsw(){
  if (demoInput.type == "password") {
	  demoInput.type = "text";
	  $(".eye i").toggleClass("fa-eye-slash")	
  }else {
	  demoInput.type = "password";	
	   $(".eye i").toggleClass("fa-eye-slash")		
  }
}
$("input").focus(function(){
	 demoInput.type = "password";
});
$(".toques").click(function(){
	$("#adminpass").val('')
	$(".adminpass").hide();
	$(".question").show();
	$(".answer").show();
})
$(".topass").click(function(){
	$(".adminpass").show();
	$(".question").hide();
	$(".answer").hide();
})
$(function() {
  face=get_cookie('adminface')=='' || get_cookie('adminface')==undefined ? '../plugins/face/noface.png' : get_cookie('adminface');
  $(".face").attr('src',unescape(face));
	$('BODY').bgStretcher({
			images: ['images/bg/01.jpg', 'images/bg/02.jpg', 'images/bg/03.jpg', 'images/bg/04.jpg', 'images/bg/05.jpg', 'images/bg/06.jpg'],
			imageWidth: 1024, 
			imageHeight: 768, 
			slideDirection: 'N',
			slideShowSpeed: 3000,
			transitionEffect: 'fade',
			sequenceMode: 'normal',
			buttonPrev: '#prev',
			buttonNext: '#next',
			pagination: '#nav',
			anchoring: 'left center',
			anchoringImg: 'left center'
		});	
	var windowHeight = document.documentElement.clientHeight;   
	$(".loginscreen").animate({marginTop:(windowHeight-419)/3});
}); 
$("#adminname").focus();
$(document).keyup(function(event){
  if(event.keyCode ==13){	  
	 $("#submit").trigger("click");
  } 
});
</script>
</div>
</body>
</html>
