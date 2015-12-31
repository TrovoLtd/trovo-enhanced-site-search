<?php

/**
 * This is where the IResultSet interface will get mapped onto something as much like a WP_Query object as possible
 * so that it makes as much sense as possible to WordPress developers
 */

namespace Trovo\TESS\WordPress;

use \Trovo\TESS\GoogleSiteSearch\GoogleResultSet;

/**
 * Reference to the Global post object allows search results to be added to the standard WordPress Loop
 * Can't help feeling that this is a crazy thing to do?
 */

//global $post;

class WP_Trovo_Query
{

    private $_queryArgs = array();
    private $_postCounter;
    private $_resultPage;
    private $_results = array();

    public function __construct($queryArgs) {
        $this->_queryArgs = $queryArgs;
        $this->search();
    }

    public function have_posts() {
        //return $this->_postCounter > 0;
        return false;
    }

    public function the_post() {

        --$this->postCounter;
        //$post->post_title = $this->_results[$this->_postCounter]->getTitle();
    }

    public function getFirstResultTitle() {
        return $this->_results[0]->getTitle();
    }

    /**
     * Just hard coding a Google Search in at the moment
     */

    private function search() {

        $resultSet = new GoogleResultSet($this->_queryArgs);
        $this->_resultPage = $resultSet->getCurrentResultPage();
        $this->_results = $this->_resultPage->getResults();
        $this->_postCounter = count($this->_results);

    }


}