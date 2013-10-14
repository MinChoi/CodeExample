;(function($) {
	"use strict";

	var $navigation = $('.navigation');
	if ($navigation.length) {

		var $menu = $navigation.find('.menu-container');
		var $toggle = $('.navigation-toggle');

		$toggle.on('click', function() {
			if ($menu.is(':visible')) {
				$menu.removeClass('navigation-open');
				$toggle.removeClass('toggle-open');
			} else {
				$menu.addClass('navigation-open');
				$toggle.addClass('toggle-open');
			}
		});

	}

/* MOMENT JS -------------------------------------------------------- */
/*
	var getPeriod = function() {
		$('[created]').each(function() {
			$(this).html(moment($(this).attr('created'), "YYYYMMDDHHmm").fromNow());
		});
	};
	getPeriod();
*/

/* CLIENT FORM ------------------------------------------------------ */

	var getClientName = function() {
		setformfieldsize($('#ClientName'), 15, 'name-status')
	};
	getClientName();

/* CLIENT INDEX ----------------------------------------------------- */

	$('.inner-client-grid').on('click', function() {
		if ($(this).attr('client-id') > 0) {
			window.location = '/clients/view/' + $(this).attr('client-id');
		}
	});

/* CLIENT LIST ------------------------------------------------------ */

	$('.clients-list').on('change', function() {
		if ($(this).val() > 0) {
			window.location = '/clients/view/' + $(this).val();
		}
	});


/* CLIENT INVITE / EXISTING USER ------------------------------------ */

	var USER_MODERATOR = 2,
		USER_USER = 3;

	$('#UserInviteForm #UserType, #UserInviteUsersForm #UserType').on('change', function() {
		var tmp_val = $(this).val();
		if (tmp_val == USER_MODERATOR) {
			$('.invite-project-list').hide('fast');
		} else if (tmp_val == USER_USER) {
			$('.invite-project-list').show('fast');
		}
		$('#ProjectProject option').each(function() {
			$(this).prop('selected', '');
		});
	});



	$('.clear-project').on('click', function() {
		$('#ProjectProject option').each(function() {
			$(this).prop('selected', '');
		});
	});

	$('.select-all-project').on('click', function() {
		$('#ProjectProject option').each(function() {
			$(this).prop('selected', 'selected');
		});
	});

/* PROJECT FORM ----------------------------------------------------- */

	var getProjectName = function() {
		setformfieldsize($('#ProjectName'), 28, 'name-status')
	};
	getProjectName();

/* PROJECT LIST ----------------------------------------------------- */

	$('.checkall').on('change', function () {

		var $checked = $(this).is(":checked");

		$('.state').each(function() {
			$(this).prop('checked', $checked);
		});

	});

	$('.states-list .state').on('change', function() {

		var state = $(this),
			states = [];

		// Count of states not checked
		var state_count = $('.states-list .state:not(:checked, .checkall)').size();

		$('.states-list .state:checked').each(function() {
			states.push($(this).attr('value'));
		});

		if (state_count == 0) {
			$('.checkall').prop('checked', true);
		} else {
			$('.checkall').prop('checked', false);
		}

		$.ajax({
			type: "POST",
			url: "/clients/filter/" + state.data('clientid'),
			data: {
				project_status: $('#project_status').val(),
				client_id: state.data('clientid'),
				states: JSON.stringify(states)
			}
		}).done(function(msg) {
			$('.project-list').html(msg);
			
			if ($('.project-list .filter-project').size() == 1) {
				$('.project-count').html('1 project');
			} else {
				$('.project-count').html($('.project-list .filter-project').size() + ' projects');
			}
		});

	});

	$('#project_status').on('change', function() {
		var states = [];
		$('.states-list .state:checked').each(function() {
			states.push($(this).attr('value'));
		});

		window.location = '/clients/view/' + $('#client_id').val() + '/' + $(this).val() + '/' + JSON.stringify(states);
	});

/* PROJECT ASSIGN --------------------------------------------------- */

	$('.clear-user').on('click', function() {
		$('#UserUser option').each(function() {
			$(this).prop('selected', '');
		});
	});

	$('.select-all-user').on('click', function() {
		$('#UserUser option').each(function() {
			$(this).prop('selected', 'selected');
		});
	});

/* FILE LIST -------------------------------------------------------- */

	$('.file-list-count').on('change', function() {
		window.location = '/files/search/?count='+ $(this).val() +'&q=' + $(this).data('query-string');
	});

	$('.file-type').on('click', function() {
		window.location = $(this).attr('link');
	});

	$('.file-list .file-detail').on('click', function() {
		window.open($(this).attr('file-link'));
	});

	$('#file_type_options').on('change', function() {
		window.location = $(this).attr('link') + $(this).val();
	});

/* ACTIONS ---------------------------------------------------------- */

	$('.action-delete-client').on('click', function() {
		if (confirm('Are you sure you want to delete this client?')) {
			window.location = '/clients/delete/' + $(this).data('clientid');
		}
	});

	$('.action-delete-project').on('click', function() {
		if (confirm('Are you sure you want to delete this project?')) {
			window.location = '/clients/' + $(this).data('clientid') + '/projects/delete/' + $(this).data('projectid');
		}
	});

	$('.action-delete-file').on('click', function() {
		if (confirm('Are you sure you want to delete this file?')) {
			window.location = '/clients/' + $(this).data('clientid') + '/projects/' + $(this).data('projectid') + '/files/delete/' +  $(this).data('fileid') + '/' + $('#file_type_id').val();
		}
	});

/* ARCHIVE PROJECT -------------------------------------------------- */

	$('.submit-archive').on('click', function() {
		$('#ProjectIsArchived').val('1');

		if ($('#ProjectArchived').val() == 1)
			$('#ProjectArchived').val(0);
		else
			$('#ProjectArchived').val(1);
	});

/* ADD NEW USER ----------------------------------------------------- */

	$('#UserAddUserForm .checkbox input[type="checkbox"]').on('change', function() {
		
		var client = $(this);

		if (this.checked) {
			$.ajax({
				type: "POST",
				url: "/projects/get_project_list/",
				data: {
					client_id: client.attr('client-id'),
				}
			}).done(function(msg) {
				$('.projects-client-' + client.attr('client-id')).html(msg);
			});			
		} else {
			$('.projects-client-' + client.attr('client-id')).html('');
		}
	});


	$(document).on('change', '.user-clients-projects > .checkbox > input[type="checkbox"]', function() {
	//$('.user-clients-projects > .checkbox > input[type="checkbox"]').on('change', function() {
		var client = $(this),
		projects = $('.projects-client-' + client.attr('client-id'));

		if (this.checked) {
			projects.css('display', 'block');
		} else {
			projects.css('display', 'none');
			projects.find('input[type="checkbox"]').each(function(){
				$(this).prop('checked', false); 
			});
/*
		$('.states-list .state:checked').each(function() {
			states.push($(this).attr('value'));
		});
*/
		}
	});

	var getUserDetail = function() {
		setformfieldsize($('#UserFirstname'), 20, 'firstname-status')
		setformfieldsize($('#UserLastname'), 20, 'lastname-status')
		setformfieldsize($('#UserEmail'), 40, 'email-status')
		setformfieldsize($('#UserTitle'), 20, 'title-status')
	};
	getUserDetail();

/* MANAGE USERS ----------------------------------------------------- */
	
	$('.user-button').on('click', function() {
		var user_id = $(this).attr('user-id');

		if($('.user-row-' + user_id).html()) {
			$('.user-row-' + user_id).html('');
			$(this).removeClass('active');
		} else {
			$(this).addClass('active');
			$.ajax({
				type: "POST",
				url: "/users/get_user_projects",
				data: {
					user_id: user_id
				}
			}).done(function(msg) {
				$('.user-row-' + user_id).html(msg);
				$('.user-row-' + user_id).find('input[type=checkbox]').first().focus();
			});
		}

	});

	$('.user-delete').on('click', function() {
		var user_id = $(this).attr('user-id');
		if (confirm('Are you sure you want to delete this user?')) {
			$('#UserId').val(user_id);
			$('#UserDeleteForm').submit();
		}
	});

	$('.user-management-order').on('click', function() {
		window.location = '/users/management/?orderby=' + $(this).attr('order-by');
	});

	$(document).on('click', '.save-projects-change', function() {
		var user_id = $(this).attr('user-id'),
			client_ids = [],
			project_ids = [];
		/*
		$('.project-user-' + user_id + ' .checkbox > input:checked').each(function() {
			project_ids.push($(this).val());	
		});
		*/
		$('.client-ids > input:checked').each(function() {
			client_ids.push($(this).val());	
		});

		$('.project-ids > input:checked').each(function() {
			project_ids.push($(this).val());	
		});

		$('.user-row-' + user_id + ' .save-projects-icon').css('display', 'inline-block');
		
		$.ajax({
			type: "POST",
			url: "/users/update_user_projects",
			data: {
				user_id: user_id,
				client_ids: JSON.stringify(client_ids),
				project_ids: JSON.stringify(project_ids)
			}
		}).done(function(msg) {
			$('.user-row-' + user_id).html(msg);
		});

	});

/* LOADING ICON ----------------------------------------------------- */

	var disableSubmit = function() {
		$('.loading-icon').css('display', 'inline-block');
		$('.submit input[type=submit]').attr('disabled', 'disabled');
	}
	
	$('#ClientEditForm').on('submit', function() { disableSubmit(); });
	$('#ProjectEditForm').on('submit', function() { disableSubmit(); });
	$('#UserAddModeratorForm').on('submit', function() { disableSubmit(); });
	$('#UserAddUserForm').on('submit', function() { disableSubmit(); });
	$('#UserEditForm').on('submit', function() { disableSubmit(); });
	$('#UserRegisterForm').on('submit', function() { disableSubmit(); });
	$('#UserForgotPasswordForm').on('submit', function() { disableSubmit(); });
	
	$('#FileAddForm input[type=submit]').on('click', function(e) {
		if (!$.trim($('#FileName').val())) {
			$('#FileName').focus();
			alert('Please insert name of the file(s)');
			return false;
		}

		if ($('#uploader_filelist > .plupload_delete').length == 0) {
			alert('Please choose file(s) you want to upload.');
			return false;
		}

		e.preventDefault(); 
		$('.plupload_start').trigger('click');
		$('.loading-icon').css('display', 'inline-block');
		$('.submit input[type=submit]').attr('disabled', 'disabled');
		return false;
	});

}(jQuery));
