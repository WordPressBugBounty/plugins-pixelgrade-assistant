<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function pixassist_get_default_config( $original_theme_slug ) {
	// General strings ready to be translated
	$config['l10n'] = array(
		'returnToDashboard'                             => esc_html__( 'Continue to your WordPress dashboard', 'pixelgrade-assistant' ),
		'nextButton'                                    => esc_html__( 'Continue', 'pixelgrade-assistant' ),
		'skipButton'                                    => esc_html__( 'Skip this step', 'pixelgrade-assistant' ),
		'notRightNow'                                   => esc_html__( 'Not right now', 'pixelgrade-assistant' ),
		'validationErrorTitle'                          => esc_html__( 'Something went wrong', 'pixelgrade-assistant' ),
		'themeValidationNoticeFail'                     => esc_html__( 'Not activated.', 'pixelgrade-assistant' ),
		'themeValidationNoticeOk'                       => esc_html__( 'Connected & up-to-date!', 'pixelgrade-assistant' ),
		'themeValidationNoticeOutdatedWithUpdate'       => esc_html__( 'Your theme is outdated, but an update is available!', 'pixelgrade-assistant' ),
		'themeValidationNoticeNotConnected'             => esc_html__( 'Not connected', 'pixelgrade-assistant' ),
		'themeUpdateAvailableTitle'                     => esc_html__( 'New theme update is available!', 'pixelgrade-assistant' ),
		'themeUpdateAvailableContent'                   => esc_html__( 'Great news! There is a new version of {{theme_name}} available.', 'pixelgrade-assistant' ),
		'hashidNotFoundNotice'                          => esc_html__( 'Sorry but we could not recognize your theme. This might have happened because you have made changes to the functions.php file. If that is the case - please try to revert to the original contents of that file and retry to validate your theme license.', 'pixelgrade-assistant' ),
		'themeUpdateButton'                             => esc_html__( 'Update now', 'pixelgrade-assistant' ),
		'themeChangelogLink'                            => esc_html__( 'View changelog', 'pixelgrade-assistant' ),
		'Error500Text'                                  => esc_html__( 'Oh, snap! Something went wrong and we are unable to make sense of the actual problem.', 'pixelgrade-assistant' ),
		'Error500Link'                                  => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/guides-and-resources/server-errors-handling',
		'Error400Text'                                  => esc_html__( 'There is something wrong with the current setup of this WordPress installation.', 'pixelgrade-assistant' ),
		'Error400Link'                                  => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/guides-and-resources/server-errors-handling',
		'themeDirectoryChangedTitle'                    => esc_html__( 'Your theme DIRECTORY is changed!', 'pixelgrade-assistant' ),
		'themeDirectoryChanged'                         => wp_kses_post( __( 'This will give you <strong>all kinds of trouble</strong> when installing updates for the theme. To be able to <strong>successfully install updates</strong> please <strong>change the theme\'s directory</strong> from "{{template}}" to "{{original_slug}}".', 'pixelgrade-assistant' ) ),
		'themeNameChangedTitle'                         => esc_html__( 'Your theme NAME is changed!', 'pixelgrade-assistant' ),
		'themeNameChanged'                              => wp_kses_post( __( 'The theme name specified in the "style.css" file in the theme\'s directory is <strong>"{{stylecss_theme_name}}".</strong> The next time you <strong>update your theme</strong> this name will be <strong>changed back to "{{theme_name}}".</strong>', 'pixelgrade-assistant' ) ),
		'childThemeNameChanged'                         => wp_kses_post( __( 'On your next theme update, your parent theme name will be <strong>changed back to its original one: "{{stylecss_theme_name}}".</strong> To avoid issues with your child theme, you will need to <strong>update the style.css file of both your parent and child theme</strong> with <strong>the original theme name: "{{theme_name}}".</strong>', 'pixelgrade-assistant' ) ),
		'setupWizardTitle'                              => esc_html__( 'Site setup wizard', 'pixelgrade-assistant' ),
		'internalErrorTitle'                            => esc_html__( 'An internal server error has occurred', 'pixelgrade-assistant' ),
		'internalErrorContent'                          => esc_html__( 'Something went wrong while trying to process your request. Please try again.', 'pixelgrade-assistant' ),
		'componentUnavailableTitle'                     => esc_html__( 'Unavailable', 'pixelgrade-assistant' ),
		'componentUnavailableContent'                   => esc_html__( 'This feature is available only if your site is connected to {{shopdomain}}.', 'pixelgrade-assistant' ),
		'pluginInstallLabel'                            => esc_html__( 'Install', 'pixelgrade-assistant' ),
		'pluginActivateLabel'                           => esc_html__( 'Activate', 'pixelgrade-assistant' ),
		'pluginUpdateLabel'                             => esc_html__( 'Update', 'pixelgrade-assistant' ),
		'pluginsPlural'                                 => esc_html__( 'selected plugins', 'pixelgrade-assistant' ),
		'starterContentImportLabel'                     => esc_html__( 'Import starter content', 'pixelgrade-assistant' ),
		'starterContentImportSelectedLabel'             => esc_html__( 'Import selected', 'pixelgrade-assistant' ),
		'setupWizardWelcomeTitle'                       => esc_html__( 'Welcome to the site setup wizard', 'pixelgrade-assistant' ),
		'setupWizardWelcomeContent'                     => esc_html__( 'This quick, optional setup helps you install recommended free plugins and load helpful demo content. It\'s safe and fast — and you can skip it anytime.', 'pixelgrade-assistant' ),
		'setupWizardStartButtonLabel'                   => esc_html__( 'Let\'s get started!', 'pixelgrade-assistant' ),
	);

	$config['setupWizard'] = array(

		'plugins' => array(
			'stepName' => esc_html__( 'Plugins', 'pixelgrade-assistant' ),
			'blocks'   => array(
				'plugins' => array(
					'class'  => 'full white',
					'fields' => array(
						'title'             => array(
							'type'             => 'h2',
							'value'            => esc_html__( 'Set up the right plugins', 'pixelgrade-assistant' ),
							'value_installing' => esc_html__( 'Setting up plugins..', 'pixelgrade-assistant' ),
							'value_installed'  => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'All done with plugins!', 'pixelgrade-assistant' ) . ' 🤩',
							'class'            => 'section__title',
						),
						'head_content'      => array(
							'type'             => 'text',
							'value'            => esc_html__( 'Install and activate the plugins that provide recommended functionality for your site. You can add or remove plugins later on from within the WordPress dashboard.', 'pixelgrade-assistant' ),
							'value_installing' => wp_kses_post( __( 'Why not take a peek at our <a href="https://twitter.com/pixelgrade" target="_blank">Twitter page</a> while you wait? (opens in a new tab and the plugins aren\'t going anywhere)', 'pixelgrade-assistant' ) ),
							'value_installed'  => esc_html__( 'You made it! 🙌 You\'ve installed and activated the plugins. You are good to jump to the next step.', 'pixelgrade-assistant' ),
						),
						'plugins_component' => array(
							'title' => esc_html__( 'Install Plugins', 'pixelgrade-assistant' ),
							'type'  => 'component',
							'value' => 'plugin-manager',
						),
					),
				),
			),
		),

		'support' => array(
			'stepName' => esc_html__( 'Starter content', 'pixelgrade-assistant' ),
			'nextText' => esc_html__( 'Next Step', 'pixelgrade-assistant' ),
			'blocks'   => array(
				'support' => array(
					'class'  => 'full white',
					'fields' => array(
						'title'          => array(
							'type'             => 'h2',
							'value'            => esc_html__( 'Import starter content', 'pixelgrade-assistant' ),
							'value_installing' => esc_html__( 'Importing starter content..', 'pixelgrade-assistant' ),
							'value_installed'  => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'Starter content imported!', 'pixelgrade-assistant' ),
							'value_errored'    => '<span class="c-icon  c-icon--large  c-icon--warning"></span> ' . esc_html__( 'Starter content could not be imported!', 'pixelgrade-assistant' ),
							'class'            => 'section__title',
						),
						'head_content'   => array(
							'type'             => 'text',
							'value'            => esc_html__( 'Use the demo content to make your site look as eye-candy as the theme\'s demo. The importer helps you have a strong starting point for your content and speed up the entire process.', 'pixelgrade-assistant' ),
							'value_installing' => wp_kses_post( __( 'Why not join our <a href="https://www.facebook.com/groups/PixelGradeUsersGroup/" target="_blank">Facebook Group</a> while you wait? (opens in a new tab)', 'pixelgrade-assistant' ) ),
							'value_installed'  => esc_html__( 'Mission accomplished! 👍 You\'ve successfully imported the starter content, so you\'re good to move forward. Have fun!', 'pixelgrade-assistant' ),
							'value_errored'    => esc_html__( 'Sadly, errors have happened and the started content could not be imported at this time. Please try again in a little while or reach out to our support crew.', 'pixelgrade-assistant' ),
						),
						'starterContent' => array(
							'type'  => 'component',
							'value' => 'starter-content',
						),
						'content'        => '',
						'links'          => '',
						'footer_content' => '',
					),
				),
			),
		),

		'ready' => array(
			'stepName' => esc_html__( 'Ready', 'pixelgrade-assistant' ),
			'blocks'   => array(
				'ready' => array(
					'class'  => 'full white',
					'fields' => array(
						'title'   => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Your site is ready to make an impact!', 'pixelgrade-assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => wp_kses_post( __( '<strong>Big congrats, mate!</strong> 👏 Everything\'s right on track which means that you can start making tweaks of all kinds. Login to your WordPress dashboard to make changes, and feel free to change the default content to match your needs.', 'pixelgrade-assistant' ) ),
						),
					),
				),

				'redirect_area' => array(
					'class'  => 'half',
					'fields' => array(
						'title' => array(
							'type'  => 'h4',
							'value' => esc_html__( 'Next steps', 'pixelgrade-assistant' ),
						),
						'cta'   => array(
							'type'  => 'button',
							'class' => 'btn btn--large',
							'label' => esc_html__( 'View and Customize', 'pixelgrade-assistant' ),
							'url'   => '{{customizer_url}}?return=' . urlencode( pixassist_get_hub_url() ),
						),
					),
				),

				'help_links' => array(
					'class'  => 'half',
					'fields' => array(
						'title' => array(
							'type'  => 'h4',
							'value' => esc_html__( 'Learn more', 'pixelgrade-assistant' ),
						),
						'links' => array(
							'type'  => 'links',
							'value' => array(
								array(
									'label' => esc_html__( 'Browse the Theme Documentation', 'pixelgrade-assistant' ),
									'url'   => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/',
								),
								array(
									'label' => esc_html__( 'Learn How to Use WordPress', 'pixelgrade-assistant' ),
									'url'   => 'https://easywpguide.com',
								),
								array(
									'label' => esc_html__( 'Get Help and Support', 'pixelgrade-assistant' ),
									'url'   => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'get-support/',
								),
								array(
									'label' => esc_html__( 'Join our Facebook group', 'pixelgrade-assistant' ),
									'url'   => 'https://www.facebook.com/groups/PixelGradeUsersGroup/',
								),
							),
						),
					),
				),
			),
		),
	);

	$config['dashboard'] = array(
		'general' => array(
			'name'   => esc_html__( 'General', 'pixelgrade-assistant' ),
			'blocks' => array(
				'plugins'        => array(
					'fields'       => array(
						'recommended_plugins' => array(
							'type'  => 'component',
							'value' => 'recommended-plugins',
						),
					),
				),
				'starterContent' => array(
					'fields'       => array(
						'title'          => array(
							'type'             => 'h2',
							'value'            => esc_html__( 'Starter content', 'pixelgrade-assistant' ),
							'value_installing' => esc_html__( 'Starter content importing..', 'pixelgrade-assistant' ),
							'value_installed'  => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'Starter content imported!', 'pixelgrade-assistant' ),
							'value_errored'    => '<span class="c-icon  c-icon--large  c-icon--warning"></span> ' . esc_html__( 'Starter content could not be imported!', 'pixelgrade-assistant' ),
							'class'            => 'section__title',
						),
						'head_content'   => array(
							'type'             => 'text',
							'value'            => esc_html__( 'Use the demo content to make your site look as eye-candy as the theme\'s demo. The importer helps you have a strong starting point for your content and speed up the entire process.', 'pixelgrade-assistant' ),
							'value_installing' => wp_kses_post( __( 'Why not join our <a href="https://www.facebook.com/groups/PixelGradeUsersGroup/" target="_blank">Facebook Group</a> while you wait? (opens in a new tab)', 'pixelgrade-assistant' ) ),
							'value_installed'  => esc_html__( 'Mission accomplished! 👍 You\'ve successfully imported the starter content, so you\'re good to move forward. Have fun!', 'pixelgrade-assistant' ),
							'value_errored'    => esc_html__( 'Sadly, errors have happened and the started content could not be imported at this time. Please try again in a little while or reach out to our support crew.', 'pixelgrade-assistant' ),
						),
						'starterContent' => array(
							'type'  => 'component',
							'value' => 'starter-content',
						),
					),
				),
				'pixelgradePlus' => array(
					'class'  => 'full',
					'fields' => array(
						'title'   => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Pixelgrade Plus', 'pixelgrade-assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => wp_kses_post( __( 'Pixelgrade Plus is the optional premium companion for the Pixelgrade LT stack — advanced design tools that build on everything in the free stack. You can keep using the free stack for as long as you like; Plus is here when you want more.', 'pixelgrade-assistant' ) ),
							'class' => 'section__content',
						),
						'cta'     => array(
							'type'   => 'button',
							'class'  => 'btn btn--action  btn--blue',
							'label'  => esc_html__( 'Explore Pixelgrade Plus', 'pixelgrade-assistant' ),
							'url'    => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'plus/',
							'target' => '_blank',
						),
					),
				),
			),
		),

		'customizations' => array(
			'name'   => esc_html__( 'Customizations', 'pixelgrade-assistant' ),
			'class'  => 'sections-grid__item',
			'blocks' => array(
				'featured'  => array(
					'class'  => 'u-text-center',
					'fields' => array(
						'title'   => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Customizations', 'pixelgrade-assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'We know that each website needs to have an unique voice in tune with your charisma. That\'s why we created a smart options system to easily make handy color changes, spacing adjustments and balancing fonts, each step bringing you closer to a striking result.', 'pixelgrade-assistant' ),
							'class' => 'section__content',
						),
						'cta'     => array(
							'type'   => 'button',
							'class'  => 'btn btn--action  btn--green',
							'label'  => esc_html__( 'Access the Customizer', 'pixelgrade-assistant' ),
							'url'    => '{{customizer_url}}',
							'target' => '', // we don't want the default _blank target
						),
					),
				),
				'subheader' => array(
					'class'  => 'section--airy  u-text-center',
					'fields' => array(
						'subtitle' => array(
							'type'  => 'h3',
							'value' => esc_html__( 'Learn more', 'pixelgrade-assistant' ),
							'class' => 'section__subtitle',
						),
						'title'    => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Design & Style', 'pixelgrade-assistant' ),
							'class' => 'section__title',
						),
					),
				),
				'colors'    => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '🎨 ' . esc_html__( 'Tweaking Colors Schemes', 'pixelgrade-assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'Choose colors that resonate with the statement you want to portray. For example, blue inspires safety and peace, while yellow is translated into energy and joyfulness.', 'pixelgrade-assistant' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Changing Colors', 'pixelgrade-assistant' ),
							'class' => 'btn btn--action btn--small  btn--blue',
							'url'   => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/design-and-style/style-changes/changing-colors/',
						),
					),
				),

				'fonts' => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '🎨 ' . esc_html__( 'Managing Fonts', 'pixelgrade-assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'We recommend you settle on only a few fonts: it\'s best to stick with two fonts but if you\'re feeling ambitious, three is tops.', 'pixelgrade-assistant' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Changing Fonts', 'pixelgrade-assistant' ),
							'class' => 'btn btn--action btn--small  btn--blue',
							'url'   => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/design-and-style/style-changes/changing-fonts/',
						),
					),
				),

				'custom_css' => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '🎨 ' . esc_html__( 'Custom CSS', 'pixelgrade-assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'If you\'re looking for changes that are not possible through the current set of options, swing some Custom CSS code to override the default CSS of your theme.', 'pixelgrade-assistant' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Using the Custom CSS Editor', 'pixelgrade-assistant' ),
							'class' => 'btn btn--action btn--small  btn--blue',
							'url'   => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/design-and-style/custom-code/using-custom-css-editor',
						),
					),
				),

				'advanced' => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '🎨 ' . esc_html__( 'Advanced Customizations', 'pixelgrade-assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'If you want to change HTML or PHP code, and keep your changes from being overwritten on the next theme update, the best way is to make them in a child theme.', 'pixelgrade-assistant' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Using a Child Theme', 'pixelgrade-assistant' ),
							'class' => 'btn btn--action btn--small  btn--blue',
							'url'   => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/getting-started/using-child-theme',
						),
					),
				),
			),
		),

		'system-status' => array(
			'name'   => 'System Status',
			'blocks' => array(
				'system-status' => array(
					'class'  => 'u-text-center',
					'fields' => array(
						'title'        => array(
							'type'  => 'h2',
							'class' => 'section__title',
							'value' => esc_html__( 'System Status', 'pixelgrade-assistant' ),
						),
						'systemStatus' => array(
							'type'  => 'component',
							'value' => 'system-status',
						),
						'tools'        => array(
							'type'  => 'component',
							'value' => 'pixassist-tools',
						),
					),
				),
			),
		),
	);

	$config['systemStatus'] = array(
		'phpRecommendedVersion' => 5.6,
		'l10n'                  => array(
			'title'                          => esc_html__( 'System Status', 'pixelgrade-assistant' ),
			'description'                    => esc_html__( 'Allow Pixelgrade to collect non-sensitive diagnostic data and usage information about your WordPress install. This is entirely optional and helps us improve the free Pixelgrade stack. Thanks!', 'pixelgrade-assistant' ),
			'phpOutdatedNotice'              => esc_html__( 'This version is a little old. We recommend you update to PHP ', 'pixelgrade-assistant' ),
			'wordpressOutdatedNoticeContent' => esc_html__( 'We recommend you update to the latest and greatest WordPress version.', 'pixelgrade-assistant' ),
			'updateAvailable'                => esc_html__( 'There\'s an update available!', 'pixelgrade-assistant' ),
			'themeLatestVersion'             => esc_html__( 'You are running the latest version of {{theme_name}}', 'pixelgrade-assistant' ),
			'wpUpdateAvailable1'             => esc_html__( 'There\'s an update available!', 'pixelgrade-assistant' ),
			'wpUpdateAvailable2'             => esc_html__( 'Follow this link to update.', 'pixelgrade-assistant' ),
			'wpVersionOk'                    => esc_html__( 'Great!', 'pixelgrade-assistant' ),
			'phpUpdateNeeded1'               => esc_html__( 'Your PHP version isn\'t supported anymore!', 'pixelgrade-assistant' ),
			'phpUpdateNeeded2'               => esc_html__( 'Please update to a newer PHP version', 'pixelgrade-assistant' ),
			'phpVersionOk'                   => esc_html__( 'Your PHP version is OK.', 'pixelgrade-assistant' ),
			'mysqlUpdateNeeded1'             => esc_html__( 'Your MySQL version isn\'t supported anymore!', 'pixelgrade-assistant' ),
			'mysqlUpdateNeeded2'             => esc_html__( 'Please update to a newer MySQL version', 'pixelgrade-assistant' ),
			'mysqlVersionOk'                 => esc_html__( 'Your MySQL version is OK.', 'pixelgrade-assistant' ),
			'dbCharsetIssue'                 => esc_html__( 'You might have problems with emoji!', 'pixelgrade-assistant' ),
			'dbCharsetOk'                    => esc_html__( 'Go all out emoji-style!', 'pixelgrade-assistant' ),
			'tableWPDataTitle'               => esc_html__( 'WordPress Install Data', 'pixelgrade-assistant' ),
			'tableSystemDataTitle'           => esc_html__( 'System Data', 'pixelgrade-assistant' ),
			'tableActivePluginsTitle'        => esc_html__( 'Active Plugins', 'pixelgrade-assistant' ),
			'resetPluginButtonLabel'         => esc_html__( 'Reset Pixelgrade Assistant Plugin Data', 'pixelgrade-assistant' ),
			'resetPluginDescription'         => esc_html__( 'In case you run into trouble, you can reset the plugin data and start over. No content will be lost.', 'pixelgrade-assistant' ),
			'resetPluginConfirmationMessage' => esc_html__( "Are you sure you want to reset Pixelgrade Assistant?\n\n\nOK, just do this simple calculation: ", 'pixelgrade-assistant' ),
		),
	);

	$config['pluginManager'] = array(
		'l10n' => array(
			'updateButton'              => esc_html__( 'Update', 'pixelgrade-assistant' ),
			'installFailedMessage'      => esc_html__( 'I could not install the plugin! You will need to install it manually from the plugins page!', 'pixelgrade-assistant' ),
			'activateFailedMessage'     => esc_html__( 'I could not activate the plugin! You need to activate it manually from the plugins page!', 'pixelgrade-assistant' ),
			'pluginReady'               => esc_html__( 'Plugin ready!', 'pixelgrade-assistant' ),
			'pluginUpdatingMessage'     => esc_html__( 'Updating ...', 'pixelgrade-assistant' ),
			'pluginInstallingMessage'   => esc_html__( 'Installing ...', 'pixelgrade-assistant' ),
			'pluginActivatingMessage'   => esc_html__( 'Activating ...', 'pixelgrade-assistant' ),
			'pluginUpToDate'            => esc_html__( 'Plugin up to date!', 'pixelgrade-assistant' ),
			'tgmpActivatedSuccessfully' => esc_html__( 'The following plugin was activated successfully:', 'pixelgrade-assistant' ),
			'tgmpPluginActivated'       => esc_html__( 'Plugin activated successfully.', 'pixelgrade-assistant' ),
			'tgmpPluginAlreadyActive'   => esc_html__( 'No action taken. Plugin was already active.', 'pixelgrade-assistant' ),
			'tgmpNotAllowed'            => esc_html__( 'Sorry, you are not allowed to access this page.', 'pixelgrade-assistant' ),
			'groupByRequiredLabels'     => array(
				'required'    => esc_html__( 'Core plugins needed for your website (required).', 'pixelgrade-assistant' ),
				'recommended' => esc_html__( 'Recommended plugins to enhance your website.', 'pixelgrade-assistant' ),
			),
			'noPluginsTitle'            => esc_html__( 'You are all set', 'pixelgrade-assistant' ),
			'noPlugins'                 => esc_html__( 'There are no recommended plugins for this theme right now.', 'pixelgrade-assistant' ),
		),
	);

	$config['starterContent'] = array(
		'l10n'               => array(
			'importTitle'                   => esc_html__( '{{theme_name}} demo content', 'pixelgrade-assistant' ),
			'importContentDescription'      => esc_html__( 'Import the content from the theme demo.', 'pixelgrade-assistant' ),
			'noSources'                     => esc_html__( 'Unfortunately, we don\'t have any starter content to go with your theme right now.', 'pixelgrade-assistant' ),
			'alreadyImportedConfirm'        => esc_html__( 'Starter content was already imported! Are you sure you want to import it again?', 'pixelgrade-assistant' ),
			'alreadyImportedDenied'         => esc_html__( 'It\'s OK!', 'pixelgrade-assistant' ),
			'importingData'                 => esc_html__( 'Getting data about available content...', 'pixelgrade-assistant' ),
			'somethingWrong'                => esc_html__( 'Something went wrong!', 'pixelgrade-assistant' ),
			'errorMessage'                  => esc_html__( "This starter content is not available right now.\nPlease try again later!", 'pixelgrade-assistant' ),
			'mediaAlreadyExistsTitle'       => esc_html__( 'Media already exists!', 'pixelgrade-assistant' ),
			'mediaAlreadyExistsContent'     => esc_html__( 'We won\'t import again as there is no need to!', 'pixelgrade-assistant' ),
			'mediaImporting'                => esc_html__( 'Importing media: ', 'pixelgrade-assistant' ),
			'postsAlreadyExistTitle'        => esc_html__( 'Posts already exist!', 'pixelgrade-assistant' ),
			'postsAlreadyExistContent'      => esc_html__( 'We won\'t import them again!', 'pixelgrade-assistant' ),
			'postImporting'                 => esc_html__( 'Importing ', 'pixelgrade-assistant' ),
			'taxonomiesAlreadyExistTitle'   => esc_html__( 'Taxonomies (like categories) already exist!', 'pixelgrade-assistant' ),
			'taxonomiesAlreadyExistContent' => esc_html__( 'We won\'t import them again!', 'pixelgrade-assistant' ),
			'taxonomyImporting'             => esc_html__( 'Importing taxonomy: ', 'pixelgrade-assistant' ),
			'widgetsAlreadyExistTitle'      => esc_html__( 'Widgets already exist!', 'pixelgrade-assistant' ),
			'widgetsAlreadyExistContent'    => esc_html__( 'We won\'t import them again!', 'pixelgrade-assistant' ),
			'widgetsImporting'              => esc_html__( 'Importing widgets ...', 'pixelgrade-assistant' ),
			'importingPreSettings'          => esc_html__( 'Preparing the scene for awesomeness...', 'pixelgrade-assistant' ),
			'importingPostSettings'         => esc_html__( 'Wrapping it up... ', 'pixelgrade-assistant' ),
			'importSuccessful'              => esc_html__( 'Successfully Imported!', 'pixelgrade-assistant' ),
			'imported'                      => esc_html__( 'Imported', 'pixelgrade-assistant' ),
			'import'                        => esc_html__( 'Import', 'pixelgrade-assistant' ),
			'importSelected'                => esc_html__( 'Import selected', 'pixelgrade-assistant' ),
			'stop'                          => esc_html__( 'Pause import', 'pixelgrade-assistant' ),
			'resume'                        => esc_html__( 'Resume import', 'pixelgrade-assistant' ),
			'stoppedMessage'                => esc_html__( 'Currently paused...', 'pixelgrade-assistant' ),
		),
		'defaultSceRestPath' => 'wp-json/sce/v2',
		// this will be appended to the starter content source URL if we are not given a baseRestUrl
	);

	// the recommended plugins config is based on the component status which can be: not_validated, loading, validated
	$config['recommendedPlugins'] = array(
		// general strings
		'title'            => esc_html__( 'Manage plugins', 'pixelgrade-assistant' ),
		'content'          => esc_html__( '{{theme_name}} recommends these plugins so you can take full advantage of everything that it offers.', 'pixelgrade-assistant' ),
		// validated string
		'validatedTitle'   => '<span class="c-icon c-icon--success"></span> ' . esc_html__( 'Plugins ready 🧘️', 'pixelgrade-assistant' ),
		'validatedContent' => wp_kses_post( __( 'You can rest assured that {{theme_name}} can do its best for you and your site.', 'pixelgrade-assistant' ) ),
	);

	// Local recommended companions for the free LT stack — installed from WordPress.org by slug.
	// Both power the free Anima starters (Nova Blocks supplies the page blocks, Style Manager the
	// palette + fonts), so the starter-import dependency gate expects both to be active.
	// Filterable so the team / a commercial build can adjust the list (e.g. add account-gated
	// companions via Pixelgrade Plus).
	$config['requiredPlugins'] = array(
		'plugins' => apply_filters( 'pixassist_recommended_plugins', array(
			array(
				'name'        => 'Nova Blocks',
				'slug'        => 'nova-blocks',
				'required'    => false,
				'order'       => 10,
				'selected'    => true,
				'description' => esc_html__( 'Beautiful, flexible content blocks that power the Pixelgrade LT design experience.', 'pixelgrade-assistant' ),
			),
			array(
				'name'        => 'Style Manager',
				'slug'        => 'style-manager',
				'required'    => false,
				'order'       => 20,
				'selected'    => true,
				'description' => esc_html__( 'Smart color palettes and font pairings that keep your whole site looking consistent and on-brand.', 'pixelgrade-assistant' ),
			),
		) ),
	);

	$update_core = get_site_transient( 'update_core' );

	if ( ! empty( $update_core->updates ) && ! empty( $update_core->updates[0] ) ) {
		$new_update                                     = $update_core->updates[0];
		$config['systemStatus']['wpRecommendedVersion'] = $new_update->current;
	}

	// Adapt the Pixelgrade Plus discovery card to the live Plus status (discovery / set up / manage).
	// Plus is the source of truth via the `pixelgrade_assistant_plus_status` contract; Assistant only reads it.
	if ( function_exists( 'pixassist_get_plus_status' ) && ! empty( $config['dashboard']['general']['blocks']['pixelgradePlus']['fields'] ) ) {
		$plus_status = pixassist_get_plus_status();
		if ( ! empty( $plus_status['is_plus_active'] ) ) {
			$plus_url = ! empty( $plus_status['plus_settings_url'] ) ? esc_url_raw( $plus_status['plus_settings_url'] ) : trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'plus/';
			if ( ! empty( $plus_status['is_plus_licensed'] ) ) {
				$plus_label   = esc_html__( 'Manage Pixelgrade Plus', 'pixelgrade-assistant' );
				$plus_content = wp_kses_post( __( 'Pixelgrade Plus is active. Manage your advanced design tools and settings.', 'pixelgrade-assistant' ) );
			} else {
				$plus_label   = esc_html__( 'Set up Pixelgrade Plus', 'pixelgrade-assistant' );
				$plus_content = wp_kses_post( __( 'Pixelgrade Plus is installed. Activate it to unlock its advanced design tools for your Pixelgrade LT site.', 'pixelgrade-assistant' ) );
			}
			$plus_fields                     = &$config['dashboard']['general']['blocks']['pixelgradePlus']['fields'];
			$plus_fields['content']['value'] = $plus_content;
			$plus_fields['cta']['label']     = $plus_label;
			$plus_fields['cta']['url']        = $plus_url;
			$plus_fields['cta']['target']    = ''; // internal admin URL — not a new tab
			unset( $plus_fields );
		}
	}

	$config = apply_filters( 'pixassist_default_config', $config );

	return $config;
}
