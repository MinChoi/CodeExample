<?
/*
 * Quick LightBox Like Helper
 */
class StyleBoxHelper extends AppHelper{
	function start($id='light', $title='Style Box', $onClose="", $spinner=true, $style="", $closeLabel='Cancel') {
?>
	<div id="<?=$id;?>" class="white_content" style="display:none;<?=$style;?>">
		<div class="light_header">
			<div class="lh_heading"><?=$title;?></div>
			<div class="lh_right"></div>
			<div class="lh_cancel"><a href="#" onclick="$('<?=$id;?>').hide();$('fade').hide();<?=$onClose;?>;return false;"><?=$closeLabel;?></a></div>
		</div>
		<div id="<?=$id;?>_content" class="light_content">
		<? if ($spinner) { ?>
		<img src="/js/modalbox/spinner.gif" alt="Spinner" height="50px" width="50px" />
		<? } ?>
<?		
	}
		
	function end($html='</div>') {
?>
		<?=$html;?>
		<div class="light_footer">
			<div class="lf_right"></div>
		</div>
	</div>
<?		
	}
	
	function startSmall($id='light', $title='Style Box', $style='', $onClose="") {
?>
	<div id="<?=$id;?>" class="white_content" style="display:none;<?=$style;?>">
		<div class="light_header_small">
			<div class="lh_heading_small"><?=$title;?></div>
			<div class="lh_cancel"><a href="#" onclick="$('<?=$id;?>').hide();$('fade').hide();<?=$onClose;?>;return false;">Cancel</a></div>
		</div>
		<div id="<?=$id;?>_content" class="light_content_small">
		<img src="/js/modalbox/spinner.gif" alt="Spinner" height="50px" width="50px" style="display:none;" />
<?		
	}	
	
	function endSmall($html='</div>') {
?>
		</div>
		<?=$html;?>
	</div>
<?		
	}
	
	function ConfirmBoxStart($id='light', $title='Style Box', $style='') {
?>
		<div id="<?=$id;?>" class="cb_white_content" style="display:none;<?=$style;?>">
			<div class="cb_header"><!--<?=$title;?>--></div>
			<div id="<?=$id;?>_content" class="cb_content_small">
<?		
	}	
	
	function ConfirmBoxEnd($yes_action='', $yesbtn='Yes, let\'s do it', $nobtn='No, go back') {
?>
			</div>
			<div class="cb_action">
				<a href="#" onclick="<?=$yes_action;?> return false;" class="green"><div><div><?=$yesbtn;?></div></div></a>
				<a href="#" onclick="hideStyleBox($(this).up(1).id); return false;" class="red"><div><div><?=$nobtn;?></div></div></a>
			</div>
		<div class="cb_footer"></div>
	</div>
<?	
	}
	
	
	function ConfirmMessageStart($id='light', $title='Style Box', $style='') {
?>
		<div id="<?=$id;?>" class="cmsg_white_content" style="display:none;<?=$style;?>">
			<div class="cmsg_header"><div><?=$title;?></div></div>
			<div id="<?=$id;?>_content" class="cmsg_content_small">
<?		
	}	
	
	function ConfirmMessageEnd($yes_action='', $yesbtn='Yes, let\'s do it', $nobtn='No, go back') {
?>
			</div>
			<div class="cmsg_action">
				<a href="#" onclick="<?=$yes_action;?> return false;" class="green"><div><div><?=$yesbtn;?></div></div></a>
				<a href="#" onclick="hideStyleBox($(this).up(1).id); return false;" class="red"><div><div><?=$nobtn;?></div></div></a>
			</div>
		<div class="cmsg_footer"></div>
	</div>
<?	
	}
	
}
?>