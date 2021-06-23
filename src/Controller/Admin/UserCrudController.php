<?php

namespace App\Controller\Admin;

use App\Entity\Competences;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class UserCrudController extends AbstractCrudController
{


    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email', 'Adresse e-mail')
                ->addCssClass('font-weight-light font-italic'),
            TextField::new('password', 'Mot de passe'),
            TextField::new('prenom', 'Prénom'),
            TextField::new('nom', 'Nom'),
            TextField::new('adresse', 'Adresse'),
            TextField::new('codepostal', 'Code Postal'),
            TextField::new('ville', 'Ville'),
            TextField::new('telephone', 'Numéro de téléphone'),
            ArrayField::new('roles', 'Rôle attribué')
                ->setPermission('ROLE_ADMIN'),
            AssociationField::new('Competences','Competences')
//            DateTimeField::new('createAt')
//            ->onlyOnIndex()*/
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
            ->setPermission(Action::DELETE, 'ROLE_ADMIN')
            ->setPermission(Action::DETAIL, 'ROLE_COMMERCIAL')
            ->setPermission(Action::NEW, 'ROLE_ADMIN')
            ;
    }
}
