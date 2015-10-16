<?php
	
	require_once(__DIR__.'/../interfaces/interface.IResultPage.php');
	require_once(__DIR__.'/../interfaces/interface.IResult.php');
	
	class GoogleResultPage implements IResultPage {
	
		private $_results = array();
		
		public function getResults() {
			return $this->_results;
		}
		
		public function addResult(IResult $result) {
			$this->_results[] = $result;
		}
		
	}
	
	
?>