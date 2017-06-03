<?php

namespace desplayBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class peopleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('name' )
            ->add('lastName')
            ->add('email')
            ->add('position')
            ->add('manyPeople',choiceType::class, array(
                'choices' => array(
                '1'=> 1,
                '2'=> 2,
                '3'=> 3,
                '4'=> 4,
                '5'=> 5,
                '6'=> 6,
                '7'=> 7,
                '8'=> 8,
                '9'=> 9,
                '10'=> 10
                ),))
            ->add('arrival', DateType::class, array(
                'widget' => 'choice',))
            ->add('departure', DateType::class, array(
                'widget' => 'choice',))
            ->add('info')
            ->add('parking')
            ->add('stay', ChoiceType::class, array(
                'choices'  => array(
                    'Select' => null,
                    'Tent' => array(
                        'Tent'=> 'tent',
                        'Tent Rent' => 'tentRent',
                        ),
                    'Caravan' => array(
                    'Caravan ' => 'caravan',
                    'Rent Caravan' => 'caravanRent'),
                    'House' => array(
                        'house mpista' => 'house mpista'
                    ),

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
