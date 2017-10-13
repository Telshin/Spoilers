<?php
/**
 * Spoilers
 * Spoilers Hooks
 *
 * @author: Telshin, Developaws
 * @license: LGPL-3.0 http://opensource.org/licenses/lgpl-3.0.html
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
		$parser->getOutput()->addModules( 'ext.spoilers' );
		$showText	=	isset( $params['show'] ) ? " data-showtext='" . htmlentities( $params['show'], ENT_QUOTES ) . "'" : "";
		$hideText	=	isset( $params['hide'] ) ? " data-hidetext='" . htmlentities( $params['hide'], ENT_QUOTES ) . "'" : "";
		$output		=	"<div class='spoilers'{$showText}{$hideText}>
	<span class='spoilers-button'></span>
	<div class='spoilers-body'>{$params['1']}</div>
</div>";
		return [
			'text'		=> $output,
			'noparse'	=> true,
			'isHTML'	=> true
		];
	}

	static function extractOptions( array $options, PPFrame $frame ) {
		$results = [];
		foreach ( $options as $option ) {
			$pair = explode( '=', $frame->expand( $option ), 2 );
			if ( count( $pair ) === 2 ) {
				$name = trim( $pair[0] );
				$value = trim( $pair[1] );
				$results[$name] = $value;
			}
			if ( count( $pair ) === 1 ) {
				$value = trim( $pair[0] );
				$results['1'] = $value;
			}
		}
		return $results;
	}
}
