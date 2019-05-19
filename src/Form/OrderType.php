<?php
namespace App\Form;
use App\Entity\Country;
use App\Entity\Delivery;
use App\Entity\Order;
use App\Entity\Payment;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('telephone')
            ->add('name')
            ->add('surname')
            ->add('street')
            ->add('city')
            ->add('psc')
            ->add('poznamka')
            ->add('count', ChoiceType::class, [
                'choices'=>
                    ['1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                        '4'=>'4',
                        '5'=>'5']
            ])
            /* ->add('product', EntityType::class, [
                 'class' => Product::class,
                 'choice_label' => 'name'
             ])
         */
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'name'
            ])
            ->add('payment', EntityType::class, [
                'class' => Payment::class,
                'choice_label' => 'name',
                'choice_attr' => function (Payment $payment) {
                    return ['data-payment' => $payment->getPrice()];
                }
            ])
            ->add('delivery', EntityType::class, [
                'class' => Delivery::class,
                'choice_label' => 'name',
                'choice_attr' => function (Delivery $delivery) {
                    return ['data-delivery' => $delivery->getPrice()];
                }
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}