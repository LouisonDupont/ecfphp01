<?php

namespace App\Controller\Admin;

use App\Entity\Entreprise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EntrepriseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Entreprise::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
//            AssociationField::new('user', 'Utilisateur'),
            TextField::new('name', "Nom de l'entreprise"),
            TextField::new('entreprise', 'Entreprise'),
            TextareaField::new('description', 'Description'),
            DateTimeField::new('date', 'Date')
        ];
    }
}
