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
namespace Spoilers;

use Parser;
use PPFrame;

class SpoilersHooks {
	/**
	 * Sets up this extensions parser functions.
	 *
	 * @access		public
	 * @param Parser	&$parser
	 * @return boolean	true
	 */
	public static function onParserFirstCallInit( Parser &$parser ) {
		$parser->setHook( "spoiler", [ __CLASS__, "spoilerMagicTag" ] );
		$parser->setFunctionHook( "spoiler", [ __CLASS__, "spoilerMagicWord" ], Parser::SFH_OBJECT_ARGS );

		return true;
	}

	/**
	 * Parses the {{#Spoiler}} tag.
	 *
	 * @access	public
	 * @param	Parser	&$parser
	 * @param	PPFrame	$frame
	 * @param	array	$args
	 * @return	array	HTML
	 */
	public static function spoilerMagicWord( Parser &$parser, PPFrame $frame, array $args ) {
		$params = self::extractOptions( $args, $frame );
		$parser->getOutput()->addModules( 'ext.spoilers' );
		$output = self::generateOutput( $frame->expand( $params['text'] ), $params );

		return [
			'text'		=> $output,
			'noparse'	=> true
		];
	}

	/**
	 * Parses the <spoiler> tag.
	 *
	 * @access	public
	 * @param	string	$input User input between <spoiler>
	 * @param	array	$args Array of arguments from the opening spoiler tag.
	 * @param	object	$parser Mediawiki Parser Object
	 * @param	object	$frame PPFrame object
	 * @return	string	HTML
	 */
	public static function spoilerMagicTag( $input, array $args, Parser $parser, PPFrame $frame ) {
		$parser->getOutput()->addModules( 'ext.spoilers' );
		$renderedInput = $parser->recursiveTagParse( $input, $frame );
		$output = self::generateOutput( $renderedInput, $args );

		return $output;
	}

	/**
	 * Generate the html output for spoilers
	 *
	 * @param string $text
	 * @param array $params
	 * @return string
	 */
	private static function generateOutput( $text, $params ) {
		$showText =	isset( $params['show'] ) ? " data-showtext='" . htmlentities( $params['show'], ENT_QUOTES ) . "'" : "";
		$hideText =	isset( $params['hide'] ) ? " data-hidetext='" . htmlentities( $params['hide'], ENT_QUOTES ) . "'" : "";

		return "<div class='spoilers'{$showText}{$hideText}>" .
			   "<span class='spoilers-button'></span>" .
			   "<div class='spoilers-body' style='display:none;'>{$text}</div>".
			   "</div>";
	}
	/**
	 * Extracts a set of parameters
	 *
	 * @param	array	$options
	 * @param	PPFrame	$frame
	 * @return	array	Parameters
	 */
	private static function extractOptions( array $options, PPFrame $frame ) {
		$results = [];
		foreach ( $options as $option ) {
			$pair = explode( '=', $frame->expand( $option ), 2 );
			if ( count( $pair ) === 2 ) {
				$results[trim( $pair[0] )] = trim( $pair[1] );
			} elseif ( count( $pair ) === 1 ) {
				$results['text'] = trim( $pair[0] );
			}
		}

		return $results;
	}
}
