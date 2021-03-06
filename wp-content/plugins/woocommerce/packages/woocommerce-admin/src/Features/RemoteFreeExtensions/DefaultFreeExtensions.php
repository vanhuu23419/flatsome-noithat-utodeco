<?php
/**
 * Gets a list of fallback methods if remote fetching is disabled.
 */

namespace Automattic\WooCommerce\Admin\Features\RemoteFreeExtensions;

defined( 'ABSPATH' ) || exit;

use Automattic\WooCommerce\Admin\Features\OnboardingTasks;

/**
 * Default Free Extensions
 */
class DefaultFreeExtensions {

	/**
	 * Get default specs.
	 *
	 * @return array Default specs.
	 */
	public static function get_all() {
		$bundles = [
			[
				'key'     => 'basics',
				'title'   => __( 'Get the basics', 'woocommerce' ),
				'plugins' => [
					[
						'key'         => 'woocommerce-payments',
						'description' => sprintf(
							/* translators: 1: opening product link tag. 2: closing link tag */
							__( 'Accept credit cards with %1$sWooCommerce Payments%2$s', 'woocommerce' ),
							'<a href="https://woocommerce.com/products/woocommerce-payments" target="_blank">',
							'</a>'
						),
						'is_visible'  => [
							[
								'type'     => 'or',
								'operands' => [
									[
										'type'      => 'base_location_country',
										'value'     => 'US',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'PR',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'AU',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'CA',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'DE',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'ES',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'FR',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'GB',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'IE',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'IT',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'NZ',
										'operation' => '=',
									],
								],
							],
							[
								'type'         => 'option',
								'transformers' => [
									[
										'use'       => 'dot_notation',
										'arguments' => [
											'path' => 'industry',
										],
									],
									[
										'use'       => 'array_column',
										'arguments' => [
											'key' => 'slug',
										],
									],
									[
										'use'       => 'array_search',
										'arguments' => [
											'value' => 'cbd-other-hemp-derived-products',
										],
									],
								],
								'option_name'  => 'woocommerce_onboarding_profile',
								'value'        => 'cbd-other-hemp-derived-products',
								'default'      => '',
								'operation'    => '!=',
							],
						],
					],
					[
						'key'         => 'woocommerce-services:shipping',
						'description' => sprintf(
							/* translators: 1: opening product link tag. 2: closing link tag */
							__( 'Print shipping labels with %1$sWooCommerce Shipping%2$s', 'woocommerce' ),
							'<a href="https://woocommerce.com/products/shipping" target="_blank">',
							'</a>'
						),
						'is_visible'  => [
							[
								'type'      => 'base_location_country',
								'value'     => 'US',
								'operation' => '=',
							],
							[
								'type'    => 'not',
								'operand' => [
									[
										'type'    => 'plugins_activated',
										'plugins' => [ 'woocommerce-services' ],
									],
								],
							],
							[
								'type'     => 'or',
								'operands' => [
									[
										[
											'type'         => 'option',
											'transformers' => [
												[
													'use' => 'dot_notation',
													'arguments' => [
														'path' => 'product_types',
													],
												],
												[
													'use' => 'count',
												],
											],
											'option_name'  => 'woocommerce_onboarding_profile',
											'value'        => 1,
											'default'      => '',
											'operation'    => '!=',
										],
									],
									[
										[
											'type'         => 'option',
											'transformers' => [
												[
													'use' => 'dot_notation',
													'arguments' => [
														'path' => 'product_types.0',
													],
												],
											],
											'option_name'  => 'woocommerce_onboarding_profile',
											'value'        => 'downloads',
											'default'      => '',
											'operation'    => '!=',
										],
									],
								],
							],
						],
					],
					[
						'key'         => 'woocommerce-services:tax',
						'description' => sprintf(
							/* translators: 1: opening product link tag. 2: closing link tag */
							__( 'Get automated sales tax with %1$sWooCommerce Tax%2$s', 'woocommerce' ),
							'<a href="https://woocommerce.com/products/tax" target="_blank">',
							'</a>'
						),
						'is_visible'  => [
							[
								'type'     => 'or',
								'operands' => [
									[
										'type'      => 'base_location_country',
										'value'     => 'US',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'FR',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'GB',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'DE',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'CA',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'AU',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'GR',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'BE',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'PT',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'DK',
										'operation' => '=',
									],
									[
										'type'      => 'base_location_country',
										'value'     => 'SE',
										'operation' => '=',
									],
								],
							],
							[
								'type'    => 'not',
								'operand' => [
									[
										'type'    => 'plugins_activated',
										'plugins' => [ 'woocommerce-services' ],
									],
								],
							],
						],
					],
					[
						'key'         => 'jetpack',
						'description' => sprintf(
							/* translators: 1: opening product link tag. 2: closing link tag */
							__( 'Enhance speed and security with %1$sJetpack%2$s', 'woocommerce' ),
							'<a href="https://woocommerce.com/products/jetpack" target="_blank">',
							'</a>'
						),
						'is_visible'  => [
							[
								'type'    => 'not',
								'operand' => [
									[
										'type'    => 'plugins_activated',
										'plugins' => [ 'jetpack' ],
									],
								],
							],
						],
					],
					[
						'key'         => 'mailpoet',
						'name'        => __( 'MailPoet', 'woocommerce' ),
						'description' => __( 'Level up your email marketing with {{link}}MailPoet{{/link}}', 'woocommerce' ),
						'description' => sprintf(
							/* translators: 1: opening product link tag. 2: closing link tag */
							__( 'Level up your email marketing with %1$sMailPoet%2$s', 'woocommerce' ),
							'<a href="https://woocommerce.com/products/mailpoet" target="_blank">',
							'</a>'
						),
						'manage_url'  => 'admin.php?page=mailpoet-newsletters',
						'is_visible'  => [
							[
								'type'    => 'not',
								'operand' => [
									[
										'type'    => 'plugins_activated',
										'plugins' => [ 'mailpoet' ],
									],
								],
							],
						],
					],
				],
			],
			[
				'key'     => 'reach',
				'title'   => __( 'Reach out to customers', 'woocommerce' ),
				'plugins' => [
					[
						'key'         => 'mailpoet',
						'name'        => __( 'MailPoet', 'woocommerce' ),
						'description' => __( 'Create and send purchase follow-up emails, newsletters, and promotional campaigns straight from your dashboard.', 'woocommerce' ),
						'image_url'   => plugins_url( 'images/onboarding/mailpoet.png', WC_ADMIN_PLUGIN_FILE ),
						'manage_url'  => 'admin.php?page=mailpoet-newsletters',
					],
					[
						'key'         => 'mailchimp-for-woocommerce',
						'name'        => __( 'Mailchimp', 'woocommerce' ),
						'description' => __( 'Send targeted campaigns, recover abandoned carts and much more with Mailchimp.', 'woocommerce' ),
						'image_url'   => plugins_url( 'images/onboarding/mailchimp-for-woocommerce.png', WC_ADMIN_PLUGIN_FILE ),
						'manage_url'  => 'admin.php?page=mailchimp-woocommerce',
					],
					[
						'key'         => 'creative-mail-by-constant-contact',
						'name'        => __( 'Creative Mail for WooCommerce', 'woocommerce' ),
						'description' => __( 'Create on-brand store campaigns, fast email promotions and customer retargeting with Creative Mail.', 'woocommerce' ),
						'image_url'   => plugins_url( 'images/onboarding/creative-mail-by-constant-contact.png', WC_ADMIN_PLUGIN_FILE ),
						'manage_url'  => 'admin.php?page=creativemail',
					],
				],
			],
			[
				'key'     => 'grow',
				'title'   => __( 'Grow your store', 'woocommerce' ),
				'plugins' => [
					[
						'key'         => 'google-listings-and-ads',
						'name'        => __( 'Google Ads & Marketing by Kliken', 'woocommerce' ),
						'description' => __( 'Get in front of shoppers and drive traffic so you can grow your business with Smart Shopping Campaigns and free listings.', 'woocommerce' ),
						'image_url'   => plugins_url( 'images/onboarding/google-listings-and-ads.png', WC_ADMIN_PLUGIN_FILE ),
						'manage_url'  => 'admin.php?page=wc-admin&path=%2Fgoogle%2Fstart',
					],
				],
			],
		];

		$bundles = wp_json_encode( $bundles );
		return json_decode( $bundles );
	}
}
