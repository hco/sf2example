<?php
namespace Acme\DemoBundle\Factory;

use Psr\Log\LoggerInterface;

class Model
{
    private $modelClass;
    private $apiPrefix;
    private $logger;

    function __construct($apiPrefix, $modelClass, LoggerInterface $logger)
    {
        $this->apiPrefix  = $apiPrefix;
        $this->modelClass = $modelClass;
        $this->logger     = $logger;
    }

    public function getById($id)
    {
        $model = new $this->modelClass();

        // Adjust this to your rest backend ;)
        // $this->restBackend->loadDataIntoModel($model, $this->getUrlForId($id));
        $this->logger->info('Would have requests ' . $this->getUrlForId($id));

        return $model;
    }


    /**
     * Returns the url for a model to request at the rest service
     *
     * @return string
     */
    private function getUrlForId($id)
    {
        return sprintf("%s/%s", $this->apiPrefix, $id);
    }
}
