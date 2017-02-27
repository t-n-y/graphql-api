<?php

namespace AppBundle\GraphQL\Mutation\Band;

use AppBundle\Entity\Band;
use AppBundle\GraphQL\Type\BandType;
use AppBundle\GraphQL\Type\BandTypeInput;
use Proxies\__CG__\AppBundle\Entity\Style;
use Symfony\Component\Config\Definition\Exception\Exception;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class AddBandField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments([
            'band' => new NonNullType(new BandTypeInput()),
        ]);
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $em = $this->container->get('doctrine')->getManager();

        $style = $em->getRepository(Style::class)->findOneById($args['band']['style']);

        if (!$style) {
            throw new Exception('No style found');
        }

        $band = new Band();
        $band->setName($args['band']['name']);
        $band->setStyle($style);

        $em->persist($band);
        $em->flush();

        return $band;
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new BandType();
    }

    public function getName()
    {
        return 'addBand';
    }
}
