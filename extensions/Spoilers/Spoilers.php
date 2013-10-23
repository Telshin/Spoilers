<?php
/**
 * Spoilers
 * Spoilers Mediawiki Settings
 *
 * @author: Telshin
 * @license: LGPLv3 http://opensource.org/licenses/lgpl-3.0.html
 * @package: Spoilers
 * @link: http://www.mediawiki.org/wiki/Extension:Spoilers
 *
**/
 
/******************************************/
/* Credits                                */
/******************************************/
$credits = array(
					'path'				=> __FILE__,
					'name'				=> 'Spoilers',
					'author'			=> 'Timothy Aldridge',
					'descriptionmsg'	=> 'spoilers_description',
					'version'			=> '1.0'
				);
$wgExtensionCredits['parserhook'][] = $credits;

/******************************************/
/* Language Strings, Page Aliases, Hooks  */
/******************************************/
$extDir = dirname(__FILE__);

$wgExtensionMessagesFiles['Spoilers']	= "{$extDir}/Spoilers.i18n.php";
$wgAutoloadClasses['Spoilers']			= "{$extDir}/Spoilers.hooks.php";

$wgHooks['ParserFirstCallInit'][]		= "Spoilers::onParserFirstCallInit";

$wgResourceModules['ext.spoilers'] = array(
											'localBasePath'	=> __DIR__,
											'remoteExtPath'	=> 'Spoilers',
											'styles'		=> array('css/spoilers.css'),
											'scripts'		=> array('js/spoilers.js'),
											'dependencies'	=> array('jquery')
											);