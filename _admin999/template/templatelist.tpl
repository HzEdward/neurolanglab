<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../plugins/bootstrap/font-awesome.min.css" rel="stylesheet">
<link href="../plugins/bootstrap/animate.min.css" rel="stylesheet">
<link href="../plugins/bootstrap/style.min.css" rel="stylesheet">
<link href="../plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
<link href="css/adminstyle.css" rel="stylesheet">
<script src="../js/jquery.min.js"></script>
<!--[if lte IE 9]>
<script src="../js/respond.min.js"></script>
<script src="../js/html5.js"></script>
<![endif]-->
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">
  <div class="ibox float-e-margins">    
      <div class="row row-lg"> <div class="col-sm-12">
       <div class="ibox-content">
          <div class="col-sm-4">
          	<button onClick="location.reload()" class="btn" type="button"><i class="fa fa-refresh"></i> 刷新</button>
           	<button onClick="location.href='?act=templatelist&type=pc'" class="btn {if [G type]!='wap'}btn-primary{end if}" type="button"><i class="fa fa-laptop"></i> 电脑模板</button>
            <button onClick="location.href='?act=templatelist&type=wap'" class="btn {if [G type]=='wap'}btn-primary{end if}" type="button"><i class="fa fa-mobile"></i> 手机模板</button>
           </div>
	 <div class="file_route">位置：
      <?php
      $title= $type=='wap' ? '手机' : '电脑';
      $rote_str='<div class="rote_item"><div class="rote_title"><a href="?act=templatelist&type='.$type.'">'.$title.'模板</a></div><div class="rote_separator">></div></div>';
          if($folder){
          $rote_arr=splits($folder,'/');
          $path='';
          foreach ($rote_arr as $key=>$value) {
            if($value){
              $path.=$value.'/';
              if($path==$folder.'/'){
                $rote_str.='<div class="rote_item"><div class="rote_title">'.$value.'</div></div>';
              }else{
                $rote_str.='<div class="rote_item"><div class="rote_title"><a href="?act=templatelist&folder='.$path.'&type='.$type.'">'.$value.'</a></div><div class="rote_separator">></div></div>';
              }
            }
          }
        }
      ?>   
      {$rote_str}
   </div>
		<table id="table"
           data-toggle="table" data-id-field="id" data-search="false"  data-id-table="advancedTable" data-content-type="application/x-www-form-urlencoded; charset=UTF-8" data-url="function.php?act=templatelist&type=[G:type]&folder=[G:folder]" data-page-size="50" data-page-list="[50,100,200]">
            <thead>
              <tr>
                <th data-sortable="true"  data-field="name">文件名</th>
                <th data-sortable="true"  data-field="url">路径</th>
				<th data-sortable="true"  data-field="ext">类型</th>
                <th data-sortable="true"  data-field="mtime">时间</th>
                 <th data-sortable="true"  data-field="size">大小</th>
                <th class="tableedit" data-field="edit">操作</th>
              </tr>
            </thead>            
      	 </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="../plugins/bootstrap/bootstrap.min.js"></script> 
<script src="../plugins/bootstrap-table/bootstrap-table.min.js"></script> 
<script src="../plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script> 
<script src="../plugins/layer/layer.min.js"></script> 
<script src="../plugins/fancybox/jquery.fancybox.js"></script>
<link href="../plugins/fancybox/jquery.fancybox.css " rel="stylesheet">
<script src="js/adminjs.js"></script> 
<script>
$(function(){$(".fancybox").fancybox()});
</script>

</BODY>
</HTML>