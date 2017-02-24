<?php

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BandType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            'id' => new IdType(),
            'name' => [
                'type' => new StringType(),
                'description' => "Band's name",
            ],
            'style' => [
                'type' => new StyleType(),
                'description' => 'Linked style',
            ],
        ]);

        $config->setDescription('Band');
    }
}
