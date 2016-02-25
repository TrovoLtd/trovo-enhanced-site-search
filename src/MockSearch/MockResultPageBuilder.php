<?php


    namespace Trovo\TESS\MockSearch;

    use XMLReader;
    use DOMDocument;

    class MockResultPageBuilder
    {

        private $_resultsXMLReader;
        private $_mockResultPage;

        function __construct(XMLReader $resultsXMLReader) {

            $this->_resultsXMLReader = $resultsXMLReader;
        }

        public function search($queryTerm) {
            $this->ReadResults($queryTerm);
        }


        private function ReadResults($queryTerm) {

            $this->_mockResultPage = new MockResultPage();
            $doc = new DOMDocument();

            while($this->_resultsXMLReader->read()) {

                if($this->_resultsXMLReader->getAttribute('QueryTerm') == $queryTerm ) {

                    while($this->_resultsXMLReader->read() && $this->_resultsXMLReader->name !== 'Result');

                    while ($this->_resultsXMLReader->name === 'Result') {

                        $node = simplexml_import_dom($doc->importNode($this->_resultsXMLReader->expand(), true));

                        $result = new MockResult();

                        $result->setRank((int) $node['RankWithinPage']);
                        $result->setUrl(trim((string)$node->URL));
                        $result->setTitle(trim(preg_replace('/\s+/',  ' ', (string)$node->Title)));
                        $result->setSnippet(trim(preg_replace('/\s+/',  ' ', (string)$node->Snippet)));

                        $this->_mockResultPage->addResult($result);

                        $this->_resultsXMLReader->next('Result');

                    }

                }
            }

            $this->_resultsXMLReader->close();
        }

        public function getResultPage() {

            return $this->_mockResultPage;
        }

    }