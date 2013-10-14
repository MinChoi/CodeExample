<?
$model = $this->params['models'][0];
?>
<div class="widget">
	<div class="widget-header">
		<div class="label">Latest Activity</div>
		<div class="widgetToggle"></div>
	</div>
	<div class="widget-content <?=(isset($open) && $open)?'open':'';?>" style="width:244px;padding:0px;border-bottom:0px;" >
		<?
			/*if(isset($this->request->data['MemberActivity'])){
				foreach($this->request->data['MemberActivity'] as $admin_node){*/
		?><!--
				<div class="activitynote">
					<b class="date"><?=date('d M Y',strtotime($admin_node['created']));?></b><br />
					<b class="title"><?=$admin_node['title'];?></b>
					<p class="content"><?=$admin_node['description'];?></p>
				</div>-->
		<?
		//		}
		//	} 
		?>
		<?
			if(isset($this->request->data['MemberActivity'])){
				foreach($this->request->data['MemberActivity'] as $admin_node){
		?>
				<div class="activitynote">
					<b class="date"><?=date('d M Y',strtotime($admin_node['created']));?></b><br />
					<b class="title"><?=$admin_node['title'];?></b>
					<?
						if(strlen(trim($admin_node['description']))>0){
					?>
						<p class="content"><?=$admin_node['description'];?></p>
					<?
						}
					?>
					
				</div>
		<?
				}
			}
		?>
	</div>
</div>