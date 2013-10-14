<?= $this->CmsForm->create('Package', array('id' => 'packageadd')) ?>
<?= $this->CmsForm->hidden('id') ?>

<div class="frm-l">

	<h2>Edit Package</h2>
	
	<?= $this->element('admin/notices') ?>
	
	<?= $this->CmsForm->textbox('Package Title', 'title') ?>
	<?= $this->Form->input('PackagePackageCategoryId', array(
			'type' => 'select', 
			'options' => $packageCategories, 
			'div' => array('id' => 'cmsField_package_package_category_id', 'class' => 'input cmsSelect'),
			'id' => 'PackagePackageCategoryId', 
			'class' => 'wysiwyg', 
			'label' => 'Package Category',
			'name' => 'data[Package][package_category_id]',
			'value' => @$this->data['Package']['package_category_id'],
			'empty' => true
	)) ?> 
	<?= $this->CmsForm->input('displaying_order', array('type' => 'hidden')) ?>
	<?= $this->CmsForm->input('short_desc', array('type' => 'textarea', 'label' => 'Short Description', 'cols' => 100)) ?>
	<?= $this->CmsForm->kcFinderImage('Package image (optional)', 'image', null, array(), '/thumb/200x200/fit') ?>
	<?= $this->CmsForm->wysiwyg('Package Text', 'content') ?>

	
	<?/*
	<div class="form-row">
		<table width="100%">
			<tr>
				<td>
				<label for='core_kit'>
					Core Kit :
				</label>
				<?= $this->element('/admin/packages/corekit') ?>
				</td>
			</tr>
		</table>
	</div>*/
	?>
	<!--<div class="form-row ticket_price_list">-->
	<?= $this->CmsForm->textbox('Ticketing URL (Single Buy Button)', 'ticketing_url') ?>
		
	<h3>Pricing List</h3>
	
	<table width="100%" id="list_pricing">
		<thead>
			<tr>
				<th>Title</th>
				<th>Price per Month (optional)</th>
				<th>Price per Year</th>
				<th>Ticketmaster URL</th>
				<th></th>
			</tr>
			<tr>
				<td>
					<?= $this->CmsForm->input('pc_id', array('id'=>'pc_id', 'type'=>'hidden')) ?>
					<?= $this->CmsForm->input('pc_name', array('id'=>'pc_name','div'=>false,'label'=>false)) ?>
				</td>
				<td><?= $this->CmsForm->input('pc_per_month', array('id'=>'pc_per_month','div'=>false,'label'=>false)) ?></td>
				<td><?= $this->CmsForm->input('pc_totla', array('id'=>'pc_total','div'=>false,'label'=>false)) ?></td>
				<td><?= $this->CmsForm->input('pc_url', array('id'=>'pc_url','div'=>false,'label'=>false)) ?></td>
				<td>
					<a href='javascript:void(0)' onclick="add_new_pricing();">Apply</a> 
					|
					<a href='javascript:void(0)' onclick="clear_fields();">Clear</a> 
				</td>
			</tr>
		</thead>
		<tbody>
		<?php
		// <ul id='list_pricing' style='margin:0 0 0 0;' class="ticket_price_list">
		if (!empty($this->request->data['PackagePricing']))
			$this->request->data['PackagePricing'] = Hash::sort($this->request->data['PackagePricing'], '{n}.id', 'asc');
		$pricingOptCounter = 1;
		foreach ($this->data['PackagePricing'] as $pricingOptCounter => $sel_pricing) {
			$pricingOptCounter ++;
			?>
			<tr id="li_<?= $pricingOptCounter ?>">
				<td class="pricing_name"><img src="/CORE/images/drag_handle.png" alt="Drag to reorder items"/><?= $sel_pricing['name'] ?></td>
				<td class="pricing_per_month"><?= number_format($sel_pricing['per_month'],2) ?></td>
				<td class="pricing_total"><?= number_format($sel_pricing['total'],2) ?></td>
				<td class="pricing_url"><?= $sel_pricing['url'] ?></td>
				<td id="pricing_links">
					<a id="edit_pricing_links" onclick="edit_pricing(this)" href="javascript:void(0)">Edit</a>
					|
					<a class="removelink" onclick="remove_pricing(this)" href="javascript:void(0)">Remove</a>
					<input type=hidden name="data[PackagePricing][<?= $pricingOptCounter?>][name]" id="data[PackagePricing][<?= $pricingOptCounter?>][name]" value="<?= str_replace("'", "_ap_", $sel_pricing['name']); ?>">
					<input type=hidden name="data[PackagePricing][<?= $pricingOptCounter?>][per_month]" id="data[PackagePricing][<?= $pricingOptCounter?>][per_month]" value="<?= $sel_pricing['per_month']?>">
					<input type=hidden name="data[PackagePricing][<?= $pricingOptCounter?>][total]" id="data[PackagePricing][<?= $pricingOptCounter?>][total]" value="<?= $sel_pricing['total']?>">
					<input type=hidden name="data[PackagePricing][<?= $pricingOptCounter?>][url]" id="data[PackagePricing][<?= $pricingOptCounter?>][url]" value="<?= $sel_pricing['url']?>">
				</td>
			</tr>
		<? } ?>
		</tbody>
	</table>
