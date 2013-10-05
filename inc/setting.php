<?php
	
	class singlexOptions {
	function getOptions() {
		$options = get_option('singlex_options');
		if (!is_array($options)) {
			$options['description_content'] = '';
			$options['keyword_content'] = '';
			$options['headcode'] = '';
			$options['footercode'] = '';
			update_option('singlex_options', $options);
		}
		return $options;
	}
	/* -- 初始化 -- */
	function init() {
		if(isset($_POST['singlex_save'])) {
			$options = singlexOptions::getOptions();
	
			$options['description_content'] = stripslashes($_POST['description_content']);
			$options['keyword_content'] = stripslashes($_POST['keyword_content']);
			$options['headcode'] = stripslashes($_POST['headcode']);
			$options['footercode'] = stripslashes($_POST['footercode']);
			update_option('singlex_options', $options);
			echo "<div id='message' class='updated fade'><p><strong>数据已更新</strong></p></div>";
		} else {singlexOptions::getOptions();	}
		
		add_theme_page("主题设置", "主题设置", 'edit_themes', basename(__FILE__), array('singlexOptions', 'display'));
	}

	/* -- 标签页 -- */
	function display() {
		$options = singlexOptions::getOptions();
?>

 <style type="text/css">
.wrap{padding:10px; font-size:12px; line-height:24px;color:#383838;}
.singlextable td{vertical-align:top;text-align: left; }
.top td{vertical-align: middle;text-align: left; }
pre{white-space: pre;overflow: auto;padding:0px;line-height:19px;font-size:12px;color:#898989;}
strong{ color:#666}
textarea{ width:100%; margin:0 20px 0 0;  overflow:auto}
.none{display:none;}
fieldset{ border:1px solid #ddd;margin:5px 0 10px;padding:10px 10px 20px 10px;-moz-border-radius:5px;-khtml-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;}
fieldset:hover{border-color:#bbb;}
fieldset legend{padding:0 5px;color:#777;font-size:14px;font-weight:700;cursor:pointer}
fieldset .line{border-bottom:1px solid #e5e5e5;padding-bottom:15px;}
</style>
<script type="text/javascript">
jQuery(document).ready(function($){  
$(".toggle").click(function(){$(this).next().slideToggle('slow')});

$(function() {
    function addEditor(a, b, c) {
        if (document.selection) {
            a.focus();
            sel = document.selection.createRange();
            c ? sel.text = b + sel.text + c: sel.text = b;
            a.focus()
        } else if (a.selectionStart || a.selectionStart == '0') {
            var d = a.selectionStart;
            var e = a.selectionEnd;
            var f = e;
            c ? a.value = a.value.substring(0, d) + b + a.value.substring(d, e) + c + a.value.substring(e, a.value.length) : a.value = a.value.substring(0, d) + b + a.value.substring(e, a.value.length);
            c ? f += b.length + c.length: f += b.length - e + d;
            if (d == e && c) f -= c.length;
            a.focus();
            a.selectionStart = f;
            a.selectionEnd = f
        } else {
            a.value += b + c;
            a.focus()
        }
    }
    var g = document.getElementById('picimg') || 0;
    var h = {
        ahref: function() {
            var a = prompt('请输入链接地址', 'http://');
 
            if (a) {
                addEditor(g, '<a target="_blank" href="' + a + '">' +'这里再插入图片'+'</a>','')
            }
        },
        img: function() {
            var a = prompt('请输入图片地址', 'http://');
			 var b = prompt('请输入图片标题（可以不填）','');
            if (a) {
                addEditor(g, '<img src="' + a + '" alt="'+ b +'" title="'+ b +'" />','')
            }
        }
    };
    window['SIMPALED'] = {};
    window['SIMPALED']['Editor'] = h
});
});




</script>
<form action="#" method="post" enctype="multipart/form-data" name="singlex_form" id="singlex_form" />
<div class="wrap">
<div id="icon-options-general" class="icon32"><br></div>
<h2>主题设置</h2><br>		
<fieldset>
<legend class="toggle">站点信息设置</legend>
	<div class="none">
		<table width="800" border="1" class="singlextable">
		  <tr>
		    <td width="360">Description</td>
		    <td width="424"><label><textarea name="description_content"  rows="2"  style="width:400px;"  ><?php echo($options['description_content']); ?></textarea></label></td>
	      </tr>
		  <tr>
		    <td>Keywords</td>
		    <td><label><textarea name="keyword_content"  rows="2" style="width:400px;"  ><?php echo($options['keyword_content']); ?></textarea></label></td>
	      </tr>
	  </table>
      <br>
      <fieldset>
		<legend class="toggle">统计代码栏目</legend>
		<div class="none">
    	  <table width="800" border="1" class="singlextable">
      	<tr><td width="350">向<code>&lt;head&gt;</code>里添加代码</td><td width="434"><textarea name="headcode"  rows="3"  id="headcode" style="width:400px;"  ><?php echo($options['headcode']); ?></textarea></td></tr>
        <tr><td>向<code>&lt;footer&gt;</code>里添加代码</td><td><textarea name="footercode"  rows="3"  id="footercode" style="width:400px;"  ><?php echo($options['footercode']); ?></textarea></td></tr>
       </table>
      </div>
	</fieldset> 
      
      
    
 	</div>
</fieldset>

<!-- 提交按钮 -->
	  </p>
		<p class="submit">
			<input type="submit" name="singlex_save" value="更新设置" />
		</p>
	</div> 
<!-- wrap -->
</form>
 
<?php
	}
}	
/**
 * 登记初始化方法
 */
add_action('admin_menu', array('singlexOptions', 'init'));
	
	/////////////////
?>