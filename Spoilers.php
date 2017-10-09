<?php
/**
 * Spoilers
 * Spoilers Mediawiki Settings
 *
 * @author: Telshin
 * @license: MIT https://opensource.org/licenses/MIT
 * @package: Spoilers
 * @link: http://www.mediawiki.org/wiki/Extension:Spoilers
 */

# Only run if included by MediaWiki
if ( !defined( 'MEDIAWIKI' ) ) die( 'Invalid entry point.' );

/******************************************/
/* Credits                                */
/******************************************/
$wgExtensionCredits['specialpage'][] = array(
	'path'				=>	__FILE__,
	'name'				=>	'Spoilers',
	'author'			=>	array('Tim "Telshin" Aldridge', 'Kris (Developaws)'),
	'descriptionmsg'	=>	'spoilers_description',
	'version'			=>	'1.4.1',
	'license-name'		=>	'MIT'
);

/******************************************/
/* Language Strings, Page Aliases, Hooks  */
/******************************************/
$wgMessagesDirs['Spoilers']				= __DIR__ . '/i18n';
$wgExtensionMessagesFiles['Spoilers']	= __DIR__ . "/Spoilers.i18n.php";

// Classes
$wgAutoloadClasses['Spoilers']			= __DIR__ . "/Spoilers.hooks.php";

// Resources Modules
$wgResourceModules['ext.spoilers'] = array(
	'styles'		=> array( 'css/spoilers.css' ),
	'scripts'		=> array( 'js/spoilers.js' ),
	'localBasePath'	=> __DIR__,
	'remoteExtPath'	=> 'Spoilers',
	'dependencies'	=> array()
);

// Hooks
$wgHooks['ParserFirstCallInit'][]		= "Spoilers::onParserFirstCallInit";
