<?php

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class StyleTypeInput extends AbstractInputObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            'name' => new StringType(),
        ]);
    }
}
