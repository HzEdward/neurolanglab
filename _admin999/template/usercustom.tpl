<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{ways}会员参数</title>
  <link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="../plugins/bootstrap/font-awesome.min.css" rel="stylesheet">
  <link href="../plugins/bootstrap/animate.min.css" rel="stylesheet">
  <link href="../plugins/bootstrap/style.min.css" rel="stylesheet">
  <link href="../plugins/checkbox/checkbox.css" rel="stylesheet">
  <link href="css/adminstyle.css" rel="stylesheet">
  <script src="../js/jquery.min.js"></script>
  <script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <!--[if lte ie 9]>
<script src="../js/respond.min.js"></script>
<script src="../js/html5.js"></script>
<![endif]-->
</head>

<body class="gray-bg">
  <div class="wrapper wrapper-content">
    <div class="ibox float-e-margins">
      <form method="post" action="save.php?act=custom" class="form-horizontal" id="contentform">
        <input type="hidden" name="customid" value="[r:customid]">
        <input type="hidden" name="customtype" value="user">
        <div class="col-sm-12">
          <div class="ibox-content">

            <div class="form-group">
              <label class="col-sm-2 control-label">参数名称</label>
              <div class="col-sm-4">
                <input type="text" name="customname" data-required="*" id="customname" class="form-control" value="[r:customname]">
              </div>
              <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 必填，参数的中文名称，如价格</span>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">字段名</label>
              <div class="col-sm-4">
                <div class="input-group"> <span class="input-group-addon">z</span>
                  <input type="text" name="custom" data-required="*" id="custom" class="form-control" value="{$ltrim [r custom],'z'}" {if [r custom]}readonly{/if}>
                </div>
              </div>
              <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 必填，即为字段名,　如price </span>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">参数类型</label>
              <div class="col-sm-4">
                <select name="customclass" class="form-control customclass">
                  <option value="">请选择参数类型</option>{$select_custom_class [r customclass]}
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">备选内容</label>
              <div class="col-sm-10">
                <input type="text" name="customoptions" id="customoptions" value="[r:customoptions]" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">默认内容</label>
              <div class="col-sm-4">
                <input type="text" name="customvalues" id="customvalues" value="[r:customvalues]" class="form-control">
              </div>
              <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 数字类型默认内容必须有默认值</span>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">提示内容</label>
              <div class="col-sm-4">
                <input type="text" name="customplace" id="customplace" value="[r:customplace]" placeholder="文本框内的输入提示" class="form-control">
              </div>
              <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 文本框内的输入提示</span>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">备注</label>
              <div class="col-sm-4">
                <input type="text" name="customdesc" id="customdesc" value="[r:customdesc]" placeholder="跟在自定义字段后面" class="form-control">
              </div>
              <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> </span>
            </div>

          </div>
        </div>
        <div class="col-sm-12 m-t">
          <div class=" col-sm-10 col-md-offset-1">
            <button class="btn btn-primary" onclick="submitform('custom','[r:customid]','contentform')" type="button"><i class="fa fa-floppy-o"></i>　保存内容</button>
            <button class="btn btn-white" onclick="closelayer()" type="button"><i class="fa fa-close"></i> 关闭</button>
          </div>
        </div>
      </form>
    </div>
    </form>
    <script src="../plugins/inputTags/jquery.tagsinput-revisited.js"></script>
    <link href="../plugins/inputTags/jquery.tagsinput-revisited.css" rel="stylesheet">
    <!-- end panel other -->
    
    <script src="../plugins/bootstrap/bootstrap.min.js"></script>
    <link href="../plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="../plugins/layer/layer.min.js"></script>
    <script src="js/content.min.js"></script>
    <script src="js/adminjs.js"></script>
</body>

</html>