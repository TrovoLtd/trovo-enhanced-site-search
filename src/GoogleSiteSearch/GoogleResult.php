<?php

	namespace Trovo\TESS\GoogleSiteSearch;
	
	use Trovo\TESS\Core\IResult;
		
	class GoogleResult implements IResult {

		// Private variables
		
		private $_rank;
		private $_title;
		private $_url;
		private $_snippet;
		private $_fileType;
		
		// Public variable accessors
		
		public function getRank() {
			return $this->_rank;
		}
		
		public function setRank($rank) {
			$this->_rank = $rank;
		}
		
		public function getTitle() {
			return $this->_title;
		}
		
		public function setTitle($title) {
			$this->_title = $title;
		}
		
		public function getUrl() {
			return $this->_url;
		}
		
		public function setUrl($url) {
			$this->_url = $url;
		}
		
		public function getSnippet() {
			return $this->_snippet;
		}
		
		public function setSnippet($snippet) {
			$this->_snippet = $snippet;
		}
		
		public function getFileType() {
			return $this->_fileType;
		}
		
		public function setFileType($fileType) {
			$this->_fileType = $fileType;
		}
		
	}

?>