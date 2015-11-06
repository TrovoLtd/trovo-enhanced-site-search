<?php

	namespace Trovo\TESS\Core\Interfaces;
	
	use Trovo\TESS\Core\Interfaces\IResult;
	
	interface IResultPage {
	
		public function getResults();
		public function addResult(IResult $result);
	
	}

?>