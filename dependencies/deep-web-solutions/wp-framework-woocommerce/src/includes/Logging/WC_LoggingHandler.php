<?php

namespace DWS_LOWC_Deps\DeepWebSolutions\Framework\WooCommerce\Logging;

use DWS_LOWC_Deps\DeepWebSolutions\Framework\Foundations\Logging\LoggingHandlerInterface;
use DWS_LOWC_Deps\DeepWebSolutions\Framework\Foundations\PluginAwareInterface;
use DWS_LOWC_Deps\DeepWebSolutions\Framework\Foundations\PluginAwareTrait;
use DWS_LOWC_Deps\DeepWebSolutions\Framework\Foundations\Storage\StorableTrait;
\defined( 'ABSPATH' ) || exit;
/**
 * Wrapper around the WC_Logger class in order to use the WC Logger as a PSR-3 logger.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Antonius Hegyes <a.hegyes@deep-web-solutions.com>
 * @package DeepWebSolutions\WP-Framework\WooCommerce\Utilities
 */
class WC_LoggingHandler extends \WC_Logger implements LoggingHandlerInterface, PluginAwareInterface {

	// region TRAITS
	use PluginAwareTrait;
	use StorableTrait;
	// endregion
	// region MAGIC METHODS
	/**
	 * WC_LoggingHandler constructor.
	 *
	 * @param   string          $handler_id     The ID of the logger.
	 * @param   array|null      $handlers       Array of log handlers.
	 * @param   string|null     $threshold      Define an explicit threshold.
	 *
	 * @see     WC_LoggingHandler::__construct()
	 */
	public function __construct( string $handler_id, $handlers = null, ?string $threshold = null ) {
		$this->storable_id = $handler_id;
		parent::__construct( $handlers, $threshold );
	}
	// endregion
	// region INHERITED METHODS
	/**
	 * {@inheritDoc}
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function get_type() : string {
		return 'wc-logging';
	}
	/**
	 * {@inheritDoc}
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function log( $level, $message, $context = array() ) {
		$context['source'] = "{$this->get_plugin()->get_plugin_slug()}/{$this->get_id()}";
		parent::log( $level, $message, $context );
	}
	// endregion
}
