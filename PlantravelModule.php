<?php
use yupe\components\WebModule;

class PlantravelModule extends WebModule
{
	// название модуля
	public function getName()
	{
		return Yii::t('PlantravelModule.plantravel', 'plan travel core module');
	}

	// описание модуля
	public function getDescription()
	{
		return Yii::t('PlantravelModule.plantravel', 'Module for managing planTravel');
	}

	// автор модуля
	public function getAuthor()
	{
		return Yii::t('PlantravelModule.plantravel', 'SergeyV');
	}

	// контактный email автора
	public function getAuthorEmail()
	{
		return Yii::t('PlantravelModule.plantravel', 'ussamabenladen@gmail.com');
	}

	// сайт автора или страничка модуля
	public function getUrl()
	{
		return Yii::t('PlantravelModule.plantravel', '');
	}
	//category
	public function getCategory()
	{
		return Yii::t('PlantravelModule.plantravel', 'planTravel');
	}
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'plantravel.models.*',
			'plantravel.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

	public function getAdminPageLink()
	{
		return '/plantravel/countryBackend/index';
	}

	public function getAuthItems()
	{
		return [
			[
				'name'        => 'travel.countryManager',
				'description' =>  'Manage countries',
				'type'        => AuthItem::TYPE_TASK,
				'items'       => [
					//travels
					[
						'type'        => AuthItem::TYPE_OPERATION,
						'name'        => 'travel.countryBackend.Create',
						'description' => Yii::t('plantravelModule.travel', 'Creating country')
					],
					[
						'type'        => AuthItem::TYPE_OPERATION,
						'name'        => 'travel.CountryBackend.Delete',
						'description' => Yii::t('plantravelModule.travel', 'Removing country')
					],
					[
						'type'        => AuthItem::TYPE_OPERATION,
						'name'        => 'travel.CountryBackend.Index',
						'description' => Yii::t('plantravelModule.travel', 'List of country')
					],
					[
						'type'        => AuthItem::TYPE_OPERATION,
						'name'        => 'travel.CountryBackend.Update',
						'description' => Yii::t('plantravelModule.travel', 'Editing country')
					],
					[
						'type'        => AuthItem::TYPE_OPERATION,
						'name'        => 'travel.CountryBackend.Inline',
						'description' => Yii::t('plantravelModule.travel', 'Editing country')
					],
					[
						'type'        => AuthItem::TYPE_OPERATION,
						'name'        => 'travel.CountryBackend.View',
						'description' => Yii::t('plantravelModule.travel', 'Viewing country')
					],
				]
			]
		];
	}
}
