<?
// Lists the types of event items and links to a list of each (in the left sidebar)
// Extends sidebar_list element

echo $this->element('frontend/sidebar_list', array(
	// 'title' => 'Events', 
	'items' => array(
		'/events' => 'Events',
		'/events/past' => 'Past Events',
	)
));

