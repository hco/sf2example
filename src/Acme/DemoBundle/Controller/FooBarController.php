<?php
namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation;

/**
 * @Route("", service="acme.controllers.foobar")
 */
class FooBarController
{
    private $barFactory;
    private $fooFactory;

    public function __construct(Factory\Model $fooFactory, Factory\Model $barFactory)
    {
        $this->fooFactory = $fooFactory;
        $this->barFactory = $barFactory;
    }

    /**
     * @Route("/foobar")
     */
    public function foobarAction()
    {

        return new HttpFoundation\Response(
            sprintf(
                "<pre>%s<hr>%s</pre>",
                var_export($this->fooFactory->getById(23), true),
                var_export($this->barFactory->getById(42), true)
            )
        );
    }
}
