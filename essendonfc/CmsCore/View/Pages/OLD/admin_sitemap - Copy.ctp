<div id="sitemap" align='center'>
	<ul class="boxes">
		<li class="box"><a href="javascript:void(0);">HOME</a></li>
	</ul>
</div>
<div id="sitemap-items" align='center'>
	<ul id="menu_item_0" class="top_hmenu">
		<li class="firstlevel">Home Page
			<ul id="menu_item_1">
				<li>HOME PAGE</li>
				<li>ABOUT US</li>
				<li>CONTACT US</li>
				<li>Products</li>
			</ul>
		</li>
		<li class="firstlevel">Products Page
			<ul id="menu_item_2">
				<li>HOME PAGE</li>
				<li>ABOUT US</li>
				<li>CONTACT US</li>
				<li>Products</li>
			</ul>
		</li>
		<li class="firstlevel">ABOUT Page
			<ul id="menu_item_3">
				<li>HOME PAGE</li>
				<li>ABOUT US</li>
				<li>CONTACT US</li>
				<li>Products</li>
			</ul>
		</li>
	</li>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		initTrees();
	});

	function initTrees() {
		var d = new Date();
		$('#menu_item_0').treeListSortable();
		$('#menu_item_1').treeListSortable();
		$('#menu_item_2').treeListSortable();
		$('#menu_item_3').treeListSortable();
	}
</script>