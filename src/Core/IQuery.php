<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 31/12/2015
 * Time: 09:54
 */

namespace Trovo\TESS\Core;


interface IQuery
{
    public function getQueryArgs();
    public function setQueryArgs($queryArgs);
    public function getQueryTerm();

}