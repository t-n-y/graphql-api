<?php

namespace AppBundle\GraphQL\Query\Band;


use AppBundle\Entity\Band;
use AppBundle\GraphQL\Type\BandType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;

class BandField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArgument("name", new NonNullType(new IdType()));
        $config->setDescription("Get one Band by name");
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $em = $this->container->get('doctrine')->getManager();
        $repository = $em->getRepository(Band::class);

        return $repository->findOneByName($args['name']);
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new BandType();
    }
}
