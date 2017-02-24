<?php

namespace AppBundle\GraphQL\Mutation;

use AppBundle\GraphQL\Mutation\Band\AddBandField;
use AppBundle\GraphQL\Mutation\Style\AddStyleField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class MutationType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            new AddBandField(),
            new AddStyleField(),
        ]);
    }
}
