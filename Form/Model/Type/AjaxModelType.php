<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Olivier Chauvel <olivier@generation-multiple.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Genemu\Bundle\FormBundle\Form\Model\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Options;

use Genemu\Bundle\FormBundle\Form\Model\ChoiceList\AjaxModelChoiceList;

/**
 * AjaxModelType
 *
 * @author Olivier Chauvel <olivier@generation-multiple.com>
 */
class AjaxModelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions()
    {
	$choiceList = function (Options $options) {
            if (!isset($options['choice_list'])) {
                return new AjaxModelChoiceList(
	                $options['class'],
	                $options['property'],
	                $options['choices'],
	                $options['query'],
	                $options['ajax']
	        );
	    }
            return $options['choice_list'];
	};

        $defaultOptions = array(
            'template' => 'choice',
            'multiple' => false,
            'expanded' => false,
            'class' => null,
            'property' => null,
            'query' => null,
            'choices' => array(),
            'preferred_choices' => array(),
            'ajax' => false,
			'choice_list' => $choiceList
        );

        return $defaultOptions;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent(array $options)
    {
        return 'model';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'genemu_ajaxmodel';
    }
}
