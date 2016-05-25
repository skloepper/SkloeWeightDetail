<?php
/**
 * Show weight in cart and on detail page
 * @link http://www.shopware.com
 * @package Plugins
 * @subpackage Frontend
 * @copyright Copyright (c) 2016
 * @version 1.2.2
 * @author shopware AG (s.kloepper)
 */
class Shopware_Plugins_Frontend_SkloeWeightDetail_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
	 /**
     * install method - subscribe an event
     * define basic settings
     * @return bool
     */
	public function install()
	{		
		$this->subscribeEvent('Enlight_Controller_Action_PostDispatch', 'onPostDispatch');
		
		$form = $this->Form();
		$form->setElement('text', 'styles', array('label'=>'CSS-Detail','value'=>'font-weight: bold;'));
		$form->setElement('text', 'stylesbasket', array('label'=>'CSS-Warenkorb','value'=>'padding: 25px 0 0px 10px;'));
		$form->setElement('text', 'unit', array('label'=>'Einheit - Standard kg','value'=>'kg'));
		$form->setElement('checkbox', 'basket', array('label'=>'Gesamtgewicht im Warenkorb anzeigen','value'=>''));
		$form->save();
		
	 	return true;
	}
	
    /**
     * Define template and variables
     * @param Enlight_Event_EventArgs $args
     */
    public function onPostDispatch(Enlight_Event_EventArgs $args)
    {
        $request = $args->getSubject()->Request();
        $response = $args->getSubject()->Response();
        
        $view = $args->getSubject()->View();
        $config = Shopware()->Plugins()->Frontend()->SkloeWeightDetail()->Config();
        if (!$request->isDispatched() || $response->isException() || $request->getModuleName() != 'frontend' || !$view->hasTemplate()) {
            return;
        }
        $view->SkloeWeightDetail = $config;
        $view->addTemplateDir($this->Path() . 'Views/');
        $args->getSubject()->View()->extendsTemplate('frontend/plugins/skloe_weight_detail/template/index.tpl');
    }
    
    /**
     * standard meta description
     * @return unknown
     */
	public function getInfo()
    {
    	return array(
    		'version' => "1.2.2",
			'autor' => 'Sebastian Kloepper',
			'copyright' => 'Copyright © 2016, Sebastian Kloepper',
			'label' => "Gewichtsanzeige",
    	);
    }
	
}
