<? $this->set('masthead_content', '') ?>

<h1>Search</h1>

<div class="searchHeader">
	<div class="byKeyword">
		<h3>Search by keyword</h3>
		<form action="/search/byKeyword/">
			<input type="text" name="q" value="<?= $searchTerm ?>"/>
			<input type="submit" value="Search"/>
		</form>
	</div>
	<div class="byTopic">
		<h3>Search by topic</h3>
		<? foreach ($tags as $tag => $count) if ($count) { ?>
			<div class="tag">
				<a href="/search/byTag/?q=<?= urlencode($tag) ?>"><?= $tag ?></a> (<?= $count ?>)
			</div>
		<? } ?>
	</div>
</div>


<? if ($results) { ?>

	<div class="searchResultsCount"><?= count($results) ?> results found for "<?= $searchTerm ?>"</div>
	
	<? foreach ($results as $r) { ?>

	<div class="result">
		<div class="resultTitle"><a href="<?= $r['url'] ?>"><?= h($r['title']) ?></a> <span class="resultType">(<?= $r['model'] ?>)</span></div>
		<div class="resultText"><?= $r['body'] ?></div>
	</div>

<? }} else { ?>

	<div class="searchResultsCount noResults">Nothing on our website matched your search for "<?= $searchTerm ?>".  <a href="http://www.google.com.au/search?ie=UTF-8&q=site%3Amadgwicks.com.au+<?= urlencode($searchTerm) ?>">Try Google instead</a>.</div>

<? } ?>


