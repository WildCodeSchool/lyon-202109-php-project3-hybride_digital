<?php

namespace App\Form;

use App\Entity\Profil;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numberSiren', TextType::class, [
                'label' => 'Numèro de SIREN : '
            ])
            ->add('sizeFirm', ChoiceType::class, [
                'label' => 'Taille de l\'entreprise : ',
                'choices' => [
                    'Micro-entreprise' => 0,
                    'Très petite entreprise' => 1,
                    'Petite entreprise' => 2,
                    'Moyenne entreprise' => 3,
                    'Grande entreprise' => 4,
                    'Très grande entreprise' => 5
                ],
            ])
            ->add('sectorFirm', ChoiceType::class, [
                'label' => 'Secteur d\'activité : ',
                'choices' => [
                    'Agriculture, sylviculture et pêche' => 0,
                    'Industries extractives' => 1,
                    'Industrie manufacturière' => 2,
                    'Production et distribution d\'électricité, de gaz, de vapeur et d\'air conditionné' => 3,
                    'Production et distribution d\'eau ; assainissement, gestion des déchets et dépollution' => 4,
                    'Construction' => 5,
                    'Commerce ; réparation d\'automobiles et de motocycles' => 6,
                    'Transports et entreposage' => 7,
                    'Hébergement et restauration' => 8,
                    'Information et communication' => 9,
                    'Activités financières et d\'assurance' => 10,
                    'Activités immobilières' => 11,
                    'Activités spécialisées, scientifiques et techniques' => 12,
                    'Activités de services administratifs et de soutien' => 13,
                    'Administration publique' => 14,
                    'Enseignement' => 15,
                    'Santé humaine et action sociale' => 16,
                    'Arts, spectacles et activités récréatives' => 17,
                    'Autres activités de services' => 18,
                    'Activités des ménages en tant qu\'employeurs ; activités indifférenciées des ménages
                     en tant que producteurs de biens et services pour usage propre' => 19,
                    'Activités extra-territoriales' => 20
                ],
            ])
            ->add('numberSales', IntegerType::class, [
                'label' => 'CA en 2021 : '
            ])
            ->add('poleMarketing', ChoiceType::class, [
                'label'    => 'Pôle marketing au sein de votre entreprise ?',
                'choices' => ['Oui' => 1, 'Non' => 2],
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
                'required' => false,
            ])
            ->add('numberMarketers', IntegerType::class, [
                'label' => 'Si oui combien de personnes ? '
            ])
            ->add('poleCommercial', ChoiceType::class, [
                'label'    => 'Pôle commercial au sein de votre entreprise ?',
                'choices' => ['Oui' => 1, 'Non' => 2],
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
                'required' => false,
            ])
            ->add('numberCommercial', IntegerType::class, [
                'label' => 'Si oui combien de personnes ? '
            ])
            ->add('crmUsed', ChoiceType::class, [
                'label' => 'Selectionnez le CRM que vous utilisez : ',
                'choices'  => [
                    'Hubspot' => 1,
                    'Eudonet' => 2,
                    'Pipedrive' => 3,
                    'Aucun' => 4,
                    'Autre' => 5,
                ],
            ])
            ->add('crmName', TextType::class, [
                'label' => 'Si autre, pouvez-vous précisez ? '
            ])
            ->add('timeOfProspec', ChoiceType::class, [
                'choices'  => [
                    '1h-2h' => 1,
                    '3h-4h' => 2,
                    '6h-8h' => 3,
                    '+8h' => 4,
                    'Autre' => 5,
                ],
            ])
            ->add('precisTimeOfProspec', TextType::class, [
                'label' => 'Si autre, pouvez-vous précisez ? '
            ]);
            $this->buildFormLastPart($builder);
    }

    public function buildFormLastPart(FormBuilderInterface $builder): void
    {
        $builder
        ->add('typeOfProspec', ChoiceType::class, [
            'label' => 'Quel type de prospection mettez-vous en place ?',
            'choices'  => [
                'Téléphone' => 1,
                'Mail' => 2,
                'LinkedIn' => 3,
                'Instagram' => 4,
                'Facebook' => 5,
                'Aucune' => 6,
            ],
            //'choice_label' => 'selector',
            'multiple' => true,
            'expanded' => true,
            'by_reference' => false,
        ])
        ->add('prospecMoreClient', ChoiceType::class, [
            'label' => 'Laquelle vous rapporte le plus de clients ? ',
            'choices'  => [
                'téléphone' => 1,
                'Mail' => 2,
                'LinkedIn' => 3,
                'Instagram' => 4,
                'Facebook' => 5,
                'Aucune' => 6
            ],
            'multiple' => false,
            'expanded' => true,
            'by_reference' => false,
        ])
        ->add('numberClosPerMonth', ChoiceType::class, [
            'label' => 'Combien de closing fetes-vous par mois ?',
            'choices'  => [
                '1-2 contrats' => 1,
                '3-5 contrats' => 2,
                '5-10 contrats' => 3,
                '+10 contrats' => 4,
                'Autre' => 5,
            ],
        ])
        ->add('precisClosPerMonth', TextType::class, [
            'label' => 'Si autre, pouvez-vous précisez ? '
        ])
        ->add('budOfProspPerMonth', ChoiceType::class, [
            'label' => 'Quel est le budget que vous investissez/mois dans la prospection ? ',
            'choices'  => [
                '0-100 Euros' => 1,
                '100-200 Euros' => 2,
                '200-300 Euros' => 3,
                '300-500 Euros' => 4,
                '500-1K Euros' => 5,
                '+1K Euros' => 6,
                'Autre' => 7,
            ],
        ])
        ->add('prcisBudProsMonth', TextType::class, [
            'label' => 'Si autre, pouvez-vous précisez ? '
        ])
        ->add('analyseProspec', ChoiceType::class, [
            'label' => 'Analysez-vous vos retours de campagne de prospection ? ',
            'choices' => ['Oui' => 1, 'Non' => 2],
            'multiple' => false,
            'expanded' => true,
            'by_reference' => false,
            'required' => false,
        ])
        ->add('satisfiedOfRoi', ChoiceType::class, [
            'label' => 'Etes-vous satisfait de votre ROI ? ',
            'choices' => ['Oui' => 1, 'Non' => 2],
            'multiple' => false,
            'expanded' => true,
            'by_reference' => false,
            'required' => false,
        ])
        ->add('priorityCommercial', ChoiceType::class, [
            'label' => 'Quelles sont vos priorités commerciales pour 12 mois à venir ?',
            'choices'  => [
                'Générer le plus de leads' => 1,
                'Améliorer la satisfaction des clients' => 2,
                'Augmenter la rétention des clients' => 3,
                'Augmenter la notoriété de la marque' => 4,
                'Conclure plus de transactions' => 5,
                'Autre' => 6
            ],
            'multiple' => true,
            'expanded' => true,
            'by_reference' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}
