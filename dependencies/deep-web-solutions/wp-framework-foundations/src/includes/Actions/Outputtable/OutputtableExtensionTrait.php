<?php

namespace DWS_LOWC_Deps\DeepWebSolutions\Framework\Foundations\Actions\Outputtable;

\defined( 'ABSPATH' ) || exit;
/**
 * Abstract trait that other traits should use to denote that they want their own output logic called.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Antonius Hegyes <a.hegyes@deep-web-solutions.com>
 * @package DeepWebSolutions\WP-Framework\Foundations\Actions\Outputtable
 */
trait OutputtableExtensionTrait {

	// region TRAITS
	use OutputtableTrait;
	// endregion
}
