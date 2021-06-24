<?php

namespace App\Controller\Admin;

use App\Entity\Competences;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompetencesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competences::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            BooleanField::new('appreciation', 'Aimez-vous cette compétence ?'),
            IntegerField::new('niveau', 'Votre niveau sur 10'),
            AssociationField::new('y', "Catégorie"),
        ];
    }
}
