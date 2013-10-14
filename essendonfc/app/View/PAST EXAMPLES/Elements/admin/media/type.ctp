<?
	$mtclass = ClassRegistry::init('MediaType');
	$mediaTypes = $mtclass->find('list',array('order'=>'MediaType.name')); // $categories = $this->requestAction('/admin/categories/list/'.$category_type_id);
?>
	<div id="mediatype_label" style="display:block;">
		<span>
		<?
			if(isset($this->request->data['Media']['media_type_id'])){
				echo $mediaTypes[$this->request->data['Media']['media_type_id']];
			}
		?>
		</span>
		&nbsp;&nbsp;<a href="#" title="Media Type Edit" onclick="media_type_edit(); return false;">Edit</a>
	</div>
	<div id="mediatype_input" style="display:none;">
		<?=$this->Form->input('media_type_id',array('id'=>'media_type_id','default'=>'0','label'=>false,'options'=>$mediaTypes,'after'=>'&nbsp;&nbsp;<a href="#" title="Media Type Apply" onclick="media_type_apply(); return false;">Apply</a>&nbsp;|&nbsp;<a href="#" title="Media Type Cancel" onclick="media_type_cancel(); return false;">Cancel</a>'));?>
	</div>
	
	<script type="text/javascript">
		<!--
		function media_type_edit(){
			$('mediatype_input').show();	
			$('mediatype_label').hide();
			mediatype_value = $('media_type_id').value;
		}
		function media_type_apply(){
			$('mediatype_input').hide();	
			$('mediatype_label').show();
			$('mediatype_label').down(0).update(getSelectedOptionHTML($('media_type_id')));
		}
		function media_type_cancel(){
			$('mediatype_input').hide();	
			$('mediatype_label').show();
			$('media_type_id').value = mediatype_value;
		}
		-->
	</script>