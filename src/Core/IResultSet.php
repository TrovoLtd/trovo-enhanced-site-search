<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 31/12/2015
 * Time: 09:44
 */

namespace Trovo\TESS\Core;

interface IResultSet
{
    public function getQueryArgs();
    public function setQueryArgs($queryArgs);

    //public function getQuery();
    //public function setQuery(IQuery $query);

    public function getCurrentResultPage();

}