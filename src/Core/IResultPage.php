<?php

	namespace Trovo\TESS\Core;
	
	use Trovo\TESS\Core\IResult;
	
	interface IResultPage {
	
		public function getResults();
		public function addResult(IResult $result);
	
	}

?>