<?
// Lists the types of people (staff) and links to a list of each (in the left sidebar)
// Extends sidebar_list element

echo $this->element('frontend/sidebar_list', array(
	'title' => 'Our People', 
	'items' => array(
		'/people/partners' => 'Partners',
		'/people/consultants' => 'Consultants',
		'/people/special_counsel' => 'Special Counsel',
		'/people/senior_associates' => 'Senior Associates',
		'/people/lawyers' => 'Lawyers',
		'/people/law_clerks' => 'Law Clerks',
	)
));

