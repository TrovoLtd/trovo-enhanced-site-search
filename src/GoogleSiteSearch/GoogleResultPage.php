<?php

	namespace Trovo\TESS\GoogleSiteSearch;
	
	use Trovo\TESS\Core\IResultPage;
	use Trovo\TESS\Core\IResult;
	
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