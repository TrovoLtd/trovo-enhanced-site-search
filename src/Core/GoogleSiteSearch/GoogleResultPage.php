<?php

	namespace Trovo\TESS\Core\GoogleSiteSearch;
	
	use Trovo\TESS\Core\Interfaces\IResultPage;
	use Trovo\TESS\Core\Interfaces\IResult;
	
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