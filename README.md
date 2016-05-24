

Class to show flash messages.

    Add this to your composer.json file. "require": { "krst15/cflashmessage": "dev-master" }

    Then use composer/packagist to download the package.

    Use this in your frontcontroller to get the the function to work. $di->setShared('flashMessages', function() use ($di){ $flashMessages = new \zama15\FlashMessage\CFlashMessage($di); return $flashMessages; });

    In the router you need to add the css-stylesheet flash.css

    Example code to show the messages. $app->router->add('flash', function() use ($app) {

    $title = "Flashmeddelanden"; $app->theme->setTitle($title); $app->theme->addStylesheet('css/flash.css');

    $app->flashMessages->addMessage('Success!', 'success'); $app->flashMessages->addMessage('Info', 'info'); $app->flashMessages->addMessage('Warning!', 'warning'); $app->flashMessages->addMessage('Error!', 'error');

    $app->views->add('me/page', [ 'content' => $app->flashMessages->getFlashMessages(), ]);

});
