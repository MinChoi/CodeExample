<div class="page-title">Audio Video Gallery</div>
<?
	if($this->Session->read('Member.member_group_id')==1){
?>
<p>Our audio / video gallery contains a variety of audio and video files ranging from event recordings to best practice case studies.</p>
<div id="tabs" class="ui-tabs">
	<ul>
		<li class="ui-tabs-border-shadow"><a href="#tab-featured">FEATURED</a></li>
		<li class="ui-tabs-border-shadow"><a href="#tab-events">EVENTS</a></li>
		<li class="ui-tabs-border-shadow"><a href="#tab-case-studies">CASE STUDIES</a></li>
	</ul>
	<div class="clear height-0">&nbsp;</div>
	<div id="tab-featured">
		<div class="ui-tabs-content">
			<div class="padding-9">
				<div id="player1" class="player">&nbsp;</div>
			</div>
			<div class="playlist-title">Featured video playlist</div>
			<div class="playlist-container" id="pl1">
				<div id="playlist1" class="playlist">
					&nbsp;
				</div>
				<div class="clear">&nbsp;</div>
			</div>
		</div>
	</div>
	<div id="tab-events" class="ui-tabs-content">
		<div class="ui-tabs-content">
			<div class="padding-9"><div id="player2" class="player">&nbsp;</div></div>
			<div class="playlist-title">Events video playlist</div>
			<div class="playlist-container" id="pl2">
				<div id="playlist2" class="playlist">
					&nbsp;
				</div>
				<div class="clear">&nbsp;</div>
			</div>
		</div>
	</div>
	<div id="tab-case-studies" class="ui-tabs-content">
		<div class="ui-tabs-content">
			<div class="padding-9"><div id="player3" class="player">&nbsp;</div></div>
			<div class="playlist-title">Case studies video playlist</div>
			<div class="playlist-container" id="pl3">
				<div id="playlist3" class="playlist">
					&nbsp;
				</div>
				<div class="clear">&nbsp;</div>
			</div>
		</div>
	</div>
</div>
<?
	}else{
?>
<p>Sorry, you need to be a member to view this section.</p>
<?
	}
?>