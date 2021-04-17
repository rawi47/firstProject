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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType  extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        // Les champs qui doivent etre  afficher à l'ecran 
        $builder
            ->add('matricule', TextType::class,[
                "attr" => [
                    "class" => "form-control"
                ],
                "label" => "Matricule"
            ])
            ->add('couleur', ChoiceType::class,[
                "attr" => [
                    "class" => "form-control"
                ],
                "label" => "Couleur",
                "choices" => [
                    "Rouge" => "red",
                    "Bleu" => "blue"
                ],
                "placeholder" => "Choisir..."
            ])
            ->add('marque', TextType::class,[
                "attr" => [
                    "class" => "form-control"
                ],
                "label" => "Marque"
            ])
            ->add('prix',NumberType::class,[
                "attr" => [
                    "class" => "form-control"
                ],
                "label" => "Prix"
            ])
            ->add('save', SubmitType::class,[
                "attr" => [
                    "class" => "btn btn-primary"
                ],
                "label" => "Save"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}