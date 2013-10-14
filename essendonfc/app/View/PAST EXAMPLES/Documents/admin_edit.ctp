<?= $this->element('admin/header_js') /*?>
<script type="text/javascript">
jQuery(function($) {
	$("#tabs").tabs();
	$("#bus-tabs").tabs();
});
</script>
****/ ?>

<? //debug($this->request->data) ?>

<?= $this->CmsForm->create('Document', array(
	'id' => 'documentAdd',
	'class' => 'mainForm white',
)) ?>
<?= $this->CmsForm->hidden('id') ?>

<div class="frm-l">

	<h1>Document Details &amp; Uploads</h1>

	<?= $this->element('admin/notices') ?>

	<?= $this->CmsForm->textbox('Document Title', 'title') ?>
	<?= $this->CmsForm->selectBox('Client', 'client_id', $clients) ?>
	<?= $this->CmsForm->selectAndManage('Document Category', 'document_category_id', $categories, 'DocumentCategory') ?>
	<?= $this->CmsForm->textareaOld('Document Description (optional)', 'description') ?>
	
	<?= $this->CmsForm->fileRevisions('Document Versions') ?>
	
	
	
	
	
	<?//------------------- Special Document Revisions Section ---------------------------------------?>
	<?/*/ to be replaced by helper ****** ?>
	<div class="input">
		<label>Document Versions</label>
		<div class="cmsMultiChooser cmsDocumentVersions">
		
			<?//<input type="button" value="Upload New Version" onclick="jQuery('.newVersionForm').slideToggle();"/>?>
			
			<div class="fileField">
				<?/*=
					$this->element("uploadify",	array(
						'dom_id' => 'file_upload',
						'options' => array(
							// 'buttonText' => 'Upload New Version',
							'hideButton' => true,
							'width' => '200',
							'script' => $this->Html->url(array('action' => 'upload')),
							'folder' => '/files',
							'onSelect' => 'onUploadSelect',
							'onCancel' => 'onUploadCancel',
							'onComplete' => 'onUploadComplete',
							'onError' => 'onUploadError',
						)
					), array('plugin' => 'cuploadify'))
				* /?>
				<?=
					$this->Html->script('/js/valums-file-uploader/client/fileuploader.js') .
					$this->Html->css('/js/valums-file-uploader/client/fileuploader.css')
				?>
				<div id="file-uploader">       
					<noscript>          
						<p>Please enable JavaScript to use file uploader.</p>
						<!-- or put a simple form for upload here -->
					</noscript>         
				</div>
			</div>
			
			<?//---------- Div Displayed When File is Selected ---------------------?>
			<div class="newVersionForm" style="display: none">
				<div class="fileNotes">
					<label for="version_notes">Enter notes (optional)</label>
					<textarea name="data[Document][version_notes]" id="version_notes" rows="4"></textarea>
				</div>
				<div class="buttons">
					<input type="hidden" name="data[Document][filename]" id="filename" value=""/>
					<input type="button" id="saveVersionButton" value="Save Document" onclick="saveVersion()"/>
					<input type="button" value="Cancel" onclick="onUploadCancel();uploader.reset()"/>
				</div>
			</div>
			
			<script type="text/javascript">
			
				<?
				/*
				 * Process for uploading
				 * 		1. user selects a file
				 * 		2. ajax/iframe upload begins immediately to /admin/documents/upload
				 * 		3. text area is displayed, but save button grayed while upload is in progress
				 * 		4. file is stored in temporary folder
				 * 		5. user enters a revision description
				 * 		6. when upload completes successfully, then save button is enabled and filename is stored in hidden field
				 * 		7. when save button is clicked, button & textarea is disabled, an AJAX call is made to server /admin/documents/addRevision
				 * 		   passing filename AND all fields (in case document is completely new)
				 * 		8. addRevision() func moves temporary file into permanent location, moves any previous revision
				 * 		   to revisions folder, saves new revision object, and updates document row in database
				 * 			(and also removes any files from temp folder older than 24 hrs)
				 * 		9. If server responds with success message, browser adds new <TR> row to revisions table
				 * 		10. Textarea is cleared and hidden
				 * 		11. File upload list is cleared
				 * /				 
				?>
			
				var uploader = new qq.FileUploader({
					// pass the dom node (ex. $(selector)[0] for jQuery users)
					element: document.getElementById('file-uploader'),
					// path to server-side upload script
					action: '/admin/documents/upload',
					debug: true,
					multiple: false,
					// autoUpload: false,
					// onQueue:	 onUploadSelect,	//function(filenames) {console.log('queued', arguments)},
					onSubmit:	 onUploadStart,		//function(id, filename) {console.log('submit', arguments)},
					onComplete:	 onUploadComplete,	//function(id, filename, response) {console.log('complete', arguments)},
					onCancel:	 onUploadCancel, 	//function(id, filename) {console.log('cancel', arguments)},
					showMessage: function(message) {alert(message, arguments)}	// if there's an error
				});
						
				function onUploadStart(a,b,c) {
					console.log('selected',a,b,c)
					// reveal textarea, disable button
					jQuery('#version_notes').removeAttr('disabled');
					jQuery('#saveVersionButton').attr('disabled','disabled');
					jQuery('.newVersionForm').slideDown()
				}
				function onUploadCancel(a,b,c) {
					console.log('cancel',a,b,c)
					// hide textarea
					jQuery('.newVersionForm').slideUp();
					// uploader.reset();
				}
				// function uploadStart() {
					// console.log('upload start');
					// disable textarea
					// initiate uploadify SWF upload
					// jQuery('#file_upload').uploadifyUpload();
				// }
				function onUploadComplete (id,filename,response) {
					console.log('completed',id,filename,response)
					// enable save button...
					jQuery('#saveVersionButton').removeAttr('disabled');
					// store filename in hidden field
					jQuery('#filename').val(filename);
					
					// jQuery('.newVersionForm').slideToggle();
					// show upload button
					// jQuery('#file_uploadUploader').show();
				}
				function saveVersion() {
					// console.log('ajax started')
					// disable save button and textarea
					jQuery.post(
						'/admin/documents/saveRevision', 
						jQuery('form#documentAdd').serialize(), 
						onSaveVersionComplete,
						'json'
					);
					jQuery('#saveVersionButton, #version_notes').attr('disabled','disabled');

					// console.log()
					// make ajax call, passing filename and all fields
				}
				function onSaveVersionComplete(data, textStatus, jqXHR) {
					// clear file upload list
					uploader._clearList();
					console.log(data);
					
					// if the form's doc ID is currently blank, insert it with data returned from AJAX call
					var idField = jQuery('#DocumentId');
					if (!idField.val()) idField.val(data.docId);

					// insert new row with new data
					jQuery('.existingRevisions table').prepend(
						'<tr><td>'
							+ jQuery('#filename').val()
						+'</td><td>'
							+ jQuery('#version_notes').val()
						+'</td><td>'
							+ data.upload_date
						+'</td><td>'
							+ data.uploaded_by
						+'</td></tr>'
					);
					
					// reveal new row and highlight with special colour
					//...
					
					// clear, enable & hide textarea
					jQuery('.newVersionForm').slideUp();
				}
			</script>
			
			<?//------------ Existing Revisions Table -------------------------?>
			<div class="existingRevisions">
				<table>
					<?
					/*?>
					<tr>
						<td><?= $doc['Document']['filename'] ?></td>
						<td><?= $doc['Document']['version_notes'] ?></td>
						<td><?= $doc['Document']['upload_date'] ?></td>
						<td><?= $doc['Uploader']['username'] ?></td>
						<!--<td><input type="button" value="remove"/></td>-->
					</tr>
					<?* /
					// Past revisions are stored in 'DocumentRevision' model, display those next ?>
					<? foreach ($this->request->data['DocumentRevision'] as $rev) { //debug($rev)?>
					<?// note: this table row is also added dynamically by jQuery when a new file is uploaded.  
					  // If you change the structure here, you'll need to also change the structure there. ?>
					<tr>
						<td><?= $rev['filename'] ?></td>
						<td title="<?= $rev['version_notes'] ?>"><?= $rev['version_notes'] ?></td>
						<td><?= @$rev['upload_date'] ?></td>
						<td><?= @$rev['Uploader']['username'] ?></td>
					</tr>
					<? } ?>
				</table>
			</div>
		</div>
	</div>
	*/?>
	
	
	
	
	
	
