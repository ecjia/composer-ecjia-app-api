<?php


namespace Ecjia\App\Api\Facades;

use Ecjia\App\Api\Transformers\Transformer;
use Ecjia\App\Api\Transformers\TransformerManager;
use Royalcms\Component\Support\Facades\Facade;

/**
 * Class EcjiaApiTransformer
 * @package Ecjia\App\Api\Facades
 *
 * @method static TransformerManager registerTransformer($key, Transformer $transformer)
 * @method static TransformerManager function unRegisterTransformer($key)
 * @method static array getTransformers()
 * @method static array transformerData($type, $data)
 * @method static array transformerHandle($type, $value)
 */
class ApiTransformer extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'ecjia.api.transformer';
    }

}