<?php


$i=1;
$curated_plugins = array(
//SEO CATEGORY
    '1'=>array(
        "id"=>$i++,
        "plugin_name"=>'Yoast SEO',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/wordpress-seo.7.6.1.zip',
        "category"=>'seo',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Redirection',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/redirection.3.2.zip',
        "category"=>'seo',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'All In One SEO Pack',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/all-in-one-seo-pack.zip',
        "category"=>'seo',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Google XML Sitemaps',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/google-sitemap-generator.4.0.9.zip',
        "category"=>'seo',
        "apply"=>'0',
    ),
//DESIGN CATEGORY
    array(
        "id"=>$i++,
        "plugin_name"=>'Envira Gallery Lite',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/envira-gallery-lite.zip',
        "category"=>'design',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Beaver Builder Plugin (Lite Version)',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/beaver-builder-lite-version.zip',
        "category"=>'design',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Quick and Easy FAQs',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/quick-and-easy-faqs.1.1.2.zip',
        "category"=>'design',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'MetaSlider',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/ml-slider.3.8.0.zip',
        "category"=>'design',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'WPForms Lite',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/wpforms-lite.zip',
        "category"=>'design',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Contact Form 7',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/contact-form-7.5.0.2.zip',
        "category"=>'design',
        "apply"=>'0',
    ),
//MANAGEMENT CATEGORY
    array(
        "id"=>$i++,
        "plugin_name"=>'Duplicator',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/duplicator.1.2.40.zip',
        "category"=>'manage',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Broken Link Checker',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/broken-link-checker.1.11.5.zip',
        "category"=>'manage',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Easy Updates Manager',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/stops-core-theme-and-plugin-updates.7.0.1.zip',
        "category"=>'manage',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Pods – Custom Content Types and Fields',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/pods.2.7.6.zip',
        "category"=>'manage',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Optimize Database after Deleting Revisions',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/rvg-optimize-database.4.6.2.zip',
        "category"=>'manage',
        "apply"=>'0',
    ),
//ANALYTICS CATEGORY
    array(
        "id"=>$i++,
        "plugin_name"=>'Google Analytics for WordPress by MonsterInsights',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/google-analytics-for-wordpress.7.0.6.zip',
        "category"=>'analytics',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Google Analytics Dashboard for WP (GADWP)',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/google-analytics-dashboard-for-wp.5.3.5.zip',
        "category"=>'analytics',
        "apply"=>'0',
    ),
//MARKETING CATEGORY
    array(
        "id"=>$i++,
        "plugin_name"=>'OptinMonster API',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/optinmonster.1.4.2.zip',
        "category"=>'market',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'MailChimp for WordPress',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/mailchimp-for-wp.4.2.3.zip',
        "category"=>'market',
        "apply"=>'0',
    ),
//SOCIAL CATEGORY
    array(
        "id"=>$i++,
        "plugin_name"=>'Shared Counts',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/shared-counts.1.2.0.zip',
        "category"=>'social',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Feed Them Social (Facebook, Instagram, Twitter, etc)',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/feed-them-social.2.4.2.zip',
        "category"=>'social',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Nelio Content',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/nelio-content.1.5.11.zip',
        "category"=>'social',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Social Icons',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/social-icons.1.7.1.zip',
        "category"=>'social',
        "apply"=>'0',
    ),
//PERFORMANCE CATEGORY
    array(
        "id"=>$i++,
        "plugin_name"=>'W3 Total Cache',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/w3-total-cache.0.9.7.zip',
        "category"=>'performance',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'BJ Lazy Load',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/bj-lazy-load.zip',
        "category"=>'performance',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'WP Super Cache',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/wp-super-cache.1.6.1.zip',
        "category"=>'performance',
        "apply"=>'0',
    ),
//SECURITY CATEGORY
    array(
        "id"=>$i++,
        "plugin_name"=>'Sucuri Security - Auditing, Malware Scanner and Hardening',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/sucuri-scanner.1.8.17.zip',
        "category"=>'security',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Jetpack by WordPress.com',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/jetpack.6.2.1.zip',
        "category"=>'security',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Akismet Anti-Spam',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/akismet.4.0.7.zip',
        "category"=>'security',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'iThemes Security',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/better-wp-security.7.0.1.zip',
        "category"=>'security',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Wordfence Security',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/wordfence.7.1.7.zip',
        "category"=>'security',
        "apply"=>'0',
    ),
//MISCELLANEOUS CATEGORY
    array(
        "id"=>$i++,
        "plugin_name"=>'Relevanssi',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/relevanssi.4.0.10.1.zip',
        "category"=>'misc',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'Yet Another Related Posts Plugin',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/yet-another-related-posts-plugin.4.4.zip',
        "category"=>'misc',
        "apply"=>'0',
    ),
    array(
        "id"=>$i++,
        "plugin_name"=>'User Registration',
        "plugin_uri"=>'https://downloads.wordpress.org/plugin/user-registration.1.4.0.zip',
        "category"=>'misc',
        "apply"=>'0',
    ),
);
return ( $curated_plugins );
