<?php
/**
 * Spoilers
 * Spoilers Hooks
 *
 * @author: Telshin, Cblair91
 * @license: LGPLv3 http://opensource.org/licenses/lgpl-3.0.html
 * @package: Spoilers
 * @link: http://www.mediawiki.org/wiki/Extension:Spoilers
 */
class Spoilers {
	/**
	 * Sets up this extensions parser functions.
	 *
	 * @access		public
	 * @param		Parser	$parser
	 * @internal	param	\Parser $object object passed as a reference.
	 * @return		boolean	true
	 */
	static public function onParserFirstCallInit( Parser &$parser ) {
		$parser->setHook( "spoiler", "Spoilers::parseSpoilerTag" );
		return true;
	}

	/**
	 * Parses the <spoiler> tag.
	 *
	 * @access	public
	 * @param	string	User input between <spoiler>
	 * @param	array	Array of arguments from the opening spoiler tag.
	 * @param	object	Mediawiki Parser Object
	 * @param	object	PPFrame object
	 * @return	string	HTML
	 */
	static public function parseSpoilerTag( $input, array $args, Parser $parser, PPFrame $frame ) {
		$parser->getOutput()->addModules( 'ext.spoilers' );
		$renderedInput = $parser->recursiveTagParse( $input, $frame );
		$showText	=	isset( $args['show'] ) ? " data-showtext='" . htmlentities( $args['show'], ENT_QUOTES ) . "'" : "";
		$hideText	=	isset( $args['hide'] ) ? " data-hidetext='" . htmlentities( $args['hide'], ENT_QUOTES ) . "'" : "";
		$output		=	"
<div class='spoilers'{$showText}{$hideText}
	<span class='spoilers-button'></span>
	<div class='spoilers-body'>{$renderedInput}</div>
</div>";
		return $output;
	}
}
