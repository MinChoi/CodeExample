<?
$model = $this->params['models'][0];
?>
<div class="widget">
	<div class="widget-header">
		<div class="label">Publishing and Visibility</div>
		<div class="widgetToggle"></div>
	</div>
	<div class="widget-content <?=(isset($open) && $open)?'open':'';?>" >
		<div id="page-publish">
			<?
			if(isset($this->request->data[$model]['published']) && $this->request->data[$model]['published']==1){
			?><span id="pagepublish-label" class="published">Published</span>
			<?
			}else{
			?><span id="pagepublish-label" class="unpublished">UnPublished</span>
			<?
			}
			?>
			<a href="#" onclick="edit_pub_status(); return false;">Edit</a>
		</div>
		<div id="edit-publish" style="display:none;">			
			<script type="text/javascript">
			<!--
				function edit_pub_status(){
					$('edit-publish').show();$('page-publish').hide();
					pubstatus = $('s-publish').value;
				}
				function cancel_pub_status(){
					$('s-publish').value = pubstatus;
					ch_pub_status();
				}
				function ch_pub_status(){	
					if($('s-publish').value==1){
						$('pagepublish-label').update('Published');
						$('pagepublish-label').writeAttribute("class",'published');
					}else{
						$('pagepublish-label').update('Unpublished');
						$('pagepublish-label').writeAttribute("class",'unpublished');
					}
					$('edit-publish').hide();
					$('page-publish').show();
				}
			//-->
			</script>
			<?=$this->Form->input('published',array('id'=>'s-publish','label'=>false,'type'=>'select','options'=>array('Unpublish','Publish'),'after'=>'&nbsp;<a href="#" onclick="ch_pub_status(); return false;">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancel_pub_status(); return false;">Cancel</a>'));?>
			
		</div>
		
		
		<div id="page-featured" style="margin-top: 10px;">
			<?
			if(isset($this->request->data[$model]['featured']) && $this->request->data[$model]['featured']==1){
			?><span id="featured-label" class="featured">Featured</span>
			<?
			}else{
			?><span id="featured-label" class="unfeatured">Not Featured</span>
			<?
			}
			?>
			<a href="#" onclick="edit_fea_status(); return false;">Edit</a>
		</div>
		<div id="edit-featured" style="display:none;margin-top: 10px;">			
			<script type="text/javascript">
			<!--
				function edit_fea_status(){
					$('edit-featured').show();$('page-featured').hide();
					featured_status = $('s-feature').value;
				}
				function cancel_fea_status(){	
					$('s-feature').value = featured_status;
					ch_fea_status();
				}
				function ch_fea_status(){	
					if($('s-feature').value==1){
						$('featured-label').update('Featured');
						$('featured-label').writeAttribute("class",'featured');
					}else{
						$('featured-label').update('Not Featured');
						$('featured-label').writeAttribute("class",'unfeatured');
					}
					$('edit-featured').hide();
					$('page-featured').show();
				}
			//-->
			</script>
			<?=$this->Form->input('featured',array('id'=>'s-feature','label'=>false,'type'=>'select','options'=>array('Not Featured','Featured'),'after'=>'&nbsp;<a href="#" onclick="ch_fea_status(); return false;">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancel_fea_status(); return false">Cancel</a>'));?>
		</div>

	</div>
</div>