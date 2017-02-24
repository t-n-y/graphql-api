<?php

namespace AppBundle\GraphQL\Query\Style;

use AppBundle\Entity\Style;
use AppBundle\GraphQL\Type\StyleType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class StylesField extends AbstractContainerAwareField
{
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $em = $this->container->get('doctrine')->getManager();
        $repository = $em->getRepository(Style::class);

        return $repository->findAll();
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new ListType(new StyleType());
    }
}
