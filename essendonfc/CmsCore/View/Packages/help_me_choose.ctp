<? 
// COPY THIS FILE INTO THE /app/ FOLDER TO CUSTOMISE (will then override this one)
// WARNING: this page & related script is kinda complicated.  Tried to keep it neat, but it's still a little tangled.
// Speak to Simon for help deciphering.

// Uncomment the following line to dump a list of categories, IDs and categories for easy insertion into the help-me-choose structure
// debug(Hash::combine($package, '{n}.Package.id', '{n}.Package.title', '{n}.PackageCategory.title'));
?>
<script>
var packages = <?= json_encode($package) ?>;	// get the packages from database in JSON format

//------------------------ HELP ME CHOOSE QUESTION STRUCTURE (as JSON) --------------------------------------------------
// Sample questions/packages provided below to get started
// MUST ENSURE that Package IDs are the same on Dev/Staging/Production for this to work correctly
// This might have to be modified to allow for displaying packages with only a subset of the pricing options (won't do this right now tho)
var choices = {
	"q1" : {"q" : "Will you be attending Richmond games in 2013?",
			"a" : {	"Yes" : "q2",		// jumps to q2
					"Maybe" : "q2",		// also jumps to q2
					"No" : "q6"	}},		// jumps to q6
	"q2" : {"q" : "Do you want a reserved seat for every home game?",
			"a" : {	"Yes" : "q3",
					"No" : "q5"	}},
	"q3" : {"q" : "Would you also like access to hear from Assistant Coaches and Current Players before the game, as well as access to two private rooms, where meals can be purchased?",
				"a" : {	"Yes" : 1, 								/* Displays result: package with ID 1, The Tiger Sanctum */
						"No" : "q4"	}},
	"q4" : {"q" : "Where would you like to sit?",
			"a" : {	"Level 1 (open or undercover)" : "q7",
						"Level 2" : 40, 						/* Displays result: package with ID 40, Premiership Circle */
						"Level 2 A (not undercover)" : 35 		/* Displays result: package with ID 35, Premiership Circle */ }},
	"q5" : {"q" : "Where do you live?",
			"a" : {	"Melbourne" : "q9",
					"Victoria (More than 120km from Melbourne)" : 41 /* Country/Interstate */,
					"Interstate" : 41 /* Country/Interstate */,
					"Overseas" : 42 /* International */ }},
	"q6" : {"q" : "Who are you purchasing a membership for?",
			"a" : {	"Adult/Concession" : 43 /* Tiger Insider */,
					"International Adult/Concession" : 44 /* International Membership */,
					"Junior (under 15 years)" : "q9" }},
	"q7" : {"q" : "Would you like a reserved seat for our Etihad Stadium home game?",
			"a" : {	"Yes" : "q8",
					"No" : 44 /* Access Plus */ }},
	"q8" : {"q" : "Did you want to sit undercover?",
			"a" : {	"Yes" : 45 /* Premium Plus */,
					"No" : 46 /* Premium */ }},
	"q9" : {"q" : "Which age range?",
			"a" : { "Baby Tiger 0-1 years" : 47,
					"Tiger Toddler 2-5 years" : 48,
					"Cotchy's Cubs 5-14 years" : 49,
					"Coaches Crew 15-17 years" : 50 }}
};

// Generates empty skeleton HTML structure for a QUESTION screen, filled with content at a later step
function get_empty_question_html(){
	var question_block = 
		  '<div class="questionContracted">'
		+ '	<a href="#">'
		+ '		<div class="questionIndex">Question </div>'
		+ '		<div class="questionChosenAnswer">&nbsp;</div>'
		+ '		<div class="questionText"></div>'
		+ '	</a>'
		+ '</div>'
		+ '<div class="questionExpanded">Question + Answer Goes Here</div>';
	return question_block;
}

// Generates the HTML content for a RESULT screen, showing a package and various pricing options
// Returns an object {q: [string of html], a: [string of html]}
function getPackageHtml(packageIndex) {
	var package = packages[packageIndex];
	
	var output = "<div class='package_details' data-packageindex='" + packageIndex + "' data-packageid='" + package.Package.id + "'>";
	
	output += "<p class='package_title'>" + package.Package.title + "</p>"
			   + "<p class='package_content'>" + package.Package.content + "</p>";
			   
	for (var j = 0; j < package.PackagePricing.length; j++){
		// When a package_pricing is specified				
		// if (a[2] === undefined || a[2] == package.PackagePricing[j].name) {
			// Construct the string to push to Google Analytics
			var googleUrlString = cl("Buy/" + package.Package.title + "/" + package.PackagePricing[j].name + "/" + package.PackagePricing[j].total);  
			output += "<div class='package_pricings'>";	
			output += "<p class='price_name'>" + package.PackagePricing[j].name + "</p>";
			output += "<p class='price_per_month'>" + package.PackagePricing[j].per_month + "</p>";
			output += "<p class='price_total'>" + package.PackagePricing[j].total + "</p>";
			output += "<p class='price_url'><a target='_blank' onclick='google_push(\"" + googleUrlString + "\")' href='" + package.PackagePricing[j].url + "'>Buy Now</a></p>";
			output += "<p class='price_package'><a href='/packages/view/" + package.Package.id + "'>View Package</a></p>";
			output += "</div>";	
		// }
	}
	output += "</div>";
	
	return {'q': '<a href="javascript:void(0)">Suggested Package</a>', 
			'a': output};
}
</script>
<link rel="stylesheet" href="/CORE/afl/css/help_me_choose.css"/>
<script type="text/javascript" src="/CORE/afl/js/help_me_choose.js"></script>

<div id="accordion">
	<!-- DIVs get placed here dynamically using JS -->
</div>


<? /*-------------- Simple JS Unit Tests, append ?test to URL to run the tests ----------------------*/ if (isset($_GET['test'])) { ?>
	<?= $this->QUnit->init() ?>
	<script type="text/javascript">
		// Check that every single "answer" is either a question that exists or a package that exists
		test("Testing that all answers are valid", function() {
			var validPackages = <?= json_encode(Hash::extract($package, '{n}.Package.id')) ?>;
			for (var q in choices) {
				// Check that the question is properly defined
				ok(choices[q].q, 
				   q + ' question is: ' + choices[q].q);
				ok(Object.keys(choices[q].a).length, 
				   q + ' has at least 1 answer');
				for (var answer in choices[q].a) {
					// Test that each answer button links to either another question or a package
					var dest = choices[q].a[answer];
					ok( dest in choices || validPackages.indexOf(String(dest)) > -1,
						q + ': ' + answer + ' --> ' + dest
					);
				}
			}
		});
	</script>
<? } ?>

