<?php

if(!defined('__IN_SYMPHONY__')) die('<h2>Error</h2><p>You cannot directly access this file</p>');

Class extension_locale extends Extension{

	public $languagesList;
	public $locales;
	public $defaultLanguage;

	public function about(){
		return array('name' => 'Locale',
						'version' => '1.1',
						'release-date' => '2010-08-28',
						'author' => array('name' => 'Andriy Lubinov',
											'website' => 'http://xentry.com.ua',
											'email' => 'andrey.lubinov@gmail.com')
					);
	}

	function __construct(){
		$this->languagesList = array(
			'ru' => 'Рус', 
			'uk' => 'Укр',
			'en' => 'Eng'
		);
		$this->locales = array_keys($this->languagesList);
		$this->defaultLanguage = 'ru';
	}

	public function getSubscribedDelegates(){
		return array(
					array(
						'page' => '/frontend/',
						'delegate' => 'FrontendParamsResolve',
						'callback' => 'addLocaleValueToPageParam'
					),
		);
	}


	public function addLocaleValueToPageParam($context){
	
		if(empty($_SESSION[__SYM_COOKIE_PREFIX_ . 'ln']) || !in_array($_SESSION[__SYM_COOKIE_PREFIX_ . 'ln'], $this->locales))
			return $context['params']['ln'] = $this->defaultLanguage;
			
		return $context['params']['ln'] = $_SESSION[__SYM_COOKIE_PREFIX_ . 'ln'];

	}


}

?>