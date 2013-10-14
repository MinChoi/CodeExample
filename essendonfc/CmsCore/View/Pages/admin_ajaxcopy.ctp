<!--<?=$node['id'];?>###<?=$node['page_id'];?>###-->
<?
	if($node['page_id']==1){
?>
</ul>
<ul class="boxes fl" id="menu_<?=$node['id'];?>">
	<li id="node_<?=$node['id'];?>" class="obox">
<?
	}else{
?>
	</li>
	<li id="node_<?=$node['id'];?>" class="box">
<?
	}
?>
	<?
	if($node['showatmenu']==1)
		$showAtMenu = 'box_inner_visible';
	else
		$showAtMenu = 'box_inner_hidden';
	?>
	<div class="box_inner <?= $showAtMenu;?>">
		<div class="islink">
		<?
			echo ($node['islink']==1)?'<img border="0" alt="islink" src="/CORE/sitemap/css/imgs/islink.png">':'';
		?>
		</div>
		<div class="nodestatus">
			<a class="published" href="javascript:void(0);" style="color:red"><img src="/CORE/sitemap/css/imgs/notpublish.png" alt="notpublish" border="0" /></a>
		</div>
		<div class="box_content" style="color:#FFE900;"><?=($node['menu_name']==''?$node['name']:$node['menu_name']);?>
		<?
		if(isset($secure) && $secure==true){
			echo '<div class="issecure"><img src="/CORE/sitemap/css/imgs/padlock.png" alt="secure_page" border="0" /></div>';
		}?>
		<? if($node['islink']==0){?>
		<input value="<?=$_SERVER['HTTP_HOST'];?>/<?=urlencode($node['menu_name']);?>.html" type="hidden" id="urlval<?=$node['id'];?>" />
		<? }else{?>
		<input value="" type="hidden" id="urlval<?=$node['id'];?>" />
		<? }?>
		</div>
		<div class="nodedrop"><a class="dropdown" href="javascript:void(0);"></a></div>
	</div>
	<ul class="boxes" style="position: relative;"></ul>
<?
	if($node['sitemap_id']==0){
?>
<?
	}
		
?>