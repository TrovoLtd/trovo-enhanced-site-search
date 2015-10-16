<?php

	require_once(__DIR__.'/../interfaces/interface.IResult.php');

	class GoogleResult implements IResult {
		
		private $_rank;
		
		public function getRank() {
			return $this->_rank;
		}
		
		public function setRank($rank) {
			$this->_rank = $rank;
		}
		
	}

?>