<?php

namespace AppBundle\GraphQL\Mutation\Style;

use AppBundle\Entity\Style;
use AppBundle\GraphQL\Type\StyleType;
use AppBundle\GraphQL\Type\StyleTypeInput;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class AddStyleField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments([
            'style' => new NonNullType(new StyleTypeInput()),
        ]);
        $config->setDescription("Add new Style");
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $em = $this->container->get('doctrine')->getManager();

        $style = new Style();
        $style->setName($args['style']['name']);

        $em->persist($style);
        $em->flush();

        return $style;
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new StyleType();
    }

    public function getName()
    {
        return 'addStyle';
    }
}
