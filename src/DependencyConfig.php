<?php

namespace DecentProductivity\WpFeatures;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

$containerBuilder = new ContainerBuilder();

//Register shortcodes
$containerBuilder
				->register( 'shortcode-about', 'DecentProductivity\WpFeatures\Shortcodes\About\Register' )
				->addArgument(new Reference('shortcode-factory'));

$containerBuilder
				->register( 'shortcode-author', 'DecentProductivity\WpFeatures\Shortcodes\Author\Register' )
				->addArgument(new Reference('shortcode-factory'));

//Register widgets
$containerBuilder
				->register( 'latest-posts', 'DecentProductivity\WpFeatures\Widgets\LatestPosts\Register' );

//Register factories
//Shortcode factory
$containerBuilder
				->register( 'shortcode-factory', 'DecentProductivity\WpFeatures\Shortcodes\Factory' )
        ->addMethodCall('registerAbout', [new Reference('shortcode-about')])
        ->addMethodCall('registerAuthor', [new Reference('shortcode-author')]);

//Widget factory
$containerBuilder
				->register( 'widget-factory', 'DecentProductivity\WpFeatures\Shortcodes\Factory' )
        ->addMethodCall('registerLatestPosts', [new Reference('latest-posts')]);



return $containerBuilder;
