<?php
/**
 * Spoilers
 * Spoilers Hooks
 *
 * @author: Telshin, Developaws
 * @license: MIT https://opensource.org/licenses/MIT
 * @package: Spoilers
 * @link: http://www.mediawiki.org/wiki/Extension:Spoilers
 */
class Spoilers {
	/**
	 * Sets up this extensions parser functions.
	 *
	 * @access		public
	 * @param		Parser	$parser
	 * @return		boolean	true
	 */
	static public function onParserFirstCallInit( Parser &$parser ) {
		$parser->setFunctionHook( "spoiler", [ __CLASS__, "spoilerMagicWord" ], Parser::SFH_OBJECT_ARGS );
		return true;
	}

	/**
	 * Parses the <spoiler> tag.
	 *
	 * @access	public
	 * @param	Parser	$parser
	 * @param	PPFrame	$frame
	 * @param	array	$args
	 * @return	array	HTML
	 */
	static public function spoilerMagicWord( Parser &$parser, PPFrame $frame, array $args ) {
		$params = self::extractOptions( $args, $frame );
		print_r($params);
		$parser->getOutput()->addModules( 'ext.spoilers' );
		$showText	=	isset( $params['show'] ) ? " data-showtext='" . htmlentities( $params['show'], ENT_QUOTES ) . "'" : "";
		$hideText	=	isset( $params['hide'] ) ? " data-hidetext='" . htmlentities( $params['hide'], ENT_QUOTES ) . "'" : "";
		$output		=	"<div class='spoilers'{$showText}{$hideText}><span class='spoilers-button'></span><div class='spoilers-body' style='display:none;'>{$frame->expand($params['text'])}</div></div>";
		return [
			'text'		=> $output,
			'noparse'	=> true
		];
	}

	static function extractOptions( array $options, PPFrame $frame ) {
		$results = [];
		foreach ( $options as $option ) {
			$pair = explode( '=', $frame->expand( $option ), 2 );
			if ( count( $pair ) === 2 ) {
				$results[trim( $pair[0] )] = trim( $pair[1] );
			} else if ( count ( $pair ) === 1 ) {
				$results['text'] = trim( $pair[0] );
			}
		}
		print_r($results);
		return $results;
	}
}