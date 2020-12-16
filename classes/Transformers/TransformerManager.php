<?php


namespace Ecjia\App\Api\Transformers;


class TransformerManager
{

    /**
     * @var array
     */
    protected $transformers = [];

    /**
     * @param $key
     * @param Transformer $transformer
     * @return $this
     */
    public function registerTransformer($key, Transformer $transformer): TransformerManager
    {
        $this->transformers[$key] = $transformer;
        return $this;
    }

    /**
     * @param $key
     * @return $this
     */
    public function unRegisterTransformer($key): TransformerManager
    {
        if (isset($this->transformers[$key])) {
            unset($this->transformers[$key]);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getTransformers(): array
    {
        return $this->transformers;
    }

    /**
     * @param $type
     * @param $data
     */
    public function transformerData($type, $data)
    {
        $outData = array();
        if (empty($data)) {
            return $outData;
        }

        if (is_array($data)) {
            $first = current($data);

            if ($first && is_array($first)) {
                foreach ($data as $key => $value) {
                    $outData[] = $this->transformerHandle($type, $value);
                }

                return array_filter($outData);
            }
        }

        return $outData;
    }

    /**
     * @param $type
     * @param $value
     */
    public function transformerHandle($type, $value): array
    {
        $transformer = $this->transformers[$type];
        if (!empty($transformer) && $transformer instanceof Transformer) {
            return $transformer->transformer($value);
        }
        return [];
    }


}