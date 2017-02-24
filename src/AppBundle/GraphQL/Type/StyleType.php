<?php

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class StyleType extends AbstractObjectType
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
                'description' => "Style's name",
            ],
            'band' => [
                'type' => new ListType(new BandType()),
                'description' => 'Band associated to style',
            ],
        ]);

        $config->setDescription('Style');
    }
}
