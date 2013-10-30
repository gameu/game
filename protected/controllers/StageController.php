<?php

class StageController extends NController{
    
        public $layout = '//layouts/stage_default';
        public function actions(){
		// return external action classes, e.g.:
		return array(
			'game'=>'application.controllers.stage.GameAction',
			'game_info'=>'application.controllers.stage.Game_infoAction',
			'platform'=>'application.controllers.stage.PlatformAction',
			'platform_info'=>'application.controllers.stage.Platform_infoAction',
		);
	}
        
        
        public function actionIndex(){
            
        }
        
        
//	public function actionGame(){
//		$this->render('game');
//	}
//	public function actionPlatform(){
//		$this->render('platform');
//	}
//	public function actionPlatform_info(){
//		$this->render('platform_info');
//	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
        */
	
	
}