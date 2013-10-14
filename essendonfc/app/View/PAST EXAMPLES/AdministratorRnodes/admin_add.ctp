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
<div id="note_<?=$sdata['AdministratorRnode']['id']?>" class="adminnote">
	<b id="note_date_<?=$sdata['AdministratorRnode']['id']?>" class="date"><?=date('d M Y',strtotime($sdata['AdministratorRnode']['created']));?></b>
	<p id="note_content_<?=$sdata['AdministratorRnode']['id']?>" class="content"><?=nl2br($sdata['AdministratorRnode']['description']);?></p>
	<div class="actions">
		<a href="#" onclick="editAdministratorNote('<?=$sdata['AdministratorRnode']['id']?>');return false;" class="edi">Edit</a>
		<a href="#" onclick="deleteNote(<?=$sdata['AdministratorRnode']['id']?>); return false;" class="del">x Delete</a>
	</div>
</div>
<?
}
?>