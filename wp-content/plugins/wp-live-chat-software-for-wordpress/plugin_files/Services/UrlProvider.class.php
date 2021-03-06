<?php
/**
 * Class UrlProvider
 *
 * @package LiveChat\Services
 */

namespace LiveChat\Services;

/**
 * Class UrlProvider
 */
class UrlProvider {
	/**
	 * Instance of ConnectTokenProvider.
	 *
	 * @var ConnectToken|null
	 */
	private $connect_token = null;

	/**
	 * Format for API url.
	 *
	 * @var string
	 */
	private $api_url_format = LC_API_URL_PATTERN;

	/**
	 * Format for frontend url.
	 *
	 * @var string
	 */
	private $app_url_format = LC_APP_URL_PATTERN;

	/**
	 * UrlProvider constructor.
	 *
	 * @param ConnectToken|null $connect_token Instance of ConnectTokenProvider.
	 */
	public function __construct( $connect_token = null ) {
		$this->connect_token = $connect_token;
	}

	/**
	 * Returns frontend url based on ConnectToken (if exists) or returns default url.
	 *
	 * @return string
	 */
	public function get_app_url() {
		return sprintf(
			$this->app_url_format,
			is_null( $this->connect_token ) ? 'us' : $this->connect_token->get_api_region()
		);
	}

	/**
	 * Returns api url based on ConnectToken (if exists) or returns default url.
	 *
	 * @return string
	 */
	public function get_api_url() {
		if ( is_null( $this->connect_token ) ) {
			return sprintf( $this->api_url_format, 'connect' );
		}

		return sprintf(
			$this->api_url_format,
			$this->connect_token->get_api_region() === 'us' ? 'connect' : 'connect-eu'
		);
	}

	/**
	 * Return widget url based on ConnectToken
	 *
	 * @return string
	 */
	public function get_widget_url() {
		$api_url = $this->get_api_url();

		return sprintf(
			$api_url . '/api/v1/script/%s/widget.js',
			$this->connect_token->get_store_uuid()
		);
	}

	/**
	 * Returns new instance of UrlProvider class.
	 *
	 * @param ConnectToken|null $connect_token Instance of ConnectToken.
	 *
	 * @return $this
	 */
	public static function create( $connect_token = null ) {
		return new static( $connect_token );
	}
}