</div>
	

<?/*****************
<?= $this->Form->create(null,array('id'=>'individualadd','ENCTYPE'=>'multipart/form-data','url'=>'/admin/clients/edit/'.$this->data['Client']['id'],'method'=>'post'));?>
<?= $this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<?= $this->Form->input('Client.id',array('type'=>'hidden'));?>
<?= $this->Form->input('UserLogin.id',array('type'=>'hidden'));?>
<div class="frm-l">
	<h3>View/Edit Client <b><?= $this->request->data['Client']['first_name']. ' ' . $this->request->data['Client']['last_name']?> </b></h3>
	<br/>
	<ol class="erroruls">
		<? 
		if(isset($errors)){
		foreach($errors as $error){
		?>
			<li><?=$error;?></li>
		<?
		}}
		?>
	</ol>





<? //debug($this->data)?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Personal Details</a></li>
		<li><a href="#tabs-2">Business Details</a></li>
        <li><a href="#tabs-3">Bookings</a></li>
		
	</ul>
	<div id="tabs-1">
	

    <div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d1" style="display:block;">
	<table width="790" border="0" cellspacing="0" cellpadding="5">
	<tr>
      <td width="25%"><h3>Title</h3></td>
      <td width="75%"><?= $this->Form->input('Client.title',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Title'));?></td>
    </tr>
    <tr>
      <td><h3>First name</h3></td>
      <td><?= $this->Form->input('Client.first_name',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
    </tr>
    <tr>
      <td><h3>Last name</h3></td>
      <td><?= $this->Form->input('Client.last_name',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name'));?></td>
    </tr>
    <tr>
      <td><h3>Daytime phone</h3></td>
      <td><?= $this->Form->input('Client.phone1',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Daytime phone'));?></td>
    </tr>
    <tr>
      <td><h3>AH phone </h3></td>
      <td><?= $this->Form->input('Client.phone2',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter AH phone'));?></td>
    </tr>
    <tr>
      <td><h3>Other phone or mobile</h3></td>
      <td><?= $this->Form->input('Client.phone3',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Other phone or mobile'));?></td>
    </tr>
    <tr>
      <td><h3>Issues</h3></td>
      <td><?= $this->Form->input('Client.issues',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
  </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
	
	
	<br />
    
    <div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d2" style="display:block;">
	<table width="790" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="17%"><h3>User name</h3></td>
      <td width="83%"><?= $this->Form->input('UserLogin.user_name',array('label'=>false, 'readonly'=>true, 'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
    </tr>
    <tr>
      <td><h3>Password</h3></td>
      <td><?= $this->Form->input('UserLogin.user_pass',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name'));?></td>
    </tr>

  </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
    <!-- end 1 -->
    
    </div>
	<div id="tabs-2">



<div id="bus-tabs">
	<ul>
	<? $tab_names = $this->data['ClientBusiness']; 
	 foreach($tab_names as $cb) {?>
		<li><a href="#bus-tabs-<?= $cb['id']?>"><?= $cb['name']?></a></li>
	<? } ?>
	</ul>
	
	<? 
	$i = 0;
	foreach($this->data['ClientBusiness'] as $cb) {?>
	<div id="bus-tabs-<?= $cb['id']?>">
	
		
		
		
		<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d1" style="display:block;">
			<?= $this->Form->hidden('ClientBusiness.'.$i.'.id');?>
			<?= $this->Form->hidden('ClientBusiness.'.$i.'.client_id');?>
	<table width="790" border="0" cellspacing="0" cellpadding="5">
	<tr>
      <td width="25%"><h3>Business name</h3></td>
      <td width="75%"><?= $this->Form->input('ClientBusiness.'.$i.'.name',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Title'));?></td>
    </tr>
    <tr>
      <td><h3>Your position</h3></td>
      <td>			 <?= $this->Form->input('ClientBusiness.'.$i.'.position',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
    </tr>
    <tr>
      <td><h3>ABN</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.abn',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name'));?></td>
    </tr>
    <tr>
      <td><h3>Years in this business</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.years',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Daytime phone'));?></td>
    </tr>
    <tr>
      <td><h3>Business street<br>
        </h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.street',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter AH phone'));?></td>
    </tr>
    <tr>
      <td><h3>Business suburb</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.suburb',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Other phone or mobile'));?></td>
    </tr>
    <tr>
      <td><h3>Postcode</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.postcode',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>Your region</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.sbms_region',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>Email</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.email',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>Website</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.website',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>What does your business do?</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.desc',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>Business Structure</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.structure',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
    <br />
    	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d1" style="display:block;">
			  <table width="790" border="0" cellspacing="0" cellpadding="5">
			    <tr>
			      <td width="25%" valign="top"><h3>Business plan</h3></td>
			      <td width="25%" valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.plan',array('1' => 'Yes', '0' => 'No'),array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td width="25%" valign="top"><h3>Num of employees</h3></td>
			      <td width="25%" rowspan="3" valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.num_employees', $options_num_employees ,array('label'=>false,'div'=>false,'legend' => false));?></td>
		        </tr>
			    <tr>
			      <td valign="top"><h3>Budget</h3></td>
			      <td valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.budget',array('1' => 'Yes', '0' => 'No') ,array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td valign="top">&nbsp;</td>
		        </tr>
			    <tr>
			      <td valign="top"><h3>Year to date P&amp;L</h3></td>
			      <td valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.year_to_date',array('1' => 'Yes', '0' => 'No') ,array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td valign="top">&nbsp;</td>
		        </tr>
			    <tr>
			      <td valign="top"><h3>Last years accounts</h3></td>
			      <td valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.last_year_accounts',array('1' => 'Yes', '0' => 'No') ,array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td valign="top"><h3>Profitability</h3></td>
			      <td rowspan="2" valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.profitability', $options_profitability ,array('label'=>false,'div'=>false,'legend' => false));?></td>
		        </tr>
			    <tr>
			      <td valign="top"><h3>Anual sales ($'000)<br>
			        </h3></td>
			      <td valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.anual_sales', $options_sales ,array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td valign="top">&nbsp;</td>
		        </tr>
		      </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
	    	
	    	
	</div>
	<? $i++; } ?>
	
</div>
	<!-- end 2 -->
	</div>
    <div id="tabs-3">3</div>

</div>





	



	
</div>
<br/><br/>
</div>********************/?>

