<?php

namespace App\Controller\Admin;

use App\Entity\Mission;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MissionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mission::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            AssociationField::new('user', 'Utilisateur'),
            AssociationField::new('entreprise', 'Entreprise'),
            TextField::new('name', 'Intitulé'),
            TextareaField::new('description', 'Description'),
            TextField::new('lieu', 'Lieu de la mission'),
            DateTimeField::new('date', 'Date')

        ];
    }

}
