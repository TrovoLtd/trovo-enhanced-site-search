<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 25/02/2016
 * Time: 13:46
 */

namespace Trovo\TESS\MockSearch;

use Trovo\TESS\Core\IResultSet;

class MockResultSet implements IResultSet
{

    private $_queryArgs = array();
    private $_query;
    private $_resultPageBuilder;
    private $_currentResultPage;

    public function __construct($queryArgs) {
        $this->_queryArgs = $queryArgs;
        $this->_queryArgs["queryTerm"];
        $this->search();
    }

    public function getQueryArgs()
    {
        return $this->_query;
    }

    public function getCurrentResultPage()
    {
        return $this->_currentResultPage;
    }

    private function search() {

        $myXMLReader = new \XMLReader();

        $xmlFilePath = dirname(__FILE__) . '/mockSearchResults.xml';

        $myXMLReader->open($xmlFilePath,
            'utf-8',
            LIBXML_NOBLANKS);
        $this->_resultPageBuilder = new MockResultPageBuilder($myXMLReader);
        $this->_resultPageBuilder->search($this->_queryArgs["queryTerm"]);

        $this->_currentResultPage = $this->_resultPageBuilder->getResultPage();

    }

}