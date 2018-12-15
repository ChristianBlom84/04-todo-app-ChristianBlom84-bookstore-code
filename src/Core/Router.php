<?php

namespace Bookstore\Core;

use Exception;

class Router
{
    // For now we only support GET routes
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * This method used by the class to load our routes from a PHP file
     * In this project, it's the src/routes.php file
     *
     * @param [file] $file
     * @return void
     */
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    /**
     * Method that is used to define routes that match GET requests
     * As you may understand we might want different things to happen
     * in our application depending on what type of request we get.
     * Separating the handlers this way is a good approach to this.
     * We also use an URI rather than an URL, to see the difference
     * Look at this image: https://i.stack.imgur.com/RKFwk.png
     *
     * @param [string] $uri - The URI received by the webserver
     * @param [string] $controller - The controller name (and the action)
     *                               e.g. IndexController@action
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * This method is used to direct the request to the part of our application
     * where we want it to go. This is the centerpiece of our Router, think of it
     * like the old switching board operators who would take calls, and then physically
     * move a cord from one slot to another to direct the call. The principle here is the
     * same. Instead, we handle a request and direct it to a certain part of our code
     * depending on our route.
     *
     * @param [string] $uri - the URI
     * @param [string] $requestType - type of the request
     * @return void
     */
    public function direct($uri, $requestType)
    {
        try {
            // As long as we have the route, and it's simple enough
            // we attempt to call the controller and action associated with that route
            if (array_key_exists($uri, $this->routes[$requestType])) {
                return $this->callAction(
                    ...explode('@', $this->routes[$requestType][$uri])
                );
            } else {
                // Here be dragons, don't worry about understanding all this as
                // you'll most likely never have write your own router
                // But, if you're interested this is one way of doing it!

                // We need this particular code in order to support dynamic routes,
                // that is, to match parts of a route and then programatically figure
                // out what controller and method should be called based on the routes parameters

                // In plain english, this makes it so that we can write routes
                // like this /myfacnyroute/{id}
                // Where the ID can be a number, or a string that changes!
                
                // You can try and test these regular expressions as at https://regex101.com/
                foreach ($this->routes[$requestType] as $key => $val) {
                    $pattern = preg_replace('#\(/\)#', '/?', $key);
                    $pattern = "@^" . preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $pattern). "$@D";
                    preg_match($pattern, $uri, $matches);
                    array_shift($matches);

                    // If there's a match, try and call the controller and its action
                    if ($matches) {
                        $getAction = explode('@', $val);
                        return $this->callAction($getAction[0], $getAction[1], $matches);
                    }
                }
            }
            throw new Exception("No route found for that URI.");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /**
     * This methods job is to call the action (method) in a controller associated
     * with a specific route.
     *
     * @param [string] $controller - The controller
     * @param [string] $action - The action, or method in the controller to be called
     * @param array $params - An optional set of parameters,
     *                        this will be populated if the route is dynamic or later,
     *                        something other than a GET request
     * @return void
     */
    public function callAction($controller, $action, $params = [])
    {
        try {
            // This is hardcoding to my specific namespace. Which is bad, but for the
            // purpose of moving on, this was left as is.
            $controller = "Bookstore\\Controllers\\{$controller}";
            $controller = new $controller();
            
            // If the method we're trying to call doesn't exist in the corresponding controller
            if (!method_exists($controller, $action)) {
                // Throw an exception
                throw new Exception("${$controller} does not appear to have the ${$action} action");
            }
            // Otherwise, now let's call the method (action)
            return $controller->$action($params);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
