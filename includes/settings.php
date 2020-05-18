<?php
if(!class_exists('LandingPages_Settings'))
{
    class LandingPages_Settings
    {
        const SLUG = "custom-plugin-options";

        /**
         * Construct the plugin object
         */
        public function __construct($plugin)
        {
            // register actions
            acf_add_options_page(array(
                'page_title' => __('Landing Pages', 'webfor'),
                'menu_title' => __('Landing Pages', 'webfor'),
                'menu_slug' => self::SLUG,
                'capability' => 'manage_options',
                'icon_url' => 'dashicons-welcome-widgets-menus',
                'position' => '20.2', // Using decimal to help avoid conflicting positions
                'redirect' => false
            ));

            add_action('init', array(&$this, "init"));
            add_action('admin_menu', array(&$this, 'admin_menu'), 20);
            add_filter("plugin_action_links_$plugin", array(&$this, 'plugin_settings_link'));
        } // END public function __construct
        
        /**
         * Add options page
         */
        public function admin_menu()
        {
            // Duplicate link into properties mgmt
            add_submenu_page(
                self::SLUG,
                __('Settings', 'webfor'),
                __('Settings', 'webfor'),
                'manage_options',
                self::SLUG,
                1
            );
        }

        /**
         * Add settings fields via ACF
         */
        function init()
        {
            if(function_exists('register_field_group'))
            {
                register_field_group(array(
                    'key' => 'group_5e3b9693ca7df',
                    'title' => 'Landing Pages Plugin Settings',
                    'fields' => array(
                        array(
                            'key' => 'field_5e46dd9afafb2',
                            'label' => 'Site Logo',
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
                            'placement' => 'left',
                            'endpoint' => 0,
                        ),
                        array(
                            'key' => 'field_5e46ddabfafb3',
                            'label' => 'Logo Image',
                            'name' => 'wflp_logo_image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'medium',
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
                            'key' => 'field_5e3b96a3427d7',
                            'label' => 'Theme Colors',
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
                            'placement' => 'left',
                            'endpoint' => 0,
                        ),
                        array(
                            'key' => 'field_5e3b96bd427d8',
                            'label' => 'Brand Colors',
                            'name' => 'wflp_brand_colors',
                            'type' => 'group',
                            'instructions' => 'Set the clients brand colors that will be used throughout the Landing Page templates.',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'layout' => 'table',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5e3b96f1427d9',
                                    'label' => 'Primary Color',
                                    'name' => 'wflp_primary_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                ),
                                array(
                                    'key' => 'field_5e3b9700427da',
                                    'label' => 'Secondary Color',
                                    'name' => 'wflp_secondary_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                ),
                                array(
                                    'key' => 'field_5e3b971c427db',
                                    'label' => 'Highlight Color',
                                    'name' => 'wflp_highlight_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                ),
                            ),
                        ),
                        array(
                            'key' => 'field_5e3b97d9e8872',
                            'label' => 'Social Channels',
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
                            'key' => 'field_5e3b982a21a36',
                            'label' => 'Social Links',
                            'name' => 'wflp_social_links',
                            'type' => 'repeater',
                            'instructions' => 'Set the clients Social Network links here to display in the Landing Page template.',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'collapsed' => '',
                            'min' => 0,
                            'max' => 0,
                            'layout' => 'table',
                            'button_label' => 'Add Link',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5e3b982a21a37',
                                    'label' => 'Social Channel',
                                    'name' => 'wflp_social_channel',
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
                                        'facebook' => 'Facebook',
                                        'instagram' => 'Instagram',
                                        'youtube-play' => 'YouTube',
                                        'twitter' => 'Twitter',
                                        'linkedin-square' => 'LinkedIn',
                                        'pinterest' => 'Pinterest',
                                        'yelp' => 'Yelp',
                                        'snapchat-ghost' => 'Snapchat',
                                        'tumblr' => 'Tumblr',
                                        'vimeo-v' => 'Vimeo',
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
                                    'key' => 'field_5e3b982a21a38',
                                    'label' => 'Link',
                                    'name' => 'wflp_social_url',
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
                                    'placeholder' => '',
                                ),
                            ),
                        ),
                        array(
                            'key' => 'field_5e46eaf46a804',
                            'label' => 'Header + Footer Scripts',
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
                            'placement' => 'left',
                            'endpoint' => 0,
                        ),
                        array(
                            'key' => 'field_5e46ecfb6a806',
                            'label' => 'Header Scripts',
                            'name' => 'wflp_header_scripts',
                            'type' => 'textarea',
                            'instructions' => 'Scripts will be printed in the head section.',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => '',
                        ),
                        array(
                            'key' => 'field_5e46ed096a807',
                            'label' => 'Footer Scripts',
                            'name' => 'wflp_footer_scripts',
                            'type' => 'textarea',
                            'instructions' => 'Scripts will be printed above the closing body tag.',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => '',
                        ),
                        array(
                            'key' => 'field_5e46ecf16a805',
                            'label' => 'Custom Styles',
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
                            'placement' => 'left',
                            'endpoint' => 0,
                        ),
                        array(
                            'key' => 'field_5e46ed226a808',
                            'label' => 'Custom CSS',
                            'name' => 'wflp_custom_styles',
                            'type' => 'textarea',
                            'instructions' => 'Styles here that will be printed in the style element in the head section.',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'options_page',
                                'operator' => '==',
                                'value' => 'custom-plugin-options',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => true,
                    'description' => '',
                ));
            }
        }

        /**
         * Add the settings link to the plugins page
         */
        public function plugin_settings_link($links)
        { 
            $settings_link = sprintf('<a href="admin.php?page=%s">Settings</a>', self::SLUG); 
            array_unshift($links, $settings_link); 
            return $links; 
        } // END public function plugin_settings_link($links)
    } // END class LandingPages_Settings
} // END if(!class_exists('LandingPages_Settings'))