</div>

<div class="frm-r">
	<?= $this->element('/admin/modules/page_visibility',array('open'=>true)) ?>
	<?= $this->element('/admin/modules/seo',array('open'=>false)) ?>
	<?= $this->element('/admin/modules/widgets',array('open'=>false)) ?>
</div>

<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
		<a href="javascript:void(0);" onclick="jQuery('.CmsForm').submit();return false" class="save_btn"></a>
		</div>
			<a href="#" onclick="PackagePreview($(this));return false;" class="preview_btn"><div>Preview</div></a>
			
			<?php
			if(isset($this->data['Package']['modified']))
				echo 'Last saved at: '.date("j F, Y, g:i a",strtotime($this->data['Package']['modified']));
			?>
			<script type="text/javascript">
				function PackagePreview(ele){
						
					   var $ = jQuery;
					   var form = $('#packageadd'),
					   origAction = form[0].action;
					   form[0].action = '/admin/packages/preview/';
					   form[0].target = '_PreviewWindow';
					   form.submit();
					   form[0].action = origAction;
					   form[0].target = '';

					}
			</script>
			<ul id="footer-action">
				<!--<li><a class="" onclick="$('packageadd').submit();" title="Edit" >Save</a></li>  -->  
				<li><a class="" href="#" class="" onclick="resetConfirm();return false;"  title="Reset" >Reset</a></li>
			<li class='close'><a class='close' onclick="" href="<?= $this->Html->url(array('action' => 'index')) ?>" title="Close" >Close</a></li><!--closeConfirm(this.href);return false;-->
			</ul>
		</div>
	</div>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript">
	var current_index = <?= $pricingOptCounter ?>;

	// Takes the pricing values entered in the form and appends a new pricing option to the table
	function add_new_pricing() {
		
		// Do some basic validation
		if ($('pc_name').value=='Enter Name'
			||$('pc_total').value=='Enter Price'
			||isNaN($('pc_total').value)
			||$('pc_url').value=='Enter Enter TicketMaster URL'
		) {
			alert('Please enter ticket detail correctly');
			return false;
		}
		
		current_index++;
		row_text = '<td class="pricing_name"><img src="/CORE/images/drag_handle.png" alt="Drag to reorder items"/>' + $('pc_name').value + '</td>'
		+ '<td class="pricing_per_month">' + $('pc_per_month').value + '</td>'
		+ '<td class="pricing_total">' + $('pc_total').value + '</td>'
		+ '<td class="">' + $('pc_url').value + '</td>'
		+ '<td id="pricing_links">'
		+ '	<a id="edit_pricing_links" onclick="edit_pricing(this)" href="javascript:void(0)">Edit</a> | '
		+ '	<a class="removelink" onclick="remove_pricing(this)" href="javascript:void(0)">Remove</a>'
		+ '<input type="hidden" name="data[PackagePricing]['+current_index+'][name]" id="packagePrice'+current_index+'" value="' + $('pc_name').value.replace("'","_ap_")+'">'
		+ '<input type="hidden" name="data[PackagePricing]['+current_index+'][per_month]" id="packagePrice'+current_index+'" value="' + $('pc_per_month').value + '">'
		+ '<input type="hidden" name="data[PackagePricing]['+current_index+'][total]" id="packagePrice'+current_index+'" value="' + $('pc_total').value + '">'
		+ '<input type="hidden" name="data[PackagePricing]['+current_index+'][url]" id="packagePrice'+current_index+'" value="' + $('pc_url').value + '">'
		+ '</td>';
		// row_text+= "<br>";
		
		var row = jQuery('<tr>').html(row_text).attr('id', 'li_' + current_index);
		
		// If we're EDITING an existing item, replace that, otherwise add new row
		if (jQuery('#pc_id').val())
			jQuery('#li_' + jQuery('#pc_id').val()).html(row_text);
		else {
			jQuery('#list_pricing tbody').append(row);
		}
		// } else {
			// row_text = "<p class='pricing_name'>"+$('pc_name').value+"</p>";
			// row_text+= "<p class='pricing_per_month'>"+$('pc_per_month').value+"</p>";
			// row_text+= "<p class='pricing_total'>"+$('pc_total').value+"</p>";
			// row_text+= "<div id='pricing_links' style='text-align:right;'>";
			// row_text+= "	<a id='edit_pricing_links' onclick='edit_pricing(this)' href='javascript:void(0)' >Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;"; 
			// row_text+= "	<a class='removelink' onclick='remove_pricing(this)' href='javascript:void(0)'>Remove</a><input type=hidden value='false' id=modifydateonly>";
			// row_text+= "</div>";
			// row_text+= "<br>";
			// row_text+= "<input type=hidden name='data[PackagePricing]["+$('pc_id').value+"][name]' id='data[PackagePricing]["+$('pc_id').value+"][name]' value='"+$('pc_name').value.replace("'","_ap_")+"'>";
			// row_text+= "<input type=hidden name='data[PackagePricing]["+$('pc_id').value+"][per_month]' id='data[PackagePricing]["+$('pc_id').value+"][per_month]' value='"+$('pc_per_month').value+"'>";
			// row_text+= "<input type=hidden name='data[PackagePricing]["+$('pc_id').value+"][total]' id='data[PackagePricing]["+$('pc_id').value+"][total]' value='"+$('pc_total').value+"'>";
			// row_text+= "<input type=hidden name='data[PackagePricing]["+$('pc_id').value+"][url]' id='data[PackagePricing]["+$('pc_id').value+"][url]' value='"+$('pc_url').value+"'>";
		
		clear_fields();
		enableSorting();
	}

	function remove_pricing(objList){
		$(objList.parentNode.parentNode.id).remove();
		clear_fields();
	}

	function clear_fields(){
		$('pc_name').value = '';
		$('pc_per_month').value = '';
		$('pc_total').value = '';
		$('pc_url').value = '';
		$('pc_id').value = '';
	}

	function edit_pricing(objList){
		current_id = $(objList.parentNode.parentNode.id).id.split('_');
		current_id = current_id[1];
		$('pc_name').value = $('data[PackagePricing]['+current_id+'][name]').value.replace("_ap_","'");
		$('pc_per_month').value = $('data[PackagePricing]['+current_id+'][per_month]').value;
		$('pc_total').value = $('data[PackagePricing]['+current_id+'][total]').value;
		$('pc_url').value = $('data[PackagePricing]['+current_id+'][url]').value;
		$('pc_id').value = current_id;
	}

	function closeConfirm(href){
		$('packagemsg').down(1).update('Are you sure you want to close without saving?');
		$('packagemsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
		$('packagemsg').down('a.green').writeAttribute('href',href);
		$('packagemsg').down('a.green').writeAttribute('onclick','');
		showStyleBox('packagemsg');
	}
	
	function resetConfirm(){
		$('packagemsg').down(1).update('You are about to reset all fields.');
		$('packagemsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
		$('packagemsg').down('a.green').writeAttribute('onclick',"$('packageadd').reset();hideStyleBox('packagemsg');return false;");
		showStyleBox('packagemsg');
	}
	
	// Enables sorting on the table rows
	function enableSorting() {
		// Sortable.create("list_pricing", {tag: 'tr'});
		jQuery("#list_pricing tbody")
			.disableSelection()
			.sortable({
				items: 'tr', 
				axis: 'y', 
				handle: 'img',
				// placeholder: 'dropzone',
				// containment: 'parent', 
				// forceHelperSize: true
				// Fix for table-rows so they don't collapse in size:  http://stackoverflow.com/a/1372954/195835
				helper: function(e, tr) {
					var $originals = tr.children();
					var $helper = tr.clone();
					// For each TD, set the width to the width of the original row
					$helper.children().each(function(index) {
						jQuery(this).width($originals.eq(index).width())
					});
					return $helper;
				},
			});
	}
	
	jQuery(function(){
		enableSorting();	// call on pageload
	});

</script>
