<?php
/**
 * ProductType
 */

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
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
        $builder->add(
            'name',
            TextType::class,
            [
                'label' => 'label.name',
                'required' => true,
                'attr' => ['max_length' => 64],
            ]
        );
        $builder->add(
            'isVegan',
            CheckboxType::class,
            [
                'required' => false
            ]
        );
        $builder->add(
            'isPalmOil',
            CheckboxType::class,
            [
                'required' => false
            ]
        );
        $builder->add(
            'photo',
            FileType::class
        );
        $builder->add(
            'shops',
            EntityType::class,
            [
                'class' => 'App:Shops',
                'choice_label' => 'shopName',
                'multiple' => true,
                'expanded' => true
            ]
        );
        $builder->add(
            'dishes',
            EntityType::class, [
            'class' => 'App:Dishes',
            'choice_label' => 'dishName'
]);
        $builder->add(
            'categories',
            EntityType::class, [
            'class' => 'App:Categories',
            'choice_label' => 'categoryName',
]);
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Products::class]);
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
        return 'products';
    }
}
