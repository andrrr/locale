<?php

	if(!defined('__IN_SYMPHONY__')) die('<h2>Error</h2><p>You cannot directly access this file</p>');

	Final Class eventLocale_addgettosession extends Event{

		public static function about(){

			return array(
						 'name' => 'Locale: Add Locale variable to session',
						 'author' => array('name' => 'Andriy Lubinov',
										   'website' => false,
										   'email' => 'andrey.lubinov@gmail.com'),
						 'version' => '1.1',
						 'release-date' => '2010-08-28'
					);
		}


		public function load(){
			if(!empty($_GET['ln'])) 
				return $this->__trigger();
			
			return false;
		}

		protected function __trigger(){
			$driver = $this->_Parent->ExtensionManager->create('locale'); 

			if(in_array($_GET['ln'], $driver->locales)) 
				return $_SESSION[__SYM_COOKIE_PREFIX_ . 'ln'] = $_GET['ln'];
				
			return false;
		}
	}

