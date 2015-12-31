<?php

namespace Trovo\TESS\GoogleSiteSearch;

use \Trovo\TESS\Core\IQuery;

class GoogleQuery implements IQuery
{

    private $_queryArgs = array();

    private $_queryTerm;
    private $_googleAccountId;

    public function __construct($queryArgs) {
        $this->_queryArgs = $queryArgs;
        $this->setGoogleVariables($this->_queryArgs);
    }

    public function getQueryArgs()
    {
        return $this->_queryArgs;
    }

    public function setQueryArgs($queryArgs)
    {
        $this->_queryArgs = $queryArgs;
        $this->setGoogleVariables($this->_queryArgs);
    }

    public function getQueryTerm(){
        return $this->_queryTerm;
    }

    public function getGoogleAccountId() {
        return $this->_googleAccountId;
    }

    public function getGoogleQueryURL() {

        return "http://www.google.com/cse?client=google-csbe&output=xml_no_dtd&cx=" . $this->_googleAccountId . "&q=" . $this->_queryTerm . "&num=10&start=0";
    }

    private function setGoogleVariables($queryArgs) {

        if(!isset($this->_queryArgs["queryTerm"])) {
            throw new \InvalidArgumentException("The query term was not properly labelled in the query args array. The correct label is queryTerm.");
        }

        if(!isset($this->_queryArgs["googleAccountId"])) {
            throw new \InvalidArgumentException("The Google Account Id was not properly labelled in the query args array. The correct label is googleAccountId.");
        }

        $this->_queryTerm = $this->_queryArgs["queryTerm"];
        $this->_googleAccountId = $this->_queryArgs["googleAccountId"];

    }

}