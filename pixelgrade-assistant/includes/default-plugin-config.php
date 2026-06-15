<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function pixassist_get_default_config( $original_theme_slug ) {
	// General strings ready to be translated
	$config['l10n'] = array(
		'returnToDashboard'                             => esc_html__( 'Continue to your WordPress dashboard', 'pixelgrade_assistant' ),
		'nextButton'                                    => esc_html__( 'Continue', 'pixelgrade_assistant' ),
		'skipButton'                                    => esc_html__( 'Skip this step', 'pixelgrade_assistant' ),
		'notRightNow'                                   => esc_html__( 'Not right now', 'pixelgrade_assistant' ),
		'validationErrorTitle'                          => esc_html__( 'Something went wrong', 'pixelgrade_assistant' ),
		'themeValidationNoticeFail'                     => esc_html__( 'Not activated.', 'pixelgrade_assistant' ),
		'themeValidationNoticeOk'                       => esc_html__( 'Connected & up-to-date!', 'pixelgrade_assistant' ),
		'themeValidationNoticeOutdatedWithUpdate'       => esc_html__( 'Your theme is outdated, but an update is available!', 'pixelgrade_assistant' ),
		'themeValidationNoticeNotConnected'             => esc_html__( 'Not connected', 'pixelgrade_assistant' ),
		'themeUpdateAvailableTitle'                     => esc_html__( 'New theme update is available!', 'pixelgrade_assistant' ),
		'themeUpdateAvailableContent'                   => esc_html__( 'Great news! There is a new version of {{theme_name}} available.', 'pixelgrade_assistant' ),
		'hashidNotFoundNotice'                          => esc_html__( 'Sorry but we could not recognize your theme. This might have happened because you have made changes to the functions.php file. If that is the case - please try to revert to the original contents of that file and retry to validate your theme license.', 'pixelgrade_assistant' ),
		'themeUpdateButton'                             => esc_html__( 'Update now', 'pixelgrade_assistant' ),
		'themeChangelogLink'                            => esc_html__( 'View changelog', 'pixelgrade_assistant' ),
		'kbButton'                                      => esc_html__( 'Theme Help', 'pixelgrade_assistant' ),
		'themeHelpSearchPlaceholder'                    => esc_html__( 'Search the documentation…', 'pixelgrade_assistant' ),
		'themeHelpLoading'                              => esc_html__( 'Loading documentation…', 'pixelgrade_assistant' ),
		'themeHelpAllTopics'                            => esc_html__( 'All topics', 'pixelgrade_assistant' ),
		'themeHelpBack'                                 => esc_html__( 'Back', 'pixelgrade_assistant' ),
		'themeHelpNoResults'                            => esc_html__( 'No matching articles.', 'pixelgrade_assistant' ),
		'themeHelpFeedbackPrompt'                       => esc_html__( 'Was this helpful?', 'pixelgrade_assistant' ),
		'themeHelpFeedbackYes'                          => esc_html__( 'Yes', 'pixelgrade_assistant' ),
		'themeHelpFeedbackNo'                           => esc_html__( 'No', 'pixelgrade_assistant' ),
		'themeHelpFeedbackThanks'                       => esc_html__( 'Thanks for your feedback!', 'pixelgrade_assistant' ),
		'themeHelpReadOnline'                           => esc_html__( 'Read this article online', 'pixelgrade_assistant' ),
		'themeHelpFallback'                             => esc_html__( 'Browse the full documentation for step-by-step guides and answers.', 'pixelgrade_assistant' ),
		'themeHelpBrowseDocs'                           => esc_html__( 'Browse the documentation', 'pixelgrade_assistant' ),
		'Error500Text'                                  => esc_html__( 'Oh, snap! Something went wrong and we are unable to make sense of the actual problem.', 'pixelgrade_assistant' ),
		'Error500Link'                                  => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/guides-and-resources/server-errors-handling',
		'Error400Text'                                  => esc_html__( 'There is something wrong with the current setup of this WordPress installation.', 'pixelgrade_assistant' ),
		'Error400Link'                                  => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/guides-and-resources/server-errors-handling',
		'themeDirectoryChangedTitle'                    => esc_html__( 'Your theme DIRECTORY is changed!', 'pixelgrade_assistant' ),
		'themeDirectoryChanged'                         => wp_kses_post( __( 'This will give you <strong>all kinds of trouble</strong> when installing updates for the theme. To be able to <strong>successfully install updates</strong> please <strong>change the theme\'s directory</strong> from "{{template}}" to "{{original_slug}}".', 'pixelgrade_assistant' ) ),
		'themeNameChangedTitle'                         => esc_html__( 'Your theme NAME is changed!', 'pixelgrade_assistant' ),
		'themeNameChanged'                              => wp_kses_post( __( 'The theme name specified in the "style.css" file in the theme\'s directory is <strong>"{{stylecss_theme_name}}".</strong> The next time you <strong>update your theme</strong> this name will be <strong>changed back to "{{theme_name}}".</strong>', 'pixelgrade_assistant' ) ),
		'childThemeNameChanged'                         => wp_kses_post( __( 'On your next theme update, your parent theme name will be <strong>changed back to its original one: "{{stylecss_theme_name}}".</strong> To avoid issues with your child theme, you will need to <strong>update the style.css file of both your parent and child theme</strong> with <strong>the original theme name: "{{theme_name}}".</strong>', 'pixelgrade_assistant' ) ),
		'setupWizardTitle'                              => esc_html__( 'Site setup wizard', 'pixelgrade_assistant' ),
		'internalErrorTitle'                            => esc_html__( 'An internal server error has occurred', 'pixelgrade_assistant' ),
		'internalErrorContent'                          => esc_html__( 'Something went wrong while trying to process your request. Please try again.', 'pixelgrade_assistant' ),
		'componentUnavailableTitle'                     => esc_html__( 'Unavailable', 'pixelgrade_assistant' ),
		'componentUnavailableContent'                   => esc_html__( 'This feature is available only if your site is connected to {{shopdomain}}.', 'pixelgrade_assistant' ),
		'pluginInstallLabel'                            => esc_html__( 'Install', 'pixelgrade_assistant' ),
		'pluginActivateLabel'                           => esc_html__( 'Activate', 'pixelgrade_assistant' ),
		'pluginUpdateLabel'                             => esc_html__( 'Update', 'pixelgrade_assistant' ),
		'pluginsPlural'                                 => esc_html__( 'selected plugins', 'pixelgrade_assistant' ),
		'starterContentImportLabel'                     => esc_html__( 'Import starter content', 'pixelgrade_assistant' ),
		'starterContentImportSelectedLabel'             => esc_html__( 'Import selected', 'pixelgrade_assistant' ),
		'setupWizardWelcomeTitle'                       => esc_html__( 'Welcome to the site setup wizard', 'pixelgrade_assistant' ),
		'setupWizardWelcomeContent'                     => esc_html__( 'This quick, optional setup helps you install recommended free plugins and load helpful demo content. It\'s safe and fast — and you can skip it anytime.', 'pixelgrade_assistant' ),
		'setupWizardStartButtonLabel'                   => esc_html__( 'Let\'s get started!', 'pixelgrade_assistant' ),
	);

	$config['setupWizard'] = array(

		'plugins' => array(
			'stepName' => esc_html__( 'Plugins', 'pixelgrade_assistant' ),
			'blocks'   => array(
				'plugins' => array(
					'class'  => 'full white',
					'fields' => array(
						'title'             => array(
							'type'             => 'h2',
							'value'            => esc_html__( 'Set up the right plugins', 'pixelgrade_assistant' ),
							'value_installing' => esc_html__( 'Setting up plugins..', 'pixelgrade_assistant' ),
							'value_installed'  => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'All done with plugins!', 'pixelgrade_assistant' ) . ' 🤩',
							'class'            => 'section__title',
						),
						'head_content'      => array(
							'type'             => 'text',
							'value'            => esc_html__( 'Install and activate the plugins that provide recommended functionality for your site. You can add or remove plugins later on from within the WordPress dashboard.', 'pixelgrade_assistant' ),
							'value_installing' => wp_kses_post( __( 'Why not take a peek at our <a href="https://twitter.com/pixelgrade" target="_blank">Twitter page</a> while you wait? (opens in a new tab and the plugins aren\'t going anywhere)', 'pixelgrade_assistant' ) ),
							'value_installed'  => esc_html__( 'You made it! 🙌 You\'ve installed and activated the plugins. You are good to jump to the next step.', 'pixelgrade_assistant' ),
						),
						'plugins_component' => array(
							'title' => esc_html__( 'Install Plugins', 'pixelgrade_assistant' ),
							'type'  => 'component',
							'value' => 'plugin-manager',
						),
					),
				),
			),
		),

		'support' => array(
			'stepName' => esc_html__( 'Starter content', 'pixelgrade_assistant' ),
			'nextText' => esc_html__( 'Next Step', 'pixelgrade_assistant' ),
			'blocks'   => array(
				'support' => array(
					'class'  => 'full white',
					'fields' => array(
						'title'          => array(
							'type'             => 'h2',
							'value'            => esc_html__( 'Import starter content', 'pixelgrade_assistant' ),
							'value_installing' => esc_html__( 'Importing starter content..', 'pixelgrade_assistant' ),
							'value_installed'  => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'Starter content imported!', 'pixelgrade_assistant' ),
							'value_errored'    => '<span class="c-icon  c-icon--large  c-icon--warning"></span> ' . esc_html__( 'Starter content could not be imported!', 'pixelgrade_assistant' ),
							'class'            => 'section__title',
						),
						'head_content'   => array(
							'type'             => 'text',
							'value'            => esc_html__( 'Use the demo content to make your site look as eye-candy as the theme\'s demo. The importer helps you have a strong starting point for your content and speed up the entire process.', 'pixelgrade_assistant' ),
							'value_installing' => wp_kses_post( __( 'Why not join our <a href="https://www.facebook.com/groups/PixelGradeUsersGroup/" target="_blank">Facebook Group</a> while you wait? (opens in a new tab)', 'pixelgrade_assistant' ) ),
							'value_installed'  => esc_html__( 'Mission accomplished! 👍 You\'ve successfully imported the starter content, so you\'re good to move forward. Have fun!', 'pixelgrade_assistant' ),
							'value_errored'    => esc_html__( 'Sadly, errors have happened and the started content could not be imported at this time. Please try again in a little while or reach out to our support crew.', 'pixelgrade_assistant' ),
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
			'stepName' => esc_html__( 'Ready', 'pixelgrade_assistant' ),
			'blocks'   => array(
				'ready' => array(
					'class'  => 'full white',
					'fields' => array(
						'title'   => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Your site is ready to make an impact!', 'pixelgrade_assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => wp_kses_post( __( '<strong>Big congrats, mate!</strong> 👏 Everything\'s right on track which means that you can start making tweaks of all kinds. Login to your WordPress dashboard to make changes, and feel free to change the default content to match your needs.', 'pixelgrade_assistant' ) ),
						),
					),
				),

				'redirect_area' => array(
					'class'  => 'half',
					'fields' => array(
						'title' => array(
							'type'  => 'h4',
							'value' => esc_html__( 'Next steps', 'pixelgrade_assistant' ),
						),
						'cta'   => array(
							'type'  => 'button',
							'class' => 'btn btn--large',
							'label' => esc_html__( 'View and Customize', 'pixelgrade_assistant' ),
							'url'   => '{{customizer_url}}?return=' . urlencode( admin_url( 'admin.php?page=pixelgrade_assistant' ) ),
						),
					),
				),

				'help_links' => array(
					'class'  => 'half',
					'fields' => array(
						'title' => array(
							'type'  => 'h4',
							'value' => esc_html__( 'Learn more', 'pixelgrade_assistant' ),
						),
						'links' => array(
							'type'  => 'links',
							'value' => array(
								array(
									'label' => esc_html__( 'Browse the Theme Documentation', 'pixelgrade_assistant' ),
									'url'   => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'docs/',
								),
								array(
									'label' => esc_html__( 'Learn How to Use WordPress', 'pixelgrade_assistant' ),
									'url'   => 'https://easywpguide.com',
								),
								array(
									'label' => esc_html__( 'Get Help and Support', 'pixelgrade_assistant' ),
									'url'   => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'get-support/',
								),
								array(
									'label' => esc_html__( 'Join our Facebook group', 'pixelgrade_assistant' ),
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
			'name'   => esc_html__( 'General', 'pixelgrade_assistant' ),
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
							'value'            => esc_html__( 'Starter content', 'pixelgrade_assistant' ),
							'value_installing' => esc_html__( 'Starter content importing..', 'pixelgrade_assistant' ),
							'value_installed'  => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'Starter content imported!', 'pixelgrade_assistant' ),
							'value_errored'    => '<span class="c-icon  c-icon--large  c-icon--warning"></span> ' . esc_html__( 'Starter content could not be imported!', 'pixelgrade_assistant' ),
							'class'            => 'section__title',
						),
						'head_content'   => array(
							'type'             => 'text',
							'value'            => esc_html__( 'Use the demo content to make your site look as eye-candy as the theme\'s demo. The importer helps you have a strong starting point for your content and speed up the entire process.', 'pixelgrade_assistant' ),
							'value_installing' => wp_kses_post( __( 'Why not join our <a href="https://www.facebook.com/groups/PixelGradeUsersGroup/" target="_blank">Facebook Group</a> while you wait? (opens in a new tab)', 'pixelgrade_assistant' ) ),
							'value_installed'  => esc_html__( 'Mission accomplished! 👍 You\'ve successfully imported the starter content, so you\'re good to move forward. Have fun!', 'pixelgrade_assistant' ),
							'value_errored'    => esc_html__( 'Sadly, errors have happened and the started content could not be imported at this time. Please try again in a little while or reach out to our support crew.', 'pixelgrade_assistant' ),
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
							'value' => esc_html__( 'Pixelgrade Plus', 'pixelgrade_assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => wp_kses_post( __( 'Pixelgrade Plus is the optional premium companion for the Pixelgrade LT stack — advanced design tools that build on everything in the free stack. You can keep using the free stack for as long as you like; Plus is here when you want more.', 'pixelgrade_assistant' ) ),
							'class' => 'section__content',
						),
						'cta'     => array(
							'type'   => 'button',
							'class'  => 'btn btn--action  btn--blue',
							'label'  => esc_html__( 'Explore Pixelgrade Plus', 'pixelgrade_assistant' ),
							'url'    => trailingslashit( PIXELGRADE_ASSISTANT__SHOP_BASE ) . 'plus/',
							'target' => '_blank',
						),
					),
				),
			),
		),

		'customizations' => array(
			'name'   => esc_html__( 'Customizations', 'pixelgrade_assistant' ),
			'class'  => 'sections-grid__item',
			'blocks' => array(
				'featured'  => array(
					'class'  => 'u-text-center',
					'fields' => array(
						'title'   => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Customizations', 'pixelgrade_assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'We know that each website needs to have an unique voice in tune with your charisma. That\'s why we created a smart options system to easily make handy color changes, spacing adjustments and balancing fonts, each step bringing you closer to a striking result.', 'pixelgrade_assistant' ),
							'class' => 'section__content',
						),
						'cta'     => array(
							'type'   => 'button',
							'class'  => 'btn btn--action  btn--green',
							'label'  => esc_html__( 'Access the Customizer', 'pixelgrade_assistant' ),
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
							'value' => esc_html__( 'Learn more', 'pixelgrade_assistant' ),
							'class' => 'section__subtitle',
						),
						'title'    => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Design & Style', 'pixelgrade_assistant' ),
							'class' => 'section__title',
						),
					),
				),
				'colors'    => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '<img class="emoji" alt="🎨" src="https://s.w.org/images/core/emoji/2.2.1/svg/1f3a8.svg"> ' . esc_html__( 'Tweaking Colors Schemes', 'pixelgrade_assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'Choose colors that resonate with the statement you want to portray. For example, blue inspires safety and peace, while yellow is translated into energy and joyfulness.', 'pixelgrade_assistant' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Changing Colors', 'pixelgrade_assistant' ),
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
							'value' => '<img class="emoji" alt="🎨" src="https://s.w.org/images/core/emoji/2.2.1/svg/1f3a8.svg"> ' . esc_html__( 'Managing Fonts', 'pixelgrade_assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'We recommend you settle on only a few fonts: it\'s best to stick with two fonts but if you\'re feeling ambitious, three is tops.', 'pixelgrade_assistant' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Changing Fonts', 'pixelgrade_assistant' ),
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
							'value' => '<img class="emoji" alt="🎨" src="https://s.w.org/images/core/emoji/2.2.1/svg/1f3a8.svg"> ' . esc_html__( 'Custom CSS', 'pixelgrade_assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'If you\'re looking for changes that are not possible through the current set of options, swing some Custom CSS code to override the default CSS of your theme.', 'pixelgrade_assistant' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Using the Custom CSS Editor', 'pixelgrade_assistant' ),
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
							'value' => '<img class="emoji" alt="🎨" src="https://s.w.org/images/core/emoji/2.2.1/svg/1f3a8.svg"> ' . esc_html__( 'Advanced Customizations', 'pixelgrade_assistant' ),
							'class' => 'section__title',
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'If you want to change HTML or PHP code, and keep your changes from being overwritten on the next theme update, the best way is to make them in a child theme.', 'pixelgrade_assistant' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Using a Child Theme', 'pixelgrade_assistant' ),
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
							'value' => esc_html__( 'System Status', 'pixelgrade_assistant' ),
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
			'title'                          => esc_html__( 'System Status', 'pixelgrade_assistant' ),
			'description'                    => esc_html__( 'Allow Pixelgrade to collect non-sensitive diagnostic data and usage information about your WordPress install. This is entirely optional and helps us improve the free Pixelgrade stack. Thanks!', 'pixelgrade_assistant' ),
			'phpOutdatedNotice'              => esc_html__( 'This version is a little old. We recommend you update to PHP ', 'pixelgrade_assistant' ),
			'wordpressOutdatedNoticeContent' => esc_html__( 'We recommend you update to the latest and greatest WordPress version.', 'pixelgrade_assistant' ),
			'updateAvailable'                => esc_html__( 'There\'s an update available!', 'pixelgrade_assistant' ),
			'themeLatestVersion'             => esc_html__( 'You are running the latest version of {{theme_name}}', 'pixelgrade_assistant' ),
			'wpUpdateAvailable1'             => esc_html__( 'There\'s an update available!', 'pixelgrade_assistant' ),
			'wpUpdateAvailable2'             => esc_html__( 'Follow this link to update.', 'pixelgrade_assistant' ),
			'wpVersionOk'                    => esc_html__( 'Great!', 'pixelgrade_assistant' ),
			'phpUpdateNeeded1'               => esc_html__( 'Your PHP version isn\'t supported anymore!', 'pixelgrade_assistant' ),
			'phpUpdateNeeded2'               => esc_html__( 'Please update to a newer PHP version', 'pixelgrade_assistant' ),
			'phpVersionOk'                   => esc_html__( 'Your PHP version is OK.', 'pixelgrade_assistant' ),
			'mysqlUpdateNeeded1'             => esc_html__( 'Your MySQL version isn\'t supported anymore!', 'pixelgrade_assistant' ),
			'mysqlUpdateNeeded2'             => esc_html__( 'Please update to a newer MySQL version', 'pixelgrade_assistant' ),
			'mysqlVersionOk'                 => esc_html__( 'Your MySQL version is OK.', 'pixelgrade_assistant' ),
			'dbCharsetIssue'                 => esc_html__( 'You might have problems with emoji!', 'pixelgrade_assistant' ),
			'dbCharsetOk'                    => esc_html__( 'Go all out emoji-style!', 'pixelgrade_assistant' ),
			'tableWPDataTitle'               => esc_html__( 'WordPress Install Data', 'pixelgrade_assistant' ),
			'tableSystemDataTitle'           => esc_html__( 'System Data', 'pixelgrade_assistant' ),
			'tableActivePluginsTitle'        => esc_html__( 'Active Plugins', 'pixelgrade_assistant' ),
			'resetPluginButtonLabel'         => esc_html__( 'Reset Pixelgrade Assistant Plugin Data', 'pixelgrade_assistant' ),
			'resetPluginDescription'         => esc_html__( 'In case you run into trouble, you can reset the plugin data and start over. No content will be lost.', 'pixelgrade_assistant' ),
			'resetPluginConfirmationMessage' => esc_html__( "Are you sure you want to reset Pixelgrade Assistant?\n\n\nOK, just do this simple calculation: ", 'pixelgrade_assistant' ),
		),
	);

	$config['pluginManager'] = array(
		'l10n' => array(
			'updateButton'              => esc_html__( 'Update', 'pixelgrade_assistant' ),
			'installFailedMessage'      => esc_html__( 'I could not install the plugin! You will need to install it manually from the plugins page!', 'pixelgrade_assistant' ),
			'activateFailedMessage'     => esc_html__( 'I could not activate the plugin! You need to activate it manually from the plugins page!', 'pixelgrade_assistant' ),
			'pluginReady'               => esc_html__( 'Plugin ready!', 'pixelgrade_assistant' ),
			'pluginUpdatingMessage'     => esc_html__( 'Updating ...', 'pixelgrade_assistant' ),
			'pluginInstallingMessage'   => esc_html__( 'Installing ...', 'pixelgrade_assistant' ),
			'pluginActivatingMessage'   => esc_html__( 'Activating ...', 'pixelgrade_assistant' ),
			'pluginUpToDate'            => esc_html__( 'Plugin up to date!', 'pixelgrade_assistant' ),
			'tgmpActivatedSuccessfully' => esc_html__( 'The following plugin was activated successfully:', 'pixelgrade_assistant' ),
			'tgmpPluginActivated'       => esc_html__( 'Plugin activated successfully.', 'pixelgrade_assistant' ),
			'tgmpPluginAlreadyActive'   => esc_html__( 'No action taken. Plugin was already active.', 'pixelgrade_assistant' ),
			'tgmpNotAllowed'            => esc_html__( 'Sorry, you are not allowed to access this page.', 'pixelgrade_assistant' ),
			'groupByRequiredLabels'     => array(
				'required'    => esc_html__( 'Core plugins needed for your website (required).', 'pixelgrade_assistant' ),
				'recommended' => esc_html__( 'Recommended plugins to enhance your website.', 'pixelgrade_assistant' ),
			),
			'noPlugins'                 => esc_html__( 'No plugins needed at this time.', 'pixelgrade_assistant' ),
		),
	);

	$config['starterContent'] = array(
		'l10n'               => array(
			'importTitle'                   => esc_html__( '{{theme_name}} demo content', 'pixelgrade_assistant' ),
			'importContentDescription'      => esc_html__( 'Import the content from the theme demo.', 'pixelgrade_assistant' ),
			'noSources'                     => esc_html__( 'Unfortunately, we don\'t have any starter content to go with your theme right now.', 'pixelgrade_assistant' ),
			'alreadyImportedConfirm'        => esc_html__( 'Starter content was already imported! Are you sure you want to import it again?', 'pixelgrade_assistant' ),
			'alreadyImportedDenied'         => esc_html__( 'It\'s OK!', 'pixelgrade_assistant' ),
			'importingData'                 => esc_html__( 'Getting data about available content...', 'pixelgrade_assistant' ),
			'somethingWrong'                => esc_html__( 'Something went wrong!', 'pixelgrade_assistant' ),
			'errorMessage'                  => esc_html__( "This starter content is not available right now.\nPlease try again later!", 'pixelgrade_assistant' ),
			'mediaAlreadyExistsTitle'       => esc_html__( 'Media already exists!', 'pixelgrade_assistant' ),
			'mediaAlreadyExistsContent'     => esc_html__( 'We won\'t import again as there is no need to!', 'pixelgrade_assistant' ),
			'mediaImporting'                => esc_html__( 'Importing media: ', 'pixelgrade_assistant' ),
			'postsAlreadyExistTitle'        => esc_html__( 'Posts already exist!', 'pixelgrade_assistant' ),
			'postsAlreadyExistContent'      => esc_html__( 'We won\'t import them again!', 'pixelgrade_assistant' ),
			'postImporting'                 => esc_html__( 'Importing ', 'pixelgrade_assistant' ),
			'taxonomiesAlreadyExistTitle'   => esc_html__( 'Taxonomies (like categories) already exist!', 'pixelgrade_assistant' ),
			'taxonomiesAlreadyExistContent' => esc_html__( 'We won\'t import them again!', 'pixelgrade_assistant' ),
			'taxonomyImporting'             => esc_html__( 'Importing taxonomy: ', 'pixelgrade_assistant' ),
			'widgetsAlreadyExistTitle'      => esc_html__( 'Widgets already exist!', 'pixelgrade_assistant' ),
			'widgetsAlreadyExistContent'    => esc_html__( 'We won\'t import them again!', 'pixelgrade_assistant' ),
			'widgetsImporting'              => esc_html__( 'Importing widgets ...', 'pixelgrade_assistant' ),
			'importingPreSettings'          => esc_html__( 'Preparing the scene for awesomeness...', 'pixelgrade_assistant' ),
			'importingPostSettings'         => esc_html__( 'Wrapping it up... ', 'pixelgrade_assistant' ),
			'importSuccessful'              => esc_html__( 'Successfully Imported!', 'pixelgrade_assistant' ),
			'imported'                      => esc_html__( 'Imported', 'pixelgrade_assistant' ),
			'import'                        => esc_html__( 'Import', 'pixelgrade_assistant' ),
			'importSelected'                => esc_html__( 'Import selected', 'pixelgrade_assistant' ),
			'stop'                          => esc_html__( 'Pause import', 'pixelgrade_assistant' ),
			'resume'                        => esc_html__( 'Resume import', 'pixelgrade_assistant' ),
			'stoppedMessage'                => esc_html__( 'Currently paused...', 'pixelgrade_assistant' ),
		),
		'defaultSceRestPath' => 'wp-json/sce/v2',
		// this will be appended to the starter content source URL if we are not given a baseRestUrl
	);

	// the recommended plugins config is based on the component status which can be: not_validated, loading, validated
	$config['recommendedPlugins'] = array(
		// general strings
		'title'            => esc_html__( 'Manage plugins', 'pixelgrade_assistant' ),
		'content'          => esc_html__( '{{theme_name}} recommends these plugins so you can take full advantage of everything that it offers.', 'pixelgrade_assistant' ),
		// validated string
		'validatedTitle'   => '<span class="c-icon c-icon--success"></span> ' . esc_html__( 'Plugins ready 🧘️', 'pixelgrade_assistant' ),
		'validatedContent' => wp_kses_post( __( 'You can rest assured that {{theme_name}} can do its best for you and your site.', 'pixelgrade_assistant' ) ),
	);

	// Local recommended companions for the free LT stack — installed from WordPress.org by slug.
	// Filterable so the team / a commercial build can adjust the list (e.g. add Style Manager once
	// it is re-published on wp.org, or add account-gated companions via Pixelgrade Plus).
	$config['requiredPlugins'] = array(
		'plugins' => apply_filters( 'pixassist_recommended_plugins', array(
			array(
				'name'        => 'Nova Blocks',
				'slug'        => 'nova-blocks',
				'required'    => false,
				'order'       => 10,
				'selected'    => true,
				'description' => esc_html__( 'Beautiful, flexible content blocks that power the Pixelgrade LT design experience.', 'pixelgrade_assistant' ),
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
				$plus_label   = esc_html__( 'Manage Pixelgrade Plus', 'pixelgrade_assistant' );
				$plus_content = wp_kses_post( __( 'Pixelgrade Plus is active. Manage your advanced design tools and settings.', 'pixelgrade_assistant' ) );
			} else {
				$plus_label   = esc_html__( 'Set up Pixelgrade Plus', 'pixelgrade_assistant' );
				$plus_content = wp_kses_post( __( 'Pixelgrade Plus is installed. Activate it to unlock its advanced design tools for your Pixelgrade LT site.', 'pixelgrade_assistant' ) );
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
