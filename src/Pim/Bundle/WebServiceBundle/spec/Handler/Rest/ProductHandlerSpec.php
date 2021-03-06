<?php

namespace spec\Pim\Bundle\WebServiceBundle\Handler\Rest;

use PhpSpec\ObjectBehavior;
use Pim\Component\Catalog\Model\ProductInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ProductHandlerSpec extends ObjectBehavior
{
    function let(NormalizerInterface $normalizer)
    {
        $this->beConstructedWith($normalizer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Pim\Bundle\WebServiceBundle\Handler\Rest\ProductHandler');
    }

    function it_gets_a_product($normalizer, ProductInterface $product)
    {
        $channels = ['ecommerce', 'print'];
        $locales = ['en_US', 'fr_FR'];
        $url = 'resource/url';
        $normalizer->normalize(
            $product,
            'standard',
            [
                'locales'      => $locales,
                'channels'     => $channels,
                'filter_types' => ['pim.external_api.product.view']
            ]
        )
        ->shouldBeCalled();
        $this->get($product, $channels, $locales, $url);
    }
}
