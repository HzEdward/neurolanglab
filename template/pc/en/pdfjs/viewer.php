﻿<!DOCTYPE html>
<html dir="ltr" mozdisallowselectionprint moznomarginboxes>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google" content="notranslate">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF.js viewer</title>
    <script type="text/javascript">
        var cgl_pdf_src = '<?php echo $_REQUEST['url'] ?>';
    </script>
    <link rel="stylesheet" href="viewer.css">
    <link rel="resource" type="application/l10n" href="locale/locale.properties">
    <script src="../build/pdf.js"></script>
    <script src="viewer.js"></script>
</head>
<body tabindex="1" class="loadingInProgress">
<div id="outerContainer">
    <div id="sidebarContainer">
        <div id="toolbarSidebar">
            <div class="splitToolbarButton toggled">
                <button id="viewThumbnail" class="toolbarButton toggled" title="显示缩略图" tabindex="2" data-l10n-id="thumbs">
                    <span data-l10n-id="thumbs_label">缩略图</span>
                </button>
                <button id="viewOutline" class="toolbarButton" title="显示文档大纲（双击展开/折叠所有项目）" tabindex="3" data-l10n-id="document_outline">
                    <span data-l10n-id="document_outline_label">文档大纲</span>
                </button>
                <button id="viewAttachments" class="toolbarButton" title="显示附件" tabindex="4" data-l10n-id="attachments">
                    <span data-l10n-id="attachments_label">附件</span>
                </button>
            </div>
        </div>
        <div id="sidebarContent">
            <div id="thumbnailView"></div>
            <div id="outlineView" class="hidden"></div>
            <div id="attachmentsView" class="hidden"></div>
        </div>
    </div>  <!-- sidebarContainer -->
    <div id="mainContainer">
        <div class="findbar hidden doorHanger" id="findbar">
            <div id="findbarInputContainer">
                <input id="findInput" class="toolbarField" title="Find" placeholder="Find in document…" tabindex="91" data-l10n-id="find_input">
                <div class="splitToolbarButton">
                    <button id="findPrevious" class="toolbarButton findPrevious" title="查找上一个" tabindex="92" data-l10n-id="find_previous">
                        <span data-l10n-id="find_previous_label">往上</span>
                    </button>
                    <div class="splitToolbarButtonSeparator"></div>
                    <button id="findNext" class="toolbarButton findNext" title="查找下一个" tabindex="93" data-l10n-id="find_next">
                        <span data-l10n-id="find_next_label">往下</span>
                    </button>
                </div>
            </div>

            <div id="findbarOptionsContainer">
                <input type="checkbox" id="findHighlightAll" class="toolbarField" tabindex="94">
                <label for="findHighlightAll" class="toolbarLabel" data-l10n-id="find_highlight">高亮全部</label>
                <input type="checkbox" id="findMatchCase" class="toolbarField" tabindex="95">
                <label for="findMatchCase" class="toolbarLabel" data-l10n-id="find_match_case_label">符合要求的选项</label>
                <span id="findResultsCount" class="toolbarLabel hidden"></span>
            </div>
            <div id="findbarMessageContainer">
                <span id="findMsg" class="toolbarLabel"></span>
            </div>
        </div>  <!-- findbar -->
        <div id="secondaryToolbar" class="secondaryToolbar hidden doorHangerRight">
            <div id="secondaryToolbarButtonContainer">
                <button id="secondaryPresentationMode" class="secondaryToolbarButton presentationMode visibleLargeView" title="全屏" tabindex="51" data-l10n-id="presentation_mode">
                    <span data-l10n-id="presentation_mode_label">全屏</span>
                </button>

                <button id="secondaryOpenFile" class="secondaryToolbarButton openFile visibleLargeView" title="打开其它PDF文件" tabindex="52" data-l10n-id="open_file">
                    <span data-l10n-id="open_file_label">打开</span>
                </button>

                <button id="secondaryPrint" class="secondaryToolbarButton print visibleMediumView" title="打印" tabindex="53" data-l10n-id="print">
                    <span data-l10n-id="print_label">打印</span>
                </button>

                <button id="secondaryDownload" class="secondaryToolbarButton download visibleMediumView" title="下载" tabindex="54" data-l10n-id="download">
                    <span data-l10n-id="download_label">下载</span>
                </button>

                <a href="#" id="secondaryViewBookmark" class="secondaryToolbarButton bookmark visibleSmallView" title="当前位置（点击标记后复制链接，下次直接到当前位置）" tabindex="55" data-l10n-id="bookmark">
                    <span data-l10n-id="bookmark_label">标记当前</span>
                </a>
                <div class="horizontalToolbarSeparator visibleLargeView"></div>
                <button id="firstPage" class="secondaryToolbarButton firstPage" title="到第一页" tabindex="56" data-l10n-id="first_page">
                    <span data-l10n-id="first_page_label">到第一页</span>
                </button>
                <button id="lastPage" class="secondaryToolbarButton lastPage" title="到最后一页" tabindex="57" data-l10n-id="last_page">
                    <span data-l10n-id="last_page_label">到最后一页</span>
                </button>
                <div class="horizontalToolbarSeparator"></div>
                <button id="pageRotateCw" class="secondaryToolbarButton rotateCw" title="顺时针旋转" tabindex="58" data-l10n-id="page_rotate_cw">
                    <span data-l10n-id="page_rotate_cw_label">顺时针旋转</span>
                </button>
                <button id="pageRotateCcw" class="secondaryToolbarButton rotateCcw" title="逆时针旋转" tabindex="59" data-l10n-id="page_rotate_ccw">
                    <span data-l10n-id="page_rotate_ccw_label">逆时针旋转</span>
                </button>
                <div class="horizontalToolbarSeparator"></div>
                <button id="cursorSelectTool" class="secondaryToolbarButton selectTool toggled" title="文本选择工具" tabindex="60" data-l10n-id="cursor_text_select_tool">
                    <span data-l10n-id="cursor_text_select_tool_label">文本选择工具</span>
                </button>
                <button id="cursorHandTool" class="secondaryToolbarButton handTool" title="手形工具" tabindex="61" data-l10n-id="cursor_hand_tool">
                    <span data-l10n-id="cursor_hand_tool_label">手形工具</span>
                </button>
                <div class="horizontalToolbarSeparator"></div>
                <button id="documentProperties" class="secondaryToolbarButton documentProperties" title="文件属性" tabindex="62" data-l10n-id="document_properties">
                    <span data-l10n-id="document_properties_label">文件属性</span>
                </button>
            </div>
        </div>  <!-- secondaryToolbar -->
        <div class="toolbar">
            <div id="toolbarContainer">
                <div id="toolbarViewer">
                    <div id="toolbarViewerLeft">
                        <button id="sidebarToggle" class="toolbarButton" title="切换边栏" tabindex="11" data-l10n-id="toggle_sidebar">
                            <span data-l10n-id="toggle_sidebar_label">切换边栏</span>
                        </button>
                        <div class="toolbarButtonSpacer"></div>
                        <button id="viewFind" class="toolbarButton" title="查找" tabindex="12" data-l10n-id="findbar">
                            <span data-l10n-id="findbar_label">Find</span>
                        </button>
                        <div class="splitToolbarButton hiddenSmallView">
                            <button class="toolbarButton pageUp" title="上一页" id="previous" tabindex="13" data-l10n-id="previous">
                                <span data-l10n-id="previous_label">Previous</span>
                            </button>
                            <div class="splitToolbarButtonSeparator"></div>
                            <button class="toolbarButton pageDown" title="下一页" id="next" tabindex="14" data-l10n-id="next">
                                <span data-l10n-id="next_label">Next</span>
                            </button>
                        </div>
                        <input type="number" id="pageNumber" class="toolbarField pageNumber" title="Page" value="1" size="4" min="1" tabindex="15" data-l10n-id="page">
                        <span id="numPages" class="toolbarLabel"></span>
                    </div>
                    <div id="toolbarViewerRight">
                        <button id="presentationMode" class="toolbarButton presentationMode hiddenLargeView" title="全屏" tabindex="31" data-l10n-id="presentation_mode">
                            <span data-l10n-id="presentation_mode_label">Presentation Mode</span>
                        </button>

                        <button id="openFile" class="toolbarButton openFile hiddenLargeView" title="打开其它PDF文件" tabindex="32" data-l10n-id="open_file">
                            <span data-l10n-id="open_file_label">打开</span>
                        </button>

                        <button id="print" class="toolbarButton print hiddenMediumView" title="打印" tabindex="33" data-l10n-id="print">
                            <span data-l10n-id="print_label">打印</span>
                        </button>

                        <button id="download" class="toolbarButton download hiddenMediumView" title="下载" tabindex="34" data-l10n-id="download">
                            <span data-l10n-id="download_label">下载</span>
                        </button>
                        <a href="#" id="viewBookmark" class="toolbarButton bookmark hiddenSmallView" title="标记当前（点击标记后复制链接，下次直接到当前位置）" tabindex="35" data-l10n-id="bookmark">
                            <span data-l10n-id="bookmark_label">标记当前</span> </a>

                        <div class="verticalToolbarSeparator hiddenSmallView"></div>

                        <button id="secondaryToolbarToggle" class="toolbarButton" title="工具" tabindex="36" data-l10n-id="tools">
                            <span data-l10n-id="tools_label">工具</span>
                        </button>
                    </div>
                    <div id="toolbarViewerMiddle">
                        <div class="splitToolbarButton">
                            <button id="zoomOut" class="toolbarButton zoomOut" title="放大" tabindex="21" data-l10n-id="zoom_out">
                                <span data-l10n-id="zoom_out_label">放大</span>
                            </button>
                            <div class="splitToolbarButtonSeparator"></div>
                            <button id="zoomIn" class="toolbarButton zoomIn" title="缩小" tabindex="22" data-l10n-id="zoom_in">
                                <span data-l10n-id="zoom_in_label">缩小</span>
                            </button>
                        </div>
                        <span id="scaleSelectContainer" class="dropdownToolbarButton">
                  <select id="scaleSelect" title="尺寸" tabindex="23" data-l10n-id="zoom">
                    <option id="pageAutoOption" title="" value="auto" selected="selected" data-l10n-id="page_scale_auto">自动缩放</option>
                    <option id="pageActualOption" title="" value="page-actual" data-l10n-id="page_scale_actual">实际尺寸</option>
                    <option id="pageFitOption" title="" value="page-fit" data-l10n-id="page_scale_fit">页面适合</option>
                    <option id="pageWidthOption" title="" value="page-width" data-l10n-id="page_scale_width">最大宽度</option>
                    <option id="customScaleOption" title="" value="custom" disabled="disabled" hidden="true"></option>
                    <option title="" value="0.5" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 50 }'>50%</option>
                    <option title="" value="0.75" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 75 }'>75%</option>
                    <option title="" value="1" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 100 }'>100%</option>
                    <option title="" value="1.25" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 125 }'>125%</option>
                    <option title="" value="1.5" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 150 }'>150%</option>
                    <option title="" value="2" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 200 }'>200%</option>
                    <option title="" value="3" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 300 }'>300%</option>
                    <option title="" value="4" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 400 }'>400%</option>
                  </select>
                </span>
                    </div>
                </div>
                <div id="loadingBar">
                    <div class="progress">
                        <div class="glimmer"></div>
                    </div>
                </div>
            </div>
        </div>
        <menu type="context" id="viewerContextMenu">
            <menuitem id="contextFirstPage" label="First Page" data-l10n-id="first_page"></menuitem>
            <menuitem id="contextLastPage" label="Last Page" data-l10n-id="last_page"></menuitem>
            <menuitem id="contextPageRotateCw" label="Rotate Clockwise" data-l10n-id="page_rotate_cw"></menuitem>
            <menuitem id="contextPageRotateCcw" label="Rotate Counter-Clockwise" data-l10n-id="page_rotate_ccw"></menuitem>
        </menu>
        <div id="viewerContainer" tabindex="0">
            <div id="viewer" class="pdfViewer"></div>
        </div>
        <div id="errorWrapper" hidden='true'>
            <div id="errorMessageLeft">
                <span id="errorMessage"></span>
                <button id="errorShowMore" data-l10n-id="error_more_info">
                    More Information
                </button>
                <button id="errorShowLess" data-l10n-id="error_less_info" hidden='true'>
                    Less Information
                </button>
            </div>
            <div id="errorMessageRight">
                <button id="errorClose" data-l10n-id="error_close">
                    Close
                </button>
            </div>
            <div class="clearBoth"></div>
            <textarea id="errorMoreInfo" hidden='true' readonly="readonly"></textarea>
        </div>
    </div> <!-- mainContainer -->
    <div id="overlayContainer" class="hidden">
        <div id="passwordOverlay" class="container hidden">
            <div class="dialog">
                <div class="row">
                    <p id="passwordText" data-l10n-id="password_label">Enter the password to open this PDF file:</p>
                </div>
                <div class="row">
                    <input type="password" id="password" class="toolbarField">
                </div>
                <div class="buttonRow">
                    <button id="passwordCancel" class="overlayButton"><span data-l10n-id="password_cancel">Cancel</span>
                    </button>
                    <button id="passwordSubmit" class="overlayButton"><span data-l10n-id="password_ok">OK</span>
                    </button>
                </div>
            </div>
        </div>
        <div id="documentPropertiesOverlay" class="container hidden">
            <div class="dialog">
                <div class="row">
                    <span data-l10n-id="document_properties_file_name">文件名:</span>
                    <p id="fileNameField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_file_size">文件大小:</span>
                    <p id="fileSizeField">-</p>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <span data-l10n-id="document_properties_title">标题:</span>
                    <p id="titleField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_author">作者:</span>
                    <p id="authorField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_subject">科目:</span>
                    <p id="subjectField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_keywords">关键词:</span>
                    <p id="keywordsField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_creation_date">创建日期:</span>
                    <p id="creationDateField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_modification_date">修改日期:</span>
                    <p id="modificationDateField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_creator">创办人:</span>
                    <p id="creatorField">-</p>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <span data-l10n-id="document_properties_producer">PDF制作人:</span>
                    <p id="producerField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_version">PDF版本:</span>
                    <p id="versionField">-</p>
                </div>
                <div class="row">
                    <span data-l10n-id="document_properties_page_count">页数:</span>
                    <p id="pageCountField">-</p>
                </div>
                <div class="buttonRow">
                    <button id="documentPropertiesClose" class="overlayButton">
                        <span data-l10n-id="document_properties_close">关闭</span></button>
                </div>
            </div>
        </div>
        <div id="printServiceOverlay" class="container hidden">
            <div class="dialog">
                <div class="row">
                    <span data-l10n-id="print_progress_message">Preparing document for printing…</span>
                </div>
                <div class="row">
                    <progress value="0" max="100"></progress>
                    <span data-l10n-id="print_progress_percent" data-l10n-args='{ "progress": 0 }' class="relative-progress">0%</span>
                </div>
                <div class="buttonRow">
                    <button id="printCancel" class="overlayButton">
                        <span data-l10n-id="print_progress_close">Cancel</span></button>
                </div>
            </div>
        </div>
    </div>  <!-- overlayContainer -->

</div> <!-- outerContainer -->
<div id="printContainer"></div>
</body>
</html>

