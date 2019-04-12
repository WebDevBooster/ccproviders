<?php
/**
 * Created by: Alex
 * Advanced Custom Fields (ACF)
 * This code registers all the fields that belong to the 'Coin Providers' field group
 */

if( function_exists('acf_add_local_field_group') ):
	
	acf_add_local_field_group(array(
		'key' => 'group_5cab112d4ba34',
		'title' => 'Compare Coin Providers',
		'fields' => array(
			array(
				'key' => 'field_5cab1770c1a88',
				'label' => 'Basic Info',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5cab129cf263b',
				'label' => 'Provider Number',
				'name' => 'provider_num',
				'type' => 'number',
				'instructions' => 'Enter the order number of this provider (to be displayed in a circle next to title)',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 99,
				'step' => '',
			),
			array(
				'key' => 'field_5cab1533625a1',
				'label' => 'Provider Title',
				'name' => 'provider_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'ProviderName',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cab1651b6f65',
				'label' => 'Star Rating',
				'name' => 'star_rating',
				'type' => 'select',
				'instructions' => 'Select a rating (1 to 5 stars)',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'Select Rating' => 'Select Rating',
					1 => '1',
					2 => '2',
					3 => '3',
					4 => '4',
					5 => '5',
				),
				'default_value' => array(
					0 => 'Select Rating',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5cab17b0c1a89',
				'label' => 'Logo & Links',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5cabeed2bb65b',
				'label' => 'Provider Logo',
				'name' => 'provider_logo',
				'type' => 'image',
				'instructions' => 'Select an image to be displayed as the logo of this provider. The ideal image would be 500x280 px or the same 1.786:1 width to height ratio.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_5cabfa25f64d9',
				'label' => '\'Full Review\' Button Link',
				'name' => 'full_review_link',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'https://www.example.com/review1',
			),
			array(
				'key' => 'field_5cabfafaf64da',
				'label' => '\'Buy Coin\' Button Link',
				'name' => 'buy_coin_link',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'https://www.example.com/buy-coin1',
			),
			array(
				'key' => 'field_5cabffbafc54b',
				'label' => 'Likes & Deposit Methods',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5cabfd3f63150',
				'label' => 'What We Like',
				'name' => 'what_we_like',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'Social Trading' => 'Social Trading',
					'Accepts PayPal' => 'Accepts PayPal',
					'Free demo account' => 'Free demo account',
					'Free cookies' => 'Free cookies',
					'Popcorn' => 'Popcorn',
					'Movie nights' => 'Movie nights',
					'Puppies & kittens' => 'Puppies & kittens',
					'Almond milk' => 'Almond milk',
					'Orange juice' => 'Orange juice',
					'Free pizza' => 'Free pizza',
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 1,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5cac0764dc819',
				'label' => 'Deposit Methods',
				'name' => 'deposit_methods',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'Crypto' => 'Crypto',
					'Bank' => 'Bank',
					'Wire transfer' => 'Wire transfer',
					'PayPal' => 'PayPal',
					'Gold bars' => 'Gold bars',
					'Uranium rods' => 'Uranium rods',
					'Plutonium rings' => 'Plutonium rings',
					'Sacks of rice' => 'Sacks of rice',
					'Cows' => 'Cows',
					'Horses' => 'Horses',
					'Sheep' => 'Sheep',
					'Atlas stones' => 'Atlas stones',
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 1,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5cac0b2da4a65',
				'label' => 'Coins',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5cac0b99a4a66',
				'label' => 'Available Coins',
				'name' => 'available_coins',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'coin-01.svg' => 'Coin 01',
					'coin-02.svg' => 'Coin 02',
					'coin-03.svg' => 'Coin 03',
					'coin-04.svg' => 'Coin 04',
					'coin-05.svg' => 'Coin 05',
					'coin-06.svg' => 'Coin 06',
					'coin-07.svg' => 'Coin 07',
					'coin-08.svg' => 'Coin 08',
					'coin-09.svg' => 'Coin 09',
					'coin-10.svg' => 'Coin 10',
					'coin-11.svg' => 'Coin 11',
					'coin-12.svg' => 'Coin 12',
					'coin-13.svg' => 'Coin 13',
					'coin-14.svg' => 'Coin 14',
					'coin-ada.svg' => 'ADA',
					'coin-bch.svg' => 'BCH',
					'coin-bnb.svg' => 'BNB',
					'coin-btg.svg' => 'BTG',
					'coin-dash.svg' => 'DASH',
					'coin-eos.svg' => 'EOS',
					'coin-etc.svg' => 'ETC',
					'coin-eth.svg' => 'ETH',
					'coin-ltc.svg' => 'LTC',
					'coin-miota.svg' => 'MIOTA',
					'coin-neo.svg' => 'NEO',
					'coin-ont.svg' => 'ONT',
					'coin-trx.svg' => 'TRX',
					'coin-usdt.svg' => 'USDT',
					'coin-vet.svg' => 'VET',
					'coin-xem.svg' => 'XEM',
					'coin-xlm.svg' => 'XLM',
					'coin-xmr.svg' => 'XMR',
					'coin-xrp.svg' => 'XRP',
					'coin-xtz.svg' => 'XTZ',
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 1,
				'ui' => 0,
				'return_format' => 'array',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5cac16285f212',
				'label' => 'Acc Info',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5cac17158ace2',
				'label' => 'Deposit in',
				'name' => 'deposit_in',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'Crypto' => 'Crypto',
					'Bank' => 'Bank',
					'Wire transfer' => 'Wire transfer',
					'PayPal' => 'PayPal',
					'Gold bars' => 'Gold bars',
					'Uranium rods' => 'Uranium rods',
					'Plutonium rings' => 'Plutonium rings',
					'Sacks of rice' => 'Sacks of rice',
					'Cows' => 'Cows',
					'Horses' => 'Horses',
					'Sheep' => 'Sheep',
					'Atlas stones' => 'Atlas stones',
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5cac1775ce47b',
				'label' => 'Includes wallet',
				'name' => 'includes_wallet',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'yes' => 'Includes wallet',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5cac1866ce750',
				'label' => 'Min deposit',
				'name' => 'min_deposit',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 100,
				'prepend' => '$',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cac18f9aacfe',
				'label' => 'Min trade',
				'name' => 'min_trade',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 10,
				'prepend' => '$',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cac1911aacff',
				'label' => 'Leverage',
				'name' => 'leverage',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '2:1',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cac1937aad00',
				'label' => 'Deposit fees',
				'name' => 'deposit_fees',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '0.50',
				'prepend' => '',
				'append' => '%',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cac19cfdc8e7',
				'label' => 'Trade fees',
				'name' => 'trade_fees',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '0.20',
				'prepend' => '',
				'append' => '%',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cac19e8dc8e8',
				'label' => 'Withdrawl fees',
				'name' => 'withdrawl_fees',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cac1a20dc8e9',
				'label' => 'Margin trading',
				'name' => 'margin_trading',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'yes' => 'Margin trading',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5cac163b5f213',
				'label' => 'Research',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5cac1cbca2505',
				'label' => 'Education',
				'name' => 'education',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'yes' => 'Education',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5cac1e33ec037',
				'label' => 'Analyst recommendations',
				'name' => 'analyst_recommendations',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'yes' => 'Analyst recommendations',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5cac1e59ec038',
				'label' => 'Advanced charts',
				'name' => 'advanced_charts',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'yes' => 'Advanced charts',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5cac164c5f214',
				'label' => 'Security',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5cac1e955dbb8',
				'label' => 'Security Record',
				'name' => 'security_record',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'yes' => '100% Security Record',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5cac1edf8da7c',
				'label' => 'Does it offer 2fa',
				'name' => 'does_it_offer_2fa',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'yes' => 'Does it offer 2fa',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
			array(
				'key' => 'field_5cac1543c528a',
				'label' => 'Disclaimer',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5cac155cc528b',
				'label' => 'Disclaimer',
				'name' => 'disclaimer',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Disclaimer: Highly volatile investment product. Your capital is at risk. 65% of retail investor accounts lose money when trading CFDs with this provider. You should consider whether you can afford to take the high risk of losing your money.',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'new_lines' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-compare-coins.php',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'ccproviders',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'the_content',
			1 => 'excerpt',
			2 => 'discussion',
			3 => 'comments',
			4 => 'author',
			5 => 'featured_image',
		),
		'active' => true,
		'description' => '',
	));

endif;