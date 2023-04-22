<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection as ResourceCollection;
use League\Fractal\Resource\Item as ResourceItem;

/**
 * Class Controller
 * @package App\Http\Controllers\Api
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Manager
     */
    protected $resourceManager;

    /**
     * @var string
     */
    private $resourceTransformerNamespace = 'App\\Transformers\\';

    private $resourceItem;

    private $resourceCollection;

    /**
     * Controller constructor.
     * @param Manager $resourceManager
     * @param ResourceItem $resourceItem
     * @param ResourceCollection $resourceCollection
     */
    function __construct(Manager $resourceManager, ResourceItem $resourceItem, ResourceCollection $resourceCollection)
    {
        $this->middleware('auth:api');

        $this->resourceManager = $resourceManager;

        $this->resourceItem = $resourceItem;

        $this->resourceCollection = $resourceCollection;
    }

    /**
     * @param $resource
     * @param array $includes
     * @return \League\Fractal\Scope
     */
    protected function transform ($resource, $includes = [])
    {

        if (is_array($includes)) {
            $includes = implode(',', $includes);
        }

        $preparedResource = $this->prepareResource($resource);

        return $this->resourceManager->parseIncludes($includes)->createData($preparedResource);

    }

    /**
     * @param $resource
     * @return ResourceCollection|ResourceItem
     */
    private function prepareResource ($resource)
    {

        $transformer = $this->getResourceTransformer($resource);

        if ($resource instanceof Collection) {
            return new $this->resourceCollection($resource, $transformer);
        }

        return new $this->resourceItem($resource, $transformer);

    }

    /**
     * @param $resource
     * @return mixed
     * @throws \Exception
     */
    private function getResourceTransformer ($resource)
    {

        $model = $resource instanceof Collection ? $resource->first() : $resource;

        if (! $model instanceof Model) {
            throw new \Exception('Cannot transform non model.');
        }

        $resourceTransformer = $this->getResourceTransformerClass($model);

        if (! class_exists($resourceTransformer)) {
            throw new \Exception("$resourceTransformer does not exist.");
        }

        return new $resourceTransformer();

    }

    /**
     * @param Model $model
     * @return string
     */
    private function getResourceTransformerClass (Model $model)
    {

        $class = get_class($model);

        $resourceTransformerName = "{$class}Transformer";

        return Str::replaceFirst('App\\', $this->resourceTransformerNamespace, $resourceTransformerName);

    }

    /**
     * @return mixed
     */
    public function options ()
    {
        $response = response([]);
        return $response
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type');
    }
}
