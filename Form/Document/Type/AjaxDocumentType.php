<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Olivier Chauvel <olivier@generation-multiple.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Genemu\Bundle\FormBundle\Form\Document\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Options;

use Doctrine\Common\Persistence\ManagerRegistry;

use Genemu\Bundle\FormBundle\Form\Document\ChoiceList\AjaxDocumentChoiceList;

/**
 * AjaxDocumentType
 *
 * @author Olivier Chauvel <olivier@generation-multiple.com>
 */
class AjaxDocumentType extends AbstractType
{
    private $registry;

    /**
     * Constructs
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions()
    {
        $choiceList = function (Options $options) {
            return new AjaxDocumentChoiceList(
                $this->registry->getManager($options['document_manager']),
                $options['class'],
                $options['property'],
                $options['query_builder'],
                $options['choices'],
                $options['ajax']
            );
        };

	$defaultOptions = array(
            'choices'           => array(),
            'class'             => null,
            'document_manager'  => null,
            'expended'          => null,
            'multiple'          => false,
            'preferred_choices' => array(),
            'property'          => null,
            'query_builder'     => null,
            'template'          => 'choice',
            'ajax'              => false,
            'choice_list'	=> $choiceList,
        );

        return $defaultOptions;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent(array $options)
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'genemu_ajaxdocument';
    }
}
