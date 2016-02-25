<?php

    namespace Core;


    use Trovo\TESS\Core\SearchProviderFactory;
    use Trovo\TESS\Core\IResultSet;

    class SearchProviderFactoryTests extends \PHPUnit_Framework_TestCase
    {

        public function testMockResultSetReturned() {

            $testQueryArgs = array(
                "providerName" => "Mock",
                "queryTerm" => "criminal",
                );

            $searchProviderFactory = new SearchProviderFactory($testQueryArgs);

            $resultSet = $searchProviderFactory->getProvider();

            $resultPage = $resultSet->getCurrentResultPage();

            $results = $resultPage->getResults();

            $this->assertEquals(3, count($results));

        }


    }
