<?php

/**
 * Product form.
 */

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Dishes;
use App\Entity\Shops;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ProductForm.
 */
class ProductForm extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array $options The options
     * @see FormTypeExtensionInterface::buildForm()
     *
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', TextType::class)
            ->add('isVegan', CheckboxType::class)
            ->add('isPalmOil', CheckboxType::class)
            ->add('shops', ChoiceType::class, [
                'choices' => [
                    new Shops('Tesco'),
                    new Shops('Biedronka'),
                    new Shops('Lidl'),
                    new Shops('Carrefour'),
                    new Shops('Kaufland'),
                    new Shops('Żabka'),
                'multiple' => true,
                'expanded' => true,
                    ]
            ])
            ->add('dishes', ChoiceType::class, [
                'choices'=> [
                    new Dishes('breakfast'),
                    new Dishes('soup'),
                    new Dishes('main dish'),
                    new Dishes('takeaway / ready-made'),
                    new Dishes('snack')
                ]
            ])
            ->add('categories', ChoiceType::class, [
                new Categories('cat1'),
                new Categories('cat2'),
                new Categories('cat3')
            ])
            ->add('save', SubmitType::class)
        ;
    }
    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Categories::class]);
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix(): string
    {
        return 'category';
    }
}
