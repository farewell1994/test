<?php

namespace Test\Core;

/**
 * Class for determining the action, depending on the received URI
 */
class Route
{
    /**
     * This method compares the received address with the existing addresses.
     * In case of coincidence, the method of a certain controller is executed,
     * otherwise that shows error for user
     *
     * @param array $objects Pimple container
     * @param string $path Requested URI
     * @param string $uriSegment Parameter in URI
     * @param array $routesArray array of all existing URI
     */
    public static function start($path, $uriSegment, $routesArray, $objects)
    {
        /**
         * @var integer counter of addresses
         */
        $counter = 0;
        foreach ($routesArray as $key => $value) {
            $counter++;
            if ($path == $key) {
                /**
                 * @var string Name of executing action
                 */
                $actionName = $value['action'];
                $objects['Test\Controllers\\'.$value['controller']]->$actionName($uriSegment);
                break;
            }
            if ($counter == count($routesArray)) {
                $objects["Test\Core\View"]->show('errorView.php', 'This page does not exist');
            }
        }
    }
}

