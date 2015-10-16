<?php

	interface IResult {
		
		public function getRank();
		public function setRank($rank);
		
		public function getTitle();
		public function setTitle($title);
		
		public function getUrl();
		public function setUrl($url);
		
		public function getSnippet();
		public function setSnippet($snippet);
		
		public function getFileType();
		public function setFileType($fileType);
		
	}

?>