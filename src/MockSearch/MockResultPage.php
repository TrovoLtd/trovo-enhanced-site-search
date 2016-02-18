<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 18/02/2016
 * Time: 09:53
 */

namespace Trovo\TESS\MockSearch;

use Trovo\TESS\Core\IResult;
use Trovo\TESS\Core\IResultPage;

class MockResultPage implements IResultPage {


	private $_results = array();

	public function getResults() {

		return $this->_results;
	}

	public function addResult( IResult $result ) {

		$this->_results[] = $result;

	}
}