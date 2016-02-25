<?php

namespace Trovo\TESS\GoogleSiteSearch;

use \Trovo\TESS\Core\IQuery;

class GoogleQuery implements IQuery
{

    private $_queryArgs = array();

    private $_queryTerm;
    private $_googleAccountId;
    private $_googleBaseUrl;

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

    public function getGoogleBaseUrl() {
        return $this->_googleBaseUrl;
    }

    public function getGoogleQueryURL() {

        return $this->_googleBaseUrl . $this->_googleAccountId . "&q=" . urlencode($this->_queryTerm) . "&num=10&start=0";
    }

    private function setGoogleVariables($queryArgs) {

        if(!isset($this->_queryArgs["queryTerm"])) {
            throw new \InvalidArgumentException("The query term was not properly labelled in the query args array. The correct label is queryTerm.");
        }

        if(!isset($this->_queryArgs["googleAccountId"])) {
            throw new \InvalidArgumentException("The Google Account Id was not properly labelled in the query args array. The correct label is googleAccountId.");
        }

        if(!isset($this->_queryArgs["googleBaseUrl"])) {
            throw new \InvalidArgumentException("The Google Base Url was not properly labelled in the query args array. The correct label is googleBaseUrl.");
        }

        $this->_queryTerm = $this->_queryArgs["queryTerm"];
        $this->_googleAccountId = $this->_queryArgs["googleAccountId"];
        $this->_googleBaseUrl = $this->_queryArgs["googleBaseUrl"];

    }

}