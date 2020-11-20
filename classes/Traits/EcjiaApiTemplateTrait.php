<?php

namespace Ecjia\App\Api\BaseControllers\Traits;

use ecjia_view;

trait EcjiaApiTemplateTrait
{

    /**
     * @return ecjia_view
     */
    public function create_view()
    {
        if ($this->api_driver == 'local') {
            return null;
        }

        return new ecjia_view($this);
    }

    /**
     * 获得模板目录
     * @return string
     */
    public function get_template_dir()
    {
        //不需要实现
    }

    /**
     * 获得模板文件
     */
    public function get_template_file($file)
    {
        //不需要实现
    }

}