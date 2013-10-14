<?
if(!isset($sdata)){
?>
<!--error###-->
	<ol class="erroruls">
		<? 
		if(isset($errors)){
		foreach($errors as $key=>$error){
		?>
			<li><?=$key.' : '.$error;?></li>
		<?
		}}
		?>
	</ol>
<?
}else{
?>
<!--ok###-->
<div id="note_<?=$sdata['AdministratorOnode']['id']?>" class="adminnote">
	<b id="note_date_<?=$sdata['AdministratorOnode']['id']?>" class="date"><?=date('d M Y',strtotime($sdata['AdministratorOnode']['created']));?></b>
	<p id="note_content_<?=$sdata['AdministratorOnode']['id']?>" class="content"><?=nl2br($sdata['AdministratorOnode']['description']);?></p>
	<div class="actions">
		<a href="#" onclick="editAdministratorNote('<?=$sdata['AdministratorOnode']['id']?>');return false;" class="edi">Edit</a>
		<a href="#" onclick="deleteNote(<?=$sdata['AdministratorOnode']['id']?>); return false;" class="del">x Delete</a>
	</div>
</div>
<?
}
?>