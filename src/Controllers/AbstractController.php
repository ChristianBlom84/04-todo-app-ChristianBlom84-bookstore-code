<?php

namespace Bookstore\Controllers;

use Bookstore\Exceptions\NotFoundException;

abstract class AbstractController
{
    /**
     * This method is used to contruct a view
     * It takes parts of the page and combines them with
     * the desired .view.php-file which calls this method
     * and returns a contstructed html-page as a string, which
     * is then echoed out (and returned) to the client. Where the
     * browser will construct the HTML into a full page.
     *
     * @param [type] $view
     * @return void
     */
    protected function view($view)
    {
        $view = strtolower($view);
        $viewPath = $path = $_SERVER['DOCUMENT_ROOT'] . '/../src/Views';
        $path = "$viewPath/$view.view.php";

        // This is where we construct the view
        try {
            if (file_exists($path)) {
                ob_start();
                
                include_once "$viewPath/partials/header.partial.php";
                
                include_once $path;
                
                include_once "$viewPath/partials/footer.partial.php";
                
                $renderedView = ob_get_contents();

                ob_get_clean();
                
                echo $renderedView;
            
                return;
            } else {
                throw new NotFoundException('View not found');
            }
        } catch (NotFoundException $e) {
            echo $e->getMessage();
        }
    }
}
