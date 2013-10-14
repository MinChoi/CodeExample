<!--<?=$node['id'];?>###-->
<?php
	if($node['page_id']==1){
?>
<ul class="boxes fl" id="menu_<?=$node['id'];?>">
<?
	}
?>
<li id="node_<?=$node['id'];?>" class="box">
	<div class="box_inner box_inner_visible">
		<div class="islink">
		<?
			echo ($node['islink']==1)?'<img border="0" alt="islink" src="/CORE/sitemap/css/imgs/islink.png">':'';
		?>
		</div>
		<div class="nodestatus">
			
			<a class="published" href="javascript:void(0);" style="color:red"><img src="/CORE/sitemap/css/imgs/notpublish.png" alt="notpublish" border="0" /></a>
		</div>
		<div class="box_content" style="color:#FFE900;"><?=$node['menu_name'];?>
		<? if($node['islink']==0){?>
		<input value="<?=$_SERVER['HTTP_HOST'];?>/<?=urlencode($node['menu_name']);?>.html" type="hidden" id="urlval<?=$node['id'];?>" />
		<? }else{?>
		<input value="" type="hidden" id="urlval<?=$node['id'];?>" />
		<? }?>
		</div>
		<div class="nodedrop"><a class="dropdown" href="javascript:void(0);"></a></div>
	</div>
	<ul class="boxes" style="position: relative;"></ul>
</li>
<?
	if($node['sitemap_id']==0){
?>
</ul>
<?
	}
?>