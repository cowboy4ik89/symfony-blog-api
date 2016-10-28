<?php

namespace BlogBundle\Form\ApiV1;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class BlogType
 * @package BlogBundle\Form\ApiV1
 */
class BlogType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('user')
            ->add('status')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class'         => 'BlogBundle\Entity\Blog',
                'csrf_protection'    => false,
            ]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