<div class="frm-r">
	<?= $this->element('admin/administrator_notes', array('open' => true)) ?>
</div>

	<div id="afm">
		<div id="afm-inner">
			<a href="#" onclick="jQuery(this).closest('form').submit();return false;" class="save_btn"></a>
			<div id='ajax-save'>
				<img src="<?= $theme_admin?>/images/ajaxLoader.gif"> Saving..
			</div>
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				<li class='close'><a class='close' onclick="" href="<?= $this->Html->url(array('action' => 'index')) ?>" title="Close" >Close</a></li>
			</ul>
		</div>
	</div>
	
	
<?/*
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="# Submit Form" onclick="document.forms[0].submit(); return false;" class="save_btn"></a>
			<div id='ajax-save'>
				<img src="<?= $theme_admin?>/images/ajaxLoader.gif"> Saving..
				</div>
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				<? //if($this->data['Redirect']['redirect']=='admin-sitemap'){ ?>
				<? //}else{ ?>
					<li class='close'><a class='close' onclick="" href="<?= $this->Html->url(array('action' => 'index')) ?>" title="Close" >Close</a></li> <!-- closeConfirm(this.href);return false;-->
				<? //} ?>
			</ul>
		</div>
	</div>
*/?>	
<?= $this->CmsForm->end() ?>

<script type="text/javascript">
function closeConfirm(href){
	$('individualmsg').down(1).update('Are you sure you want to close without saving?');
	$('individualmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('individualmsg').down('a.green').writeAttribute('href',href);
	$('individualmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('individualmsg');
}
function resetConfirm(){
	$('individualmsg').down(1).update('You are about to reset all fields.');
	$('individualmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('individualmsg').down('a.green').writeAttribute('onclick',"$('individualadd').reset();hideStyleBox('individualmsg');return false;");
	showStyleBox('individualmsg');
}
</script>