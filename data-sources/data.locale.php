<?php

	require_once(TOOLKIT . '/class.datasource.php');

	Class datasourceLocale extends Datasource{

		public function about(){
			return array(
					 'name' => 'Locale: Languages List',
					 'author' => array(
					 'version' => '1.1',),
					 'release-date' => '2009-07-27T05:17:10+00:00'
			);
		}

		public function allowEditorToParse(){
			return false;
		}

		public function grab(&$param_pool){

			$result = new XMLElement('languages-list');

			$driver = $this->_Parent->ExtensionManager->create('locale'); 

			foreach($driver->languagesList as $k => $v){
				$i = new XMLElement('item', $v);
				$i->setAttribute('handle', $k);
				$result->appendChild($i);
			}

			return $result;

		}
	}

