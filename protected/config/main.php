<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'5884游戏媒体群站',

	// preloading 'log' component
	'preload'=>array('log'),
        
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.controllers.layout.*',
		'application.components.*',
		'application.extensions.mylib.*',
		'application.extensions.PHPExcel.*',
		'application.extensions.PHPExcel.PHPExcel.*',
	),

	'defaultController'=>'appd',
        'modules' => array(
            // uncomment the following to enable the Gii tool
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => 'nan111111',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters' => array('127.0.0.1', '::1'),
                'generatorPaths' => array(
                    'bootstrap.gii',
                    'application.gii',
                ),
            ),
            'ycm' => array(
                'username' => 'xianshannan',
                'password' => 'nan111111',
                'registerModels' => array(
                    //'application.models.Blog', // one model
                    'application.models.*', // all models in folder
                ),
                'uploadCreate' => true, // create upload folder automatically
                'redactorUpload' => true, // enable Redactor image upload
            ),
        ),
	// application components
	'components'=>array(
                'bootstrap' => array(
                    'class' => 'bootstrap.components.Bootstrap',
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        //'loginUrl'=>array('main/login.html'),
		),
/*              'db'=>array(
                        'connectionString' => 'sqlite:protected/data/blog.db',
                        'tablePrefix' => 'tbl_',
                ),	*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=game2',
			'emulatePrepare' => true,
//			'username' => 'led',
//			'password' => 'led111111',
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
			'tablePrefix' => 'g_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        
        'urlManager'=>array(
        	'urlFormat'=>'path',
        	'rules'=>array(
        		'post/<id:\d+>/<title:.*?>'=>'post/view',
        		'posts/<tag:.*?>'=>'post/index',
        		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        	),
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),
//please don't config cache module ,use baememcache in baeconfig.php
/*'cache'=>array(
            'class'=>'system.caching.CMemCache',
            ),*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);
