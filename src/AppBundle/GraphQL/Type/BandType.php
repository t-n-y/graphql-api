<?php

namespace AppBundle\GraphQL\Type;

use AppBundle\GraphQL\Query\Style\StyleField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
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
                'description' => "Band's name"
            ],
            'style' => [
                'type' => new StyleType(),
                'description' => "Linked style"
            ],
        ]);

        $config->setDescription("Band");
    }
}
