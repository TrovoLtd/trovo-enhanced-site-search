<?php

    namespace Trovo\TESS\Core;

    use Trovo\TESS\GoogleSiteSearch\GoogleResultSet;
    use Trovo\TESS\MockSearch\MockResultSet;

    class SearchProviderFactory
    {

        private $_queryArgs = array();

        public function __construct($queryArgs)
        {
            $this->_queryArgs = $queryArgs;
        }


        public function getProvider() {

            if($this->_queryArgs["providerName"] == "Google")
            {
                return new GoogleResultSet($this->_queryArgs);
            }
            elseif($this->_queryArgs["providerName"] == "Mock")
            {
                return new MockResultSet($this->_queryArgs);
            }
            else
            {
                throw new \InvalidArgumentException("The query arguments array contained an unrecognised provider name.");
            }

        }

    }