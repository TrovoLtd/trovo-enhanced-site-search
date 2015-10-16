<?php
	
	require_once(__DIR__.'/../interfaces/interface.IResultPage.php');
	
	class GoogleResultPage implements IResultPage {
	
		private $_results;
		
		public function getResults() {
			return $this->_results;
		}
		
		public function setResults($results) {
			$this->_results = $results;
		}
	
		
	}
	
	
?>