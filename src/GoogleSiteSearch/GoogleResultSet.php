<?php

namespace Trovo\TESS\GoogleSiteSearch;

use Trovo\TESS\Core\IResultSet;

class GoogleResultSet implements IResultSet
{

    private $_queryArgs = array();
    private $_query;
    private $_resultPageBuilder;
    private $_currentResultPage;

    public function __construct($queryArgs) {
        $this->_queryArgs = $queryArgs;
        $this->search();
    }

    public function getQueryArgs() {
        return $this->_queryArgs;
    }

    public function getCurrentResultPage()
    {
        return $this->_currentResultPage;
    }

    private function search() {

        $this->_query = new GoogleQuery($this->_queryArgs);
        $myXMLReader = new \XMLReader();

        $xmlFilePath = $this->_query->getGoogleQueryURL();

        $myXMLReader->open($xmlFilePath,
            'utf-8',
            LIBXML_NOBLANKS);
        $this->_resultPageBuilder = new GoogleResultPageBuilder($myXMLReader);

        $this->_currentResultPage = $this->_resultPageBuilder->getResultPage();

    }

}