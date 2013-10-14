<? 
// COPY THIS FILE INTO THE /app/ FOLDER TO CUSTOMISE (will then override this one)
// WARNING: this page & related script is kinda complicated.  Tried to keep it neat, but it's still a little tangled.
// Speak to Simon for help deciphering.

// Uncomment the following line to dump a list of categories, IDs and categories for easy insertion into the help-me-choose structure
// debug(Hash::combine($package, '{n}.Package.id', '{n}.Package.title', '{n}.PackageCategory.title'));
?>
<script>
var packages = <?=json_encode($package) ?>;	// get the packages from database in JSON format

//------------------------ HELP ME CHOOSE QUESTION STRUCTURE (as JSON) --------------------------------------------------
// Sample questions/packages provided below to get started
// MUST ENSURE that Package IDs are the same on Dev/Staging/Production for this to work correctly
// This might have to be modified to allow for displaying packages with only a subset of the pricing options (won't do this right now tho)
var choices = {
	"q1" : {"q" : "Are you buying for a child under age 14?",
			"a" : {	"Yes" : "q9",		
					"No" : "q2"	}},		
	"q2" : {"q" : "Will you attend Essendon games in 2013?",
			"a" : {	"Yes" : "q3",
					"No" : "q4"	}},
	"q3" : {"q" : "Where do you live?",
			"a" : {	"VIC" : "q5", 
			"NSW, SA" : 132,
			"QLD": 131, 
			"WA": 119, 
						"TAS, NT, ACT" : 117			
						
						}},
	"q4" : {"q" : "Would you like to receive additional premium items in your membership pack?",
			"a" : {	"Yes" : 120,
					"No" : 121
						}},
	"q5" : {"q" : "How many games will you attend?",
			"a" : {	"3 Games or less" : 117,
					"More than 3 games" : "q6" 
					}},
	"q6" : {"q" : "Do you want a reserved seat at Essendon home games played at Etihad Stadium?",
			"a" : {	"Yes" : "q7", 
					"No" : 116
				}},
	"q7" : {"q" : "Do you want guaranteed access to GF tickets when Essendon is participating?",
			"a" : {	"Yes" : 111,
					"No" : 'q8' /* Access Plus */ }},
	"q8" : {"q" : "Do you want a reserved seat at Essendon home games played at the MCG?",
			"a" : {	"Yes" : 112 /* Premium Plus */,
					"No" : 113 /* Premium */ }},
	"q9" : {"q" : "Which age range?",
			"a" : { "Child aged 0-1" : 124,
					"Child aged 2-5" : 123,
					"Child aged 6-14" : 122
					}}
};

// Generates empty skeleton HTML structure for a QUESTION screen, filled with content at a later step
function get_empty_question_html(){
	var question_block = 
		  '<div class="questionContracted">'
		+ '	<a href="#">'
		+ '		<div class="questionIndex">Question </div>'
		+ '		<div class="questionChosenAnswer hidden-phone"></div>'
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
	
	if (package.PackagePricing.length > 0) {
	
		var output = "<div class='package_details' data-packageindex='" + packageIndex + "' data-packageid='" + package.Package.id + "'>";
		output += "<h3 style=\"color: #C90427\">" + package.Package.title + "</h3>"
				   + "<div class='con_left'><div class='package_content'>" + package.Package.short_desc + "</div>";
		output += "<div class='package_links'><a href='/packages/view/" + package.Package.id + "' class='about-package'></a></div>";
		
		if (package.Package.ticketing_url != "") {
			output += "<div class='package_links'><a href='" + package.Package.ticketing_url + "' class='buy-package'></a></div>"
		}
		
		output += "</div>";
		// output += "<div class='package_pricings p_heading'>";
		// output += "<p class='package_pricing_heading2'>TOTAL</p>";
		// output += "<p class='package_pricing_heading1'>PER MONTH</p></div>";
		
		output += "<table class='package_pricings'>";
		
		output += "<tr class='pricings_header'>PRICINGSHEADER";
		
		var pricings_header = "<th></th>";
		// pricings_header += "<th></th>";
		pricings_header += "<th class='package_pricing_heading1'>PER MONTH</th>";
		pricings_header += "<th class='package_pricing_heading2'>TOTAL</th>";
		
		
		if (package.Package.ticketing_url == "") {
			pricings_header += "<th></th>";
		}
		
		output += "</tr>";
		
		var group = '';
		var oldgroup = '';
		// for (var j = 0; j < package.PackagePricing.length; j++){
		for (var x in package.PackagePricing) {
			pricing = package.PackagePricing[x];
			
			parts = pricing.name.split(' - ');
			
			if (parts.length > 1) {
			
				if (x < 1) { // Only on the first iteration. Hey, it's messy enough already, right? Who cares.
					pricings_header = "<th></th>" + pricings_header;
				}
				name = parts[1];
				group = parts[0];
				
				if (group != oldgroup) {
					group_td = "<td>" + group + "</td>";
					
					oldgroup = group;
				} else {
					group_td = "<td></td>";
				}
			} else {
				group_td = "";
				name = pricing.name;
			}
						
			// When a package_pricing is specified				
			// if (a[2] === undefined || a[2] == package.PackagePricing[j].name) {
				// Construct the string to push to Google Analytics
				var googleUrlString = cl("Buy/" + package.Package.title + "/" + pricing.name + "/" + pricing.total);  
				// output += "<div class='package_pricings'>";	
				// output += "<p class='price_name'>" + package.PackagePricing[j].name + "</p>";
				// output += "<p class='price_total'>$" + package.PackagePricing[j].total + "</p>";
				// output += "<p class='price_per_month'>$" + package.PackagePricing[j].per_month + "</p>";
				// output += "</div>"
				output += "<tr>";
				output += group_td;
				output += "<td class='price_name'>" + name + "</td>";
				output += "<td class='price_per_month'>$" + pricing.per_month + "</td>";
				output += "<td class='price_total'>$" + pricing.total + "</td>";
				
				if (pricing.url != "") {
					output += '<td class="price_buy"><a class="btn btn-danger-small" target="_blank" onclick="google_push(\'' + googleUrlString + '\')" href="' + pricing.url + '">Buy</a></td>';
				}
				
				output += "</tr>";
			// }
		}
		output += "</table>";	
		output += "</div>";
	
		output = output.replace('PRICINGSHEADER', pricings_header);
	
	} else {
	
		var output = "<div class='package_details' data-packageindex='" + packageIndex + "' data-packageid='" + package.Package.id + "'>";
		output += "<h3 style=\"color: #C90427\">" + package.Package.title + "</h3>"
				   + "<div class='package_content'>" + package.Package.content + "</div>";
		output += "<div class='package_links'><a href='#' class='about-package'></a><a href='#' class='buy-package'></a></div>";
		
	}
	
	return {'q': '<a href="javascript:void(0)">Suggested Package</a>', 
			'a': output};
}
</script>
<script type="text/javascript" src="/CORE/afl/js/help_me_choose.js"></script>
	<div class="span12">
		<h1 class='h1_hmc'>Help Me Choose</h1>
	</div>
	<div class="span12">
		<div id="accordion">
		<!-- DIVs get placed here dynamically using JS -->
		</div>
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

