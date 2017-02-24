<?php

namespace AppBundle\GraphQL\Query;

use AppBundle\GraphQL\Query\Band\BandsField;
use AppBundle\GraphQL\Query\Band\BandField;
use AppBundle\GraphQL\Query\Band\BandsFieldByStyle;
use AppBundle\GraphQL\Query\Style\StylesField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class QueryType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            new BandsField(),
            new BandField(),
            new BandsFieldByStyle(),
            new StylesField(),

            'hello' => [
                'type' => new StringType(),
                'args' => [
                    'name' => [
                        'type' => new StringType(),
                        'default' => 'Stranger',
                    ],
                ],
                'resolve' => function () {
                    return 'Hello';
                },
            ],

        ]);
    }
}
