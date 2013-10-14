<div class="page-title">Polls</div>
<div style="clear:both;"><?=$poll['Poll']['intro_txt'];?></div>
<?
	if($showpoll){
		if(isset($poll['Poll'])){
?>
<div id="cpoll-info" class="frow">
	<form action="/memberarea-polls" method="POST" name="cpoll" id="cpoll">
	<div id="poll-title">Current Poll</div>
	<?
		if($poll['Poll']['close_date_chk']==1){
	?>
	<div id="pollcloseinfo">Closes On <?=date('l, jS F, Y',strtotime($poll['Poll']['close_date']));?> midnight</div>
	<?
		}
	?>
	<div class="question"><?=$poll['Poll']['name'];?></div>
	<div id="poll-options">
		<?
			$answers = unserialize(base64_decode($poll['Poll']['answers']));
			foreach($answers as $key=>$answer){
				if(trim($answer)!=''){
		?>
		<div class="poll-options-items"><input type="radio" name="data[Poll][response]" value="<?=$key;?>" id="response_<?=$key;?>" /><label for="response_<?=$key;?>"><?=$answer;?></label></div>
		<?
				}
			}
		?>
	</div>
	<a href="#" onclick="$('cpoll').submit(); return false;" class="pollsubmitbtn">Submit</a>
	</form>
</div>
<?
		}else{
?>
			<p>New DCA poll coming soon.</p>
<?
		}
	}else{
?>
<div id="cpoll-info" class="frow">
	<div id="poll-title">Current Poll</div>
	<div class="question"><?=$poll['Poll']['name'];?></div>
	<p class="poll-message">Thank you, your vote has been counted.</p>
	<div id="poll-result">
	<?
		$colors = array('','#8ECEFF','#FDCD27','#97F13F','#B175D3','#FF6400');
		$answers = unserialize(base64_decode($poll['Poll']['answers']));
		foreach($answers as $key=>$answer){
			if(trim($answer)!=''){
			$percentage = 0;
			if($poll['Poll']['response_'.$key]>0){
				$percentage = (($poll['Poll']['response_'.$key]/$poll['Poll']['total_responses'])*100)*3;
			}
			
	?>
			<div class="poll-prgress"><div class="poll-prgress-inner" style="background-color:<?=$colors[$key];?>;width:<?=$percentage?>px;"></div><?=$poll['Poll']['response_'.$key];?></div>
	<?
			}
		}
	?>
	</div>
	<div class="question">Total Votes: <?=$poll['Poll']['total_responses'];?></div>
	<div class="poll-color-info">
	<?
		$answers = unserialize(base64_decode($poll['Poll']['answers']));
		foreach($answers as $key=>$answer){
			if(trim($answer)!=''){
	?>
	<div class="poll-options-items">
		<div class="poll-color" style="background-color:<?=$colors[$key];?>"></div><?=$answer;?>
	</div>
	<?
			}
		}
	?>
	</div>
</div>
<?
	}
?>