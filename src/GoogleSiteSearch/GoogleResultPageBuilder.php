<?php

	namespace Trovo\TESS\GoogleSiteSearch;
	
	use Trovo\TESS\Core\IResultPage;
	use Trovo\TESS\Core\IResult;
	use XMLReader;
	use DOMDocument;

	class GoogleResultPageBuilder {
	
		private $_resultsXMLReader;
		private $_googleResultPage;
	
		function __construct(XMLReader $resultsXMLReader) {
				
			$this->_resultsXMLReader = $resultsXMLReader;
			$this->ReadResults();
		}
	
		private function ReadResults() {
				
			$this->_googleResultPage = new GoogleResultPage();
			$doc = new DOMDocument();
				
			while($this->_resultsXMLReader->read() && $this->_resultsXMLReader->name !== 'R');
				
				
			while ($this->_resultsXMLReader->name === 'R') {
	
				$node = simplexml_import_dom($doc->importNode($this->_resultsXMLReader->expand(), true));
	
				$result = new GoogleResult();
	
				$result->setRank((int) $node['N']);
				$result->setUrl(trim((string)$node->U));
				$result->setTitle(trim(preg_replace('/\s+/',  ' ', (string)$node->T)));
				$result->setSnippet(trim(preg_replace('/\s+/',  ' ', (string)$node->S)));
	
				$this->_googleResultPage->addResult($result);
	
				$this->_resultsXMLReader->next('R');
	
			}
				
		}
	
		public function getResultPage() {
			return $this->_googleResultPage;
		}
	}


?>