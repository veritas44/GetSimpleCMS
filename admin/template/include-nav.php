<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

/**
 * Navigation Include Template
 *
 * @package GetSimple
 */

$debugInfoUrl = 'http://get-simple.info/docs/debugging';

if (cookie_check()) {
	echo '<ul id="pill"><li class="rightnav"><a href="logout.php" accesskey="'. find_accesskey(i18n_r('TAB_LOGOUT')).'" >'.i18n_r('TAB_LOGOUT').'<i class="fa fa-fw fa-sign-out icon-right"></i></a></li>';
	echo '<li class="leftnav" ><a href="profile.php"><span class="fa fa-user icon-left"></span>'.i18n_r('WELCOME').' <strong>'.$USR.'</strong> !</a></li></ul>';	
}

//determine page type if plugin is being shown
if (get_filename_id() == 'load') {
	$plugin_class = $plugin_info[$plugin_id]['page_type'];
} else {
	$plugin_class = '';
}

?>
<h1 class="sitename"><a href="<?php echo $SITEURL; ?>" target="_blank" ><?php echo cl($SITENAME); ?> <i class="icon fa fa-external-link"></i></a></h1>
<ul class="nav <?php echo $plugin_class; ?>">
	<li id="nav_pages" ><a class="pages" href="pages.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_PAGES'));?>" ><?php i18n('TAB_PAGES');?></a></li>
	<li id="nav_upload" ><a class="files" href="upload.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_FILES'));?>" ><?php i18n('TAB_FILES');?></a></li>
	<li id="nav_theme" ><a class="theme" href="theme.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_THEME'));?>" ><?php i18n('TAB_THEME');?></a></li>
	<li id="nav_backups" ><a class="backups" href="backups.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_BACKUPS'));?>" ><?php i18n('TAB_BACKUPS');?></a></li>
	<li id="nav_plugins" ><a class="plugins" href="plugins.php" accesskey="<?php echo find_accesskey(i18n_r('PLUGINS_NAV'));?>" ><?php i18n('PLUGINS_NAV');?></a></li>

	<?php exec_action('nav-tab'); // @hook nav-tab backend after navigation tab list html output	?>

	<li id="nav_loaderimg" ><img class="toggle" id="loader" src="template/images/ajax.gif" alt="" /></li>

	<li class="rightnav" ><a class="settings first" href="settings.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_SETTINGS'));?>" ><?php i18n('TAB_SETTINGS');?></a></li>
	<li class="rightnav" ><a class="support last" href="support.php" accesskey="<?php echo find_accesskey(i18n_r('TAB_SUPPORT'));?>" ><?php i18n('TAB_SUPPORT');?></a></li>

	<?php

	// nav status labels
	if(isDebug()) echo '<li class="rightnav"><a class="label label-error label_4_80" href="'.$debugInfoUrl.'" target="_blank" title="'.i18n_r('DEBUG_MODE').'"><span><span class="fa fa-fw fa-wrench"></span></span></a></li>';

	if( allowVerCheck() ) {
		$verstatus = getVerCheck()->status;
		if($verstatus == 0){
			// update available newer than current
			echo '<li class="rightnav"><a class="label label-gold" href="health-check.php" title="'.i18n_r('UPG_NEEDED').'"><span class="fa fa-fw fa-lg fa-cloud-download"></span></a></li>';
		}
	}
	if(isBeta() || isAlpha()) echo '<li class="rightnav"><a class="label label-ghost" href="health-check.php" title="'.i18n_r('WEB_HEALTH_CHECK').'"><span><span class="fa fa-fw fa-flask"></span> '. (isAlpha() ? 'alpha' : 'beta') .'</span></a></li>';

	?>

</ul>

</div>
</div>

<div class="wrapper">

<?php include('template/error_checking.php'); ?>