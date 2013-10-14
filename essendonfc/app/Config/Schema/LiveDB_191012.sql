-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: m4-mysql1-1.ilisys.com.au
-- Generation Time: Oct 19, 2012 at 11:23 AM
-- Server version: 5.1.62
-- PHP Version: 5.2.17-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `membewi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `essendon_administrator_notes`
--

CREATE TABLE IF NOT EXISTS `essendon_administrator_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `description` mediumtext NOT NULL,
  `created_by` mediumint(9) NOT NULL,
  `modified_by` mediumint(9) NOT NULL,
  `object_type` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `essendon_api_classes`
--

CREATE TABLE IF NOT EXISTS `essendon_api_classes` (
  `id` varchar(36) NOT NULL,
  `api_package_id` varchar(36) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `file_name` text,
  `method_index` text,
  `property_index` text,
  `flags` int(5) DEFAULT '0',
  `coverage_cache` float(4,4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `api_package_id` (`api_package_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Used for generating PHP documentation';

--
-- Dumping data for table `essendon_api_classes`
--

INSERT INTO `essendon_api_classes` (`id`, `api_package_id`, `name`, `slug`, `file_name`, `method_index`, `property_index`, `flags`, `coverage_cache`, `created`, `modified`) VALUES
('4fe7c2aa-f4c0-43d5-846f-150058da60bd', NULL, 'DATABASE_CONFIG', 'd-a-t-a-b-a-s-e--c-o-n-f-i-g', 'D:\\Dev\\Core\\Site\\app\\Config\\database.php', '__construct __construct', 'default staging surfacedev default staging surfacedev', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-5118-4aac-87f4-150058da60bd', NULL, 'EmailConfig', 'email-config', 'D:\\Dev\\Core\\Site\\app\\Config\\email.php', '', 'default default', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-042c-4390-8e6a-150058da60bd', NULL, 'AppSchema', 'app-schema', 'D:\\Dev\\Core\\Site\\app\\Config\\sql\\schema.php', 'before after before after', 'name acos aros aros_acos groups news posts users name acos aros aros_acos groups news posts users', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-1758-4945-8188-150058da60bd', '4fe7c2aa-5e14-4626-9833-150058da60bd', 'AppShell', 'app-shell', 'D:\\Dev\\Core\\Site\\app\\Console\\Command\\AppShell.php', '', '', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-101c-4812-a93e-150058da60bd', '4fe7c2aa-efec-445d-a52e-150058da60bd', 'Controller', 'controller', 'D:\\Dev\\Core\\Site\\lib\\Cake\\Controller\\Controller.php', '__construct __isset __get __set setrequest invokeaction _isprivateaction _getscaffold _mergecontrollervars _mergeuses implementedevents constructclasses geteventmanager startupprocess shutdownprocess httpcodes loadmodel redirect _parsebeforeredirect header set setaction validate validateerrors render referer disablecache flash postconditions paginate beforefilter beforerender beforeredirect afterfilter beforescaffold _beforescaffold afterscaffoldsave _afterscaffoldsave afterscaffoldsaveerror _afterscaffoldsaveerror scaffolderror _scaffolderror __construct __isset __get __set setrequest invokeaction _isprivateaction _getscaffold _mergecontrollervars _mergeuses implementedevents constructclasses geteventmanager startupprocess shutdownprocess httpcodes loadmodel redirect _parsebeforeredirect header set setaction validate validateerrors render referer disablecache flash postconditions paginate beforefilter beforerender beforeredirect afterfilter beforescaffold _beforescaffold afterscaffoldsave _afterscaffoldsave afterscaffoldsaveerror _afterscaffoldsaveerror scaffolderror _scaffolderror', 'name uses helpers request response _responseclass viewpath layoutpath viewvars view layout autorender autolayout components components viewclass view ext plugin cacheaction passedargs scaffold methods modelclass modelkey validationerrors _mergeparent _eventmanager name uses helpers request response _responseclass viewpath layoutpath viewvars view layout autorender autolayout components components viewclass view ext plugin cacheaction passedargs scaffold methods modelclass modelkey validationerrors _mergeparent _eventmanager', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-6824-4398-9116-150058da60bd', NULL, 'AppController', 'app-controller', 'D:\\Dev\\Core\\Site\\app\\Controller\\AppController.php', '_sslcheck _sslcheck', 'helpers helpers', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-68e8-4542-ad39-150058da60bd', NULL, 'CmsCoreController', 'cms-core-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\CmsCoreController.php', '__construct set setsafe pagetitle beforefilter checkpermissions redirecttologin setpagetitleandmetatags admin_index admin_clear_list_vars admin_filter _multiupdate admin_publish admin_unpublish admin_show admin_hide admin_deletemany admin_add admin_copy admin_clearfilters admin_edit admin_preview _sendadditionalmodeltotemplate _handleupload _filter get_browser_class returnjson __construct set setsafe pagetitle beforefilter checkpermissions redirecttologin setpagetitleandmetatags admin_index admin_clear_list_vars admin_filter _multiupdate admin_publish admin_unpublish admin_show admin_hide admin_deletemany admin_add admin_copy admin_clearfilters admin_edit admin_preview _sendadditionalmodeltotemplate _handleupload _filter get_browser_class returnjson', 'theme_admin paginate theme_admin paginate', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-5e90-44ed-a799-150058da60bd', NULL, 'CorePagesController', 'core-pages-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\CorePagesController.php', 'display admin_preprocessor admin_listsection admin_listsubsection admin_homepage admin_spindex admin_view admin_add admin_test admin_edit admin_delete admin_deleteall admin_listdeleteall admin_getsitemap admin_orderchange admin_orderchangeall admin_getporder admin_ajaxadd admin_ajaxcopy admin_preview display admin_preprocessor admin_listsection admin_listsubsection admin_homepage admin_spindex admin_view admin_add admin_test admin_edit admin_delete admin_deleteall admin_listdeleteall admin_getsitemap admin_orderchange admin_orderchangeall admin_getporder admin_ajaxadd admin_ajaxcopy admin_preview', 'uses helpers uses helpers', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-274c-459a-9fb1-150058da60bd', NULL, 'PagesController', 'pages-controller', 'D:\\Dev\\Core\\Site\\app\\Controller\\PagesController.php', 'home home', '', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-b754-406b-8ed1-150058da60bd', NULL, 'AppModel', 'app-model', 'D:\\Dev\\Core\\Site\\app\\Model\\AppModel.php', 'deconstruct flatquery getuserdata getuserid deconstruct flatquery getuserdata getuserid', 'actsas adminfilters actsas adminfilters', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-daa4-407e-a127-150058da60bd', '4fe7c2aa-7ab4-4826-ad18-150058da60bd', 'Helper', 'helper', 'D:\\Dev\\Core\\Site\\lib\\Cake\\View\\Helper.php', '__construct __call __get __set url webroot asseturl assettimestamp clean _parseattributes _formatattribute setentity entity model field domid _name value _initinputfield addclass output beforerender afterrender beforelayout afterlayout beforerenderfile afterrenderfile _selectedarray _reset _clean __construct __call __get __set url webroot asseturl assettimestamp clean _parseattributes _formatattribute setentity entity model field domid _name value _initinputfield addclass output beforerender afterrender beforelayout afterlayout beforerenderfile afterrenderfile _selectedarray _reset _clean', 'helpers _helpermap theme request plugin fieldset tags _tainted _cleaned _view _fieldsuffixes _modelscope _association _entitypath _minimizedattributes helpers _helpermap theme request plugin fieldset tags _tainted _cleaned _view _fieldsuffixes _modelscope _association _entitypath _minimizedattributes', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-0c98-4171-af47-150058da60bd', '4fe7c2aa-9e3c-4451-8bfa-150058da60bd', 'AppHelper', 'app-helper', 'D:\\Dev\\Core\\Site\\app\\View\\Helper\\AppHelper.php', 'output output', '', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-2614-4d2e-967f-150058da60bd', NULL, 'core.php', 'core.php', 'D:\\Dev\\Core\\Site\\CmsCore\\core.php', 'FatalErrorTemplate SecureDomain isStaging isLocalDev isProduction mysql_date dlog plural singular array_merge_recursive_simple array_remove array_assoc', NULL, 1, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-1ef4-474f-82de-150058da60bd', NULL, 'AdminAjaxController', 'admin-ajax-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\AdminAjaxController.php', 'admin_ajaxadd admin_deletemany admin_updatelist admin_update admin_index admin_add admin_edit admin_delete admin_ajaxadd admin_deletemany admin_updatelist admin_update admin_index admin_add admin_edit admin_delete', 'helpers helpers', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-9944-484f-8ec7-150058da60bd', NULL, 'AdministratorNotesController', 'administrator-notes-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\AdministratorNotesController.php', 'admin_index admin_view preprocess admin_add admin_edit admin_delete admin_index admin_view preprocess admin_add admin_edit admin_delete', 'helpers uses helpers uses', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-7af0-4c5a-8ffc-150058da60bd', NULL, 'ContactUsController', 'contact-us-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\ContactUsController.php', 'index index', 'uses helpers uses helpers', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-e03c-4574-8bb1-150058da60bd', NULL, 'EventRegistrationsController', 'event-registrations-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\EventRegistrationsController.php', 'admin_change_status admin_change_paid_status admin_remove index regevents view add non_member_event_register member_event_register sendemailnotifyforpassword rsvp_forgotpassword login_rsvp login_rsvp_event_reg member_payment pay_now_member_event non_member_payment updateeventfilled rsvp_free_event reg_success price_extraction get_event_page_detials edit delete admin_index admin_view admin_add admin_edit admin_delete sendeventregnottoadminemail sendmembereventregapproveltoadmin sendnonmemberregemail sendmemberregemail sendrsvpfreeeventemail sendrsvppaideventemail admin_get_registered_members sendrsvpeventinvoiceemail event_reminder_notice sendeventremindernotice admin_change_status admin_change_paid_status admin_remove index regevents view add non_member_event_register member_event_register sendemailnotifyforpassword rsvp_forgotpassword login_rsvp login_rsvp_event_reg member_payment pay_now_member_event non_member_payment updateeventfilled rsvp_free_event reg_success price_extraction get_event_page_detials edit delete admin_index admin_view admin_add admin_edit admin_delete sendeventregnottoadminemail sendmembereventregapproveltoadmin sendnonmemberregemail sendmemberregemail sendrsvpfreeeventemail sendrsvppaideventemail admin_get_registered_members sendrsvpeventinvoiceemail event_reminder_notice sendeventremindernotice', 'name helpers components uses name helpers components uses', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-a5c4-459d-8c10-150058da60bd', NULL, 'EventsController', 'events-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\EventsController.php', 'beforefilter search index past view register prefill_registration_details registration_complete admin_edit admin_send_reminder _send_reminder beforefilter search index past view register prefill_registration_details registration_complete admin_edit admin_send_reminder _send_reminder', 'name helpers uses name helpers uses', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-1db4-4f65-a261-150058da60bd', NULL, 'FrontendLoginController', 'frontend-login-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\FrontendLoginController.php', 'login portal getuserbyemail logout debug lost_password reset_password change_password randstring base_encode login portal getuserbyemail logout debug lost_password reset_password change_password randstring base_encode', 'uses components clientportalurl staffportalurl uses components clientportalurl staffportalurl', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-dd8c-4097-bfc6-150058da60bd', NULL, 'NewsCategoriesController', 'news-categories-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\NewsCategoriesController.php', '', '', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-55c4-4fa9-803d-150058da60bd', NULL, 'NewsController', 'news-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\NewsController.php', 'index category view search admin_edit admin_gaction admin_preview index category view search admin_edit admin_gaction admin_preview', 'paginate news_content_types paginate news_content_types', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-1ee0-40d0-964c-150058da60bd', NULL, 'PaypalController', 'paypal-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\PaypalController.php', 'checkout cancel confirmation checkout cancel confirmation', 'uses components autorender uses components autorender', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-1360-4b39-b841-150058da60bd', NULL, 'PaypalController.php', 'paypal-controller.php', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\PaypalController.php', 'SetExpressCheckoutDG GetExpressCheckoutDetails ConfirmPayment hash_call RedirectToPayPal RedirectToPayPalDG getApiDetails deformatNVP', NULL, 1, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-c780-499a-a392-150058da60bd', NULL, 'PublicUploadController', 'public-upload-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\PublicUploadController.php', 'index image _returnjson index image _returnjson', 'uses helpers tempfolder autorender uses helpers tempfolder autorender', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-c508-477c-b4f1-150058da60bd', NULL, 'ReportsController', 'reports-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\ReportsController.php', 'admin_index admin_delete admin_configure admin_ajax_report_info get_report_type_info admin_run query admin_save admin_export admin_index admin_delete admin_configure admin_ajax_report_info get_report_type_info admin_run query admin_save admin_export', 'uses uses', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-7e04-42b4-a2ab-150058da60bd', NULL, 'ReportSQL', 'report-s-q-l', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\ReportsController.php', '__construct getcolumns getnumrows addfilter orderby getsql __construct getcolumns getnumrows addfilter orderby getsql', 'paramlist paramvalues filterstring sql paramregex paramlist paramvalues filterstring sql paramregex', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-fd44-41f9-835d-150058da60bd', NULL, 'SearchController', 'search-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\SearchController.php', 'bytag bykeyword formatresults getlistoftags bytag bykeyword formatresults getlistoftags', 'uses models uses models', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-bd38-4349-a804-150058da60bd', NULL, 'SettingTypesController', 'setting-types-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\SettingTypesController.php', 'admin_getlist admin_index admin_view admin_add admin_edit admin_delete admin_deleteall admin_seo admin_media admin_payments admin_templates admin_notifications admin_general admin_getlist admin_index admin_view admin_add admin_edit admin_delete admin_deleteall admin_seo admin_media admin_payments admin_templates admin_notifications admin_general', 'helpers helpers', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-07bc-4074-b6c2-150058da60bd', NULL, 'SitemapsController', 'sitemaps-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\SitemapsController.php', 'admin_list admin_draw admin_getlabel admin_settings admin_list admin_draw admin_getlabel admin_settings', 'name helpers name helpers', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-1508-474e-92f0-150058da60bd', NULL, 'TagsController', 'tags-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\TagsController.php', 'admin_list admin_rbin admin_index admin_view admin_add admin_trash admin_untrash admin_deletemany admin_ajaxadd admin_edit admin_delete admin_update autocomplete admin_getid admin_list admin_rbin admin_index admin_view admin_add admin_trash admin_untrash admin_deletemany admin_ajaxadd admin_edit admin_delete admin_update autocomplete admin_getid', 'helpers paginate helpers paginate', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-83bc-4d45-a566-150058da60bd', NULL, 'UsersController', 'users-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Controller\\UsersController.php', 'beforefilter admin_forgotpassword admin_index admin_view admin_save admin_edit admin_delete admin_login admin_logout admin_list login beforefilter admin_forgotpassword admin_index admin_view admin_save admin_edit admin_delete admin_login admin_logout admin_list login', 'components helpers _mergeparent components helpers _mergeparent', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-7a40-4857-862c-150058da60bd', NULL, 'AdministratorNode', 'administrator-node', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\AdministratorNode.php', '', 'usetable validate belongsto usetable validate belongsto', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-b138-4355-8116-150058da60bd', NULL, 'CmsCoreModel', 'cms-core-model', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\CmsCoreModel.php', 'fieldmatches deconstruct flatquery getuserdata getuserid distinct fieldmatches deconstruct flatquery getuserdata getuserid distinct', '', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-1844-4e34-abaa-150058da60bd', NULL, 'Event', 'event', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Event.php', 'filter_pastorfuture getlatest filter_pastorfuture getlatest', 'actsas adminfilters adminsortoptions adminkeywordsearchfields validate order hasmany belongsto hasandbelongstomany actsas adminfilters adminsortoptions adminkeywordsearchfields validate order hasmany belongsto hasandbelongstomany', 2, NULL, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2ab-aef8-4845-82ee-150058da60bd', NULL, 'EventRegistration', 'event-registration', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\EventRegistration.php', '', 'validate belongsto validate belongsto', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-94b0-4caf-a52a-150058da60bd', NULL, 'FixedMenu', 'fixed-menu', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\FixedMenu.php', 'updateorder getsitemap getlist getfixednav updateorder getsitemap getlist getfixednav', 'name name', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-9fa8-4c9e-93d4-150058da60bd', NULL, 'KeyValue', 'key-value', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\KeyValue.php', 'getall get set getall get set', 'usetable displayfield usetable displayfield', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-4084-4d1d-830b-150058da60bd', NULL, 'News', 'news', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\News.php', 'getlatest getlatest', 'actsas validate order adminfilters adminsortoptions adminkeywordsearchfields belongsto hasandbelongstomany actsas validate order adminfilters adminsortoptions adminkeywordsearchfields belongsto hasandbelongstomany', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-a898-4195-b69c-150058da60bd', NULL, 'NewsCategory', 'news-category', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\NewsCategory.php', '', 'hasmany hasmany', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-0d44-40f0-be35-150058da60bd', NULL, 'Page', 'page', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Page.php', 'getadminfilters filter_page_or_link filter_section beforesave updatechildpages updatemembergroup issubpage updateorder spldetele itemdelete getallsubsections getchildpages getsitemap listsection sub getnav getparents getparent getadminfilters filter_page_or_link filter_section beforesave updatechildpages updatemembergroup issubpage updateorder spldetele itemdelete getallsubsections getchildpages getsitemap listsection sub getnav getparents getparent', 'actsas adminfilters adminsortoptions adminkeywordsearchfields validate hasone belongsto hasmany hasandbelongstomany actsas adminfilters adminsortoptions adminkeywordsearchfields validate hasone belongsto hasmany hasandbelongstomany', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-3e84-45aa-bd09-150058da60bd', NULL, 'Report', 'report', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Report.php', 'beforesave afterfind beforesave afterfind', 'order belongsto order belongsto', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-14c0-4a47-9fed-150058da60bd', NULL, 'ReportType', 'report-type', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\ReportType.php', '', 'hasmany order hasmany order', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-7a7c-4a1a-8f21-150058da60bd', NULL, 'Setting', 'setting', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Setting.php', 'savesettings readsettings readsettingsbyname savesettings readsettings readsettingsbyname', 'name validate belongsto name validate belongsto', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-dbac-46b1-8baa-150058da60bd', NULL, 'SettingType', 'setting-type', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\SettingType.php', 'aftersave afterdelete aftersave afterdelete', 'name validate hasmany name validate hasmany', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-a310-4a76-87e7-150058da60bd', NULL, 'Sitemap', 'sitemap', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Sitemap.php', 'makevisible makeallhidden getlabel sitemaplist makevisible makeallhidden getlabel sitemaplist', 'name validate hasmany name validate hasmany', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-4ce8-4ad0-98e3-150058da60bd', NULL, 'Tag', 'tag', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Tag.php', '', 'validate hasandbelongstomany validate hasandbelongstomany', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-06a0-4284-ac4b-150058da60bd', NULL, 'User', 'user', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\User.php', 'confirmpassword parentnode adminlist confirmpassword parentnode adminlist', 'displayfield validate actsas belongsto displayfield validate actsas belongsto', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-c88c-4c38-b27f-150058da60bd', NULL, 'Widget', 'widget', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Widget.php', 'getlist getdefaultselected applysubpages applycategory getlist getdefaultselected applysubpages applycategory', 'name validate hasandbelongstomany name validate hasandbelongstomany', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-bb1c-4f54-9e66-150058da60bd', NULL, 'AdminFiltersBehavior', 'admin-filters-behavior', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Behavior\\AdminFiltersBehavior.php', 'setup getadminfilters filterstoconditions filter_user distinct setup getadminfilters filterstoconditions filter_user distinct', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-3df4-4c07-816f-150058da60bd', NULL, 'HasAdminNotesBehavior', 'has-admin-notes-behavior', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Behavior\\HasAdminNotesBehavior.php', 'setup setup', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-d648-4f9a-87c6-150058da60bd', NULL, 'HasTagsBehavior', 'has-tags-behavior', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Behavior\\HasTagsBehavior.php', 'setup beforesave setup beforesave', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-c040-4f9c-beee-150058da60bd', NULL, 'HideUnpublishedFromPublicBehavior', 'hide-unpublished-from-public-behavior', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Behavior\\HideUnpublishedFromPublicBehavior.php', 'beforefind setup beforefind setup', 'hidefrompublic hidefrompublic', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-f9cc-4020-84f6-150058da60bd', NULL, 'SaveModifiedByBehavior', 'save-modified-by-behavior', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Behavior\\SaveModifiedByBehavior.php', 'setup beforesave setup beforesave', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-3374-4918-b85c-150058da60bd', NULL, 'WeightedBehavior', 'weighted-behavior', 'D:\\Dev\\Core\\Site\\CmsCore\\Model\\Behavior\\WeightedBehavior.php', 'beforefind beforefind', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-d394-4265-9eae-150058da60bd', NULL, 'TestsController', 'tests-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\Cuploadify\\Controller\\TestsController.php', 'upload upload', 'uses components helpers uses components helpers', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-a4a4-49b2-a976-150058da60bd', '4fe7c2ab-d614-4408-adfb-150058da60bd', 'BenchmarkShell', 'benchmark-shell', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Console\\Command\\BenchmarkShell.php', 'main _results _variance _deviation help main _results _variance _deviation help', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-1354-43d5-94ea-150058da60bd', '4fe7c2ab-4854-4afd-8ba2-150058da60bd', 'WhitespaceShell', 'whitespace-shell', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Console\\Command\\WhitespaceShell.php', 'main trim getoptionparser main trim getoptionparser', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-1c30-41a6-9882-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'DebugKitAppController', 'debug-kit-app-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Controller\\DebugKitAppController.php', '', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-f050-42ea-b65c-150058da60bd', '4fe7c2ab-436c-4825-906d-150058da60bd', 'ToolbarAccessController', 'toolbar-access-controller', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Controller\\ToolbarAccessController.php', 'beforefilter history_state sql_explain beforefilter history_state sql_explain', 'name helpers components uses name helpers components uses', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-e104-4911-9e24-150058da60bd', '4fe7c2ab-9ff0-4c4d-a573-150058da60bd', 'Debugger', 'debugger', 'D:\\Dev\\Core\\Site\\lib\\Cake\\Utility\\Debugger.php', '__construct getinstance dump log showerror trace trimpath excerpt _highlight exportvar _export _array _object outputas addformat output outputerror gettype checksecuritykeys __construct getinstance dump log showerror trace trimpath excerpt _highlight exportvar _export _array _object outputas addformat output outputerror gettype checksecuritykeys', 'errors _outputformat _templates _data errors _outputformat _templates _data', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-3b7c-4790-93fc-150058da60bd', NULL, 'DebugKitDebugger', 'debug-kit-debugger', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\DebugKitDebugger.php', '__destruct starttimer stoptimer gettimers cleartimers elapsedtime requesttime requeststarttime getmemoryuse getpeakmemoryuse setmemorypoint getmemorypoints clearmemorypoints fireerror __destruct starttimer stoptimer gettimers cleartimers elapsedtime requesttime requeststarttime getmemoryuse getpeakmemoryuse setmemorypoint getmemorypoints clearmemorypoints fireerror', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-5120-4fa4-8e8e-150058da60bd', '4fe7c2ab-ad38-4901-86b0-150058da60bd', 'DebugMemory', 'debug-memory', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\DebugMemory.php', 'getcurrent getpeak record getall clear getcurrent getpeak record getall clear', '__points __points', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-71ec-462b-9c1e-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'DebugPanel', 'debug-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\DebugPanel.php', '__construct startup beforerender __construct startup beforerender', 'plugin title elementname plugin title elementname', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-0a38-46a1-b37f-150058da60bd', '4fe7c2ab-ad38-4901-86b0-150058da60bd', 'DebugTimer', 'debug-timer', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\DebugTimer.php', 'start stop getall clear elapsedtime requesttime requeststarttime start stop getall clear elapsedtime requesttime requeststarttime', '__timers __timers', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-ccc0-472c-8429-150058da60bd', NULL, 'FireCake', 'fire-cake', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\FireCake.php', 'getinstance setoptions detectclientextension getuseragent disable enable log warn info error table dump trace group groupend fb _parsetrace _escapetrace stringencode jsonencode _sendheader getinstance setoptions detectclientextension getuseragent disable enable log warn info error table dump trace group groupend fb _parsetrace _escapetrace stringencode jsonencode _sendheader', 'options _defaultoptions _levels _version _messageindex _encodedobjects _methodindex _enabled options _defaultoptions _levels _version _messageindex _encodedobjects _methodindex _enabled', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-f854-4492-b71f-150058da60bd', NULL, 'FireCake.php', 'fire-cake.php', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\FireCake.php', 'firecake', NULL, 1, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-a2dc-439a-b6f8-150058da60bd', NULL, 'DebugKitLogListener.php', 'debug-kit-log-listener.php', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Log\\Engine\\DebugKitLogListener.php', 'firecake', NULL, 1, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-1b78-4af6-938b-150058da60bd', '4fe7c2ab-6168-4103-b8b2-150058da60bd', 'HistoryPanel', 'history-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Panel\\HistoryPanel.php', '__construct beforerender __construct beforerender', 'history history', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-0e00-4169-8f4d-150058da60bd', '4fe7c2ab-6168-4103-b8b2-150058da60bd', 'IncludePanel', 'include-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Panel\\IncludePanel.php', '__construct beforerender _includepaths _iscorefile _isappfile _ispluginfile _nicefilename _getfiletype __construct beforerender _includepaths _iscorefile _isappfile _ispluginfile _nicefilename _getfiletype', '_pluginpaths _filetypes _pluginpaths _filetypes', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-9ce4-4960-bda3-150058da60bd', '4fe7c2ab-6168-4103-b8b2-150058da60bd', 'LogPanel', 'log-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Panel\\LogPanel.php', '__construct beforerender __construct beforerender', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-27a0-4600-b537-150058da60bd', '4fe7c2ab-6168-4103-b8b2-150058da60bd', 'RequestPanel', 'request-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Panel\\RequestPanel.php', 'beforerender beforerender', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-b388-4eed-9ac8-150058da60bd', '4fe7c2ab-6168-4103-b8b2-150058da60bd', 'SessionPanel', 'session-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Panel\\SessionPanel.php', 'beforerender beforerender', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-8c64-480a-bace-150058da60bd', '4fe7c2ab-6168-4103-b8b2-150058da60bd', 'SqlLogPanel', 'sql-log-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Panel\\SqlLogPanel.php', 'beforerender beforerender', 'slowrate slowrate', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-0bcc-4eec-8a01-150058da60bd', '4fe7c2ab-6168-4103-b8b2-150058da60bd', 'TimerPanel', 'timer-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Panel\\TimerPanel.php', 'startup startup', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-987c-4fc6-8bc5-150058da60bd', '4fe7c2ab-6168-4103-b8b2-150058da60bd', 'VariablesPanel', 'variables-panel', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Lib\\Panel\\VariablesPanel.php', 'beforerender beforerender', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-e604-416f-b41e-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'DebugKitAppModel', 'debug-kit-app-model', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Model\\DebugKitAppModel.php', '', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-7cdc-46d3-8ab6-150058da60bd', '4fe7c2ab-436c-4825-906d-150058da60bd', 'ToolbarAccess', 'toolbar-access', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Model\\ToolbarAccess.php', 'explainquery explainquery', '', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-814c-4bd3-a50d-150058da60bd', '4fe7c2ab-c660-468c-bfa4-150058da60bd', 'TimedBehavior', 'timed-behavior', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\Model\\Behavior\\TimedBehavior.php', 'setup beforefind afterfind beforesave aftersave setup beforefind afterfind beforesave aftersave', 'settings _defaults settings _defaults', 2, NULL, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ac-a640-4f7d-8b0e-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'DebugTimerHelper', 'debug-timer-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\View\\Helper\\DebugTimerHelper.php', '__construct beforerenderfile afterrenderfile afterlayout __construct beforerenderfile afterrenderfile afterlayout', '_rendercomplete _rendercomplete', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-6b38-48de-ad6e-150058da60bd', '4fe7c2ac-fffc-488c-b670-150058da60bd', 'ToolbarHelper', 'toolbar-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\View\\Helper\\ToolbarHelper.php', '__construct afterlayout getname __call writecache readcache getquerylogs __construct afterlayout getname __call writecache readcache getquerylogs', 'settings _cacheenabled settings _cacheenabled', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-7ab0-4d69-8d9f-150058da60bd', '4fe7c2ac-fffc-488c-b670-150058da60bd', 'FirePhpToolbarHelper', 'fire-php-toolbar-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\View\\Helper\\FirePhpToolbarHelper.php', 'send makeneatarray message table panelstart panelend send makeneatarray message table panelstart panelend', 'settings settings', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-d290-4cf0-814a-150058da60bd', '4fe7c2ac-fffc-488c-b670-150058da60bd', 'HtmlToolbarHelper', 'html-toolbar-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\View\\Helper\\HtmlToolbarHelper.php', 'makeneatarray message panelstart table send explainlink makeneatarray message panelstart table send explainlink', 'helpers settings helpers settings', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-a374-4f87-8f41-150058da60bd', '4fe7c2ac-fffc-488c-b670-150058da60bd', 'SimpleGraphHelper', 'simple-graph-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\View\\Helper\\SimpleGraphHelper.php', 'bar bar', 'helpers _defaultsettings helpers _defaultsettings', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-dce4-4ed2-9ee8-150058da60bd', '4fe7c2ac-fffc-488c-b670-150058da60bd', 'TidyHelper', 'tidy-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\Plugin\\DebugKit\\View\\Helper\\TidyHelper.php', 'process report tidyerrors _exec process report tidyerrors _exec', 'helpers results helpers results', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-d378-4259-acae-150058da60bd', '4fe7c2ac-ab1c-4916-930e-150058da60bd', 'FormHelper', 'form-helper', 'D:\\Dev\\Core\\Site\\lib\\Cake\\View\\Helper\\FormHelper.php', '__construct _getmodel _introspectmodel _isrequiredfield tagisinvalid create _csrffield end secure unlockfield _secure isfielderror error label inputs input _extractoption _inputlabel checkbox radio __call textarea hidden file button postbutton postlink submit select day year month hour minute _datetimeselected meridian datetime _name _selectoptions _generateoptions _initinputfield __construct _getmodel _introspectmodel _isrequiredfield tagisinvalid create _csrffield end secure unlockfield _secure isfielderror error label inputs input _extractoption _inputlabel checkbox radio __call textarea hidden file button postbutton postlink submit select day year month hour minute _datetimeselected meridian datetime _name _selectoptions _generateoptions _initinputfield', 'helpers _options fields requesttype defaultmodel _inputdefaults _unlockedfields _models validationerrors helpers _options fields requesttype defaultmodel _inputdefaults _unlockedfields _models validationerrors', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-683c-417f-864d-150058da60bd', NULL, 'CmsFormHelper', 'cms-form-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\CmsFormHelper.php', 'create input getvalidatearray isrequiredfield addjsvalidation wrapwithdiv kcfinderfile kcfinderimage getfieldval textbox date date2 _initdatepicker _createdatepicker daterange timerange wysiwyg selectbox selectrange textareamaxlength selectandmanage multichooser multichooser2 upload uploadimage filerevisions afterrender create input getvalidatearray isrequiredfield addjsvalidation wrapwithdiv kcfinderfile kcfinderimage getfieldval textbox date date2 _initdatepicker _createdatepicker daterange timerange wysiwyg selectbox selectrange textareamaxlength selectandmanage multichooser multichooser2 upload uploadimage filerevisions afterrender', 'helpers wysiwygfields helpers wysiwygfields', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-e310-43f9-b647-150058da60bd', NULL, 'ExcelHelper', 'excel-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\ExcelHelper.php', 'excelhelper loadfile newfile changecell generate _title _headers _rows _output excelhelper loadfile newfile changecell generate _title _headers _rows _output', 'xls reader sheet data blacklist xls reader sheet data blacklist', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-bd54-4c01-a178-150058da60bd', '4fe7c2ac-2b48-43af-a683-150058da60bd', 'PHPExcel', 'p-h-p-excel', 'D:\\Dev\\Core\\Site\\app\\Vendor\\excel\\PHPExcel.php', '__construct disconnectworksheets getproperties setproperties getsecurity setsecurity getactivesheet createsheet addsheet removesheetbyindex getsheet getallsheets getsheetbyname getindex setindexbyname getsheetcount getactivesheetindex setactivesheetindex setactivesheetindexbyname getsheetnames addexternalsheet getnamedranges addnamedrange getnamedrange removenamedrange getworksheetiterator copy __clone getcellxfcollection getcellxfbyindex getcellxfbyhashcode getdefaultstyle addcellxf removecellxfbyindex getcellxfsupervisor getcellstylexfcollection getcellstylexfbyindex getcellstylexfbyhashcode addcellstylexf removecellstylexfbyindex garbagecollect __construct disconnectworksheets getproperties setproperties getsecurity setsecurity getactivesheet createsheet addsheet removesheetbyindex getsheet getallsheets getsheetbyname getindex setindexbyname getsheetcount getactivesheetindex setactivesheetindex setactivesheetindexbyname getsheetnames addexternalsheet getnamedranges addnamedrange getnamedrange removenamedrange getworksheetiterator copy __clone getcellxfcollection getcellxfbyindex getcellxfbyhashcode getdefaultstyle addcellxf removecellxfbyindex getcellxfsupervisor getcellstylexfcollection getcellstylexfbyindex getcellstylexfbyhashcode addcellstylexf removecellstylexfbyindex garbagecollect', '_properties _security _worksheetcollection _activesheetindex _namedranges _cellxfsupervisor _cellxfcollection _cellstylexfcollection _properties _security _worksheetcollection _activesheetindex _namedranges _cellxfsupervisor _cellxfcollection _cellstylexfcollection', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-4e98-4a2d-aa9b-150058da60bd', NULL, 'PHPExcel_Autoloader', 'p-h-p-excel--autoloader', 'D:\\Dev\\Core\\Site\\app\\Vendor\\excel\\PHPExcel\\Autoloader.php', 'register load register load', '', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-3b00-4f7c-9176-150058da60bd', '4fe7c2ac-9058-410d-9d25-150058da60bd', 'PHPExcel_Shared_ZipStreamWrapper', 'p-h-p-excel--shared--zip-stream-wrapper', 'D:\\Dev\\Core\\Site\\app\\Vendor\\excel\\PHPExcel\\Shared\\ZipStreamWrapper.php', 'register stream_open stream_stat stream_read stream_tell stream_eof stream_seek register stream_open stream_stat stream_read stream_tell stream_eof stream_seek', '_archive _filenameinarchive _position _data _archive _filenameinarchive _position _data', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-6368-4d2a-a556-150058da60bd', '4fe7c2ac-9058-410d-9d25-150058da60bd', 'PHPExcel_Shared_String', 'p-h-p-excel--shared--string', 'D:\\Dev\\Core\\Site\\app\\Vendor\\excel\\PHPExcel\\Shared\\String.php', '_buildcontrolcharacters _buildsylkcharacters getismbstringenabled getisiconvenabled buildcharactersets controlcharacterooxml2php controlcharacterphp2ooxml sanitizeutf8 isutf8 formatnumber utf8tobiff8unicodeshort utf8tobiff8unicodelong convertencoding utf16_decode countcharacters substring converttonumberiffraction getdecimalseparator setdecimalseparator getthousandsseparator setthousandsseparator getcurrencycode setcurrencycode sylktoutf8 _buildcontrolcharacters _buildsylkcharacters getismbstringenabled getisiconvenabled buildcharactersets controlcharacterooxml2php controlcharacterphp2ooxml sanitizeutf8 isutf8 formatnumber utf8tobiff8unicodeshort utf8tobiff8unicodelong convertencoding utf16_decode countcharacters substring converttonumberiffraction getdecimalseparator setdecimalseparator getthousandsseparator setthousandsseparator getcurrencycode setcurrencycode sylktoutf8', '_controlcharacters _sylkcharacters _decimalseparator _thousandsseparator _currencycode _ismbstringenabled _isiconvenabled _controlcharacters _sylkcharacters _decimalseparator _thousandsseparator _currencycode _ismbstringenabled _isiconvenabled', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-fe9c-4d45-8873-150058da60bd', '4fe7c2ac-3fa4-412e-9d46-150058da60bd', 'PHPExcel_Writer_Excel5', 'p-h-p-excel--writer--excel5', 'D:\\Dev\\Core\\Site\\app\\Vendor\\excel\\PHPExcel\\Writer\\Excel5.php', '__construct save settempdir getprecalculateformulas setprecalculateformulas _buildworksheeteschers _buildworkbookescher __construct save settempdir getprecalculateformulas setprecalculateformulas _buildworksheeteschers _buildworkbookescher', '_precalculateformulas _phpexcel _biff_version _str_total _str_unique _str_table _colors _parser _idcls _precalculateformulas _phpexcel _biff_version _str_total _str_unique _str_table _colors _parser _idcls', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-98dc-4caf-a5b5-150058da60bd', '4fe7c2ac-a0dc-45dc-89c3-150058da60bd', 'PHPExcel_Writer_IWriter', 'p-h-p-excel--writer--i-writer', 'D:\\Dev\\Core\\Site\\app\\Vendor\\excel\\PHPExcel\\Writer\\IWriter.php', 'save save', '', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-8c2c-4d62-96ea-150058da60bd', NULL, 'KrumoHelper', 'krumo-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\KrumoHelper.php', '__construct __construct', '', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-1994-4beb-823c-150058da60bd', NULL, 'MinifyHelper', 'minify-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\MinifyHelper.php', 'enabled js css path _path enabled js css path _path', 'helpers helpers', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-0b60-4022-96e5-150058da60bd', NULL, 'PaypalHelper', 'paypal-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\PaypalHelper.php', 'paybutton cards explanation paybutton cards explanation', 'helpers helpers', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-57dc-41d8-b55e-150058da60bd', NULL, 'PdfHelper', 'pdf-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\PdfHelper.php', 'pdfhelper setstylesheet setstylesheetfile render pdfhelper setstylesheet setstylesheetfile render', 'mpdf mpdf', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16');
INSERT INTO `essendon_api_classes` (`id`, `api_package_id`, `name`, `slug`, `file_name`, `method_index`, `property_index`, `flags`, `coverage_cache`, `created`, `modified`) VALUES
('4fe7c2ac-56b8-4e04-88a1-150058da60bd', NULL, 'mPDF', 'm-p-d-f', 'D:\\Dev\\Core\\Site\\app\\Vendor\\mpdf\\mpdf.php', 'mpdf _setpagesize _getpageformat startprogressbaroutput updateprogressbar restrictunicodefonts setmbencoding setmargins resetmargins setleftmargin settopmargin setrightmargin setautopagebreak setdisplaymode setcompression settitle setsubject setauthor setkeywords setcreator setanchor2bookmark aliasnbpages aliasnbpagegroups setalpha addextgstate error open close _resizebackgroundimage setbackground printbodybackgrounds printpagebackgrounds printtablebackgrounds addpages addpagebyarray addpage pageno addspotcolorsfromfile addspotcolor setcolor setdcolor setfcolor settcolor setdrawcolor setfillcolor settextcolor _getcharwidth _chardefined getstringwidth setlinewidth line arrow rect addfont setfont setfontsize addlink setlink link text writetext writecell resetspacing setspacing getjspacing cell _kern _smallcaps multicell write saveinlineproperties restoreinlineproperties getfirstblockfill setblockfill savefont restorefont newflowingblock finishflowingblock printobjectbuffer writeflowingblock _advancefloatmargins wordwrap _settextrendering settextoutline image _getobjattr inlineobject setlinejoin setlinecap setdash setdisplaypreferences ln divln getx setx gety sety setxy output _dochecks _begindoc _puthtmlheaders _putpages _putannots annotation _putfonts _putttfontwidths _putfontranges _putfontwidths _puttype0 _putimages _putinfo _putmetadata _putoutputintent _putcatalog setuserrights _enddoc _beginpage _setautoheaderheight _setautofooterheight _gethfheight _endpage _newobj _dounderline _imageerror _getimage _convimage rle8_decode rle4_decode _fourbytes2int_le _twobytes2int_le _fourbytes2int _twobytes2int _jpgheaderfromstring _jpgdatafromheader file_get_contents_by_curl file_get_contents_by_socket _imagetypefromstring _moveto _lineto _addgdiobject _getgdiobject _deletegdiobject _putformobjects _freadint _utf16betextstring _textstring _escape _putstream _out watermark watermarkimg rotate roundedrect _arc gradient shaded_box utf8stringtoarray utf8tosubset utf8toutf16be addcidfont addcjkfont addbig5font addgbfont addsjisfont adduhcfont setautofont setdefaultfont setdefaultfontsize setdefaultbodycss setdirectionality setlineheightcorrection setlineheight _computelineheight setbasepath getfullpath _get_file usecss usetableheader usepre docpagenum docpagesettings docpagenumtotal restartdoctemplate header tableheaderfooter sethtmlheader sethtmlfooter _gethtmlheight writehtmlheaders writehtmlfooters defheaderbyname deffooterbyname setheaderbyname setfooterbyname defhtmlheaderbyname defhtmlfooterbyname sethtmlheaderbyname sethtmlfooterbyname setheader setfooter setunvalidatedtext setwatermarktext setwatermarkimage footer softhyphenate hyphenateword writehtml writefixedposhtml initialiseblock border_details _fix_borderstr fixcss parsecssbackground parsemozgradient parsebackgroundgradient expand24 border_radius_expand fixlineheight _borderpadding setborderdominance _mergecss array_merge_recursive_unique _mergefullcss _set_mergedcss _mergeborders mergecss setpagedmediacss previewblockcss clearfloats getfloatdivinfo opentag _getliststyle closetag tbsqrt printlistbuffer printbuffer _setdashborder _setborderline paintdivbb _ellipsearc paintdivlnborder paintimgborder reset readmetatags readcharset readdefaultcss readcss readinlinecss setcss setstyle setstylesarray setstyles resetstyles disabletags finalisecelllineheight tablewordwrap tablecheckminwidth shrinktable _packcellborder _getborderwidths _unpackcellborder _tablecolumnwidth _tablewidth _tableheight _tablegetwidth _tablegetheight _tablerect _lightencolor _darkencolor setborder issetborder _table2cellborder _fixtableborders _reversetabledir _tablewrite _putextgstates _putimportedobjects _putformxobjects _putpatterns _putshaders _putspotcolors _putresources _putjavascript _putencryption _puttrailer setprotection _objectkey _rc4 _md5_16 _ovalue _uvalue _generateencryptionkey _hextostring bookmark _putbookmarks startpagenums toc tocpagebreakbyarray tocpagebreak toc_entry inserttoc movepages deletepages reference indexentry referencesee indexentrysee createreference createindex acceptpagebreak setcolumns setcol addcolumn newcolumn printcolumnbuffer printcellbuffer printtablebuffer printkwtbuffer printfloatbuffer printdivbuffer circle ellipse autosizetext reverse_letters magic_reverse_dir setsubstitutions substitutechars substitutecharssip substitutecharsmb sethientitysubstitutions substitutehientities is_utf8 purify_utf8 purify_utf8_text all_entities_to_utf8 writebarcode writebarcode2 starttransform stoptransform transformscale transformtranslate transformrotate _transform convertindic autofont replacecjk replacearabic initarabic arabjoin get_arab_glyphs _getmqr _cmpdom mb_strrev columnadjustadd blockadjust convertcolor rgb2gray cmyk2gray rgb2cmyk cmyk2rgb rgb2hsl hsl2rgb hue_2_rgb _invertcolor _colatostring convertsize lesser_entity_decode adjusthtml dec2other dec2alpha dec2roman setimportuse hex2str str2hex pdf_write_value overwrite gettemplatesize thumbnail setsourcefile importpage usetemplate setpagetemplate setdoctemplate _set_object_javascript setjs setformbuttonjs setformchoicejs setformtextjs win1252topdfdocencoding setformtext setformchoice setcheckbox setradio setformreset setjsbutton setformsubmit setformbuttontext setformbutton setformborderwidth setformborderstyle setformbordercolor setformbackgroundcolor setformd _setflag _form_rect _put_button_icon _putform_bt _putform_ch _putform_tx mpdf _setpagesize _getpageformat startprogressbaroutput updateprogressbar restrictunicodefonts setmbencoding setmargins resetmargins setleftmargin settopmargin setrightmargin setautopagebreak setdisplaymode setcompression settitle setsubject setauthor setkeywords setcreator setanchor2bookmark aliasnbpages aliasnbpagegroups setalpha addextgstate error open close _resizebackgroundimage setbackground printbodybackgrounds printpagebackgrounds printtablebackgrounds addpages addpagebyarray addpage pageno addspotcolorsfromfile addspotcolor setcolor setdcolor setfcolor settcolor setdrawcolor setfillcolor settextcolor _getcharwidth _chardefined getstringwidth setlinewidth line arrow rect addfont setfont setfontsize addlink setlink link text writetext writecell resetspacing setspacing getjspacing cell _kern _smallcaps multicell write saveinlineproperties restoreinlineproperties getfirstblockfill setblockfill savefont restorefont newflowingblock finishflowingblock printobjectbuffer writeflowingblock _advancefloatmargins wordwrap _settextrendering settextoutline image _getobjattr inlineobject setlinejoin setlinecap setdash setdisplaypreferences ln divln getx setx gety sety setxy output _dochecks _begindoc _puthtmlheaders _putpages _putannots annotation _putfonts _putttfontwidths _putfontranges _putfontwidths _puttype0 _putimages _putinfo _putmetadata _putoutputintent _putcatalog setuserrights _enddoc _beginpage _setautoheaderheight _setautofooterheight _gethfheight _endpage _newobj _dounderline _imageerror _getimage _convimage rle8_decode rle4_decode _fourbytes2int_le _twobytes2int_le _fourbytes2int _twobytes2int _jpgheaderfromstring _jpgdatafromheader file_get_contents_by_curl file_get_contents_by_socket _imagetypefromstring _moveto _lineto _addgdiobject _getgdiobject _deletegdiobject _putformobjects _freadint _utf16betextstring _textstring _escape _putstream _out watermark watermarkimg rotate roundedrect _arc gradient shaded_box utf8stringtoarray utf8tosubset utf8toutf16be addcidfont addcjkfont addbig5font addgbfont addsjisfont adduhcfont setautofont setdefaultfont setdefaultfontsize setdefaultbodycss setdirectionality setlineheightcorrection setlineheight _computelineheight setbasepath getfullpath _get_file usecss usetableheader usepre docpagenum docpagesettings docpagenumtotal restartdoctemplate header tableheaderfooter sethtmlheader sethtmlfooter _gethtmlheight writehtmlheaders writehtmlfooters defheaderbyname deffooterbyname setheaderbyname setfooterbyname defhtmlheaderbyname defhtmlfooterbyname sethtmlheaderbyname sethtmlfooterbyname setheader setfooter setunvalidatedtext setwatermarktext setwatermarkimage footer softhyphenate hyphenateword writehtml writefixedposhtml initialiseblock border_details _fix_borderstr fixcss parsecssbackground parsemozgradient parsebackgroundgradient expand24 border_radius_expand fixlineheight _borderpadding setborderdominance _mergecss array_merge_recursive_unique _mergefullcss _set_mergedcss _mergeborders mergecss setpagedmediacss previewblockcss clearfloats getfloatdivinfo opentag _getliststyle closetag tbsqrt printlistbuffer printbuffer _setdashborder _setborderline paintdivbb _ellipsearc paintdivlnborder paintimgborder reset readmetatags readcharset readdefaultcss readcss readinlinecss setcss setstyle setstylesarray setstyles resetstyles disabletags finalisecelllineheight tablewordwrap tablecheckminwidth shrinktable _packcellborder _getborderwidths _unpackcellborder _tablecolumnwidth _tablewidth _tableheight _tablegetwidth _tablegetheight _tablerect _lightencolor _darkencolor setborder issetborder _table2cellborder _fixtableborders _reversetabledir _tablewrite _putextgstates _putimportedobjects _putformxobjects _putpatterns _putshaders _putspotcolors _putresources _putjavascript _putencryption _puttrailer setprotection _objectkey _rc4 _md5_16 _ovalue _uvalue _generateencryptionkey _hextostring bookmark _putbookmarks startpagenums toc tocpagebreakbyarray tocpagebreak toc_entry inserttoc movepages deletepages reference indexentry referencesee indexentrysee createreference createindex acceptpagebreak setcolumns setcol addcolumn newcolumn printcolumnbuffer printcellbuffer printtablebuffer printkwtbuffer printfloatbuffer printdivbuffer circle ellipse autosizetext reverse_letters magic_reverse_dir setsubstitutions substitutechars substitutecharssip substitutecharsmb sethientitysubstitutions substitutehientities is_utf8 purify_utf8 purify_utf8_text all_entities_to_utf8 writebarcode writebarcode2 starttransform stoptransform transformscale transformtranslate transformrotate _transform convertindic autofont replacecjk replacearabic initarabic arabjoin get_arab_glyphs _getmqr _cmpdom mb_strrev columnadjustadd blockadjust convertcolor rgb2gray cmyk2gray rgb2cmyk cmyk2rgb rgb2hsl hsl2rgb hue_2_rgb _invertcolor _colatostring convertsize lesser_entity_decode adjusthtml dec2other dec2alpha dec2roman setimportuse hex2str str2hex pdf_write_value overwrite gettemplatesize thumbnail setsourcefile importpage usetemplate setpagetemplate setdoctemplate _set_object_javascript setjs setformbuttonjs setformchoicejs setformtextjs win1252topdfdocencoding setformtext setformchoice setcheckbox setradio setformreset setjsbutton setformsubmit setformbuttontext setformbutton setformborderwidth setformborderstyle setformbordercolor setformbackgroundcolor setformd _setflag _form_rect _put_button_icon _putform_bt _putform_ch _putform_tx', 'repackagettf allowcjkorphans allowcjkoverflow cjkleading cjkfollowing cjkoverflow usekerning restrictcolorspace bleedmargin crossmarkmargin cropmarkmargin cropmarklength nonprintmargin pdfx pdfxauto pdfa pdfaauto iccprofile printers_info iterationcounter smcapsscale smcapsstretch backupsubsfont backupsipfont debugfonts useadobecjk percentsubset maxttffilesize bmponly tableminsizepriority dpi watermarkimgalphablend watermarkimgbehind justifyb4br packtabledata pgsins simpletables enableimports debug showstats setautotopmargin setautobottommargin automarginpadding collapseblockmargins falseboldweight normallineheight progressbar incrementfpr1 incrementfpr2 incrementfpr3 incrementfpr4 hyphenate hyphenatetables shylang shyleftmin shyrightmin shycharmin shycharmax shylanguages pagenumprefix pagenumsuffix nbpgprefix nbpgsuffix showimageerrors allow_output_buffering autopadding usegraphs autofontgroupsize tabspaces uselang restoreblockpagebreaks watermarktextalpha watermarkimagealpha watermark_size watermark_pos annotsize annotmargin annotopacity title2annots keepcolumns keep_table_proportions ignore_table_widths ignore_table_percents list_align_style list_number_suffix usesubstitutions cssselectmedia forceportraitheaders forceportraitmargins displaydefaultorientation ignore_invalid_utf8 allowedcsstags onlycorefonts allow_charset_conversion jsword jsmaxchar jsmaxcharlast jsmaxwordlast orphansallowed max_colh_correction table_error_report table_error_report_param bidirectional text_input_as_html anchor2bookmark list_indent_first_level shrink_tables_to_fit allow_html_optional_endtags img_dpi defaultheaderfontsize defaultheaderfontstyle defaultheaderline defaultfooterfontsize defaultfooterfontstyle defaultfooterline header_line_spacing footer_line_spacing textarea_lineheight pregrtlchars preguhcchars pregsjischars pregcjkchars pregasciichars1 pregasciichars2 pregasciichars3 pregvietchars pregvietpluschars preghebchars pregarabicchars pregnonarabicchars preghichars pregbnchars pregpachars pregguchars pregorchars pregtachars pregtechars pregknchars pregmlchars pregshchars pregindextra mirrormargins default_lineheight_correction watermarktext watermarkimage showwatermarktext showwatermarkimage fontsizes unvalidatedtext topicisunvalidated useoddeven usesubstitutionsmb formsubmitnovaluefields useactiveforms formexporttype formselectdefaultoption formusezapd form_border_color form_background_color form_border_width form_border_style form_button_border_color form_button_background_color form_button_border_width form_button_border_style form_radio_color form_radio_background_color userc128encryption uniqid formmethod formaction form_fonts form_radio_groups pdf_acro_array form_checkboxes forms formn pdf_array_co array_form_button_js array_form_choice_js array_form_text_js form_button_text form_button_text_over form_button_text_click form_button_icon kerning fixedlspacing minwspacing lspacingcss wspacingcss listdir spotcolorids svgcolors spotcolors deftextcolor defdrawcolor deffillcolor tablebackgrounds inlinedisplayoff kt_y00 kt_p00 uppercase checksip checksmp checkcjk tablecjk watermarkimgalpha pdfaxwarnings metadataroot outputintentroot inforoot current_filename parsers current_parser _obj_stack _don_obj_stack _current_obj_id tpls tpl tplprefix _res pdf_version noimagefile lastblockbottommargin baselinec subpos subarrmb reqfontstyle tableclippath forceexactlineheight listocc fullimageheight infixedposblock fixedposblock fixedposblockdepth fixedposblockbbox fixedposblocksave maxposl maxposr loaded extrafontsubsets doctemplatestart time0 indic barcode shypatterns loadedshypatterns loadedshydictionary shydictionary shydictionarywords spanbgcolorarray default_font list_lineheight headerbuffer lastblocklevelchange nestedtablejustfinished linebreakjustfinished cell_border_dominance_l cell_border_dominance_r cell_border_dominance_t cell_border_dominance_b tbcsslvl listcsslvl table_keep_together plaincell_properties inherit_lineheight listitemtype shrin_k1 outerfilled blockcontext floatdivs tablecascadecss listcascadecss patterns pagebackgrounds bodybackgroundgradient bodybackgroundimage bodybackgroundcolor writinghtmlheader writinghtmlfooter autofontgroups angle gradients kwt_reference kwt_bmoutlines kwt_toc tbrot_reference tbrot_bmoutlines tbrot_toc col_reference col_bmoutlines col_toc currentgraphid graphs floatbuffer floatmargins bullet bulletarray rtlasarabicfarsi currentlang default_lang default_available_fonts pagetemplate doctemplate doctemplatecontinue arabglyphs arabhex persianglyphs persianhex arabvowels arabprevlink arabnextlink formobjects gdiobjectarray inlineproperties inlineannots ktannots tbrot_annots kwt_annots columnannots columnforms pageannots pagedim breakpoints tablelevel tbctr innermosttablelevel savetablecounter cellborderbuffer savehtmlfooter_height savehtmlfootere_height firstpageboxheader firstpageboxheadereven firstpageboxfooter firstpageboxfootereven page_box show_marks basepathislocal use_kwt kwt kwt_height kwt_y0 kwt_x0 kwt_buffer kwt_links kwt_moved kwt_saved pagenumsubstitutions table_borders_separate base_table_properties borderstyles listjustfinished blockjustfinished orig_bmargin orig_tmargin orig_lmargin orig_rmargin orig_hmargin orig_fmargin pageheaders pagefooters pagehtmlheaders pagehtmlfooters savehtmlheader savehtmlfooter htmlheaderpagelinks htmlheaderpageannots htmlheaderpageforms available_unifonts sans_fonts serif_fonts mono_fonts defaultsubsfont available_cjk_fonts cascadecss htmlheader htmlfooter htmlheadere htmlfootere bufferoutput showdefaultpagenos chrs ords big5_widths gb_widths sjis_widths uhc_widths encrypted uvalue ovalue pvalue enc_obj_id last_rc4_key last_rc4_key_c encryption_key padding bmoutlines outlineroot _toc tocmark tocfont tocfontsize tocindent tocheader tocfooter tocprehtml tocposthtml tocbookmarktext tocusepaging tocuselinking tocorientation toc_margin_left toc_margin_right toc_margin_top toc_margin_bottom toc_margin_header toc_margin_footer toc_odd_header_name toc_even_header_name toc_odd_footer_name toc_even_footer_name toc_odd_header_value toc_even_header_value toc_odd_footer_value toc_even_footer_value toc_start toc_end toc_npages m_toc colactive changepage reference currcol nbcol y0 coll colwidth colgap colr changecolumn columnbuffer coldetails columnlinks colvalign substitute entsearch entsubstitute defaultcss form_element_spacing linemaxfontsize lineheight_correction lastoptionaltag pageoutput charset_in blk blklvl columnadjust ws href pgwidth fontlist issetfont issetcolor oldx oldy b u s i tdbegin table cell col row divbegin divalign divwidth divheight divrevert spanbgcolor spanlvl listlvl listnum listtype listoccur listlist listitem pjustfinished ignorefollowingspaces sup sub small big toupper tolower capitalize dash_on dotted_on strike css textbuffer currentfontstyle currentfontfamily currentfontsize colorarray bgcolorarray internallink enabledtags lineheight basepath outlineparam outline_on specialcontent selectoption usecss usepre usetableheader tableheadernrows tablefooternrows objectbuffer table_rotate tbrot_maxw tbrot_maxh tablebuffer tbrot_align tbrot_links divbuffer keep_block_together ktlinks ktblock ktforms ktreference ktbmoutlines _kttoc tbrot_y0 tbrot_x0 tbrot_w tbrot_h mb_enc directionality extgstates mgl mgt mgr mgb tts ttz tta headerdetails footerdetails div_margin_bottom div_bottom_border p_margin_bottom p_bottom_border page_break_after_avoid margin_bottom_collapse img_margin_top img_margin_bottom list_indent list_align list_margin_bottom default_font_size original_default_font_size original_default_font watermark_font defaultalign defaulttablealign tablethead thead_font_weight thead_font_style thead_font_smcaps thead_valign_default thead_textalign_default tabletfoot tfoot_font_weight tfoot_font_style tfoot_font_smcaps tfoot_valign_default tfoot_textalign_default trow_text_rotate cellpaddingl cellpaddingr cellpaddingt cellpaddingb table_lineheight table_border_attr_set table_border_css_set shrin_k shrink_this_table_to_fit margincorrection margin_footer margin_header tabletheadjustfinished usingcorefont charspacing displaypreferences outlines flowingblockattr page n offsets buffer pages state compress deforientation curorientation orientationchanges k fwpt fhpt fw fh wpt hpt w h lmargin tmargin rmargin bmargin cmarginl cmarginr cmargint cmarginb deflmargin defrmargin x y lasth linewidth corefonts fonts fontfiles diffs images pagelinks links fontfamily fontstyle currentfont fontsizept fontsize drawcolor fillcolor textcolor colorflag autopagebreak pagebreaktrigger infooter inhtmlfooter processingfooter processingheader zoommode layoutmode title subject author keywords creator aliasnbpg aliasnbpggp aliasnbpghex aliasnbpggphex ispre outerblocktags innerblocktags inlinetags listtags tabletags formtags repackagettf allowcjkorphans allowcjkoverflow cjkleading cjkfollowing cjkoverflow usekerning restrictcolorspace bleedmargin crossmarkmargin cropmarkmargin cropmarklength nonprintmargin pdfx pdfxauto pdfa pdfaauto iccprofile printers_info iterationcounter smcapsscale smcapsstretch backupsubsfont backupsipfont debugfonts useadobecjk percentsubset maxttffilesize bmponly tableminsizepriority dpi watermarkimgalphablend watermarkimgbehind justifyb4br packtabledata pgsins simpletables enableimports debug showstats setautotopmargin setautobottommargin automarginpadding collapseblockmargins falseboldweight normallineheight progressbar incrementfpr1 incrementfpr2 incrementfpr3 incrementfpr4 hyphenate hyphenatetables shylang shyleftmin shyrightmin shycharmin shycharmax shylanguages pagenumprefix pagenumsuffix nbpgprefix nbpgsuffix showimageerrors allow_output_buffering autopadding usegraphs autofontgroupsize tabspaces uselang restoreblockpagebreaks watermarktextalpha watermarkimagealpha watermark_size watermark_pos annotsize annotmargin annotopacity title2annots keepcolumns keep_table_proportions ignore_table_widths ignore_table_percents list_align_style list_number_suffix usesubstitutions cssselectmedia forceportraitheaders forceportraitmargins displaydefaultorientation ignore_invalid_utf8 allowedcsstags onlycorefonts allow_charset_conversion jsword jsmaxchar jsmaxcharlast jsmaxwordlast orphansallowed max_colh_correction table_error_report table_error_report_param bidirectional text_input_as_html anchor2bookmark list_indent_first_level shrink_tables_to_fit allow_html_optional_endtags img_dpi defaultheaderfontsize defaultheaderfontstyle defaultheaderline defaultfooterfontsize defaultfooterfontstyle defaultfooterline header_line_spacing footer_line_spacing textarea_lineheight pregrtlchars preguhcchars pregsjischars pregcjkchars pregasciichars1 pregasciichars2 pregasciichars3 pregvietchars pregvietpluschars preghebchars pregarabicchars pregnonarabicchars preghichars pregbnchars pregpachars pregguchars pregorchars pregtachars pregtechars pregknchars pregmlchars pregshchars pregindextra mirrormargins default_lineheight_correction watermarktext watermarkimage showwatermarktext showwatermarkimage fontsizes unvalidatedtext topicisunvalidated useoddeven usesubstitutionsmb formsubmitnovaluefields useactiveforms formexporttype formselectdefaultoption formusezapd form_border_color form_background_color form_border_width form_border_style form_button_border_color form_button_background_color form_button_border_width form_button_border_style form_radio_color form_radio_background_color userc128encryption uniqid formmethod formaction form_fonts form_radio_groups pdf_acro_array form_checkboxes forms formn pdf_array_co array_form_button_js array_form_choice_js array_form_text_js form_button_text form_button_text_over form_button_text_click form_button_icon kerning fixedlspacing minwspacing lspacingcss wspacingcss listdir spotcolorids svgcolors spotcolors deftextcolor defdrawcolor deffillcolor tablebackgrounds inlinedisplayoff kt_y00 kt_p00 uppercase checksip checksmp checkcjk tablecjk watermarkimgalpha pdfaxwarnings metadataroot outputintentroot inforoot current_filename parsers current_parser _obj_stack _don_obj_stack _current_obj_id tpls tpl tplprefix _res pdf_version noimagefile lastblockbottommargin baselinec subpos subarrmb reqfontstyle tableclippath forceexactlineheight listocc fullimageheight infixedposblock fixedposblock fixedposblockdepth fixedposblockbbox fixedposblocksave maxposl maxposr loaded extrafontsubsets doctemplatestart time0 indic barcode shypatterns loadedshypatterns loadedshydictionary shydictionary shydictionarywords spanbgcolorarray default_font list_lineheight headerbuffer lastblocklevelchange nestedtablejustfinished linebreakjustfinished cell_border_dominance_l cell_border_dominance_r cell_border_dominance_t cell_border_dominance_b tbcsslvl listcsslvl table_keep_together plaincell_properties inherit_lineheight listitemtype shrin_k1 outerfilled blockcontext floatdivs tablecascadecss listcascadecss patterns pagebackgrounds bodybackgroundgradient bodybackgroundimage bodybackgroundcolor writinghtmlheader writinghtmlfooter autofontgroups angle gradients kwt_reference kwt_bmoutlines kwt_toc tbrot_reference tbrot_bmoutlines tbrot_toc col_reference col_bmoutlines col_toc currentgraphid graphs floatbuffer floatmargins bullet bulletarray rtlasarabicfarsi currentlang default_lang default_available_fonts pagetemplate doctemplate doctemplatecontinue arabglyphs arabhex persianglyphs persianhex arabvowels arabprevlink arabnextlink formobjects gdiobjectarray inlineproperties inlineannots ktannots tbrot_annots kwt_annots columnannots columnforms pageannots pagedim breakpoints tablelevel tbctr innermosttablelevel savetablecounter cellborderbuffer savehtmlfooter_height savehtmlfootere_height firstpageboxheader firstpageboxheadereven firstpageboxfooter firstpageboxfootereven page_box show_marks basepathislocal use_kwt kwt kwt_height kwt_y0 kwt_x0 kwt_buffer kwt_links kwt_moved kwt_saved pagenumsubstitutions table_borders_separate base_table_properties borderstyles listjustfinished blockjustfinished orig_bmargin orig_tmargin orig_lmargin orig_rmargin orig_hmargin orig_fmargin pageheaders pagefooters pagehtmlheaders pagehtmlfooters savehtmlheader savehtmlfooter htmlheaderpagelinks htmlheaderpageannots htmlheaderpageforms available_unifonts sans_fonts serif_fonts mono_fonts defaultsubsfont available_cjk_fonts cascadecss htmlheader htmlfooter htmlheadere htmlfootere bufferoutput showdefaultpagenos chrs ords big5_widths gb_widths sjis_widths uhc_widths encrypted uvalue ovalue pvalue enc_obj_id last_rc4_key last_rc4_key_c encryption_key padding bmoutlines outlineroot _toc tocmark tocfont tocfontsize tocindent tocheader tocfooter tocprehtml tocposthtml tocbookmarktext tocusepaging tocuselinking tocorientation toc_margin_left toc_margin_right toc_margin_top toc_margin_bottom toc_margin_header toc_margin_footer toc_odd_header_name toc_even_header_name toc_odd_footer_name toc_even_footer_name toc_odd_header_value toc_even_header_value toc_odd_footer_value toc_even_footer_value toc_start toc_end toc_npages m_toc colactive changepage reference currcol nbcol y0 coll colwidth colgap colr changecolumn columnbuffer coldetails columnlinks colvalign substitute entsearch entsubstitute defaultcss form_element_spacing linemaxfontsize lineheight_correction lastoptionaltag pageoutput charset_in blk blklvl columnadjust ws href pgwidth fontlist issetfont issetcolor oldx oldy b u s i tdbegin table cell col row divbegin divalign divwidth divheight divrevert spanbgcolor spanlvl listlvl listnum listtype listoccur listlist listitem pjustfinished ignorefollowingspaces sup sub small big toupper tolower capitalize dash_on dotted_on strike css textbuffer currentfontstyle currentfontfamily currentfontsize colorarray bgcolorarray internallink enabledtags lineheight basepath outlineparam outline_on specialcontent selectoption usecss usepre usetableheader tableheadernrows tablefooternrows objectbuffer table_rotate tbrot_maxw tbrot_maxh tablebuffer tbrot_align tbrot_links divbuffer keep_block_together ktlinks ktblock ktforms ktreference ktbmoutlines _kttoc tbrot_y0 tbrot_x0 tbrot_w tbrot_h mb_enc directionality extgstates mgl mgt mgr mgb tts ttz tta headerdetails footerdetails div_margin_bottom div_bottom_border p_margin_bottom p_bottom_border page_break_after_avoid margin_bottom_collapse img_margin_top img_margin_bottom list_indent list_align list_margin_bottom default_font_size original_default_font_size original_default_font watermark_font defaultalign defaulttablealign tablethead thead_font_weight thead_font_style thead_font_smcaps thead_valign_default thead_textalign_default tabletfoot tfoot_font_weight tfoot_font_style tfoot_font_smcaps tfoot_valign_default tfoot_textalign_default trow_text_rotate cellpaddingl cellpaddingr cellpaddingt cellpaddingb table_lineheight table_border_attr_set table_border_css_set shrin_k shrink_this_table_to_fit margincorrection margin_footer margin_header tabletheadjustfinished usingcorefont charspacing displaypreferences outlines flowingblockattr page n offsets buffer pages state compress deforientation curorientation orientationchanges k fwpt fhpt fw fh wpt hpt w h lmargin tmargin rmargin bmargin cmarginl cmarginr cmargint cmarginb deflmargin defrmargin x y lasth linewidth corefonts fonts fontfiles diffs images pagelinks links fontfamily fontstyle currentfont fontsizept fontsize drawcolor fillcolor textcolor colorflag autopagebreak pagebreaktrigger infooter inhtmlfooter processingfooter processingheader zoommode layoutmode title subject author keywords creator aliasnbpg aliasnbpggp aliasnbpghex aliasnbpggphex ispre outerblocktags innerblocktags inlinetags listtags tabletags formtags', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-5010-42b3-af8e-150058da60bd', NULL, 'StyleBoxHelper', 'style-box-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\StyleBoxHelper.php', 'start end startsmall endsmall confirmboxstart confirmboxend confirmmessagestart confirmmessageend start end startsmall endsmall confirmboxstart confirmboxend confirmmessagestart confirmmessageend', '', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-d1c0-4bd4-8c83-150058da60bd', NULL, 'ThumbnailHelper', 'thumbnail-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\ThumbnailHelper.php', 'render validate render validate', '', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-f1bc-4e4c-a3a9-150058da60bd', NULL, 'TinyMceHelper', 'tiny-mce-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\TinyMceHelper.php', 'init init', 'helpers defaults helpers defaults', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-548c-4b73-9b51-150058da60bd', NULL, 'WidgetHelper', 'widget-helper', 'D:\\Dev\\Core\\Site\\CmsCore\\View\\Helper\\WidgetHelper.php', 'make make', 'helpers helpers', 2, NULL, '2012-06-25 11:45:16', '2012-06-25 11:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_api_packages`
--

CREATE TABLE IF NOT EXISTS `essendon_api_packages` (
  `id` varchar(36) NOT NULL,
  `parent_id` varchar(36) DEFAULT NULL,
  `path` varchar(500) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `path` (`path`(333))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Used for generating PHP documentation';

--
-- Dumping data for table `essendon_api_packages`
--

INSERT INTO `essendon_api_packages` (`id`, `parent_id`, `path`, `name`, `slug`, `lft`, `rght`, `created`, `modified`) VALUES
('4fe7c2aa-fff8-4add-a628-150058da60bd', NULL, 'app', 'app', 'app', 1, 10, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-af30-4dca-b71d-150058da60bd', '4fe7c2aa-fff8-4add-a628-150058da60bd', 'app/console', 'Console', 'console', 2, 5, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-5e14-4626-9833-150058da60bd', '4fe7c2aa-af30-4dca-b71d-150058da60bd', 'app/console/command', 'Command', 'command', 3, 4, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-488c-45db-8c87-150058da60bd', NULL, 'cake', 'Cake', 'cake', 11, 28, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-efec-445d-a52e-150058da60bd', '4fe7c2aa-488c-45db-8c87-150058da60bd', 'cake/controller', 'Controller', 'controller', 12, 13, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-7ab4-4826-ad18-150058da60bd', '4fe7c2aa-488c-45db-8c87-150058da60bd', 'cake/view', 'View', 'view', 14, 17, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-5bcc-468d-be54-150058da60bd', '4fe7c2aa-fff8-4add-a628-150058da60bd', 'app/view', 'View', 'view', 6, 9, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2aa-9e3c-4451-8bfa-150058da60bd', '4fe7c2aa-5bcc-468d-be54-150058da60bd', 'app/view/helper', 'Helper', 'helper', 7, 8, '2012-06-25 11:45:14', '2012-06-25 11:45:14'),
('4fe7c2ab-3708-4ed1-aa53-150058da60bd', '4fe7c2aa-488c-45db-8c87-150058da60bd', 'cake/debug-kit', 'debug_kit', 'debug-kit', 18, 25, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-991c-473b-ab96-150058da60bd', '4fe7c2ab-3708-4ed1-aa53-150058da60bd', 'cake/debug-kit/vendors', 'vendors', 'vendors', 19, 22, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-d614-4408-adfb-150058da60bd', '4fe7c2ab-991c-473b-ab96-150058da60bd', 'cake/debug-kit/vendors/shells', 'shells', 'shells', 20, 21, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-5010-44ee-8ab2-150058da60bd', NULL, 'debug-kit', 'debug_kit', 'debug-kit', 29, 46, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-1138-4353-a9d9-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'debug-kit/vendors', 'vendors', 'vendors', 30, 33, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-4854-4afd-8ba2-150058da60bd', '4fe7c2ab-1138-4353-a9d9-150058da60bd', 'debug-kit/vendors/shells', 'shells', 'shells', 31, 32, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-436c-4825-906d-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'debug-kit/controllers', 'controllers', 'controllers', 34, 35, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-9ff0-4c4d-a573-150058da60bd', '4fe7c2aa-488c-45db-8c87-150058da60bd', 'cake/utility', 'Utility', 'utility', 26, 27, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-ad38-4901-86b0-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'debug-kit/lib', 'Lib', 'lib', 36, 37, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-6168-4103-b8b2-150058da60bd', '4fe7c2ab-3708-4ed1-aa53-150058da60bd', 'cake/debug-kit/panels', 'panels', 'panels', 23, 24, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-7c84-4d28-bee6-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'debug-kit/models', 'models', 'models', 38, 41, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ab-c660-468c-bfa4-150058da60bd', '4fe7c2ab-7c84-4d28-bee6-150058da60bd', 'debug-kit/models/behaviors', 'behaviors', 'behaviors', 39, 40, '2012-06-25 11:45:15', '2012-06-25 11:45:15'),
('4fe7c2ac-81c8-4997-ad63-150058da60bd', '4fe7c2ab-5010-44ee-8ab2-150058da60bd', 'debug-kit/views', 'views', 'views', 42, 45, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-fffc-488c-b670-150058da60bd', '4fe7c2ac-81c8-4997-ad63-150058da60bd', 'debug-kit/views/helpers', 'helpers', 'helpers', 43, 44, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-ab1c-4916-930e-150058da60bd', '4fe7c2aa-7ab4-4826-ad18-150058da60bd', 'cake/view/helper', 'Helper', 'helper', 15, 16, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-2b48-43af-a683-150058da60bd', NULL, 'p-h-p-excel', 'PHPExcel', 'p-h-p-excel', 47, 48, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-9058-410d-9d25-150058da60bd', NULL, 'p-h-p-excel--shared', 'PHPExcel_Shared', 'p-h-p-excel--shared', 49, 50, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-3fa4-412e-9d46-150058da60bd', NULL, 'p-h-p-excel--writer--excel5', 'PHPExcel_Writer_Excel5', 'p-h-p-excel--writer--excel5', 51, 52, '2012-06-25 11:45:16', '2012-06-25 11:45:16'),
('4fe7c2ac-a0dc-45dc-89c3-150058da60bd', NULL, 'p-h-p-excel--writer', 'PHPExcel_Writer', 'p-h-p-excel--writer', 53, 54, '2012-06-25 11:45:16', '2012-06-25 11:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_cake_sessions`
--

CREATE TABLE IF NOT EXISTS `essendon_cake_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `essendon_cake_sessions`
--

INSERT INTO `essendon_cake_sessions` (`id`, `data`, `expires`) VALUES
('6285b55k3ed9ifv8cevagv13g7', 'Config|a:3:{s:9:"userAgent";s:32:"44d1aa2e03ebeee1476089aa6c4f8be4";s:4:"time";d:1349638870;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"b5eb8730a8d27f3ec1dd4d27a4d1c9f07f90521f";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:7:{s:40:"7edcf2e7a48523240e2a8bf997220fb23f82da61";i:1349165449;s:40:"64d8cbb5c08cad3b93a15e702b0835542a84af08";i:1349165456;s:40:"1200613b67616136fcd977c8bc0dd4fa84ae4832";i:1349165456;s:40:"f1dfedb6bac70ba90a5e6b4dc1535cbdc6a402a1";i:1349165460;s:40:"b932ed3f17c6fa84acd80184ca1c7139614ccd53";i:1349165464;s:40:"f3794fe17abd6b295f7493ea40c5d4eef16b5b92";i:1349165465;s:40:"b5eb8730a8d27f3ec1dd4d27a4d1c9f07f90521f";i:1349165470;}}post-login-url|s:7:"/admin/";Auth|a:1:{s:4:"User";a:15:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:5:"email";s:25:"simon@surfacemedia.com.au";s:10:"last_login";s:19:"2012-02-21 15:37:50";s:7:"created";s:19:"2010-08-02 12:03:49";s:8:"modified";s:19:"2012-07-13 11:28:18";s:8:"group_id";s:1:"1";s:6:"status";b:0;s:10:"deleteable";b:0;s:8:"fullname";s:15:"Madgwicks Admin";s:14:"remote_address";s:9:"127.0.0.1";s:13:"last_login_ip";s:9:"127.0.0.1";s:5:"Group";a:7:{s:2:"id";s:1:"1";s:4:"name";s:13:"Administrator";s:7:"created";s:19:"2010-08-02 12:02:14";s:8:"modified";s:19:"2010-08-02 12:02:14";s:10:"created_by";s:1:"0";s:11:"modified_by";s:1:"0";s:13:"is_admin_user";b:1;}s:4:"Type";s:5:"admin";s:4:"Name";s:15:"Madgwicks Admin";}}Message|a:0:{}AdminList|a:1:{s:7:"Package";a:1:{s:4:"sort";N;}}', 1349638871),
('8ku1728sq1sistf7mbm6o04894', 'Config|a:3:{s:9:"userAgent";s:32:"e34f89a41df38c113bc228a8399bc252";s:4:"time";d:1349692948;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"3c572310b189c787002fe49de81f9d9e4aabea1c";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:1:{s:40:"3c572310b189c787002fe49de81f9d9e4aabea1c";i:1349219548;}}', 1349692948),
('anksouu5k6lbo5e77p3i5sr0i6', 'Config|a:3:{s:9:"userAgent";s:32:"14cb53768c34951cdee352d7fafe0597";s:4:"time";d:1349637529;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"5f8d2a4a7b0ea4c26bc0e46a0d5e1e1ff41380c5";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:1:{s:40:"5f8d2a4a7b0ea4c26bc0e46a0d5e1e1ff41380c5";i:1349164129;}}Auth|a:1:{s:4:"User";a:15:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:5:"email";s:25:"simon@surfacemedia.com.au";s:10:"last_login";s:19:"2012-02-21 15:37:50";s:7:"created";s:19:"2010-08-02 12:03:49";s:8:"modified";s:19:"2012-07-13 11:28:18";s:8:"group_id";s:1:"1";s:6:"status";b:0;s:10:"deleteable";b:0;s:8:"fullname";s:15:"Madgwicks Admin";s:14:"remote_address";s:9:"127.0.0.1";s:13:"last_login_ip";s:9:"127.0.0.1";s:5:"Group";a:7:{s:2:"id";s:1:"1";s:4:"name";s:13:"Administrator";s:7:"created";s:19:"2010-08-02 12:02:14";s:8:"modified";s:19:"2010-08-02 12:02:14";s:10:"created_by";s:1:"0";s:11:"modified_by";s:1:"0";s:13:"is_admin_user";b:1;}s:4:"Type";s:5:"admin";s:4:"Name";s:15:"Madgwicks Admin";}}', 1349637530),
('apaedjcb36o1mfb60hlp71hm03', 'Config|a:3:{s:9:"userAgent";s:32:"7a755f1f2b5c3c22418db966c6bab741";s:4:"time";d:1349638015;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"33d6d5f0530b94f6e954bcbb56749951f4d12be8";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:1:{s:40:"33d6d5f0530b94f6e954bcbb56749951f4d12be8";i:1349164615;}}', 1349638016),
('bphlq6r2t77orctb080hcg1am0', 'Config|a:3:{s:9:"userAgent";s:32:"37c117f4798e02eef9f17292a1c55a75";s:4:"time";d:1349623445;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"103c03bdb27dcae8a8ddd0977b150b6d84c2a402";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:4:{s:40:"f30e3a9493e90deb0e78efe6b317a042d4948b03";i:1349148628;s:40:"183980feb4f04984bfc3853f97b677e490b32faf";i:1349150000;s:40:"e3786e3ef7c8d9d0295a2cb25fb6652a11add66f";i:1349150033;s:40:"103c03bdb27dcae8a8ddd0977b150b6d84c2a402";i:1349150045;}}', 1349623445),
('e14qp6dil6h0hidf6m4mebv6f7', 'Config|a:3:{s:9:"userAgent";s:32:"5c317ee67e221c36f02a8a61d1d4084a";s:4:"time";d:1349699729;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"d23781e976b4324702e640cd72175fd3532f47c5";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:1:{s:40:"d23781e976b4324702e640cd72175fd3532f47c5";i:1349226330;}}', 1349699730),
('hsi27rppdiph4nr2b7jsjk7ph5', 'Config|a:3:{s:9:"userAgent";s:32:"14cb53768c34951cdee352d7fafe0597";s:4:"time";d:1349623504;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"43b63a88b41fe7b8132998fcb139549102db3bb6";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:2:{s:40:"aed89067d270afb11e4c88d3a496c8c780c40ce9";i:1349150103;s:40:"43b63a88b41fe7b8132998fcb139549102db3bb6";i:1349150104;}}', 1349623504),
('vhnk9sp1icvma3u5gg2v64sk37', 'Config|a:3:{s:9:"userAgent";s:32:"de3353f4e62181551d9ff9566212ffa8";s:4:"time";d:1349620615;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"5961e9730385d820977d5b62f0d566a3bc30bffe";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:5:{s:40:"59943a0ba1d212844192bfddc9dab76585de153a";i:1349146714;s:40:"14a0ec2a0207e50d13c666fa6ba98a21b76280b9";i:1349146846;s:40:"9cf4b9409fb9dddbe29f73888457b38238d2f3bf";i:1349146866;s:40:"bffa40d2e7271192e35ad98cf1b677778e3dabd7";i:1349147026;s:40:"5961e9730385d820977d5b62f0d566a3bc30bffe";i:1349147215;}}', 1349620615);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_db_versions`
--

CREATE TABLE IF NOT EXISTS `essendon_db_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `script` varchar(300) NOT NULL COMMENT 'The filename of the SQL script: XXX_description_here.sql',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Records which SQL scripts have been applied using the DB ver' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `essendon_db_versions`
--

INSERT INTO `essendon_db_versions` (`id`, `script`, `created`) VALUES
(1, '001 create cake session table.sql', '2012-10-02 10:53:42'),
(2, '002 Convert FAQs and Package tables to UTF-8.sql', '2012-10-02 10:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_events`
--

CREATE TABLE IF NOT EXISTS `essendon_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `venue` varchar(250) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `rsvp_date` date DEFAULT NULL,
  `rsvp_date_int` int(11) DEFAULT NULL,
  `available` int(11) DEFAULT '0',
  `filled` int(11) DEFAULT '0',
  `pricing` varchar(500) DEFAULT NULL,
  `reminder` tinyint(1) DEFAULT '0',
  `content` mediumtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `publish_date_int` int(11) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '0',
  `file_attach` varchar(100) DEFAULT NULL,
  `showatmenu` tinyint(1) DEFAULT '1',
  `meta_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT '0',
  `menu_label` varchar(50) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_date` date NOT NULL,
  `unlimited` tinyint(1) DEFAULT '0',
  `reminder_date` date DEFAULT NULL,
  `check_status` mediumtext,
  `short_desc` mediumtext,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`venue`,`address`,`content`,`short_desc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `essendon_events`
--

INSERT INTO `essendon_events` (`id`, `title`, `start_time`, `end_time`, `venue`, `address`, `image`, `rsvp_date`, `rsvp_date_int`, `available`, `filled`, `pricing`, `reminder`, `content`, `created`, `modified`, `created_by`, `modified_by`, `publish_date`, `publish_date_int`, `published`, `file_attach`, `showatmenu`, `meta_id`, `category_id`, `menu_label`, `end_date`, `start_date`, `unlimited`, `reminder_date`, `check_status`, `short_desc`) VALUES
(7, 'This is a test upcoming event [unpublished]', '', '', 'test venue', 'test address', '/files/files/Practice_Area_Images/Franchising.jpg', '2012-05-06', NULL, 100, 0, NULL, 0, '<p>this is the full description</p>', '2012-02-06 12:26:08', '2012-03-14 10:58:18', NULL, 1, NULL, NULL, 0, NULL, 1, NULL, 0, NULL, '2012-12-12', '2012-07-20', 0, '2012-06-25', NULL, 'this is the short description'),
(4, 'Workplace Relations drinks and the business perspective for 2012', '7PM', '', 'Madgwicks', 'Level 33, 140 William St\r\nMelbourne VIC 3000', '/files/files/Practice_Area_Images/WR.jpg', '2011-11-01', NULL, 0, 0, NULL, 0, '<p>Madgwicks Lawyers is pleased to invite you to join its Workplace Relations Group for drinks to celebrate another year grappling with the day-to-day challenges of&nbsp; managing human resources under Fair Work Australia.</p>\r\n<p>Our special guest Ruth Dunkin, Director of Policy at the Business Council of Australia will make a short presentation about the year ahead in workplace relations. Ruth has specialised in the labour market, workplace relations, healthcare and aged care reform for the past four years.</p>\r\n<p>Madgwicks&rsquo; Special Counsel Tim Greenall will also take the opportunity to release the results of the firm&rsquo;s Workplace Barometer which surveyed the firm&rsquo;s clients about the workplace relations issues and the outlook for human resources in 2012.</p>\r\n<h2>About the presenters</h2>\r\n<h3>Dr. Ruth Dunkin</h3>\r\n<p><strong>Director Policy, Business Council of Australia </strong></p>\r\n<p>Dr Ruth Dunkin has over 30 years experience in the public and higher education sectors and has a strong&nbsp; background and interest in public policy. Ruth has experience in public policy development, evaluation and implementation in the Victorian Public Service in departments such as Treasury, Premiers and Transport. She spent 15 years in the tertiary education sectors as a senior executive, including as Vice Chancellor of RMIT University between 2000 and 2004. Since leaving RMIT Ruth has been involved in policy development and strategy consulting and advisory work for a variety of clients. She has a Masters in Public Administration from Harvard and a PhD in organisational change from the University of Melbourne.</p>\r\n<h3>Tim Greenall</h3>\r\n<p><strong>Special Counsel, Madgwicks</strong></p>\r\n<p>Tim is a recognised leader in Workplace Relations advising on all aspects of employment law, enterprise bargaining, equal opportunity and occupational health and safety. He acts for employers, executives and insolvency practitioners in a diverse range of industries. He has over 20 years experience as a commercial lawyer, including two years working in the City of London where he completed a Master of Laws at the London School of Economics. Tim is an accredited mediator and brings a strategic approach to the resolution of workplace issues and problems. Tim regularly represents clients at Fair Work Australia and the Courts.</p>', '2012-01-23 17:42:30', '2012-02-20 13:12:57', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, '2012-03-05', 0, NULL, NULL, 'Madgwicks Lawyers is pleased to invite you to join its Workplace Relations Group for drinks to celebrate another year grappling with the day-to-day challenges of managing human resources under Fair Work Australia.'),
(5, 'Jones Lang LaSalle – Melbourne Commercial Property Market Outlook', '07:45:00', '09:00:00', 'Madgwicks', 'Level 33, 140 William St, Melbourne VIC 3000', '/files/files/Practice_Area_Images/Property%20development.jpg', '2011-10-21', NULL, 0, 0, NULL, 0, '<p>At this breakfast seminar Andrew Ballantyne, Research and Consulting Director at Australia&rsquo;s largest property services company Jones Lang LaSalle, will provide insight into the status quo of the Melbourne Commercial Property Market including the retail, industrial and office sectors. Andrew will explain why demand for office space remains relatively firm despite volatility in financial markets as well as compare Melbourne&rsquo;s commercial markets with those in Australia&rsquo;s other major urban centres.</p>\r\n<p>The presentation will cover a broad range of issues impacting the market including asset values, yields and the impact of the higher Australian dollar. Andrew will<br />also examine how macro economic factors such as exports and Australia&rsquo;s GDP are likely to effect Melbourne&rsquo;s commercial property market in the medium to longer<br />term.</p>', '2012-01-23 17:53:15', '2012-02-06 12:07:18', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00', 0, NULL, NULL, 'At this breakfast seminar Andrew Ballantyne, Research and Consulting Director at Australia’s largest property services company Jones Lang LaSalle, will provide insight into the status quo of the Melbourne Commercial Property Market including the retail,  industrial and office sectors.'),
(6, 'Turning point: a future perspective of the Residential Villages Industry', '07:15:00', '09:00:00', 'Madgwicks', 'Level 33, 140 William Street, Melbourne VIC 3000', '/files/files/Practice_Area_Images/Property%20development.jpg', '2010-10-11', NULL, 0, 0, NULL, 0, '<p>The Australian Residential Villages industry has undergone significant change in the past ten years but faces even greater challenges over the next 15 years as the baby boomers enter retirement.</p>\r\n<p>At this seminar, the third in a series held for the industry by Madgwicks this year, Aged Care and Residential Village industry specialist consultants Louise Greene and Fiona Somerville from The Ideal Consultancy will share their unique insight into what the industry can expect as well as providing advice about how different players in the industry can capitalise on change.</p>\r\n<p>The Ideal Consultancy is a national company operating in all states. Louise and Fiona have vast experience in corporate, health, aged care, sales and marketing. The Group specialises in assisting clients in the Aged Care and Residential Villages industry with strategic planning, feasibility studies, due diligence, business improvement, maximising revenue, organisational change, improving occupancy and dealing with compliance issues.</p>\r\n<h2>About the presenters</h2>\r\n<h3>Louise Greene</h3>\r\n<p><strong>The Ideal Consultancy</strong></p>\r\n<p>Louise has worked in professional and management roles in a range of organisations in Victoria. Louise&rsquo;s experience includes developing innovative approaches to service delivery and funding models, and the evaluation of service and program models.</p>\r\n<p>Louise was responsible for the design, development and implementation of flexible service models in the Coordinated Care Trials and the development of innovative service models in the community care setting. She has established quality improvement and performance reporting strategies in a range of organisations and has evaluated the impacts of ongoing quality improvement processes and compliance requirements across a range of care settings.</p>\r\n<h3>Fiona Somerville</h3>\r\n<p><strong>The Ideal Consultancy</strong></p>\r\n<p>A highly motivated professional with solid sales and marketing skills in the healthcare sector. Fiona&rsquo;s most recent work has been focused on driving brand awareness, leading sales teams and developing successful marketing initiatives. This, along with a thorough understanding of financial drivers has vastly improved bottom line results for her clients.</p>', '2012-01-23 18:02:34', '2012-02-06 12:05:03', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00', 0, NULL, NULL, 'The Australian Residential Villages industry has undergone significant change in the past ten years but faces even greater challenges over the next 15 years as the baby boomers enter retirement.'),
(8, 'This is a test upcoming event', '7am', '9pm', 'test venue', 'test address', '/files/files/Practice_Area_Images/Franchising.jpg', '2012-05-06', NULL, 100, 0, '', 0, '<p><iframe src="http://www.youtube.com/embed/4AuOoR5-qvw" frameborder="0" width="560" height="315"></iframe></p>', '2012-02-06 12:26:08', '2012-08-29 07:04:40', NULL, 1, NULL, NULL, 1, NULL, 1, NULL, 0, NULL, '2012-12-12', '2012-12-12', 0, '2012-03-02', NULL, 'this is the short description');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_event_registrations`
--

CREATE TABLE IF NOT EXISTS `essendon_event_registrations` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` mediumint(8) unsigned NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `company` varchar(300) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL COMMENT 'attended / failed to attend / walk-in',
  `paid` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `essendon_event_registrations`
--

INSERT INTO `essendon_event_registrations` (`id`, `event_id`, `first_name`, `last_name`, `email`, `password`, `company`, `phone`, `address`, `suburb`, `postcode`, `status`, `paid`, `created`, `modified`) VALUES
(1, 0, 'Simon', 'East', 'me@simoneast.net', 'simon', 'me', '0431 964 707', 'Somewhere, somewhereville place', 'Sometown', '2323', NULL, 0, '2011-12-20 11:48:29', '2011-12-20 11:48:29'),
(2, 0, 'Simon', 'East', 'me@simoneast.net', 'simon', 'me', '0431 964 707', 'Somewhere, somewhereville place', 'Sometown', '2323', NULL, 0, '2011-12-20 12:44:27', '2011-12-20 12:44:27'),
(3, 0, 'Simonxx', 'East', 'me@simoneast.net', 'simon', 'me', '0431 964 707', 'Somewhere, somewhereville place', 'Sometown', '2323', NULL, 0, '2011-12-20 12:49:29', '2011-12-20 12:49:29'),
(4, 0, 'Simonxx', 'East', 'me@simoneast.net', 'simon', 'me', '0431 964 707', 'Somewhere, somewhereville place', 'Sometown', '2323', NULL, 0, '2011-12-22 11:08:34', '2011-12-22 11:08:34'),
(5, 0, 'Simonxx', 'East', 'me@simoneast.net', 'simon', 'me', '0431 964 707', 'Somewhere, somewhereville place', 'Sometown', '2323', NULL, 0, '2011-12-22 11:09:10', '2011-12-22 11:09:10'),
(6, 0, 'Simonxx', 'East', 'me@simoneast.net', 'simon', 'me', '0431 964 707', 'Somewhere, somewhereville place', 'Sometown', '2323', NULL, 0, '2011-12-22 11:09:46', '2011-12-22 11:09:46'),
(7, 2, 'Simonxx', 'East', 'me@simoneast.net', 'simon', 'me', '0431 964 707', 'Somewhere, somewhereville place', 'Sometown', '2323', NULL, 0, '2011-12-22 11:16:19', '2011-12-22 11:16:19'),
(8, 2, 'Simonxx', 'East', 'me@simoneast.net', 'simon', 'me', '0431 964 707', 'Somewhere, somewhereville place', 'Sometown', '2323', NULL, 0, '2011-12-22 11:16:45', '2011-12-22 11:16:45'),
(9, 4, 'Leah', 'Cunningham', 'leah@surfacemedia.com.au', 'testing', 'test', '3513546854', 'test', 'test', '5555', NULL, 0, '2012-01-30 09:34:32', '2012-02-20 13:10:26'),
(10, 7, 'Leah', 'Event Test', 'leah.cunningham84@gmail.com', 'testing', 'test company', '11111111', '1 Street', 'This is my suburb', '3000', NULL, 0, '2012-02-06 12:30:48', '2012-02-06 12:30:48'),
(11, 8, 'Simon', 'East', 'simon@surfacemedia.com.au', 'simon', '123', '123', 'addr', 'suburb', '3000', NULL, 0, '2012-03-07 11:10:21', '2012-03-07 11:10:21'),
(12, 8, 'Simon', 'East', 'simon@surfacemedia.com.au', 'simon', '123', '123', 'addr', 'suburb', '3000', NULL, 0, '2012-03-07 11:18:59', '2012-03-07 11:18:59'),
(13, 8, 'Simon', 'East', 'simon@surfacemedia.com.au', 'simon', '123', '123', 'addr', 'suburb', '3000', NULL, 0, '2012-03-07 11:20:31', '2012-03-07 11:20:31'),
(14, 8, '123', '123', 'simon@surfacemedia.com.au', 'simon', '33', '33', '33', '33', '3333', NULL, 0, '2012-03-07 11:22:10', '2012-03-07 11:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_faqs`
--

CREATE TABLE IF NOT EXISTS `essendon_faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `faq_section_id` varchar(3) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `publish_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `displaying_order` int(4) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=208 ;

--
-- Dumping data for table `essendon_faqs`
--

INSERT INTO `essendon_faqs` (`id`, `question`, `answer`, `faq_section_id`, `published`, `created`, `modified`, `publish_date`, `created_by`, `modified_by`, `displaying_order`, `weight`) VALUES
(156, 'How long will it take to receive my membership pack?', '<p>The Melbourne Football Club endeavours to have all packs out by the start of the 2012 football season. If a 2012 membership is purchased in January or February, the pack may take up to three weeks to be delivered to your nominated address.&nbsp; Packages purchased in March or during the 2012 AFL season should arrive within 1-2 weeks of purchase.&nbsp;</p>', '81', 1, '2011-11-23 15:30:45', '2012-01-17 13:56:10', '0000-00-00 00:00:00', 30, 32, 102, 0),
(155, 'How do I buy a membership as a gift?', '<p>If you purchase the membership as a gift, we can provide a gift certificate indicating that the membership has been purchased and will be on its way. If you require a gift certificate, it can be organised by contacting Membership Services 1300 Demons (1300 336 667).</p>', '81', 1, '2011-11-23 15:27:22', '2012-07-11 13:43:52', '0000-00-00 00:00:00', 30, 1, 101, 0),
(161, 'What do I do if my membership card is lost or stolen, or if I have forgotten it on game day?', '<p>Lost membership cards will be replaced upon payment of a $10 replacement fee. For the replacement of a stolen membership card, a statutory declaration may be requested. The Melbourne Football Club cannot provide tickets when membership cards are not brought to the game. Members will need to purchase a daily admission ticket at their own cost in this case.</p>', '81', 1, '2011-11-23 16:26:14', '2012-01-17 13:57:56', '0000-00-00 00:00:00', 30, 32, 107, 0),
(163, 'How do I get into games? ', '<p>Swipe your membership card at the turnstiles to gain admission into the ground. General admission is subject to capacity.</p>\r\n<p>To gain entry to a game at either the MCG or Etihad Stadium, simply swipe your membership card through the turnstiles at the ground. If entering a match played at the MCG, membership cards can be swiped at Gates 1, 3, 4 or 5.&nbsp; If you experience any difficulty with your card when scanning for entry, it is essential that you contact Membership Services during business hours.&nbsp; Your membership card will gain you entry at any of the gates at Etihad Stadium for a Melbourne home game.</p>', '82', 1, '2011-11-24 10:57:04', '2012-01-17 13:58:28', '0000-00-00 00:00:00', 30, 32, 109, 0),
(164, 'I have a question', '<p>Okay.</p>', '81', 0, '2011-12-09 17:13:45', '2012-07-12 12:42:55', '0000-00-00 00:00:00', 1, 1, 110, 0),
(165, 'Which games can I attend?', '<p>All members with a barcode on their membership card will be able to gain free entry into all Melbourne based home games, plus the replacement home game.&nbsp; If you are a Country 5 member, you are entitled to free entry to any five Melbourne based home games.&nbsp; If you are a 3 game member, you are entitled to free entry to any three Melbourne home games.&nbsp;</p>\r\n<p>15 game (home and away) members are entitled to free entry to all Melbourne games played in Melbourne (at both the MCG and Etihad Stadium).</p>\r\n<p>For more detailed information on access to games and ticketing arrangements, please <a title="Fixture and access summary" href="/member-zone/fixture-and-access-summary.html">click here</a>.</p>', '82', 1, '2012-01-12 13:34:40', '2012-01-17 14:00:22', '0000-00-00 00:00:00', 32, 32, 111, 0),
(166, 'How do I know where my reserved seat is located?', '<p>Members who have purchased a season reserved seat for Melbourne home games at the MCG &nbsp;as part of their membership package will have this seat detail printed on the back of their membership card. If you have purchased a season reserved seat and there are no seating details printed on your membership card, please contact Membership Services on 1300 Demons (1300 336 667) or <a href="mailto:membership@melbournefc.com.au">membership@melbournefc.com.au</a>.</p>', '83', 1, '2012-01-12 13:51:08', '2012-01-17 14:06:49', '0000-00-00 00:00:00', 32, 32, 112, 0),
(167, 'What if I live in the country/interstate/overseas?', '<p>If you live in the country/interstate or even overseas, a country/interstate membership is one of the best options for you. It entitles members to attend any 5 Melbourne home games played in Melbourne.</p>\r\n<p>You are eligible to purchase a country membership if you live 120 km or more from the Melbourne CBD.</p>\r\n<p>The Club also receives a small allocation of tickets to sell for each interstate game in which Melbourne participates. Melbourne members based interstate are entitled to one free ticket to one game played in their state each year. Information on how to reserve their free ticket will be sent to the members living in the relevant state around six weeks before the match. &nbsp;</p>\r\n<p>Victorian based members will have the opportunity to purchase tickets to an interstate game through the Club, by contacting Membership Services four weeks before the specific game.</p>\r\n<p>For more information regarding our interstate games, please <a title="Interstate Ticketing" href="/member-ticketing/interstate-ticketing-.html">click here</a>.</p>', '84', 1, '2012-01-12 13:52:32', '2012-01-17 14:10:16', '0000-00-00 00:00:00', 32, 32, 113, 0),
(168, 'Am I eligible for a concession membership?', '<p>Concession members must be able to produce appropriate identification when attending games:</p>\r\n<ul>\r\n<li>Pension card (aged; single parent; disability) </li>\r\n<li>Student card (full time only) </li>\r\n<li>Veterans Affairs concession card </li>\r\n</ul>\r\n<p>Health care cards do not qualify.</p>', '85', 1, '2012-01-12 13:53:20', '2012-01-17 14:16:16', '0000-00-00 00:00:00', 32, 32, 114, 1),
(169, 'How do I join?', '<ul>\r\n<li>Online: 24 hours <a title="Melbourne Football Club Membership" href="http://www.membership.melbournefc.com.au">membership.melbournefc.com.au</a> </li>\r\n<li>Phone: 1300 DEMONS (1300 336 667), Monday &ndash; Friday 9 am &ndash; 5 pm </li>\r\n<li>Mail: Membership Services, PO Box 204 Melbourne, 3001 </li>\r\n<li>In person: Demon Shop, Great Southern Stand, MCG, Brunton Avenue, Jolimont. Monday &ndash; Friday 10 am &ndash; 5 pm</li>\r\n</ul>', '86', 1, '2012-01-12 13:54:17', '2012-01-17 14:18:40', '0000-00-00 00:00:00', 32, 32, 115, 0),
(170, 'Am I entitled to purchase a ticket to finals matches?', '<p>As a member, you are entitled to priority access to purchase tickets to finals matches before the general public, should Melbourne compete.</p>\r\n<p>Tickets to finals are available for purchase through the relevant ticketing agencies. For finals played at the MCG, the ticketing agency is Ticketek, and for games played at Etihad Stadium the agency is Ticketmaster. The Melbourne Football Club does not sell tickets for the finals series.</p>\r\n<p>It is best to check the Club website and weekly member emails for up to date finals ticketing information and purchase procedures in the lead up to the finals series.&nbsp;</p>', '87', 1, '2012-01-12 13:55:34', '2012-01-17 14:21:04', '0000-00-00 00:00:00', 32, 32, 116, 0),
(171, 'How do I get my merchandise signed?', '<p>Our players are happy to sign autographs at open training sessions or public appearances if they are available.&nbsp; Information on open training sessions is available on our website click here.&nbsp;&nbsp;</p>\r\n<p>The Club does not accept merchandise for the purpose of autographing for individuals or organisations.</p>', '88', 1, '2012-01-12 13:56:08', '2012-01-17 15:07:35', '0000-00-00 00:00:00', 32, 32, 117, 0),
(172, 'Where do I purchase Melbourne products from?', '<p>The Melbourne Football Club shop (Demon Shop) located on Brunton Ave is the only shop where all the profits go back to the Club. If you want to purchase Melbourne Football Club merchandise we urge you visit the shop on Brunton Ave as it is also the only shop where you will get your 10% discount as a thanks from us for being a loyal member.</p>', '89', 1, '2012-01-12 13:56:40', '2012-01-17 15:09:16', '0000-00-00 00:00:00', 32, 32, 118, 0),
(173, 'When is Family Day?', '<p>This year&rsquo;s Family Day will be held at Luna Park on Sunday 4 March. Our City of Casey Family day will be held during the afternoon of Friday 17 February at Casey Fields, in conjunction with our Intra Club Practice Match. Visit the <a title="Events Calendar" href="http://www.melbournefc.com.au/off-season%20calendar/tabid/18398/default.aspx">Events page </a>of our website for details.</p>', '90', 1, '2012-01-12 13:57:15', '2012-01-17 15:18:31', '0000-00-00 00:00:00', 32, 32, 119, 0),
(175, 'Where do members sit?', '<p>3,5,11 and 15 game membership holders sit in general admission seating.&nbsp; At the MCG for Melbourne home games, general admission seating is available in various parts of Levels 1, 3 and 4.&nbsp; These areas are subject to change, depending on the expected crowd. Reserved seat members sit in their allocated seat at home games.</p>\r\n<p>Match Day information, including information on the location of general admission seating, is updated on a weekly basis and can be found by visiting our <a title="Match Day Information" href="/member-zone/match-day-information.html">Match Day information page</a>.</p>', '82', 1, '2012-01-17 14:00:51', '2012-01-17 14:02:09', '0000-00-00 00:00:00', 32, 32, 120, 0),
(176, 'What happens if I take a non member to the game with me?', '<p>While a member can scan their barcode and enter through the turnstiles, a non-member must purchase a daily general admission ticket which they can then scan at the turnstiles. A non-member is not able to sit in a Melbourne reserved seat area.</p>\r\n<p>All members and non-members (with a general admission ticket) can sit in the available general admission areas.&nbsp;</p>\r\n<p>Premium members (Legends, Tridents and Redlegs members) can purchase Premium member guest passes for Melbourne home games at the MCG.&nbsp; These passes allow members and guests to sit in designated premium bays at the match, and attend the Premium member function rooms before, during and after the match.&nbsp; More information on these passes can be found here (link to member ticketing/guest passes).&nbsp;</p>', '82', 1, '2012-01-17 14:02:46', '2012-01-17 14:02:52', '0000-00-00 00:00:00', 32, 32, 121, 0),
(177, 'Can someone else use my membership card?', '<p>Membership cards are non-transferable. This means that only the member whose name is printed on the back of the card can use the membership entitlements.</p>', '82', 1, '2012-01-17 14:03:30', '2012-01-17 14:03:30', '0000-00-00 00:00:00', 32, 0, 122, 0),
(178, 'Do I have to purchase my child a ticketed membership to gain admission into grounds?', '<p>Children aged 5 and under as at 1 January 2012 are entitled to enter the ground at no charge; however, they must not occupy a seat (should sit on lap).</p>', '82', 1, '2012-01-17 14:04:06', '2012-01-17 14:04:06', '0000-00-00 00:00:00', 32, 0, 123, 0),
(179, 'Does my membership guarantee me entry into matches and what happens if it is a fully ticketed match? ', '<p>A fully ticketed game or sell out is any match where every patron attending must have a designated seat. For a Melbourne home game, members with annual reserved seating can scan their membership card at the turnstiles and sit in their seat.&nbsp; All members without reserved seating will need to purchase a seat through Ticketek/Ticketmaster, subject to capacity, to gain entry.</p>\r\n<p>The AFL announces that a game will be fully ticketed/sell out on or before the Friday two weeks before the game.&nbsp; Information about upcoming matches can be found in newspapers, on our website, weekly member emails, and by contacting the AFL or Ticketek/Ticketmaster.&nbsp;</p>', '82', 1, '2012-01-17 14:04:56', '2012-01-17 14:06:07', '0000-00-00 00:00:00', 32, 32, 124, 0),
(180, 'How does the replacement game work?', '<p>With Melbourne playing one home game in Darwin, all members can gain free entry to our Round 3 away game against Richmond.&nbsp; Simply scan your membership card at the turnstiles.&nbsp; Please be aware that if you have a reserved seat for home games, they will not be available for this game.&nbsp;</p>', '82', 1, '2012-01-17 14:05:36', '2012-01-17 14:05:36', '0000-00-00 00:00:00', 32, 0, 125, 0),
(181, 'Can I purchase reserved seating for individual home games through MFC? ', '<p>The Melbourne Football Club does not sell individual daily reserved seats, only season reserved seats.&nbsp; If you have not purchased a season reserved seat and would like one for a specific game, you are able to do this through Ticketek (MCG games) on 132 849 Ticketmaster (Etihad Stadium games) on 1300 136 122. For Melbourne home games, quote the 12 digit barcode number on the back of your membership card, and you will only be required to pay for the reserved seat portion of the ticket price.</p>', '83', 1, '2012-01-17 14:07:28', '2012-01-17 14:07:32', '0000-00-00 00:00:00', 32, 32, 126, 0),
(182, 'Can I purchase a reserved seat for home games at Etihad Stadium?', '<p>The Round 16 home game against Fremantle is at Etihad Stadium.&nbsp;As this is a home game, all members have access to the game.&nbsp; This access is general admission and seating will be available on level&nbsp;1 of the stadium.<br /><br />All Legends members will have access to a reserved seat for this game, which the MFC will purchase for you.&nbsp;You will receive correspondence in relation&nbsp;to attending this game.<br /><br />Tridents, Redlegs and Demon Seats members can upgrade to a reserved seat directly through the Club.&nbsp;This will allow members to sit together on the wing on Level 1.</p>\r\n<p>Red and Blue (General Admission members) can upgrade to a reserved seat directly through Ticketmaster.</p>\r\n<p>For more information on this match <a title="Etihad Stadium Games" href="/member-ticketing/etihad-stadium-games.html">click here</a>.</p>', '83', 1, '2012-01-17 14:08:12', '2012-01-17 14:08:43', '0000-00-00 00:00:00', 32, 32, 127, 0),
(183, 'Can I purchase reserved seats annually for away matches?', '<p>The Melbourne Football Club does not sell seating for away games, even if you have annual reserved seating with a 15 game membership. To purchase seats for an away game, please contact Ticketek (MCG games) or Ticketmaster (Etihad Stadium games).</p>', '83', 1, '2012-01-17 14:09:11', '2012-01-17 14:09:17', '0000-00-00 00:00:00', 32, 32, 128, 0),
(184, 'What is a family membership?', '<p>Family Membership includes 2 adults and up to 4 juniors under the age of 15 as at 1 January 2012. &nbsp;&nbsp;</p>', '84', 1, '2012-01-17 14:10:43', '2012-01-17 14:10:43', '0000-00-00 00:00:00', 32, 0, 129, 0),
(185, 'Do all of the members have to live at the same address to purchase a family package?', '<p>No, all members do not need to live at the same address to be eligible to purchase a family membership package.&nbsp;</p>', '84', 1, '2012-01-17 14:11:07', '2012-01-17 14:11:07', '0000-00-00 00:00:00', 32, 0, 130, 0),
(186, 'What correspondence do I receive from the Club once I sign up? ', '<p>All members receive a copy of our Heartbeat Season Guide (March) and Heartbeat Yearbook (December) magazine (one per household), as well as weekly emails, provided we have your current email address.</p>\r\n<p>Another great way to keep in touch with the goings on at the Club is through the official website, <span style="text-decoration: underline;"><a title="Melbourne Football Club Website" href="http://www.melbournefc.com.au">melbournefc.com.au</a></span>. The website is updated daily with news stories and information direct from the Club and the AFL.&nbsp; You can also follow the club on <a title="Melbourne Football Club Facebook Page" href="http://www.facebook.com/MELBOURNEfc">Facebook</a> and <a title="Melbourne Football Club Twitter" href="https://twitter.com/#!/melbournefc">Twitter</a>.</p>', '84', 1, '2012-01-17 14:13:38', '2012-01-17 14:13:44', '0000-00-00 00:00:00', 32, 32, 131, 0),
(187, 'How do I become part of the Cheer Squad?', '<p>Being a member of the Cheer Squad is a great way to be involved as close to the action as you can get. Located behind the goals in a family friendly environment, the Cheer Squad adds to the voice and colour of match days. The Cheer Squad also shares the responsibility of preparing the weekly run through banner, and representing the Club Australia-wide.<br /><br />New members are always welcome. <a title="Melbourne Football Club Cheer Squad" href="/member-zone/cheer-squad.html">Click here</a> for more information on becoming a Cheer Squad member.</p>', '84', 1, '2012-01-17 14:14:20', '2012-01-17 14:16:01', '0000-00-00 00:00:00', 32, 32, 132, 0),
(188, 'Who classifies as a Junior Member?', '<p>Junior members must be under the age of 15 as of 1 January 2012 to be eligible to purchase a Junior ticketed membership.&nbsp; If they turn 15 before this date, they will need to purchase a Youth or Concession membership.&nbsp; Renewal forms are automatically updated with this change.</p>', '85', 1, '2012-01-17 14:16:41', '2012-01-17 14:16:41', '0000-00-00 00:00:00', 32, 0, 133, 0),
(189, 'Who classifies as a Youth Member?', '<p>Youth members must be under the age of 18 as of 1 January 2012 to be eligible to purchase a Youth ticketed membership.&nbsp; If they turn 18 before this date, they will need to purchase a Concession or Adult membership.&nbsp; Renewal forms are automatically updated with this change.</p>', '85', 1, '2012-01-17 14:17:11', '2012-01-17 14:17:17', '0000-00-00 00:00:00', 32, 32, 134, 0),
(190, 'Does MFC offer a companion card service?', '<p>The AFL is an affiliate of the Companion Card program that exists in some states. It agrees to provide an admission ticket for the cardholder''s companion at no charge. This includes reserves seats if a reserved seat is purchased by the person requiring a carer (Companion Card must be shown before purchase).</p>', '85', 1, '2012-01-17 14:17:43', '2012-01-17 14:17:43', '0000-00-00 00:00:00', 32, 0, 135, 0),
(191, 'What are my payment options?', '<p>You can pay for memberships using credit card (VISA, MasterCard, Amex), cheque, and money order, or by cash/EFTpos in person at the Demon Shop. We also offer a part payment plan system via credit card. The Demons Direct scheme allows members to pay off their membership in 11 monthly instalments.</p>', '86', 1, '2012-01-17 14:19:11', '2012-01-17 14:19:11', '0000-00-00 00:00:00', 32, 0, 136, 0),
(192, 'What is Demons Direct?', '<p>Demons Direct is a payment plan option for memberships that allows you to show true commitment, and makes your membership more affordable.</p>\r\n<p>You can pay your membership in 11 monthly instalments, or select our Demons Direct Annual payment plan to have your membership automatically renewed in one lump sum each year.</p>\r\n<p>In 2012, there are three ways to become a Demon for Life:</p>\r\n<ul>\r\n<li>Annual up front: have your membership renewed from your credit card each year in one lump sum (no fees apply) </li>\r\n<li>Monthly credit card: pay for your membership in 11 monthly instalments (no fees apply) </li>\r\n<li>Monthly direct debit: pay for your membership in 11 monthly instalments from your cheque or savings account ($10 admin fee applies). </li>\r\n</ul>\r\n<p>Simply choose your preferred option upon paying for your membership.</p>', '86', 1, '2012-01-17 14:19:42', '2012-01-17 14:20:04', '0000-00-00 00:00:00', 32, 32, 137, 0),
(193, 'Can I change my payment details for Demons Direct?', '<p>Yes you can change your payment details at any time.&nbsp; Contact Membership Services on 1300 Demons (1300 336 667) to change your payment option for Demons Direct.&nbsp;</p>', '86', 1, '2012-01-17 14:20:28', '2012-01-17 14:20:28', '0000-00-00 00:00:00', 32, 0, 138, 0),
(194, 'What is a Grand Final Guarantee?', '<p>Members who have purchased a Premium membership (Legends, Tridents and Redlegs members), will be guaranteed priority access to purchase Grand Final tickets, should Melbourne participate.</p>\r\n<p>Demon Seats and Red and Blue Members are able to purchase a Grand Final Guarantee as a membership add on.&nbsp; This means that, should Melbourne participate in the Grand Final, you will be guaranteed priority access to purchase a Grand Final ticket.</p>\r\n<p><a href="http:/member-ticketing/grand-final-guarantee.html">Click here</a> for more information on Grand Final guarantees.</p>', '87', 1, '2012-01-17 14:21:30', '2012-01-17 14:37:00', '0000-00-00 00:00:00', 32, 32, 139, 0),
(195, ' What is the Club’s donation/community request policy?', '<p>The Melbourne Football Club receives hundreds of requests from community organisations every year.&nbsp; We take pride in our commitment to fulfill as many of these requests as possible. With only a limited number of signed items available each year, requests are not always successful, with priority given to major charities and peak community organisations within the City of Casey. If we are unable to fulfill your request for a signed item, we will still aim to assist you in some capacity.</p>\r\n<p>Please <a title="Community Requests and Donations" href="http://www.melbournefc.com.au/community%20requests/tabid/14228/default.aspx">click here</a> for more information on the Club''s community involvement and the types of requests that we can fulfill.&nbsp;</p>', '88', 1, '2012-01-17 15:08:46', '2012-01-17 15:08:46', '0000-00-00 00:00:00', 32, 0, 140, 0),
(196, 'When is the Demon Shop open?', '<p>The Demon Shop is open 10 am &ndash; 5 pm Monday to Friday out of season and before, during and after all Melbourne games at the MCG.&nbsp;</p>', '89', 1, '2012-01-17 15:09:42', '2012-01-17 15:09:42', '0000-00-00 00:00:00', 32, 0, 141, 0),
(197, 'Where can I park to go to the Demon Shop?', '<p>Parking at the Demon Shop can be difficult; however, there are a few options.</p>\r\n<ul>\r\n<li>Firstly, you may park your car at the security window outside the Demon Shop. Pull into the slip lane at Entrance E on Brunton Ave and ask the security guard if you are able to park there. Just remember, they may say no and you must obey that, but generally they are fine with you parking there. </li>\r\n<li>Second option is parking in Richmond, AAMI Park car park or East Melbourne. There are plenty of car parks within a short walk of the Demon Shop.</li>\r\n<li>Third option is public transport. You can catch the train to either Richmond or Jolimont station, and walk, or you can get off at the Hisense stop on the No. 70 tram, or the Hilton Hotel stop for the No. 75 or 48 trams.&nbsp;</li>\r\n</ul>', '89', 1, '2012-01-17 15:10:23', '2012-01-17 15:10:27', '0000-00-00 00:00:00', 32, 32, 142, 0),
(198, 'How can I update my contact details?', '<p>You can update your contact details online by <a title="Update your details" href="/member-zone/update-your-membership-details.html">clicking here</a>, or by contacting Membership Shared Services on 1300 Demons (1300 336 667). It&rsquo;s important that we always have your correct contact details.</p>', '89', 1, '2012-01-17 15:10:51', '2012-01-17 15:11:34', '0000-00-00 00:00:00', 32, 32, 143, 0),
(199, 'Can I come and watching training sessions?', '<p>Throughout the pre-season and season supporters are welcome to come and watch the players train at designated open training sessions. Details of open training sessions are published on our website.&nbsp; <a title="Training Times" href="http://www.melbournefc.com.au/training%20times/tabid/8753/default.aspx">Click here</a>.</p>', '89', 1, '2012-01-17 15:12:40', '2012-01-17 15:12:40', '0000-00-00 00:00:00', 32, 0, 144, 0),
(200, 'How can I get a job at the Melbourne Football Club?\r\n', '<p>From time to time jobs are advertised via our <a title="Melbourne Football Club Careers Page" href="ttp://www.melbournefc.com.au/careers">careers page</a>,&nbsp;and via job advertising websites such as Seek.</p>', '89', 1, '2012-01-17 15:13:07', '2012-01-17 15:13:38', '0000-00-00 00:00:00', 32, 32, 145, 0),
(201, 'Does the Club offer Work Experience placements?', '<p>The Melbourne Football Club&rsquo;s annual work experience program offers 40 high school students from around Australia a unique opportunity to spend a week embedded in an AFL club. <a title="Work Experience Program" href="http://www.melbournefc.com.au/workexperience">Click here</a> for full details.</p>', '89', 1, '2012-01-17 15:14:36', '2012-01-17 15:14:36', '0000-00-00 00:00:00', 32, 0, 146, 0),
(202, 'Does the Club offer internships?', '<p>Unfortunately, the Club is not in a position to accept interns.</p>', '89', 1, '2012-01-17 15:15:08', '2012-01-17 15:15:14', '0000-00-00 00:00:00', 32, 32, 147, 0),
(203, 'How can I become a volunteer at the Melbourne Football Club?', '<p>Melbourne Football Club volunteers assist with a range of tasks, including membership sales/scarf distribution, raffle ticket sales, junior footy clinics and membership telemarketing. &nbsp;The main thing we look for from our volunteers is a level of commitment and the ability to assist at the majority of match days.&nbsp; &nbsp; If you are interested in becoming a volunteer, please email your details to <a href="mailto:info@melbournefc.com.au">info@melbournefc.com.au</a>.</p>', '89', 1, '2012-01-17 15:15:46', '2012-01-17 15:15:46', '0000-00-00 00:00:00', 32, 0, 148, 0),
(204, 'Can I take a tour of the Club’s facilities?', '<p>We do not currently offer tours of the Club&rsquo;s facilities.&nbsp; The MCC offers extensive MCG tours.&nbsp; Further information can be found <a title="MCG Tours" href="http://www.mcg.org.au/Tours/The%20MCG%20Tour.aspx">here</a>.</p>', '89', 1, '2012-01-17 15:16:29', '2012-01-17 15:16:29', '0000-00-00 00:00:00', 32, 0, 149, 0),
(205, 'Can I contact Jim Stynes? ', '<p>All correspondence for Jim Stynes should be sent via mail to the Melbourne Football Club, PO Box 254, East Melbourne 8002, or emailed to info@melbournefc.com.au. Jim receives an extremely large volume of mail and correspondence, and with his focus primarily on his recovery and his family he is not necessarily able to respond personally to everyone.</p>', '89', 1, '2012-01-17 15:16:53', '2012-01-17 15:16:53', '0000-00-00 00:00:00', 32, 0, 150, 0),
(206, 'When are this year’s junior clinics?', '<p>All Junior members are encouraged to attend our free clinics, which are included as part of the Junior membership packages.&nbsp; These clinics, aimed at children from 5 years old, involve all our players, and are held during the school holidays. Junior members are required to register to attend these clinics, and this can be done online.&nbsp; Keep an eye on our <a title="Junior Clinics" href="http://www.melbournefc.com.au/junior%20clinics/tabid/14085/default.aspx">website</a> for more information regarding these clinics.</p>', '90', 1, '2012-01-17 15:19:20', '2012-02-02 16:43:19', '0000-00-00 00:00:00', 32, 1, 151, 0),
(207, 'Testing', '<p>testing</p>', '81', 1, '2012-01-18 11:46:20', '2012-07-11 06:30:21', '0000-00-00 00:00:00', 1, 1, 152, 0);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_faq_sections`
--

CREATE TABLE IF NOT EXISTS `essendon_faq_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `category_type_id` tinyint(4) NOT NULL DEFAULT '0',
  `softdelete` tinyint(1) NOT NULL DEFAULT '0',
  `sortorder` mediumint(8) unsigned NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`category_type_id`),
  KEY `name_2` (`name`(15))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `essendon_faq_sections`
--

INSERT INTO `essendon_faq_sections` (`id`, `name`, `created`, `modified`, `created_by`, `modified_by`, `category_type_id`, `softdelete`, `sortorder`, `weight`) VALUES
(86, 'Payments And Joining', '2012-01-11 16:27:24', '2012-01-11 16:27:24', 1, 0, 1, 0, 0, 0),
(87, 'Finals Ticketing', '2012-01-11 16:27:35', '2012-01-11 16:27:35', 1, 0, 1, 0, 0, 0),
(88, 'Signatures And Donations', '2012-01-11 16:27:44', '2012-01-11 16:27:44', 1, 0, 1, 0, 0, 0),
(90, 'Events', '2012-01-11 16:28:01', '2012-07-05 15:51:27', 1, 0, 1, 0, 0, 0),
(89, 'General Questions', '2012-01-11 16:27:53', '2012-01-11 16:27:53', 1, 0, 1, 0, 0, 0),
(85, 'Concession/Junior/Companion', '2012-01-11 16:27:16', '2012-01-11 16:27:16', 1, 0, 1, 0, 0, 0),
(84, 'Membership Types', '2012-01-11 16:27:06', '2012-01-11 16:27:06', 1, 0, 1, 0, 0, 0),
(83, 'Reserved Seating', '2012-01-11 16:26:56', '2012-01-11 16:26:56', 1, 0, 1, 0, 0, 0),
(82, 'Game Day', '2012-01-11 16:26:45', '2012-01-11 16:26:45', 1, 0, 1, 0, 0, 0),
(81, 'Membership Card and Packs', '2012-01-11 16:26:13', '2012-07-11 13:43:59', 1, 0, 1, 0, 0, 0),
(91, 'DEmons Direct', '2012-01-12 16:14:30', '2012-01-12 16:14:30', 32, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_fixed_menus`
--

CREATE TABLE IF NOT EXISTS `essendon_fixed_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `add_url` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `sitemap_id` int(11) NOT NULL DEFAULT '0',
  `porder` mediumint(9) NOT NULL DEFAULT '0',
  `classname` varchar(20) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT '0',
  `showatmenu` tinyint(1) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `essendon_groups`
--

CREATE TABLE IF NOT EXISTS `essendon_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_admin_user` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `essendon_groups`
--

INSERT INTO `essendon_groups` (`id`, `name`, `created`, `modified`, `created_by`, `modified_by`, `is_admin_user`) VALUES
(1, 'Administrator', '2010-08-02 12:02:14', '2010-08-02 12:02:14', 0, 0, 1),
(2, 'Manager', '2010-08-02 12:02:18', '2010-08-02 12:02:18', 0, 0, 1),
(3, 'Editor', '2010-08-02 12:02:18', '2010-08-02 12:02:18', 0, 0, 1),
(4, 'Member', NULL, NULL, 0, 0, 0),
(5, 'Non-Member', NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_metas`
--

CREATE TABLE IF NOT EXISTS `essendon_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(1000) NOT NULL,
  `meta_desc` varchar(1000) NOT NULL,
  `item_type_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT '0',
  `model_name` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `essendon_metas`
--

INSERT INTO `essendon_metas` (`id`, `meta_key`, `meta_desc`, `item_type_id`, `item_id`, `model_name`, `page_title`) VALUES
(1, '', '', 1, 2, 'Page', ''),
(2, '', '', 1, 3, 'Page', ''),
(3, '', '', 1, 4, 'Page', ''),
(4, ' ', ' ', 1, 5, 'Page', ''),
(5, 'M Keyword', 'M Description', 1, 6, 'Page', 'Madgwicks - Careers'),
(7, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 11, 'Page', 'Madgwicks - [PageName]'),
(8, '', '', 1, 12, 'Page', ''),
(9, 'M Keyword', 'M Description', 1, 13, 'Page', 'Madgwicks - Our People'),
(10, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 16, 'Page', 'Madgwicks - Our History'),
(11, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 17, 'Page', 'Madgwicks - Staff Portal'),
(12, '', '', 1, 18, 'Page', ''),
(13, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 19, 'Page', 'Madgwicks - [PageName]'),
(14, '', '', 1, 20, 'Page', ''),
(15, '', '', 1, 21, 'Page', ''),
(16, '', '', 1, 22, 'Page', ''),
(17, ' ', ' ', 1, 23, 'Page', ''),
(18, ' ', ' ', 1, 24, 'Page', ''),
(19, ' ', ' ', 1, 25, 'Page', ''),
(20, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 41, 'Page', 'Madgwicks - Human Resources'),
(21, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 42, 'Page', 'Madgwicks - Meet the Team'),
(22, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 73, 'Page', 'Essendon Membership - Policies'),
(23, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 44, 'Page', 'Madgwicks - Mind & Body @ Madgwicks'),
(24, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 75, 'Page', 'Madgwicks - Charity of the Year'),
(25, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 46, 'Page', 'Madgwicks - Social Committee'),
(26, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 47, 'Page', 'Madgwicks - Jobs'),
(27, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 48, 'Page', 'Madgwicks - Marketing'),
(28, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 49, 'Page', 'Madgwicks - Meet the Team'),
(29, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 50, 'Page', 'Madgwicks - Communications'),
(30, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 51, 'Page', 'Madgwicks - Events '),
(31, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 52, 'Page', 'Madgwicks - Practice Areas'),
(32, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 53, 'Page', 'Madgwicks - Training'),
(33, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 54, 'Page', 'Madgwicks - Support Services'),
(34, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 55, 'Page', 'Madgwicks - Accounts'),
(35, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 56, 'Page', 'Madgwicks - Administration'),
(36, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 57, 'Page', 'Madgwicks - Document Production'),
(37, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 58, 'Page', 'Madgwicks - New Page'),
(38, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 59, 'Page', 'Madgwicks - Kitchen'),
(39, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 60, 'Page', 'Madgwicks - Office Services'),
(40, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 61, 'Page', 'Madgwicks - Reception'),
(41, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 63, 'Page', 'Madgwicks - Office Information'),
(42, 'Madgwicks Lawyers, law firm, Melbourne, Victoria, commercial, legal services', 'Madgwicks is a Melbourne based commercial law firm with highly experienced lawyers, providing legal services for organisations and individuals across a broad range of clients and industries ', 1, 64, 'Page', 'Madgwicks - Useful Links'),
(43, ' ', ' ', 1, 80, 'Page', ''),
(44, ' ', ' ', 1, 81, 'Page', ''),
(45, ' ', ' ', 1, 85, 'Page', ''),
(46, ' ', ' ', 1, 108, 'Page', ''),
(47, ' ', ' ', 1, 109, 'Page', ''),
(48, ' ', ' ', 1, 110, 'Page', ''),
(101, 'Surface FC', 'Surface FC', 1, 182, 'Page', 'Surface FC'),
(60, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 139, 'Page', 'Madgwicks Lawyers - Our Firm'),
(54, ' ', ' ', 1, 117, 'Page', ''),
(55, ' ', ' ', 1, 118, 'Page', ''),
(56, ' ', ' ', 1, 119, 'Page', ''),
(57, ' ', ' ', 1, 120, 'Page', ''),
(58, ' ', ' ', 1, 121, 'Page', ''),
(59, ' ', ' ', 1, 122, 'Page', ''),
(61, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 140, 'Page', 'Madgwicks Lawyers - Our Firm'),
(62, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 141, 'Page', 'Madgwicks Lawyers - Our Firm'),
(63, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 142, 'Page', 'Madgwicks Lawyers - Our Firm'),
(64, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 143, 'Page', 'Madgwicks Lawyers - Our Firm'),
(65, ' ', ' ', 1, 144, 'Page', ''),
(66, ' ', ' ', 1, 145, 'Page', ''),
(67, ' ', ' ', 1, 146, 'Page', ''),
(71, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 150, 'Page', 'Madgwicks Lawyers - Our Firm'),
(70, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 149, 'Page', 'Madgwicks Lawyers - Our Firm'),
(72, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 151, 'Page', 'Madgwicks Lawyers - Our Firm'),
(73, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 152, 'Page', 'Madgwicks Lawyers - Our Firm'),
(74, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 153, 'Page', 'Madgwicks Lawyers - Our Firm'),
(75, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 154, 'Page', 'Madgwicks Lawyers - Our Firm'),
(76, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 155, 'Page', 'Madgwicks Lawyers - Our Firm'),
(77, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 156, 'Page', 'Madgwicks Lawyers - Our Firm'),
(78, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 157, 'Page', 'Madgwicks Lawyers - Our Firm'),
(79, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 158, 'Page', 'Madgwicks Lawyers - Our Firm'),
(80, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 159, 'Page', 'Madgwicks Lawyers - Our Firm'),
(81, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 160, 'Page', 'Madgwicks Lawyers - Our Firm'),
(82, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 161, 'Page', 'Madgwicks Lawyers - Our Firm'),
(84, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 163, 'Page', 'Madgwicks Lawyers - Our Firm'),
(85, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 164, 'Page', 'Madgwicks Lawyers - Our Firm'),
(86, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 165, 'Page', 'Madgwicks Lawyers - Our Firm'),
(87, 'Commercial Law Melbourne, Melbourne Commercial Law Firm, Madgwicks Commercial Law Firm, lawyers, commercial lawyer Melbourne, law, Business Services, Corporate Equity, Corporate Finance, Energy, Estate Planning & Wealth Management, Funds Management S', 'Madgwicks is a Business Commercial Law Firm in Melbourne with highly experienced lawyers for organisations and individuals.', 1, 166, 'Page', 'Madgwicks Lawyers - Our Firm'),
(89, ' ', ' ', 1, 169, 'Page', ''),
(90, ' ', ' ', 1, 170, 'Page', ''),
(91, ' ', ' ', 1, 171, 'Page', ''),
(99, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 180, 'Page', 'Essendon Membership'),
(102, 'Surface FC', 'Surface FC', 1, 54, 'News', 'Surface FC - This'),
(103, 'Surface FC', 'Surface FC', 1, 1, 'Package', 'Surface FC - Legends -'),
(104, 'Surface FC', 'Surface FC', 1, 10, 'PackageCategory', 'Surface FC - Premium'),
(105, 'Surface FC', 'Surface FC', 1, NULL, 'Package', 'Surface FC'),
(106, 'Surface FC', 'Surface FC', 1, 105, 'Package', 'Surface FC - Testing'),
(107, 'Surface FC', 'Surface FC', 1, NULL, 'PackageCategory', 'Surface FC'),
(108, 'Surface FC - Test News', 'Surface FC - Test News', 1, NULL, 'News', 'Surface FC - Test News'),
(109, 'Surface FC', 'Surface FC', 1, NULL, 'News', 'Surface FC - Test news'),
(110, 'Surface FC', 'Surface FC', 1, 59, 'News', 'Surface FC - Test News'),
(111, 'Surface FC', 'Surface FC', 1, 106, 'Package', 'Surface FC - Test'),
(112, 'Surface FC', 'Surface FC', 1, 107, 'Package', 'z'),
(113, 'Surface FC', 'Surface FC', 1, NULL, 'PackageCategory', 'SEo'),
(114, 'Surface FC', 'Surface FC', 1, NULL, 'PackageCategory', 'seo2'),
(115, 'Surface FC', 'Surface FC', 1, NULL, 'Package', 'Surface FCTest111'),
(116, 'Surface FC', 'Surface FC', 1, NULL, 'Package', 'Surface FCTest111'),
(117, 'Surface FC', 'Surface FC', 1, 18, 'PackageCategory', 'Surface FC - Reserved'),
(118, 'Surface FC', 'Surface FC', 1, 43, 'Package', 'Surface FC - Red and Blue'),
(130, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 189, 'Page', 'Membership | Essendon Football Club'),
(120, 'Surface FC', 'Surface FC', 1, 60, 'News', 'Surface FC'),
(121, ' ', ' ', 1, 184, '', ''),
(122, ' ', ' ', 1, 185, '', ''),
(124, 'my keywords go here', 'my description goes here', 0, 187, '', 'my page title goes here'),
(125, ' ', ' ', 1, 188, '', ''),
(126, 'Surface FC', 'Surface FC', 1, 188, 'Page', 'Surface FC'),
(127, 'Surface FC', 'Surface FC', 5, 8, 'Event', 'Surface FC'),
(128, 'Surface FC', 'Surface FC', NULL, 0, 'Package', 'Surface FC'),
(129, 'Surface FC', 'Surface FC', NULL, 0, 'Package', 'Surface FC'),
(131, ' ', ' ', 1, 190, '', ''),
(132, ' ', ' ', 1, 191, '', ''),
(133, ' ', ' ', 1, 192, '', ''),
(134, 'Essendon membership, bombers membership, Essendon members, bombers members', 'The Official membership website of the Essendon Football Club', 1, 190, 'Page', 'Membership | Essendon Football Club'),
(135, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 191, 'Page', 'Membership | Essendon Football Club'),
(136, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 192, 'Page', 'Membership | Essendon Football Club'),
(193, ' ', ' ', 1, 216, '', ''),
(194, ' ', ' ', 1, 217, '', ''),
(181, ' ', ' ', 1, 206, '', ''),
(182, ' ', ' ', 1, 207, '', ''),
(183, ' ', ' ', 1, 208, '', ''),
(184, ' ', ' ', 1, 209, '', ''),
(185, ' ', ' ', 1, 210, '', ''),
(187, ' ', ' ', 1, 212, '', ''),
(188, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 212, 'Page', 'Membership | Essendon Football Club'),
(139, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 195, 'Page', 'Membership | Essendon Football Club'),
(140, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'PackageCategory', 'Membership | Essendon Football Club'),
(141, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'PackageCategory', 'Membership | Essendon Football Club'),
(142, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'PackageCategory', 'Membership | Essendon Football Club'),
(143, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'PackageCategory', 'Membership | Essendon Football Club'),
(144, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(145, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(146, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(147, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(148, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(149, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(150, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(151, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(152, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(153, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(154, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(155, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(156, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(157, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(158, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(159, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(160, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', NULL, 0, 'Package', 'Membership | Essendon Football Club'),
(161, ' ', ' ', 1, 196, '', ''),
(162, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 196, 'Page', 'Membership | Essendon Football Club'),
(163, ' ', ' ', 1, 197, '', ''),
(164, ' ', ' ', 1, 198, '', ''),
(165, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 197, 'Page', 'Membership | Essendon Football Club'),
(166, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 198, 'Page', 'Membership | Essendon Football Club'),
(167, ' ', ' ', 1, 199, '', ''),
(168, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 199, 'Page', 'Membership | Essendon Football Club'),
(169, ' ', ' ', 1, 200, '', ''),
(186, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 211, 'Page', 'Membership | Essendon Football Club'),
(171, ' ', ' ', 1, 201, '', ''),
(172, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 201, 'Page', 'Membership | Essendon Football Club'),
(173, ' ', ' ', 1, 202, '', ''),
(174, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 202, 'Page', 'Membership | Essendon Football Club'),
(175, ' ', ' ', 1, 203, '', ''),
(176, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 203, 'Page', 'Membership | Essendon Football Club'),
(177, ' ', ' ', 1, 204, '', ''),
(178, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 204, 'Page', 'Membership | Essendon Football Club'),
(179, ' ', ' ', 1, 205, '', ''),
(180, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 205, 'Page', 'Membership | Essendon Football Club'),
(189, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 213, 'Page', 'Membership | Essendon Football Club'),
(190, 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', 1, 214, 'Page', 'Membership | Essendon Football Club'),
(191, ' ', ' ', 1, 215, '', ''),
(192, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 215, 'Page', 'Membership | Essendon Football Club'),
(196, 'Essendon membership, bombers membership, Essendon members, bombers members\r\n', 'The Official membership website of the Essendon Football Club', 1, 72, 'Page', 'Membership | Essendon Football Club');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_news`
--

CREATE TABLE IF NOT EXISTS `essendon_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `content` mediumtext,
  `news_category_id` int(11) DEFAULT NULL,
  `content_type` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `publish_date` datetime DEFAULT '0000-00-00 00:00:00',
  `publish_date_int` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `file_attach` varchar(100) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `showatlist` tinyint(1) NOT NULL DEFAULT '0',
  `showatmenu` tinyint(1) NOT NULL DEFAULT '1',
  `template_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `meta_id` int(11) DEFAULT NULL,
  `short_desc` mediumtext NOT NULL,
  `menu_label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`image`,`content`,`file_attach`,`url`,`short_desc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `essendon_news`
--

INSERT INTO `essendon_news` (`id`, `title`, `image`, `content`, `news_category_id`, `content_type`, `created`, `modified`, `created_by`, `modified_by`, `publish_date`, `publish_date_int`, `published`, `file_attach`, `url`, `showatlist`, `showatmenu`, `template_id`, `category_id`, `meta_id`, `short_desc`, `menu_label`) VALUES
(60, 'Test Upload file', '', '', 2, 'content', '2012-07-20 04:55:46', '2012-07-20 05:39:50', 0, 1, '2012-07-21 00:00:00', 0, 1, '/files/file/00.pdf', '', 0, 1, NULL, NULL, 120, 'short description', NULL),
(54, 'This is LINK example', '/files/image/0.jpg', '<p>This is the full details page</p>', 2, 'url', '2012-02-14 09:35:23', '2012-07-20 05:01:37', 0, 1, '2012-02-15 00:00:00', 0, 1, '', 'http://surfacedigital.com.au', 0, 1, NULL, NULL, 102, 'this is the short description', NULL),
(59, 'Test Hading', '/files/image/0.jpg', '<p>Test</p>', 1, 'content', '2012-07-16 06:36:19', '2012-07-20 04:53:47', 0, 1, '2012-07-16 00:00:00', 0, 1, '', '', 0, 1, NULL, NULL, 110, 'Short Description', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_news_categories`
--

CREATE TABLE IF NOT EXISTS `essendon_news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Stores the list of news article categories (shown in the new' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `essendon_news_categories`
--

INSERT INTO `essendon_news_categories` (`id`, `name`, `modified`) VALUES
(1, 'Latest News', '2011-12-15 16:47:37'),
(2, 'Presentations', '2011-12-15 16:47:37'),
(3, 'Publications & e-Alerts', '2012-02-16 05:16:12'),
(4, 'Friends of Madgwicks Presentations', '2011-12-16 01:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_packages`
--

CREATE TABLE IF NOT EXISTS `essendon_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` mediumtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `publish_date_int` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `file_attach` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `showatlist` tinyint(1) NOT NULL DEFAULT '0',
  `showatmenu` tinyint(1) NOT NULL DEFAULT '0',
  `template_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `menu_label` varchar(255) NOT NULL,
  `displaying_order` int(4) NOT NULL DEFAULT '0',
  `package_category_id` varchar(3) NOT NULL,
  `test_field` int(11) NOT NULL,
  `ticketing_url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `essendon_packages`
--

INSERT INTO `essendon_packages` (`id`, `title`, `content`, `created`, `modified`, `created_by`, `modified_by`, `publish_date`, `publish_date_int`, `published`, `file_attach`, `image`, `showatlist`, `showatmenu`, `template_id`, `category_id`, `meta_id`, `short_desc`, `menu_label`, `displaying_order`, `package_category_id`, `test_field`, `ticketing_url`) VALUES
(122, 'Squadron (Age 6-14)', '<p><strong><img src="/files/image/fulfilment/Silver-Junior.jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />If your junior Bomber is aged 6-14 on 1 January 2013 then Squadron membership is for you. We can match your Squadron membership to the package your parent/guardian has purchased, so you both have access to watch the games you want in 2013.&nbsp;</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Squadron member pack including</li>\r\n<ul>\r\n<li>member scarf &amp; sticker pack</li>\r\n<li>mini sherrin football</li>\r\n<li>drawstring bag</li>\r\n</ul>\r\n<li>Personalised Bomber Birthday Card (where DOB is provided)</li>\r\n<li>Access to member presale for weeks 1-3 Finals games when Essendon are participating</li>\r\n</ul>\r\n<p>Each of the packages below has a Squadron/Junior option. Click on a package below to read more:</p>\r\n<ul>\r\n<li><strong><a href="/packages/view/43">High Mark</a></strong></li>\r\n<li><strong><a href="/packages/view/111">Silver</a></strong></li>\r\n<li><strong><a href="/packages/view/112">Bronze Premium</a></strong></li>\r\n<li><strong><a href="/packages/view/116">11 Game Flexi</a></strong></li>\r\n<li><strong><a href="/packages/view/117">3 Game Flexi</a></strong></li>\r\n<li><strong><a href="/packages/view/120">Beyond the Boundary Premium</a></strong></li>\r\n<li><strong><a href="/packages/view/121">Beyond the Boundary Basic</a></strong></li>\r\n</ul>\r\n<p><strong>&nbsp;Prices start from:<br /></strong></p>', '2012-09-17 15:56:17', '2012-10-05 15:32:22', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/SquadronMemberLogo2.jpg', 0, 1, 0, 0, 156, 'If your junior Bomber is aged 6-14 on 1 January 2013 then Squadron membership is for you. We can match your Squadron membership to the package your parent/guardian has purchased, so you both have access to watch the games you want in 2013.  ', '', 32, '21', 0, ''),
(121, 'Beyond the Boundary Basic', '<p><strong><img src="/files/image/fulfilment/Beyond%20the%20boundary%20Basic-Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />New to 2013! Our entry level Beyond the Boundary membership gives you exclusive access to club news and offers. You will recieve weekly member only emails from the coaching staff plus be the first to know about important club information!</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li><span>Receive exclusive weekly email from the coaching staff</span></li>\r\n<li><span>First to know club news and partner offers&nbsp;&nbsp; </span></li>\r\n<li><span>Full Voting rights (18 years and over) </span></li>\r\n<li><span>Annual subscription to Bomber Magazine (one per household) </span></li>\r\n<li><span>Access member presale (no member discount) weeks 1-3 finals when Essendon participating</span></li>\r\n<li><span>Personalised Member Card with barcode </span></li>\r\n<li><span>Bumper Sticker </span></li>\r\n<li><span>Access to purchase member-only merchandise</span></li>\r\n</ul>', '2012-09-17 15:39:43', '2012-10-02 15:26:02', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/MemberLogo2.jpg', 0, 1, 0, 0, 155, 'New to 2013! Our entry level Beyond the Boundary membership gives you exclusive access to club news and offers. You will recieve weekly member only emails from the coaching staff plus be the first to know about important club information!', '', 31, '20', 0, ''),
(120, 'Beyond the Boundary Premium', '<p><strong><img src="/files/image/fulfilment/Beyond%20the%20Boundary%20Premium-Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />New to 2013! Even if you can''t make it the football in 2013 you can still enjoy all of the premium off-field benefits of a membership without the game day access.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Receive exclusive weekly email from the coaching staff</li>\r\n<li>First to know club news and partner offers&nbsp;</li>\r\n<li>Full Voting rights (18 years and over)</li>\r\n<li>Annual subscription to Bomber Magazine (one per household)</li>\r\n<li>Access member presale (no member discount) weeks 1-3 finals when Essendon participating</li>\r\n<li>Premium 2013 Membership Pack containing:</li>\r\n<ul>\r\n<li>Personalised Member Card with barcode</li>\r\n<li>Lanyard with swivel hook attachment</li>\r\n<li>Lapel Pin</li>\r\n<li>Bumper Sticker</li>\r\n<li>2013 Fixture Magnet</li>\r\n<li>2013 Membership Scarf</li>\r\n<li>Duffle bag</li>\r\n<li>Notebook with pen</li>\r\n<li>Keyring</li>\r\n</ul>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>', '2012-09-17 15:37:38', '2012-10-02 15:25:44', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/MemberLogo2.jpg', 0, 1, 0, 0, 154, 'New to 2013! Even if you can''t make it the football in 2013 you can still enjoy all of the premium off-field benefits of a membership without the game day access.', '', 30, '20', 0, ''),
(119, 'National 3 Game - Standby Waitlist', '<p><strong><img src="/files/image/fulfilment/Bronze_National_Flexi_Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />We only have a limited number of reserved seats at non-Victorian stadiums that we can offer as part of our National membership and all seats are currently filled in WA, NSW and SA.</strong><br /><br /><strong>You can still be a National member by purchasing a &lsquo;National Standby&rsquo; membership, as well as receiving a membership pack and benefits you will be added to a waitlist for a seat in your home state. We will then contact you when a place becomes available.</strong></p>\r\n<h4>Benefits<strong> <br /></strong></h4>\r\n<ul>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>2013 membership pack and a 2013 member scarf mailed to your address</li>\r\n<li>Annual subscription to Bomber Magazine (one per household)</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>', '2012-09-17 13:38:04', '2012-10-04 14:12:28', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/MemberLogo2.jpg', 0, 1, 0, 0, 153, 'We only have a limited number of reserved seats at non-Victorian stadiums that we can offer as part of our National membership and all seats are currently filled in WA, NSW and SA. You can still be a National member by purchasing ‘National Standby’', '', 29, '19', 0, ''),
(43, 'High Mark', '<h2><img src="/files/image/fulfilment/High-Mark-Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />Limited Availability</h2>\r\n<p><strong>High Mark is the ultimate in Essendon membership, giving you guaranteed access to purchase a Grand Final ticket when Essendon are participating.</strong></p>\r\n<h4>Benefits<strong><br /></strong></h4>\r\n<ul>\r\n<li>Premium reserved seating at Etihad Stadium (Level 2) and the MCG (Great Southern or Olympic Stand)</li>\r\n<li>Guaranteed access to purchase a Grand Final ticket when Essendon are participating</li>\r\n<li>Access to member presale for weeks 1-3 Finals games when Essendon are participating</li>\r\n<li>Exclusive home game access at Etihad Stadium to:</li>\r\n<ul>\r\n<li>Laureate Room &amp; bar on Dining Level</li>\r\n<li>Victory Room &amp; bar on Level 1</li>\r\n</ul>\r\n<li>Exclusive home game access at the MCG to:</li>\r\n<ul>\r\n<li>Lindsay Hassett room &amp; bar</li>\r\n<li>Exclusive invitation to High Mark member event</li>\r\n<li>Annual subscription to Bomber magazine (one per household)</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>Entry to Essendon VFL home games at Windy Hill&nbsp;</li>\r\n<li>Membership to Windy Hill Venue and Melton Country Club (if over 18 years)</li>\r\n<li>2013 High Mark membership pack mailed directly to you</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>\r\n</ul>', '2011-12-13 11:43:22', '2012-10-05 14:55:05', 1, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/HighMarkLogo2.jpg', 0, 1, 0, 0, 118, 'Limited Availability - High Mark is the ultimate in Essendon membership, giving you guaranteed access to purchase a Grand Final ticket when Essendon are participating.', '', 20, '10', 0, ''),
(113, 'Bronze Basic', '<p><strong><img src="/files/image/fulfilment/Bronze_National_Flexi_Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />Our entry level reserved seat membership - Bronze Basic is the perfect place to start and will get you to the footy to see the Bombers in action.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Reserved seat at Etihad Stadium (level 3 behind goals row A-F or wing rows M-X)</li>\r\n<li>General admission entry for Essendon games at the MCG (subject to capacity)</li>\r\n<li>Access to a Grand Final member ticket ballot when Essendon are participating</li>\r\n<li>Access to member presale for weeks 1-3 Finals games when Essendon are participating</li>\r\n<li>Annual subscription to Bomber magazine (one per household)</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>Entry to Essendon VFL home games at Windy Hill</li>\r\n<li>2013 Essendon membership pack and scarf mailed directly to your nominated address</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>', '2012-09-17 10:27:28', '2012-10-02 15:20:26', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/BronzeMemberLogo2.jpg', 0, 1, 0, 0, 147, 'Our entry level reserved seat membership - Bronze Basic is the perfect place to start and will get you to the footy to see the Bombers in action.', '', 23, '10', 0, ''),
(115, 'MCC Member Packages', '<p><strong><img src="/files/image/fulfilment/Bronze_National_Flexi_Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />2013 MCC Members can purchase a membership that provides seating for Essendon games played at Etihad Stadium only.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Reserved seat for Essendon home games at Etihad Stadium (plus access to away games if you upgrade to home &amp; away membership)</li>\r\n<li>Annual subscription to Bomber magazine (one per household)</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>Entry to Essendon VFL home games at Windy Hill</li>\r\n<li>2013 membership pack and scarf mailed directly to your nominated address</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>', '2012-09-17 13:13:03', '2012-10-02 15:21:58', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '', 0, 1, 0, 0, 149, '2013 MCC Members can purchase a membership that provides seating for Essendon games played at Etihad Stadium only.', '', 25, '10', 0, ''),
(116, 'Flexi 11 Game', '<p><strong><img src="/files/image/fulfilment/Bronze_National_Flexi_Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />New to 2013! Our new Flexi 11 Game memberhsip offers a flexible option for those unsure of which games they will attend in 2013 or want to attend with friends and family who may not be Essendon members.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Barcode to access member discount when purchasing a ticket to any of the 11 Essendon home games (includes ANZAC Day)</li>\r\n<li>Annual subscription to Bomber magazine (one per household)</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>Entry to Essendon VFL home games at Windy Hill</li>\r\n<li>2013 Essendon membership pack and scarf mailed directly to your nominated address</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>\r\n<p><strong>Important:</strong> Includes member discount for ANZAC day, make sure you purchase tickets early to avoid disappointment&nbsp;</p>', '2012-09-17 13:24:33', '2012-10-02 15:22:41', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/MemberLogo2.jpg', 0, 1, 0, 0, 150, 'New to 2013! Our new Flexi 11 Game memberhsip offers a flexible option for those unsure of which games they will attend in 2013 or want to attend with friends and family who may not be Essendon members.', '', 26, '18', 0, ''),
(118, 'National 3 Game', '<p><strong><img src="/files/image/fulfilment/Bronze_National_Flexi_Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />For Members in WA, NSW, QLD and SA, become a National member to watch the Bombers play in your home state. (TAS, NT and ACT fans, check out our new <a href="/packages/view/117">Flexi 3 Game membership package</a>)</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Reserved seat for one Essendon game played in your state (WA, NSW, QLD or SA - subject to 2013 AFL Fixture)</li>\r\n<li>General admission entry to 2 Essendon home games played at the MCG (subject to capacity)</li>\r\n<li>Access to member presale for weeks 1-3 Finals games when Essendon are participating</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>2013 Essendon membership pack and scarf mailed directly to your nominated address</li>\r\n<li>Access to purchase member-only merchandise, plus 10% off selected Bomber Shop range</li>\r\n</ul>\r\n<p><strong>National 3 Game WA, NSW &amp; SA - At Capacity, please visit <a href="/packages/view/119">National 3 Game Standby Waitlist</a> for more information</strong><br /><br /><br /><strong>Important</strong>: This is subject to capacity. In the event the MCC allocate a game as fully ticketed members will be required to upgrade their general admission access to a reserved seat. This is recommended if you are planning to attend our ANZAC Day match in 2013.&nbsp;</p>', '2012-09-17 13:32:54', '2012-10-04 14:12:01', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/MemberLogo2.jpg', 0, 1, 0, 0, 152, 'For Members in WA, NSW, QLD and SA, become a National member to watch the Bombers play in your home state. (TAS, NT and ACT fans, check out our new Flexi 3 Game membership package under Flexi Access Memberships)', '', 28, '19', 0, ''),
(117, 'Flexi 3 Game', '<p><strong><img src="/files/image/fulfilment/Bronze_National_Flexi_Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />New to 2013! Our new Flexi 3 Game memberhsip offers a flexible option for those unsure of which games they will attend in 2013 or who want to attend with friends and family who may not be Essendon members.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Barcode to access member discount when purchasing a ticket to 3 Essendon home games (excludes ANZAC Day)</li>\r\n<li>Annual subscription to Bomber magazine (one per household)</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>Entry to Essendon VFL home games at Windy Hill</li>\r\n<li>2013 Essendon membership pack and scarf mailed directly to your nominated address</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>', '2012-09-17 13:26:18', '2012-10-02 15:22:54', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/MemberLogo2.jpg', 0, 1, 0, 0, 151, 'New to 2013! Our new Flexi 3 Game memberhsip offers a flexible option for those unsure of which games they will attend in 2013 or who want to attend with friends and family who may not be Essendon members.', '', 27, '18', 0, ''),
(114, 'AFL Member Packages', '<p><strong><img src="/files/image/fulfilment/Bronze_National_Flexi_Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />2013 AFL members who nominate Essendon as their club of support are entitled to receive a discount off the price of any full season Essendon membership in 2013.</strong></p>\r\n<h4>Benefits<strong><br /></strong></h4>\r\n<ul>\r\n<li>Annual subscription to Bomber magazine (one per household)</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>Entry to Essendon VFL home games at Windy Hill</li>\r\n<li>2013 membership pack and scarf mailed directly to your nominated address</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>\r\n<p>Purchase a package that gets you a seat at Etihad Stadium only (see pricing table below, AFL member discount has already been appplied) or choose from anyone one of our standard reserved seat memebrship packages and subtract the AFL member price listed below.</p>', '2012-09-17 10:33:59', '2012-10-02 15:21:25', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '', 0, 1, 0, 0, 148, '2013 AFL members who nominate Essendon as their club of support are entitled to receive a discount off the price of any full season Essendon membership in 2013.', '', 24, '10', 0, ''),
(112, 'Bronze Premium', '<p><strong><img src="/files/image/fulfilment/Bronze_National_Flexi_Adult(1).jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />Our most popular full season package, Bronze Premium members are guaranteed a reserved seat at Essendon games played at both Etihad Stadium and the MCG.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Reserved seat at Etihad Stadium (level 1 behind goals or level 3 wing rows A-L) and the MCG (best available)</li>\r\n<li>Access to a Grand Final member ticket ballot when Essendon are participating</li>\r\n<li>Access to member presale for weeks 1-3 Finals games when Essendon are participating</li>\r\n<li>Annual subscription to Bomber magazine (one per household)</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>Entry to Essendon VFL home games at Windy Hill</li>\r\n<li>2013 membership pack and scarf mailed directly to your nominated address</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>', '2012-09-13 16:15:19', '2012-10-02 15:18:47', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/BronzeMemberLogo2.jpg', 0, 1, 0, 0, 146, 'Our most popular full season package, Bronze Premium members are guaranteed a reserved seat at Essendon games played at both Etihad Stadium and the MCG.', '', 22, '10', 0, ''),
(111, 'Silver', '<h2><img src="/files/image/fulfilment/Silver-Adult.jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />Limited Availability</h2>\r\n<p><strong>Silver Membership gives you a premium gameday experience and includes guaranteed access to purchase a Grand Final ticket when Essendon participate.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Premium reserved seating at Etihad Stadium (Level 1) and the MCG (Great Southern or Olympic Stand)</li>\r\n<li>Guaranteed access to purchase a Grand Final ticket when Essendon are participating</li>\r\n<li>Access to member presale for weeks 1-3 Finals games when Essendon are participating</li>\r\n<li>Home game access at Etihad Stadium to Victory Room &amp; bar on Level 1</li>\r\n<li>Home game access at the MCG to Lindsay Hassett room &amp; bar in Great Southern Stand</li>\r\n<li>Annual subscription to Bomber magazine (one per household)</li>\r\n<li>Full voting rights (18 years and over)</li>\r\n<li>Entry to Essendon VFL home games at Windy Hill&nbsp;</li>\r\n<li>Membership to Windy Hill Venue and Melton Country Club (if over 18 years)</li>\r\n<li>2013 Silver membership pack mailed directly to you</li>\r\n<li>Access to purchase member-only merchandise</li>\r\n</ul>', '2012-09-13 16:12:59', '2012-10-05 11:59:09', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/SilverMemberLogo2.jpg', 0, 1, 0, 0, 145, 'Limited Availability - Silver Membership gives you a premium gameday experience and includes guaranteed access to purchase a Grand Final ticket when Essendon participate.', '', 21, '10', 0, ''),
(123, 'Skeeta Fleet (Age 2-5)', '<p><strong><img src="/files/image/fulfilment/Skeeta-Fleet.jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" /></strong><strong>Junior bomber members aged 2-5 can show their colours and be part of our Skeeta Fleet in 2013. <br /></strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Skeeta embroidered beanie &amp; scarf</li>\r\n<li>Personalised Skeeta Fleet member certificate</li>\r\n<li>Personalised Bomber Birthday Card (where DOB is provided)</li>\r\n</ul>', '2012-09-20 12:58:52', '2012-10-05 16:04:11', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/skeeta1.jpg', 0, 1, 0, 0, 157, 'Junior bomber members aged 2-5 can show their colours and be part of our Skeeta Fleet in 2013.', '', 33, '21', 0, ''),
(124, 'Baby (Age 0-1)', '<p><strong><img src="/files/image/fulfilment/Baby%20Bomber.jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />Your baby can be a Bomber from day one with a Baby Bomber membership.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Hooded bomber baby blanket</li>\r\n<li>Personalised Baby Bomber member certificate</li>\r\n</ul>', '2012-09-20 12:59:55', '2012-10-02 15:28:51', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/Skeeta.jpg', 0, 1, 0, 0, 158, 'Your baby can be a Bomber from day one with a Baby Bomber membership. ', '', 34, '21', 0, ''),
(125, 'Cheer Squad', '<p><strong>Cheer on the red and black in 2013 as part of our official game day Cheer Squad</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Official 2013 Essendon Cheer Squad member card</li>\r\n<li>Access to a seat in Essendon Cheer Squad bay at Essendon games played in Victoria*</li>\r\n<li>Access to purchase a seat in Cheer Squad bay at Essendon games played outside Victoria</li>\r\n<li>Weekly banner making &amp; the chance to hold the banner up on game day</li>\r\n</ul>\r\n<p>*Subject to availability. If you hold a full season Home membership your Cheer Squad game access will be for Essendon home games only. If you hold full season Home &amp; Away membership your Cheer Squad access will include all Essendon games played in Victoria.</p>', '2012-09-20 13:02:46', '2012-09-26 12:52:58', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/MemberLogo2.jpg', 0, 1, 0, 0, 159, 'Cheer on the red and black in 2013 as part of our official game day Cheer Squad', '', 35, '22', 0, ''),
(126, 'Pet Member', '<p><strong><img src="/files/image/fulfilment/Pets.jpg" border="0" width="250" height="250" style="float: right; margin-left: 10px; margin-bottom: 25px;" />Your pet is a part of your family, and with a pet membership you can make them part of the Bomber family too.</strong></p>\r\n<h4>Benefits</h4>\r\n<ul>\r\n<li>Personalised 2013 pet member certificate (where pet name is provided)</li>\r\n<li>2013 Pet fence sign</li>\r\n</ul>', '2012-09-20 13:04:06', '2012-10-02 14:41:28', 0, 1, '0000-00-00 00:00:00', 0, 1, '', '/files/image/MemberLogo2.jpg', 0, 1, 0, 0, 160, 'Your pet is a part of your family, and with a pet membership you can make them part of the Bomber family too.', '', 36, '22', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_packages_corekits`
--

CREATE TABLE IF NOT EXISTS `essendon_packages_corekits` (
  `package_id` int(11) NOT NULL,
  `corekit_id` int(11) NOT NULL,
  KEY `package_id` (`package_id`),
  KEY `corekit_id` (`corekit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `essendon_packages_corekits`
--

INSERT INTO `essendon_packages_corekits` (`package_id`, `corekit_id`) VALUES
(1, 3),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_packages_pricings`
--

CREATE TABLE IF NOT EXISTS `essendon_packages_pricings` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `per_month` float(10,2) NOT NULL,
  `total` float(10,2) NOT NULL,
  `url` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3389 ;

--
-- Dumping data for table `essendon_packages_pricings`
--

INSERT INTO `essendon_packages_pricings` (`id`, `package_id`, `name`, `per_month`, `total`, `url`) VALUES
(4, 0, 'test4', 0.00, 400.00, 'test'),
(78, 4, 'Adult', 0.00, 100.00, 'http://ticketmaster'),
(79, 4, 'Child', 0.00, 50.00, 'http://ticketmaster2'),
(1299, 2, 'Family (2 Adults & 2 Juniors)', 0.00, 580.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1863&OrgID=1953'),
(893, 9, 'Family (2 Adults & 2 Juniors)', 0.00, 380.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1872&OrgID=1953'),
(1837, 11, 'Junior ANZAC Day Package', 0.00, 95.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12R3HD'),
(1841, 16, 'Adult 5 Game', 0.00, 95.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GISI'),
(1967, 17, 'Season Ticket (Ages 4-14)*', 0.00, 120.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1801, 5, 'Concession Home and Away Game*', 0.00, 350.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1852, 19, 'Family Home Game (2 Adults & 2 Juniors**)', 0.00, 360.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GH'),
(1909, 6, 'Family Home and Away Game (2 Adults & 2 Juniors**)', 0.00, 2230.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA4'),
(1908, 6, 'Junior Home and Away Game**', 0.00, 420.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA4'),
(1298, 2, 'Junior', 0.00, 105.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1864&OrgID=1953'),
(1851, 19, 'Junior Home and Away Game**', 0.00, 75.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1297, 2, 'Concession', 0.00, 210.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1861&OrgID=1953'),
(1849, 19, 'Concession Home Game*', 0.00, 130.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GH'),
(1850, 19, 'Concession Home and Away Game*', 0.00, 155.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(892, 9, 'Junior', 0.00, 35.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1873&OrgID=1953'),
(891, 9, 'Concession', 0.00, 125.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1870&OrgID=1953'),
(1835, 10, 'Adult 3 Game', 0.00, 85.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12G3H'),
(1836, 11, 'Adult ANZAC Day Package ', 0.00, 185.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12R3HD'),
(1840, 15, 'New South Wales Adult 5 Game', 0.00, 170.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GISI'),
(1569, 14, 'Family (2 Adults & 2 Juniors)', 0.00, 290.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1854&OrgID=1953'),
(894, 9, 'Family (1 Adult & 2 Juniors)', 0.00, 225.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1871&OrgID=1953'),
(930, 20, 'All', 0.00, 189.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1809&OrgID=1953'),
(1861, 21, 'Junior 3 Game*', 0.00, 70.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12R3H'),
(929, 22, 'All', 0.00, 50.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1808&OrgID=1953'),
(928, 23, 'All', 0.00, 15.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1807&OrgID=1953'),
(1568, 14, 'Junior Storm Spirit', 0.00, 35.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1873&OrgID=1953'),
(1567, 14, 'Concession', 0.00, 120.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1853&OrgID=1953'),
(1800, 5, 'Concession Home Game*', 0.00, 320.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GH'),
(1799, 5, 'Adult Home and Away Game', 0.00, 510.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(890, 9, 'Adult', 0.00, 190.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1879&OrgID=1953'),
(1566, 14, 'Adult', 0.00, 140.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1852&OrgID=1953'),
(1296, 2, 'Adult', 0.00, 285.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1860&OrgID=1953'),
(1904, 3, 'Junior Home game ', 0.00, 305.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA2'),
(1968, 17, 'Interstate    (Ages 4-14)*', 0.00, 80.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1300, 2, 'Family (1 Adult & 2 Juniors)', 0.00, 395.00, 'https://secure.memberdesq.com/index.cfm?fuseaction=registration_1&RegistrationMode=2&SubscriptionTypeID=1862&OrgID=1953'),
(1848, 19, 'Adult Home and Away Game', 0.00, 330.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1979, 12, 'Season Ticket Country Adult 5 Game', 0.00, 120.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GCY'),
(1847, 19, 'Adult Home Game', 0.00, 180.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GH'),
(1980, 12, 'Social Club Country Adult 5 Game', 0.00, 235.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GCY'),
(1941, 13, 'Adult Home Game Reserved Seat', 0.00, 370.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RH'),
(1942, 13, 'Adult Home and Away Game Reserved Seat', 0.00, 680.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA4'),
(1943, 13, 'Concession Home Game Reserved Seat*', 0.00, 305.00, ' https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RH'),
(1944, 13, 'Concession Home and Away Game Reserved Seat*', 0.00, 480.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA4'),
(1888, 25, 'Concession AFL/MCC Member*', 0.00, 440.00, ''),
(1889, 25, 'Junior AFL/MCC Member**', 0.00, 355.00, ''),
(1920, 26, 'Concession AFL/MCC Member*', 0.00, 265.00, ''),
(1921, 26, 'Junior AFL/MCC Member**', 0.00, 230.00, ''),
(1978, 27, 'Junior AFL ONLY  (Home and Away Game Membership)', 0.00, 80.00, ''),
(1880, 28, 'Adult AFL/MCC Member', 0.00, 125.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RMCC'),
(1881, 28, 'Concession AFL/MCC Member*', 0.00, 90.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RMCC'),
(1882, 28, 'Junior AFL/MCC Member**', 0.00, 60.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RMCC'),
(1891, 29, 'Adult/Concession/Junior AFL/MCC Member', 0.00, 85.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12G3H'),
(1931, 18, 'Baby Magpie Nest', 0.00, 50.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1934, 24, 'Toddler Magpie Nest', 0.00, 60.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1890, 30, 'Adult Magpie Nest', 0.00, 85.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12G3H'),
(1923, 31, 'Pet Magpie Nest', 0.00, 30.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12APET'),
(1894, 33, 'In Black & White Yearbook Only', 0.00, 10.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12AMAG'),
(1895, 33, 'First two Editions of In Black & White Magazine', 0.00, 20.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12AMAG'),
(1903, 3, 'Concession Home game ', 0.00, 395.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RH'),
(1902, 3, 'Adult Home Game', 0.00, 560.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RH'),
(1805, 5, 'Social Club Country Adult 5 Game', 0.00, 235.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GCY'),
(1804, 5, 'Family Home and Away Game (2 Adults and 2 Juniors**)', 0.00, 1150.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1803, 5, 'Family Home Game (2 Adults and 2 Juniors**)', 0.00, 925.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GH'),
(1802, 5, 'Junior Home and Away Game**', 0.00, 155.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1853, 19, 'Family Home and Away Game (2 Adult and 2 Juniors**)', 0.00, 640.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1860, 21, 'Adult 3 Game ', 0.00, 140.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12R3H'),
(1919, 26, 'Adult AFL/MCC Member', 0.00, 380.00, 'Enter TicketMaster URL'),
(1893, 32, 'One seat in the Community Bay for 9 games*', 0.00, 80.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12ACBAY'),
(1896, 33, 'First two Editions of In Black and White Magazine and 2012 In Black & White yearbook', 0.00, 30.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12AMAG'),
(1945, 13, 'Junior Home Game Reserved Seat**', 0.00, 225.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA2'),
(1887, 25, 'Adult AFL/MCC Member', 0.00, 510.00, 'Enter TicketMaster URL'),
(1857, 34, 'Family Home and Away game (2 Adults and 2 Juniors**)', 0.00, 1940.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12R14M'),
(1946, 13, 'Junior Home and Away Game Reserved Seat** ', 0.00, 365.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA4'),
(1839, 15, 'Social Club Adult 5 Game', 0.00, 235.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GISI'),
(1798, 5, 'Adult Home Game', 0.00, 390.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GH'),
(1977, 27, 'Concession AFL/MCC  (Home Game Membership)', 0.00, 190.00, 'Enter TicketMaster URL'),
(1905, 3, 'Family Home Game (2 Adults & 2 Juniors)', 0.00, 1500.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RH'),
(1907, 6, 'Concession Home and Away Game*', 0.00, 580.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA4'),
(1906, 6, 'Adult Home and Away Game', 0.00, 820.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA4'),
(1970, 36, 'Official 2012 Match Day Supporter Kit', 0.00, 49.95, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12MSPACK'),
(1940, 37, 'Member Cap ', 0.00, 15.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12MHAT'),
(1939, 38, 'Member Scarf ', 0.00, 20.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12MSCARF'),
(1856, 34, 'Junior Home and Away game**', 0.00, 380.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12R14M'),
(1855, 34, 'Concession Home and Away game*', 0.00, 520.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12R14M'),
(1854, 34, 'Adult Home and Away game', 0.00, 740.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12R14M'),
(1838, 15, 'South Australia Adult 5 Game', 0.00, 150.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GISI'),
(1947, 13, 'Family Home Game Reserved Seat (2 Adults & 2 Juniors**)', 0.00, 1040.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RH'),
(1948, 13, 'Family Home and Away Game Reserved Seat (2 Adults & 2 Juniors))', 0.00, 1920.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12RHA4'),
(1972, 39, 'Junior Home and Away Game**', 0.00, 75.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dcollingwood%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(1976, 27, 'Adult AFL/MCC  (Home Game Membership)', 0.00, 210.00, 'Enter TicketMaster URL'),
(2315, 48, 'Adult 3', 0.00, 90.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12G3H'),
(2324, 49, 'Little Devil 15', 0.00, 50.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(2325, 50, 'Junior Pre Game Clinic', 0.00, 50.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12ACLINC'),
(2327, 51, 'Birthday Club', 0.00, 30.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12ABDAY '),
(2329, 53, 'Pet Patron', 0.00, 30.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12APET'),
(2334, 54, 'Young Demons', 0.00, 50.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12ACLINC '),
(2330, 55, 'Before the Bounce', 0.00, 220.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12CBOUNC '),
(2332, 57, 'SMS Ins and Outs', 0.00, 25.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12ASMS '),
(2362, 59, 'Country Adult', 0.00, 80.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12G5H'),
(2550, 95, '111', 0.00, 222.00, '333'),
(2561, 1, 'Test', 15.00, 100.00, 'google.com'),
(2546, 60, 'Testing', 0.00, 100.00, 'Testing'),
(2314, 47, 'Family 5', 0.00, 275.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12G5H'),
(2313, 47, 'Adult 5', 0.00, 125.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12G5H'),
(2316, 48, 'Family 3', 0.00, 180.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12G3H'),
(2323, 49, 'Young Demon 15', 0.00, 60.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(2322, 49, 'Youth 11', 0.00, 90.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(2321, 49, 'Youth 15', 0.00, 140.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(2326, 50, 'Birthday Club', 0.00, 30.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12ABDAY'),
(2366, 52, 'Cheer Squad', 0.00, 40.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12ACHSQ '),
(2358, 56, 'Cap', 0.00, 30.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12MCAP '),
(2365, 58, 'Demon Heartland', 0.00, 50.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12AHEART '),
(2361, 59, 'Junior', 0.00, 40.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GHA'),
(2360, 59, 'Concession', 0.00, 80.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GH'),
(2359, 59, 'Adult', 0.00, 125.00, 'https://oss.ticketmaster.com/html/outsider.htmI?CAMEFROM=&GOTO=https%3A%2F%2Foss.ticketmaster.com%2Fhtml%2Frequest.htmI%3Fl%3DEN%26team%3Dmelbournefc%26STAGE%3D1%26PROC%3DBUY%26EventName%3D12GH'),
(3372, 43, 'ADULT - Home and away reserved seat', 93.50, 935.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-D6'),
(3373, 43, 'CONCESSION - Home reserved seat', 52.90, 529.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-D6'),
(3374, 43, 'CONCESSION - Home reserved seat with away access', 59.10, 591.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-D6'),
(3346, 111, 'SQUADRON - Home reserved seat', 19.00, 190.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-A5'),
(3347, 111, 'SQUADRON - Home reserved seat with away access', 24.20, 242.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-A5'),
(3348, 111, 'SQUADRON - Home and away reserved seat', 31.70, 317.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-A5'),
(3349, 111, 'FAMILY - Home reserved seat', 129.40, 1294.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-A5'),
(3345, 111, 'CONCESSION - Home and away reserved seat', 67.20, 672.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-A5'),
(3144, 112, 'JUNIOR - Home and away reserved seat', 23.30, 233.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-B4'),
(3143, 112, 'JUNIOR - Home reserved seat with away access', 15.50, 155.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-B4'),
(3142, 112, 'JUNIOR - Home reserved seat', 12.40, 124.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-B4'),
(3149, 113, 'ADULT - Home reserved seat with away access', 36.20, 362.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA1-E3'),
(3150, 113, 'CONCESSION - Home reserved seat', 16.50, 165.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH1-E3'),
(3151, 113, 'CONCESSION - Home reserved seat with away access', 22.80, 228.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA1-E3'),
(3152, 113, 'JUNIOR - Home reserved seat', 9.50, 95.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH1-E3'),
(3158, 114, 'BRONZE PREMIUM - Etihad Stadium Only  home game access with home reserved seat', 8.40, 84.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/R7D1-B4'),
(3157, 114, 'SILVER - Etihad Stadium Only  home game access with home reserved seat', 27.20, 272.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/R7D1-A5'),
(3161, 115, 'SILVER - Etihad Stadium Only  home game access with home reserved seat', 41.00, 410.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/R7D1-A5'),
(3164, 116, 'JUNIOR', 5.00, 50.00, ''),
(3165, 117, 'ADULT', 7.50, 75.00, ''),
(3200, 118, 'JUNIOR', 7.50, 75.00, ''),
(3175, 120, 'ADULT', 13.50, 135.00, ''),
(3178, 121, 'ADULT', 5.00, 50.00, ''),
(3388, 123, 'AGE 2-5', 4.00, 40.00, ''),
(3181, 124, 'AGE 0-1', 3.00, 30.00, ''),
(3019, 125, 'CHEER SQUAD', 3.00, 30.00, ''),
(3103, 126, 'PET MEMBER', 3.00, 30.00, ''),
(3375, 43, 'CONCESSION - Home and away reserved seat', 74.70, 747.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-D6'),
(3166, 117, 'JUNIOR', 2.50, 25.00, ''),
(3145, 112, 'FAMILY - Home reserved seat', 80.00, 800.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-B4'),
(3163, 116, 'ADULT', 15.00, 150.00, ''),
(3176, 120, 'JUNIOR', 5.00, 50.00, ''),
(3179, 121, 'JUNIOR', 2.50, 25.00, ''),
(3199, 118, 'ADULT', 14.00, 140.00, ''),
(3383, 122, 'BRONZE BASIC', 9.50, 95.00, ''),
(3384, 122, '11 GAME FLEXI', 5.00, 50.00, ''),
(3385, 122, '3 GAME FLEXI', 2.50, 25.00, ''),
(3386, 122, 'BEYOND THE BOUNDARY PREMIUM', 5.00, 50.00, ''),
(3387, 122, 'BEYOND THE BOUNDARY BASIC', 2.50, 25.00, ''),
(3180, 121, 'FAMILY', 12.50, 125.00, ''),
(3177, 120, 'FAMILY', 32.00, 320.00, ''),
(3380, 122, 'HIGH MARK', 23.50, 235.00, ''),
(3370, 43, 'ADULT - Home reserved seat', 65.70, 657.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-D6'),
(3371, 43, 'ADULT - Home reserved seat with away access', 78.00, 780.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-D6'),
(3148, 113, 'ADULT - Home reserved seat', 22.50, 225.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH1-E3'),
(3146, 112, 'FAMILY - Home reserved seat with away access', 111.40, 1114.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-B4'),
(3160, 115, 'HIGH MARK - Etihad Stadium Only  home game access with home reserved seat', 51.90, 519.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/R7D1-D6'),
(3156, 114, 'HIGH MARK - Etihad Stadium Only - Home game access with home reserved seat', 38.10, 381.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/R7D1-D6'),
(3379, 43, 'FAMILY - Home reserved seat', 154.90, 1549.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-D6'),
(3378, 43, 'SQUADRON - Home and away reserved seat', 35.60, 356.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-D6'),
(3377, 43, 'SQUADRON - Home reserved seat with away access', 27.90, 279.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-D6'),
(3376, 43, 'SQUADRON - Home reserved seat', 23.50, 235.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-D6'),
(3344, 111, 'CONCESSION - Home reserved seat with away access', 51.90, 519.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-A5'),
(3343, 111, 'CONCESSION - Home reserved seat', 47.60, 476.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-A5'),
(3342, 111, 'ADULT - Home and away reserved seat', 85.60, 856.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-A5'),
(3341, 111, 'ADULT - Home reserved seat with away access', 70.30, 703.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-A5'),
(3340, 111, 'ADULT - Home reserved seat', 52.00, 552.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-A5'),
(3141, 112, 'CONCESSION - Home and away reserved seat', 48.50, 485.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-B4'),
(3140, 112, 'CONCESSION - Home reserved seat with away access', 32.90, 329.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-B4'),
(3139, 112, 'CONCESSION - Home reserved seat', 27.30, 273.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-B4'),
(3138, 112, 'ADULT - Home and away reserved seat', 63.60, 636.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-B4'),
(3137, 112, 'ADULT - Home reserved seat with away access', 48.00, 480.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA2-B4'),
(3136, 112, 'ADULT - Home reserved seat', 33.90, 339.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH2-B4'),
(3147, 112, 'FAMILY - Home and away reserved seat', 150.40, 1504.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA4-B4'),
(3153, 113, 'JUNIOR - Home reserved seat with away access', 13.00, 130.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA1-E3'),
(3154, 113, 'FAMILY - Home reserved seat', 54.50, 545.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RH1-E3'),
(3155, 113, 'FAMILY - Home reserved seat with away access', 85.40, 854.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/RHA1-E3'),
(3159, 114, 'BRONZE BASIC - Etihad Stadium Only  home game access with home reserved seat', 4.70, 47.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/R7D1-E'),
(3162, 115, 'BRONZE PREMIUM - Etihad Stadium Only  home game access with home reserved seat', 22.20, 222.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/R7D1-B4'),
(3204, 119, 'WA', 5.00, 50.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/13NSBWA'),
(3203, 119, 'SA', 5.00, 50.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/13NSBSA'),
(3202, 119, 'QLD', 5.00, 50.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/13NSBQL'),
(3201, 119, 'NSW', 5.00, 50.00, 'https://oss.ticketmaster.com/aps/essendon/EN/link/buy/details/13NSBNS'),
(3382, 122, 'BRONZE PREMIUM', 12.40, 124.00, ''),
(3381, 122, 'SILVER', 19.00, 190.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_package_categories`
--

CREATE TABLE IF NOT EXISTS `essendon_package_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` mediumtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `file_attach` varchar(255) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `menu_label` varchar(255) NOT NULL,
  `displaying_order` int(4) NOT NULL,
  `showatmenu` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `essendon_package_categories`
--

INSERT INTO `essendon_package_categories` (`id`, `title`, `content`, `created`, `modified`, `created_by`, `modified_by`, `published`, `file_attach`, `meta_id`, `short_desc`, `menu_label`, `displaying_order`, `showatmenu`) VALUES
(10, 'Reserved Seat Memberships', 'Don''t miss a moment of the action in 2013  with a full season reserved seat membership.', '2011-10-04 16:52:12', '2012-09-17 09:58:13', 1, 1, 1, '/files/image/thumb.jpg', 104, '', '', 1, 1),
(18, 'Flexi Access Memberships', 'New to 2013! Enjoy the freedom of a flexi access membership that allows you to pick the games you want to attend in 2013', '2011-12-09 09:31:29', '2012-09-17 13:22:23', 1, 1, 1, '/files/image/thumb.jpg', 117, '', '', 2, 1),
(19, 'National 3 Game', 'If you don''t live in Victoria and can only make it to a few games in 2013, you can still be  a member and support the club', '2011-12-09 09:36:23', '2012-09-17 13:22:23', 1, 1, 1, '/files/image/thumb.jpg', 140, '', '', 3, 1),
(20, 'No Game Access Memberships', 'Can''t make it to the footy? No worries, there are more options than ever before for you to support the club without coming to the game', '2011-12-13 11:21:01', '2012-09-17 13:22:17', 1, 1, 1, '/files/image/thumb.jpg', 141, '', '', 6, 1),
(21, 'Junior Memberships', 'From babies to teens we want all our junior Bomber fans to be part of the team in 2013! ', '2011-12-13 11:21:35', '2012-09-17 09:58:10', 1, 1, 1, '/files/image/thumb.jpg', 142, '', '', 7, 1),
(22, 'Membership Extras', 'For fans who want something extra join the Bombers Cheer Squad or sign up your pet!', '2011-12-13 11:22:03', '2012-09-13 15:32:48', 1, 1, 1, '/files/image/thumb.jpg', 143, '', '', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_pages`
--

CREATE TABLE IF NOT EXISTS `essendon_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `content` mediumtext NOT NULL,
  `page_id` int(11) NOT NULL COMMENT 'ID of the parent page (used in menus and sitemap)',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `permissions` varchar(400) DEFAULT NULL COMMENT 'Serialized array of user-types allowed to access page (everyone, client, staff)',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `meta_id` int(11) NOT NULL,
  `menu_name` varchar(150) NOT NULL,
  `template_id` int(11) NOT NULL,
  `showatmenu` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `sitemap_id` int(11) NOT NULL,
  `subpages` int(11) NOT NULL DEFAULT '0',
  `porder` mediumint(9) NOT NULL DEFAULT '0',
  `islink` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = link, 0 = page',
  `link` mediumtext NOT NULL,
  `linktype` tinyint(4) DEFAULT '1' COMMENT 'OLD Column, no longer really necessary. 1 = External, 2 = Internal',
  `page_subheading` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name` (`name`,`content`,`link`,`page_subheading`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=218 ;

--
-- Dumping data for table `essendon_pages`
--

INSERT INTO `essendon_pages` (`id`, `name`, `content`, `page_id`, `published`, `permissions`, `created`, `modified`, `meta_id`, `menu_name`, `template_id`, `showatmenu`, `created_by`, `modified_by`, `sitemap_id`, `subpages`, `porder`, `islink`, `link`, `linktype`, `page_subheading`) VALUES
(190, 'New Members', '<p><strong>In 2013, Essendon has a range of fantastic packages to suit fans of all shapes and sizes. There are a few ways to find the package that''s right for you...</strong></p>\r\n<p>&nbsp;</p>\r\n<h2><img src="/files/image/Screen%20shot%202012-09-20%20at%201.23.18%20PM.png" border="0" width="200" height="149" style="float: left; margin-right: 15px; border: 1px solid grey;" />1. Browse the list of 2013 packages</h2>\r\n<p>If you''re happy to just have a look around at the packages to see what''s available, head to our 2013 Packages page.</p>\r\n<p><a class="btn btn-inverse" href="/2013-packages">2013 Package List</a></p>\r\n<p>&nbsp;<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<h2><img src="/files/image/Screen%20shot%202012-09-25%20at%201.13.55%20PM.png" border="0" width="200" height="145" style="float: left; margin-right: 15px; border: 1px solid grey;" />2. Find the best package for you</h2>\r\n<p>Answer a few simple questions and we''ll narrow it down to the best package for you based on your answers - Easy!</p>\r\n<p><a class="btn btn-inverse" href="/help-me-choose">Use our Package Selector</a></p>\r\n<p>&nbsp;</p>\r\n<h2>&nbsp;</h2>\r\n<h2><img src="/files/image/Screen%20shot%202012-09-25%20at%201.22.04%20PM.png" border="0" width="200" height="145" style="float: left; margin-right: 15px; border: 1px solid grey;" />3. Compare package benefits</h2>\r\n<p>Use our package compare tool to compare the benefits for the various packages at a glance. Hover over packages to reveal their benefits or hover over a benefit to see which packages offer that benefit.</p>\r\n<p><a class="btn btn-inverse" href="/compare-packages">Compare Packages</a></p>\r\n<p>&nbsp;</p>\r\n<h2>Prefer to talk to someone?</h2>\r\n<p style="text-align: left;">If you''re still not sure which package is best for you or you''d just prefer to speak to someone directly, get in touch with us or ask us to get in touch with you.</p>\r\n<p style="text-align: left;"><strong>CALL 1300 462 662<br /></strong></p>\r\n<p style="text-align: left;">Or submit your details below and someone from our customer service team will be in touch with you</p>\r\n<form class="form-inline" action="/contact/CustServiceTeam" method="POST"><input name="First name" placeholder="First name" type="text" class="input-medium" /> <input name="Last name" placeholder="Last name" type="text" class="input-medium" /> <input name="Phone number" placeholder="Phone number" type="text" class="input-medium" /> <input type="submit" class="btn btn-inverse" /></form>\r\n<script type="mce-mce-text/javascript" src="/CORE/jq/jquery.placeholder.js"></script>\r\n<script type="mce-mce-text/javascript" src="/themes/essendon2013/js/prefer_to_talk_validation.js"></script>', 1, 1, 'a:1:{i:0;s:8:"everyone";}', '2012-09-05 08:44:39', '2012-10-05 16:05:23', 131, 'New Members', 0, 1, 0, 1, 1, 0, 2, 0, '/new-members.html', 1, NULL),
(191, 'Game Access', '<p>This section contains information about ticketing and game access for members. This includes information about seating and access to special games throughout the season.</p>\r\n<p>As the details of the 2013 season are finalised, the information here will get updated.</p>', 1, 1, 'a:1:{i:0;s:8:"everyone";}', '2012-09-05 08:44:43', '2012-10-05 15:22:21', 132, 'Game Access', 0, 1, 0, 1, 1, 0, 3, 0, '/game-access.html', 1, NULL),
(192, 'Forms', '<p>2013 Application Form</p>\r\n<p>Change Request Form</p>', 1, 1, '', '2012-09-05 08:44:46', '2012-10-05 15:28:47', 133, 'Forms', 0, 1, 0, 1, 1, 0, 4, 0, '/forms.html', 1, NULL),
(72, 'Disclaimer', '<p>jhgv,jgv</p>', 1, 1, '', '2012-02-14 11:55:19', '2012-10-05 15:23:00', 21, 'Disclaimer', 0, 1, 0, 1, 3, 0, 0, 0, '/disclaimer.html', 1, NULL),
(180, 'Home', 'Link', 1, 1, '', '2012-07-12 12:32:21', '2012-10-05 15:23:26', 0, 'Home', 0, 1, 0, 1, 1, 1, 0, 1, '/', 1, NULL),
(182, 'A page in Utilities', '<p>A page in Utilities</p>', 1, 1, '', '2012-07-13 10:18:12', '2012-08-01 15:38:00', 101, 'Top Nav Item', 0, 1, 0, 1, 2, 0, 15, 0, '/top_nav_item.html', 1, NULL),
(178, 'New Link', '', 172, 0, NULL, '2012-07-05 16:10:30', '2012-07-05 16:10:30', 0, '', 0, 1, 0, 1, 1, 0, 19, 1, '', 1, NULL),
(189, 'Renew for 2013', 'Link', 1, 1, 'a:1:{i:0;s:8:"everyone";}', '2012-09-05 08:43:58', '2012-10-05 15:24:16', 0, 'Renew for 2013', 0, 1, 0, 1, 1, 0, 1, 1, 'https://oss.ticketmaster.com/html/home.htmI?l=EN&team=essendon', 1, NULL),
(73, 'Privacy Policy', '<p>cd</p>', 1, 1, '', '2012-02-14 11:55:22', '2012-10-05 15:24:44', 22, 'Privacy Policy', 0, 1, 0, 1, 3, 0, 28, 0, '/privacy-policy.html', 1, NULL),
(195, 'Compare Packages', 'Link', 190, 1, 'a:1:{i:0;s:8:"everyone";}', '2012-09-07 12:38:38', '2012-10-03 11:26:00', 0, 'Compare Packages', 0, 1, 0, 1, 1, 0, 1, 1, '/compare-packages', 1, NULL),
(196, 'Home & Away', '<p>Find your membership in the table below to see which games you have access to.&nbsp; If your membership does not give you access to a game you can purchase tickets through the relevant ticketing agent.</p>\r\n<table class="responsive" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td bgcolor="#FFFFFF" width="17%">&nbsp;</td>\r\n<td colspan="2" align="center" bgcolor="#333333"><strong style="color: #fff;">ETIHAD STADIUM</strong></td>\r\n<td colspan="2" align="center" bgcolor="#333333"><strong style="color: #fff;">MCG</strong></td>\r\n<td align="center" bgcolor="#333333" width="17%"><strong style="color: #fff;">OUTSIDE VIC</strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="50">&nbsp;</td>\r\n<td align="center" bgcolor="#C90527" width="17%" height="50"><strong style="color: #fff;">Home</strong></td>\r\n<td align="center" bgcolor="#C90527" width="16%" height="50"><strong style="color: #fff;">Away</strong></td>\r\n<td align="center" bgcolor="#C90527" width="16%" height="50"><strong style="color: #fff;">Home<br /> </strong><span style="color: #fff;">(incl. Anzac Day)</span> <strong style="color: #fff;"><br /> </strong></td>\r\n<td align="center" bgcolor="#C90527" width="17%" height="50"><strong style="color: #fff;">Away<br /> </strong><span style="color: #fff;">(incl. Dreamtime)</span></td>\r\n<td align="center" bgcolor="#C90527" height="50"><strong style="color: #fff;">NSW QLD SA WA</strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>Flexi 3 Game<br /> </strong>*excludes Anzac Day</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Upgrade with barcode<br /> Max 3 games</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Upgrade with barcode<br /> Max 3 games*</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>Flexi 11 Game<br /> <br /> </strong></td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Upgrade with barcode<br /> Max 11 games</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Upgrade with barcode<br /> Max 11 games</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>National 3 Game<br /> </strong>*excludes Anzac Day</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Upgrade with barcode<br /> Max 2 games</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Upgrade with barcode<br /> Max 2 games*</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Access to 1 game in your home state</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>Beyond the Boundary</strong></td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Upgrade with barcode</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#AFB2B4"><strong>High Mark/Silver/Bronze Premium </strong></td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Home and away access<br /> <em>with reserved seat at all games<br /> <br /> </em></td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Home and away access<br /> <em>with home reserved seat<br /> <br /> </em></td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in to GA or upgrade with barcode</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in to GA or upgrade with barcode</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Home access<br /> <em>with home reserved seat<br /> <br /> </em></td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#AFB2B4"><strong>Bronze Basic</strong></td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Home and away access<br /> <em>with home reserved seat</em></td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in to GA or upgrade with barcode</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Home access<br /> <em>with home reserved seat at Etihad Stadium only</em></td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">Scan in to GA or upgrade with barcode</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">No access</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>&nbsp;</h2>\r\n<h2>On-Sale Dates</h2>\r\n<p><strong>ESSENDON CLUB MEMBERS:</strong> Upgrade to a reserved seat on the dates listed below if you are a Flexi 3 or 11 game member or if you have general admission access at the MCG. You will need to have your 12-digit membership barcode to upgrade to a reserved seat at the discounted member price. Your barcode can be found on the back of your 2013 membership card.</p>\r\n<table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td align="center" bgcolor="#333333"><strong style="color: #fff;">VENUE</strong></td>\r\n<td align="center" bgcolor="#333333"><strong style="color: #fff;">TICKETING AGENT</strong></td>\r\n<td align="center" bgcolor="#333333"><strong style="color: #fff;">ROUNDS 1 - 22</strong></td>\r\n<td align="center" bgcolor="#333333" width="17%"><strong style="color: #fff;">ROUND 23</strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>Etihad Stadium</strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">\r\n<p><strong>Ticketmaster</strong>&nbsp; <br /> <a href="http://www.ticketmaster.com.au">ticketmaster.com.au</a> <br /> 1300 136 122</p>\r\n<a href="http://www.ticketmaster.com.au/h/stateselectoutlets.html?tm_link=tm_ql_2">Outlets</a></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60"><strong>TBA</strong><br /> Level 1 and 2 reserved seating only</td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">TBA</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>MCG<br /> <br /> </strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">\r\n<p><strong>Ticketek</strong><br /> <a href="http://www.ticketek.com.au">ticketek.com.au</a></p>\r\n132 849<br /> <a href="http://premier.ticketek.com.au/Content/Outlets/agency.aspx">Outlets</a></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">TBA</td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">TBA</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>GENERAL PUBLIC:</strong>If your membership does not give you access to a game you can purchase a reserved seat on the on dates listed below.</p>\r\n<table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td align="center" bgcolor="#333333"><strong style="color: #fff;">VENUE</strong></td>\r\n<td align="center" bgcolor="#333333"><strong style="color: #fff;">TICKETING AGENT</strong></td>\r\n<td align="center" bgcolor="#333333"><strong style="color: #fff;">ROUNDS 1 - 22</strong></td>\r\n<td align="center" bgcolor="#333333" width="17%"><strong style="color: #fff;">ROUND 23</strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>Etihad Stadium</strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">\r\n<p><strong>Ticketmaster</strong>&nbsp; <br /> <a href="http://www.ticketmaster.com.au">ticketmaster.com.au</a> <br /> 1300 136 122</p>\r\n<a href="http://www.ticketmaster.com.au/h/stateselectoutlets.html?tm_link=tm_ql_2">Outlets</a></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60"><strong>TBA</strong><br /> Level 1 and 2 reserved seating only</td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">TBA</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>MCG<br /> <br /> </strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">\r\n<p><strong>Ticketek</strong><br /> <a href="http://www.ticketek.com.au">ticketek.com.au</a></p>\r\n132 849<br /> <a href="http://premier.ticketek.com.au/Content/Outlets/agency.aspx">Outlets</a></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">TBA</td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">TBA</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>&nbsp;</h2>\r\n<h2>Ticket Prices</h2>\r\n<table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td bgcolor="#FFFFFF" width="16%">&nbsp;</td>\r\n<td colspan="2" align="center" bgcolor="#333333"><strong style="color: #fff;">MCG</strong></td>\r\n<td colspan="4" align="center" bgcolor="#333333"><strong style="color: #fff;">ETIHAD STADIUM</strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="50">&nbsp;</td>\r\n<td align="center" bgcolor="#C90527" width="17%" height="50"><strong style="color: #fff;">Premium</strong></td>\r\n<td align="center" bgcolor="#C90527" width="16%" height="50"><strong style="color: #fff;">Reserved</strong></td>\r\n<td align="center" bgcolor="#C90527" width="13%" height="50"><strong style="color: #fff;">Level 1<br /> </strong></td>\r\n<td align="center" bgcolor="#C90527" width="13%" height="50"><strong style="color: #fff;">Level 2</strong></td>\r\n<td align="center" bgcolor="#C90527" width="13%" height="50"><strong style="color: #fff;">Level 3</strong></td>\r\n<td align="center" bgcolor="#C90527" width="12%" height="50"><strong style="color: #fff;">Level 4</strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>Member<br /> </strong>Adult*</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60">\r\n<p><strong>Member</strong><br /> Concession*</p>\r\n</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#D2D1D1" height="60"><strong>Member<br /> </strong>Junior*</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#D2D1D1" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Adult</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Concession</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Junior</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Junior Under 6</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">Family</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 191, 1, '', '2012-09-20 13:59:35', '2012-10-05 15:23:57', 161, 'Home & Away', 0, 1, 0, 1, 1, 0, 14, 0, '/home-away.html', 1, NULL),
(197, 'Finals', '<p>Ticketing information regarding the 2013 Toyota AFL Finals Series will be released and updated here in August 2013 if Essendon are participating. To be the first to receive the latest finals ticketing information, register or update your email address in your <a href="https://oss.ticketmaster.com/html/home.htmI?l=EN&amp;team=essendon">My Essendon FC Account</a>.</p>', 191, 1, '', '2012-09-20 14:00:53', '2012-10-08 10:54:11', 163, 'Finals', 0, 1, 0, 1, 1, 0, 15, 0, '/finals.html', 1, NULL),
(198, 'NAB Cup', '<p>Please check back here in early 2013 for ticketing information regarding the 2013 NAB Cup. To be the first to receive the latest ticketing information, register or update your email address in your <a href="https://oss.ticketmaster.com/html/home.htmI?l=EN&amp;team=essendon">My Essendon FC Account</a>.</p>', 191, 1, '', '2012-09-20 14:07:08', '2012-10-08 10:55:05', 164, 'NAB Cup', 0, 1, 0, 1, 1, 0, 16, 0, '/nab-cup.html', 1, NULL),
(199, 'National Member Ticketing', '<p>As a National 3 Game Member you have the opportunity to watch Essendon play once in your home state (SA, NSW, QLD and WA)*.&nbsp; If Essendon play twice in your state, you will have the opportunity to nominate which game you would like to attend using the Acceptance Form.&nbsp; If you would like to attend both games you can register your interest using the Ballot Form.</p>\r\n<p><strong>Forms will be available approximately 6 weeks prior to each match.</strong></p>\r\n<p>If you are not a National 3 Game member you will need to purchase a ticket through the relevant ticketing agent.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td colspan="5" align="center" bgcolor="#333333"><strong style="color: #fff;">GAMES PLAYED OUTSIDE VICTORIA</strong></td>\r\n</tr>\r\n<tr>\r\n<td align="center" bgcolor="#C90527" width="17%" height="50"><strong style="color: #fff;">State</strong></td>\r\n<td align="center" bgcolor="#C90527" width="17%" height="50"><strong style="color: #fff;">Match</strong></td>\r\n<td align="center" bgcolor="#C90527" width="16%" height="50"><strong style="color: #fff;">On-sale Date</strong></td>\r\n<td align="center" bgcolor="#C90527" width="13%" height="50"><strong style="color: #fff;">Stadium<br /> </strong></td>\r\n<td align="center" bgcolor="#C90527" width="13%" height="50"><strong style="color: #fff;">Ticketing Agent</strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n<td align="center" bgcolor="#FFFFFF" height="60">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 191, 1, '', '2012-09-20 14:17:06', '2012-10-01 18:25:50', 167, 'National Member Ticketing', 0, 1, 0, 1, 1, 0, 17, 0, '/national-member-ticketing.html', 1, NULL),
(201, 'Return your seat for resale', '<p>The easiest and quickest way to return your seat for resale throughout the season is to respond to emails and/or sms correspondence from the club.&nbsp; We will contact you prior to each home game at Etihad Stadium and ask you if you would like to return your seat for resale.&nbsp; If you respond we&rsquo;ll take care of the rest.</p>\r\n<p>If you would prefer to return your seat online through your Essendon FC Account you can follow the steps below: (Please note that this process will not work for AFL Members)</p>\r\n<table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td align="left" bgcolor="#333333" width="12%" height="60"><strong style="color: #fff;">Step 1</strong></td>\r\n<td align="left" bgcolor="#ffffff" width="88%" height="60">Login into your <a href="https://oss.ticketmaster.com/html/home.htmI?l=EN&amp;team=essendon">My Essendon FC Account</a> using your Membership Number (or email address) and Password</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 2</strong></td>\r\n<td align="left" bgcolor="#ffffff" height="60">Under ''Manage my Membership'' click ''Forward''</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 3</strong></td>\r\n<td align="left" bgcolor="#ffffff" height="60">Select the seat underneath the game that you wish to return for resale and click ''Forward''</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 4</strong></td>\r\n<td align="left" bgcolor="#ffffff" height="60">\r\n<p>Fill in the fields below with the following information: <br /><em>(Please note: the ''Recipient'' details are for Essendon Football Club)</em></p>\r\n<p style="padding-left: 30px;">Recipient First name: <strong>Seat</strong> <br />Recipient Last name: <strong>Resale</strong><br />Recipient E-mail Address: <strong>sellmyseat@essendonfc.com.au&nbsp;</strong>&nbsp;<br />Re-type E-mail Address: <strong>sellmyseat@essendonfc.com.au</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 5</strong></td>\r\n<td align="left" bgcolor="#ffffff" height="60">Click ''Continue''</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 6</strong></td>\r\n<td align="left" bgcolor="#ffffff" height="60">To complete the process click ''E-mail Products''</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>If you have a family membership and wish to return all seats for resale, login to each member&rsquo;s account and repeat the process above.</p>', 205, 1, '', '2012-09-20 14:25:58', '2012-10-08 12:11:39', 171, 'Return your seat for resale', 0, 1, 0, 1, 1, 0, 1, 0, '/return-your-seat-for-resale.html', 1, NULL),
(202, 'Forward your seat to a friend', '<p>If you can&rsquo;t make it to a home game at Etihad Stadium but know someone who can, you can send your seat to them as an e-ticket.&nbsp; Your seat won&rsquo;t go empty and you&rsquo;ll give a family member or friend the opportunity to sit with other Essendon supporters in a sea of red and black!&nbsp;&nbsp;</p>\r\n<p><strong>IMPORTANT</strong>: Please note that once your seat has been forwarded your membership barcode will be cancelled for that game and your membership card will not scan you in at the gate.&nbsp; Membership credit does not apply to seat forwarding.</p>\r\n<p>Follow the steps below to your forward your seat to a family member or friend.</p>\r\n<table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td align="left" bgcolor="#333333" width="12%" height="60"><strong style="color: #fff;">Step 1</strong></td>\r\n<td align="left" bgcolor="#FFFFFF" width="88%" height="60">Login into your <a href="https://oss.ticketmaster.com/html/home.htmI?l=EN&amp;team=essendon">My Essendon FC Account</a> using your Membership Number (or email address) and Password</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 2</strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">Under ''Manage my Membership'' click ''Forward/Seat Resale''</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 3</strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">Select the seat underneath the game that you wish to send to a friend and click ''Forward''</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 4</strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">\r\n<p>Fill in the fields below with the recipients details: <br /> (<em>Please note: the &lsquo;Recipient&rsquo; is the person you are sending your seat to.&nbsp; Do not enter your own email address as your ticket will be sent to yourself.</em>)</p>\r\n<p>Recipient First name:<br /> Recipient Last name:<br /> Recipient E-mail Address:<br /> Re-type E-mail Address:</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 5</strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">Click ''Continue''</td>\r\n</tr>\r\n<tr>\r\n<td align="left" bgcolor="#333333"><strong style="color: #fff;">Step 6</strong></td>\r\n<td align="left" bgcolor="#FFFFFF" height="60">To complete the process click ''E-mail Products''</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>You can forward your seat up until game time.</p>', 205, 1, '', '2012-09-20 14:27:43', '2012-10-02 15:41:45', 173, 'Forward your seat to a friend', 0, 1, 0, 1, 1, 0, 2, 0, '/forward-your-seat-to-a-friend.html', 1, NULL),
(203, 'How to buy a resale seat', '<p>Please check back here during the season for information on how you can buy a resale seat.</p>', 205, 1, '', '2012-09-20 14:29:15', '2012-10-02 15:41:45', 175, 'How to buy a resale seat', 0, 1, 0, 1, 1, 0, 3, 0, '/how-to-buy-a-resale-seat.html', 1, NULL),
(204, 'Terms & Conditions', '<ul>\r\n<li>Once a seat has been returned for resale it cannot be returned to the member.&nbsp; Members who change their mind will have to purchase a new seat via Ticketmaster at the full rate.</li>\r\n<li>Seats will only be accepted for resale up until the date and time published on the &lsquo;What is Seat Resale&rsquo; page.</li>\r\n<li>Essendon FC cannot guarantee that seats will be resold.&nbsp; No compensation will be given to members if the seat remains unsold.&nbsp; Returned seats are sold in the order of &lsquo;Best Available&rsquo;</li>\r\n<li>Membership credit cannot be redeemed as cash.</li>\r\n<li>Membership credit cannot be transferred to other members.</li>\r\n<li>Membership credit can only be used towards a Membership (of equal or greater value) for the following year and will not accumulate. All unused credit will be forfeited.</li>\r\n<li>Membership credit will only be credited to financial members.</li>\r\n<li>Members with complimentary or discounted membership can offer their seat up for sale, but will not be eligible to receive credit if their seat sells.</li>\r\n<li>Please note account credit will only appear at the conclusion of the season.</li>\r\n<li>Only Members with a valid email address will be notified of the outcome of their seat.</li>\r\n</ul>', 205, 1, '', '2012-09-20 14:30:02', '2012-10-02 15:41:45', 177, 'Terms & Conditions', 0, 1, 0, 1, 1, 0, 4, 0, '/terms-conditions.html', 1, NULL),
(205, 'Seat Resale', '<p>&nbsp;</p>\r\n<h2>What is Seat Resale?</h2>\r\n<p>Seat Resale is a program that allows you to return your seat for resale when you are unable to attend a home game at Etihad Stadium.&nbsp; Seats returned for resale are sold via Ticketmaster to Essendon fans.</p>\r\n<p>If you seat sells you will earn membership credit which will be applied as discount to your membership when you renew in 2014.&nbsp; If your seat doesn&rsquo;t sell there is no credit, but you can always try again next time.</p>\r\n<p>IMPORTANT: Please note that once you return your seat for resale you cannot change your mind.&nbsp; Your membership barcode will be cancelled for that game and your membership card will not scan you in at the gate.</p>\r\n<p>&nbsp;</p>\r\n<h2>Membership Credit</h2>\r\n<table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td style="text-align: center;" colspan="4" align="middle" bgcolor="#333333"><strong style="color: #fff;">MEMBERSHIP CREDIT PER SEAT</strong></td>\r\n</tr>\r\n<tr>\r\n<td align="middle" bgcolor="#ffffff" width="17%" height="50">&nbsp;</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#c90527" width="17%" height="50"><strong style="color: #fff;">Adult</strong></td>\r\n<td style="text-align: center;" align="middle" bgcolor="#c90527" width="16%" height="50"><strong style="color: #fff;">Concession</strong></td>\r\n<td style="text-align: center;" align="middle" bgcolor="#c90527" width="13%" height="50"><strong style="color: #fff;">Junior</strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#ffffff" height="60">High Mark</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$29</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$23</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$10</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#ffffff" height="60">Silver</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$25</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$22</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$9</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#ffffff" height="60">Bronze Premium</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$15</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$12</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$5</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#ffffff" height="60">Bronze Basic</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$10</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$8</td>\r\n<td style="text-align: center;" align="middle" bgcolor="#ffffff" height="60">$4</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>&nbsp;</h2>\r\n<h2>Release Back Deadlines</h2>\r\n<p>You can return your seat for resale from TBA until the release back deadline listed below for each game.&nbsp;</p>\r\n<table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">\r\n<tbody>\r\n<tr>\r\n<td style="text-align: center;" colspan="3" align="middle" bgcolor="#333333"><strong style="color: #fff;">RELEASE BACK DEADLINES</strong></td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;" align="middle" bgcolor="#c90527" width="17%" height="50"><strong style="color: #fff;">Round</strong></td>\r\n<td style="text-align: center;" align="middle" bgcolor="#c90527" width="16%" height="50"><strong style="color: #fff;">Game</strong></td>\r\n<td style="text-align: center;" align="middle" bgcolor="#c90527" width="13%" height="50"><strong style="color: #fff;">Deadline</strong></td>\r\n</tr>\r\n<tr>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n<td align="middle" bgcolor="#ffffff" height="60">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 1, '', '2012-09-20 14:32:24', '2012-10-08 12:16:00', 179, 'Seat Resale', 0, 1, 0, 1, 1, 0, 6, 0, '/seat-resale.html', 1, NULL),
(211, 'What is seat resale?', 'Link', 205, 1, NULL, '2012-10-02 15:41:15', '2012-10-02 15:41:45', 0, 'What is seat resale?', 0, 1, 0, 1, 1, 0, 0, 1, '/seat-resale.html', 1, NULL),
(212, 'Seating Maps', '<p>&nbsp;</p>\r\n<p><img src="/files/image/Etihad%20Stadium%202013%20Seating%20map%20jpg.JPG" border="0" alt="Etihad Stadium 2013 Seating Map" width="3361" height="2347" style="border: 0px;" /><a href="/files/file/2013%20%20ES%20seating%20map%20-%20home%20and%20away.pdf" target="_blank"><br />Download PDF - Etihad Stadium Seating Map</a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;<img src="/files/image/Seating%20map%20-%20home%20and%20away%202013.JPG" border="0" width="4961" height="3508" style="border: 0px;" /></p>\r\n<p><a href="/files/file/MCG%20Seating%20Map%202013%20pdf.pdf" target="_blank">Download PDF -&nbsp;MCG Seating Map</a></p>', 191, 1, NULL, '2012-10-02 15:53:16', '2012-10-08 12:06:28', 187, 'Seating Maps', 0, 1, 0, 1, 1, 0, 23, 0, '/seating-maps.html', 1, NULL),
(213, '2013 Package List', 'Link', 190, 1, NULL, '2012-10-03 11:25:10', '2012-10-03 11:26:00', 0, '2013 Package List', 0, 1, 0, 1, 1, 0, 0, 1, '/2013-packages', 1, NULL),
(214, 'Package Selector', 'Link', 190, 1, NULL, '2012-10-03 11:26:11', '2012-10-03 11:26:46', 0, 'Package Selector', 0, 1, 0, 1, 1, 0, 25, 1, '/help-me-choose', 1, NULL),
(215, 'FAQs', '<p><iframe src="http://ifaq.flexanswer.com/home/essendon/ifaq.asp" frameborder="no" scrolling="no" width="620" height="650"></iframe></p>', 1, 1, NULL, '2012-10-04 14:07:55', '2012-10-05 15:27:28', 191, 'FAQs', 0, 1, 0, 1, 1, 0, 5, 0, '/faqs.html', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_pages_widgets`
--

CREATE TABLE IF NOT EXISTS `essendon_pages_widgets` (
  `page_id` int(10) unsigned NOT NULL,
  `widget_id` int(10) unsigned NOT NULL,
  KEY `page_id` (`page_id`),
  KEY `widget_id` (`widget_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `essendon_reports`
--

CREATE TABLE IF NOT EXISTS `essendon_reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `report_type_id` int(10) unsigned NOT NULL,
  `last_run` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `settings_array` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `essendon_reports`
--

INSERT INTO `essendon_reports` (`id`, `name`, `report_type_id`, `last_run`, `created`, `modified`, `created_by`, `modified_by`, `settings_array`) VALUES
(4, '132', 3, '2012-02-28 17:07:02', '2012-02-28 00:00:00', '2012-02-28 17:07:02', NULL, 1, 'a:2:{s:6:"filter";a:4:{s:5:"andOr";a:1:{i:0;s:3:"AND";}s:6:"fields";a:1:{i:0;s:5:"title";}s:8:"operator";a:1:{i:0;s:4:"LIKE";}s:5:"value";a:1:{i:0;s:1:"a";}}s:7:"columns";a:28:{s:5:"title";s:2:"on";s:10:"short_desc";s:2:"on";s:10:"start_date";s:2:"on";s:8:"end_date";s:2:"on";s:10:"start_time";s:2:"on";s:8:"end_time";s:2:"on";s:5:"venue";s:2:"on";s:12:"venueAddress";s:2:"on";s:9:"rsvp_date";s:2:"on";s:9:"available";s:2:"on";s:6:"filled";s:2:"on";s:7:"pricing";s:2:"on";s:8:"reminder";s:2:"on";s:12:"publish_date";s:2:"on";s:13:"reminder_date";s:2:"on";s:12:"check_status";s:2:"on";s:10:"first_name";s:2:"on";s:9:"last_name";s:2:"on";s:5:"email";s:2:"on";s:7:"company";s:2:"on";s:5:"phone";s:2:"on";s:7:"address";s:2:"on";s:6:"suburb";s:2:"on";s:8:"postcode";s:2:"on";s:6:"status";s:2:"on";s:4:"paid";s:2:"on";s:7:"created";s:2:"on";s:8:"modified";s:2:"on";}}'),
(5, 'Simon''s new report', 2, '2012-02-28 17:07:35', '2012-02-28 17:07:35', '2012-02-28 17:07:35', NULL, 1, 'a:2:{s:6:"filter";a:4:{s:5:"andOr";a:1:{i:0;s:3:"AND";}s:6:"fields";a:1:{i:0;s:5:"title";}s:8:"operator";a:1:{i:0;s:1:"=";}s:5:"value";a:1:{i:0;s:0:"";}}s:7:"columns";a:17:{s:5:"title";s:2:"on";s:10:"short_desc";s:2:"on";s:10:"start_date";s:2:"on";s:8:"end_date";s:2:"on";s:10:"start_time";s:2:"on";s:8:"end_time";s:2:"on";s:5:"venue";s:2:"on";s:7:"address";s:2:"on";s:9:"rsvp_date";s:2:"on";s:9:"available";s:2:"on";s:6:"filled";s:2:"on";s:7:"pricing";s:2:"on";s:8:"reminder";s:2:"on";s:12:"publish_date";s:2:"on";s:13:"reminder_date";s:2:"on";s:12:"check_status";s:2:"on";s:23:"number_of_registrations";s:2:"on";}}'),
(6, 'Simon''s new report', 2, '2012-02-28 17:08:06', '2012-02-28 17:08:06', '2012-02-28 17:08:06', NULL, 1, 'a:2:{s:6:"filter";a:4:{s:5:"andOr";a:1:{i:0;s:3:"AND";}s:6:"fields";a:1:{i:0;s:5:"title";}s:8:"operator";a:1:{i:0;s:1:"=";}s:5:"value";a:1:{i:0;s:0:"";}}s:7:"columns";a:17:{s:5:"title";s:2:"on";s:10:"short_desc";s:2:"on";s:10:"start_date";s:2:"on";s:8:"end_date";s:2:"on";s:10:"start_time";s:2:"on";s:8:"end_time";s:2:"on";s:5:"venue";s:2:"on";s:7:"address";s:2:"on";s:9:"rsvp_date";s:2:"on";s:9:"available";s:2:"on";s:6:"filled";s:2:"on";s:7:"pricing";s:2:"on";s:8:"reminder";s:2:"on";s:12:"publish_date";s:2:"on";s:13:"reminder_date";s:2:"on";s:12:"check_status";s:2:"on";s:23:"number_of_registrations";s:2:"on";}}'),
(7, 'Simon''s new report', 2, '2012-03-15 14:32:12', '2012-02-28 17:09:02', '2012-03-15 14:32:12', NULL, 1, 'a:2:{s:6:"filter";a:4:{s:5:"andOr";a:1:{i:0;s:3:"AND";}s:6:"fields";a:1:{i:0;s:5:"title";}s:8:"operator";a:1:{i:0;s:1:"=";}s:5:"value";a:1:{i:0;s:0:"";}}s:7:"columns";a:3:{s:5:"title";s:2:"on";s:10:"short_desc";s:2:"on";s:10:"start_date";s:2:"on";}}'),
(8, '', 3, '2012-03-23 11:04:58', '2012-03-15 15:43:34', '2012-03-23 11:04:58', NULL, 1, 'a:2:{s:6:"filter";a:4:{s:5:"andOr";a:1:{i:0;s:3:"AND";}s:6:"fields";a:1:{i:0;s:5:"title";}s:8:"operator";a:1:{i:0;s:1:"=";}s:5:"value";a:1:{i:0;s:0:"";}}s:7:"columns";a:28:{s:5:"title";s:2:"on";s:10:"short_desc";s:2:"on";s:10:"start_date";s:2:"on";s:8:"end_date";s:2:"on";s:10:"start_time";s:2:"on";s:8:"end_time";s:2:"on";s:5:"venue";s:2:"on";s:12:"venueAddress";s:2:"on";s:9:"rsvp_date";s:2:"on";s:9:"available";s:2:"on";s:6:"filled";s:2:"on";s:7:"pricing";s:2:"on";s:8:"reminder";s:2:"on";s:12:"publish_date";s:2:"on";s:13:"reminder_date";s:2:"on";s:12:"check_status";s:2:"on";s:10:"first_name";s:2:"on";s:9:"last_name";s:2:"on";s:5:"email";s:2:"on";s:7:"company";s:2:"on";s:5:"phone";s:2:"on";s:7:"address";s:2:"on";s:6:"suburb";s:2:"on";s:8:"postcode";s:2:"on";s:6:"status";s:2:"on";s:4:"paid";s:2:"on";s:7:"created";s:2:"on";s:8:"modified";s:2:"on";}}'),
(9, '', 0, '2012-03-23 11:06:29', '2012-03-23 11:06:10', '2012-03-23 11:06:29', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_report_types`
--

CREATE TABLE IF NOT EXISTS `essendon_report_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `sql` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `essendon_report_types`
--

INSERT INTO `essendon_report_types` (`id`, `name`, `description`, `sql`) VALUES
(2, 'Events', 'List events (and number of registrants)', '\r\n-- List all events (and number of registrants)\r\nSELECT\r\nevents.title, events.short_desc, events.start_date, events.end_date, events.start_time, events.end_time, events.venue, events.address, events.rsvp_date, events.available, events.filled, events.pricing, events.reminder, events.publish_date,   events.reminder_date, events.check_status, COUNT(*) as number_of_registrations\r\n\r\nFROM events\r\nJOIN event_registrations ON event_registrations.event_id = events.id\r\nGROUP BY \r\nevents.title, events.short_desc, events.start_date, events.end_date, events.start_time, events.end_time, events.venue, events.address, events.rsvp_date, events.available, events.filled, events.pricing, events.reminder, events.publish_date,   events.reminder_date, events.check_status'),
(3, 'Event Registrations', 'List all the registrants for events', '\r\n-- List all event registrants\r\nSELECT\r\nevents.title, events.short_desc, events.start_date, events.end_date, events.start_time, events.end_time, events.venue, events.address as venueAddress, events.rsvp_date, events.available, events.filled, events.pricing, events.reminder, events.publish_date,   events.reminder_date, events.check_status, \r\n\r\nevent_registrations.first_name, event_registrations.last_name, event_registrations.email, event_registrations.company, event_registrations.phone, event_registrations.address, event_registrations.suburb, event_registrations.postcode, event_registrations.status, event_registrations.paid, event_registrations.created, event_registrations.modified\r\n\r\nFROM events\r\nLEFT JOIN event_registrations ON event_registrations.event_id = events.id\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_settings`
--

CREATE TABLE IF NOT EXISTS `essendon_settings` (
  `id` varchar(255) NOT NULL,
  `value` text,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `essendon_settings`
--

INSERT INTO `essendon_settings` (`id`, `value`, `modified`) VALUES
('SEO.site_title', 'Membership | Essendon Football Club', '2012-10-05 15:25:51'),
('Google Analytics ID', 'UA-13190527-1', '2012-10-05 15:25:51'),
('ClubName', 'Essendon Football Club', '2012-07-30 10:34:59'),
('Facebook.admin_id', '123456798', '2012-07-31 12:45:13'),
('Homepage.Widget.Widget.1', '7', '2012-09-07 15:10:22'),
('Homepage.Meta.meta_desc', 'The Official web site of the Essendon Football Club - your best source for Essendon information, shopping, competitions and video online', '2012-09-07 15:10:22'),
('SEO.meta_keywords', 'Essendon membership, bombers membership, Essendon members, bombers members', '2012-10-05 15:25:51'),
('SEO.meta_description', 'The Official membership website of the Essendon Football Club', '2012-10-05 15:25:51'),
('MemberCount', '12345', '2012-08-31 00:46:44'),
('Global.ExtraContent.MemberNews', '<h4>Lorem ipsum news title</h4>\r\n				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s. <a href="/">MORE</a>\r\n				\r\n				<h4>Lorem ipsum news title</h4>\r\n				Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a href="/">MORE</a>\r\n				\r\n				<h4>Lorem ipsum news title</h4>\r\n				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s. <a href="/">MORE</a>\r\n		', '2012-07-12 17:14:10'),
('Homepage.Widget.Widget.0', '4', '2012-09-07 15:10:22'),
('Homepage.video_id', 'wuQvKuqYUk4', '2012-09-07 15:10:22'),
('Homepage.Meta.id', '', '2012-09-07 15:10:22'),
('Homepage.Meta.item_type_id', '', '2012-09-07 15:10:22'),
('Homepage.Meta.model_name', 'Page', '2012-09-07 15:10:22'),
('Homepage.Meta.page_title', 'Membership | Essendon Football Club', '2012-09-07 15:10:22'),
('Homepage.Meta.meta_key', 'essendon, Essendon Football Club, James Hird, Jobe Watson, Angus Monfries, Bomber Thompson, Mark Thompson, Bombers, bombers, Dons footy, football, Aussie Rules, Australian Rules, James Hird, Windy Hill, AFL, Essendon Memorabilia, Essendon Membership,  Essendon Gifts, Essendon Shop, Bomber Shop, Essendon Merchandise, Bomber Merchandise, Bomber Magazine, Essendon Auctions, Bomber Auctions, Essendon Footy Tipping, Bomber Footy Tipping, Essendon Newsletter, Bomber.tv, Essendon travel', '2012-09-07 15:10:22'),
('Homepage.MemberNews', '<h4>Lorem ipsum news title</h4>\r\n<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<a href="/">MORE</a></p>\r\n<h4>Lorem ipsum news title</h4>\r\n<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;<a href="/">MORE<br /></a></p>', '2012-09-07 15:10:22'),
('Homepage.video_url', 'http://www.youtube.com/watch?v=wuQvKuqYUk4', '2012-09-07 15:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_sitemaps`
--

CREATE TABLE IF NOT EXISTS `essendon_sitemaps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start_menu` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `essendon_sitemaps`
--

INSERT INTO `essendon_sitemaps` (`id`, `name`, `start_menu`, `sort`, `visible`) VALUES
(1, 'Main Menu', 'Home', 1, 1),
(2, 'Header Menu', 'Header', 2, 1),
(3, 'Footer Menu', 'Footer', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_sms_log`
--

CREATE TABLE IF NOT EXISTS `essendon_sms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `sms_text` varchar(500) DEFAULT NULL,
  `result` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Log of SMS messages sent to inductees' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `essendon_sms_log`
--

INSERT INTO `essendon_sms_log` (`id`, `type`, `phone_number`, `sms_text`, `result`, `created`) VALUES
(1, 'test', '61431964707', 'This is a test message from CORE', 'ERROR: Missing parameter: user\r\nERROR: Missing parameter: password\r\n', '2012-08-20 15:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_tags`
--

CREATE TABLE IF NOT EXISTS `essendon_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `used_at` int(11) NOT NULL DEFAULT '0',
  `softdelete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_2` (`name`),
  KEY `name` (`name`(5))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `essendon_tags`
--

INSERT INTO `essendon_tags` (`id`, `name`, `created`, `modified`, `created_by`, `modified_by`, `used_at`, `softdelete`) VALUES
(143, 'Gender', '2010-09-21 09:18:24', '2010-09-21 09:18:24', 1, 0, 1306780172, 0),
(144, 'My New Tag', '2010-09-21 09:18:46', '2012-01-16 12:30:26', 1, 0, 0, 0),
(147, 'LGBT', '2010-09-21 09:19:56', '2010-09-21 09:19:56', 1, 0, 1306780172, 0),
(149, 'Cultural Diversity / Multi-faith', '2010-09-21 09:20:26', '2010-09-21 09:20:26', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_tags_objects`
--

CREATE TABLE IF NOT EXISTS `essendon_tags_objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `object_type` varchar(50) NOT NULL COMMENT 'The type of object (news, media, page, practiceArea, etc.)',
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`),
  KEY `object_id` (`object_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Links various CMS objects to tags (many-to-many)' AUTO_INCREMENT=35 ;

--
-- Dumping data for table `essendon_tags_objects`
--

INSERT INTO `essendon_tags_objects` (`id`, `object_id`, `tag_id`, `object_type`) VALUES
(1, 11, 149, 'Page'),
(2, 2, 149, 'PracticeArea'),
(3, 2, 148, 'PracticeArea'),
(4, 2, 146, 'PracticeArea'),
(5, 1, 144, 'Person'),
(6, 1, 148, 'News'),
(7, 1, 146, 'News'),
(8, 1, 144, 'News'),
(9, 1, 145, 'News'),
(10, 1, 143, 'News'),
(11, 2, 147, 'News'),
(12, 2, 143, 'News'),
(13, 2, 145, 'Event'),
(14, 2, 144, 'Event'),
(15, 1, 147, 'Person'),
(16, 1, 143, 'Person'),
(22, 7, 144, 'Event'),
(21, 7, 143, 'Event');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_users`
--

CREATE TABLE IF NOT EXISTS `essendon_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleteable` tinyint(1) NOT NULL DEFAULT '1',
  `fullname` varchar(255) DEFAULT NULL,
  `remote_address` varchar(16) DEFAULT NULL,
  `last_login_ip` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='This table is for ADMIN users only' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `essendon_users`
--

INSERT INTO `essendon_users` (`id`, `username`, `password`, `email`, `last_login`, `created`, `modified`, `group_id`, `status`, `deleteable`, `fullname`, `remote_address`, `last_login_ip`) VALUES
(1, 'admin', 'e9f3c70c70fcb79c613052f68e52640a7fbed184', 'simon@surfacemedia.com.au', '2012-02-21 15:37:50', '2010-08-02 12:03:49', '2012-10-08 12:19:15', 1, 0, 0, 'Madgwicks Admin', '127.0.0.1', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_widgets`
--

CREATE TABLE IF NOT EXISTS `essendon_widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `path` varchar(250) NOT NULL COMMENT 'Field not used',
  `content` text NOT NULL,
  `widget_type_id` int(11) NOT NULL DEFAULT '1',
  `checked` tinyint(4) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `essendon_widgets`
--

INSERT INTO `essendon_widgets` (`id`, `order`, `name`, `path`, `content`, `widget_type_id`, `checked`, `weight`) VALUES
(14, 0, 'Seating Plan', 'seating_map', '', 1, 1, 0),
(13, 0, 'Help Me Choose', 'help_me_choose', '', 1, 1, 0),
(12, 0, 'Promo', 'promo', '', 1, 1, 0),
(15, 0, 'Flight Plan', 'flight_plan', '', 1, 1, 0),
(16, 0, 'Skeeta', 'skeeta', '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `essendon_widgets_objects`
--

CREATE TABLE IF NOT EXISTS `essendon_widgets_objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `object_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=836 ;

--
-- Dumping data for table `essendon_widgets_objects`
--

INSERT INTO `essendon_widgets_objects` (`id`, `widget_id`, `object_id`, `object_type`) VALUES
(722, 12, 120, 'Package'),
(770, 12, 119, 'Package'),
(769, 13, 119, 'Package'),
(768, 14, 119, 'Package'),
(767, 12, 118, 'Package'),
(766, 13, 118, 'Package'),
(765, 14, 118, 'Package'),
(713, 12, 117, 'Package'),
(712, 13, 117, 'Package'),
(711, 14, 117, 'Package'),
(710, 12, 116, 'Package'),
(709, 13, 116, 'Package'),
(708, 14, 116, 'Package'),
(707, 12, 115, 'Package'),
(706, 13, 115, 'Package'),
(705, 14, 115, 'Package'),
(803, 13, 191, 'Page'),
(802, 14, 191, 'Page'),
(833, 16, 190, 'Page'),
(832, 15, 190, 'Page'),
(831, 12, 190, 'Page'),
(721, 13, 120, 'Package'),
(720, 14, 120, 'Package'),
(725, 12, 121, 'Package'),
(724, 13, 121, 'Package'),
(723, 14, 121, 'Package'),
(808, 12, 122, 'Package'),
(807, 13, 122, 'Package'),
(806, 14, 122, 'Package'),
(823, 12, 123, 'Package'),
(822, 13, 123, 'Package'),
(821, 14, 123, 'Package'),
(728, 12, 124, 'Package'),
(727, 13, 124, 'Package'),
(726, 14, 124, 'Package'),
(629, 12, 125, 'Package'),
(628, 13, 125, 'Package'),
(627, 14, 125, 'Package'),
(830, 13, 190, 'Page'),
(829, 14, 190, 'Page'),
(702, 14, 126, 'Package'),
(703, 13, 126, 'Package'),
(704, 12, 126, 'Package'),
(835, 12, 198, 'Page'),
(834, 12, 197, 'Page'),
(810, 4, 122, 'Package'),
(809, 7, 122, 'Package'),
(804, 13, 215, 'Page'),
(805, 13, 192, 'Page'),
(798, 14, 43, 'Package');

-- --------------------------------------------------------

--
-- Table structure for table `essendon_widget_types`
--

CREATE TABLE IF NOT EXISTS `essendon_widget_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `essendon_widget_types`
--

INSERT INTO `essendon_widget_types` (`id`, `name`) VALUES
(1, 'Hardcoded HTML (Not editable)'),
(2, 'WYSIWYG'),
(3, 'Image and Link');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
