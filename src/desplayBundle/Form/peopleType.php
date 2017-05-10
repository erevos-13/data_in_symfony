<?php

namespace desplayBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class peopleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('lastName')
            ->add('position')
            ->add('manyPeople')
            ->add('arrival')
            ->add('departure')
            ->add('info')
            ->add('stay', ChoiceType::class, array(
                'choices'  => array(
                    'Select' => null,
                    'Tent' => array(
                        'Tent'=> 5.5,
                        'Tent Rent' => 10
                        ),
                    'Caravan' => array(
                    'Caravan ' => 10,
                    'Rent Caravan' => 15),

                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'desplayBundle\Entity\people'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'desplaybundle_people';
    }


}
