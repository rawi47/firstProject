<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
//Use Symfony\Component\Form\Extension\Core\Type\StringType;
//use Symfony\Component\Form\Extension\Core\Type\FloatType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Vehicule;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType  extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        // Les champs qui doivent etre  afficher à l'ecran 
        $builder
            ->add('matricule', TextType::class)
            ->add('couleur', StringType::class)
            ->add('prix',FloatType::class)
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}