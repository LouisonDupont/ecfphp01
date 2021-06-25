<?php

namespace App\Controller\Admin;

use App\Entity\Experiences;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExperiencesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experiences::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user', 'Utilisateur'),
            TextField::new('name', 'Intitulé'),
            TextField::new('entreprise', 'Entreprise'),
            TextareaField::new('description', 'Description'),
            DateTimeField::new('date', 'Date de depart'),
            DateTimeField::new('datefin', 'Date de fin')
        ];
    }

}
