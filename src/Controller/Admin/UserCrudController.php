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
                ->addCssClass('font-weight-light font-italic')
                ->setPermission('ROLE_ADMIN'),
            TextField::new('password', 'Mot de passe')
                ->setPermission('ROLE_ADMIN'),
            TextField::new('prenom', 'Prénom')
                ->setPermission('ROLE_ADMIN'),
            TextField::new('nom', 'Nom')
                ->setPermission('ROLE_ADMIN'),
            TextField::new('adresse', 'Adresse')
                ->setPermission('ROLE_ADMIN'),
            TextField::new('codepostal', 'Code Postal')
                ->setPermission('ROLE_ADMIN'),
            TextField::new('ville', 'Ville')
                ->setPermission('ROLE_ADMIN'),
            TextField::new('telephone', 'Numéro de téléphone')
                ->setPermission('ROLE_ADMIN'),
            ArrayField::new('roles', 'Rôle attribué')
                ->setPermission('ROLE_ADMIN'),
            AssociationField::new('Competences','Competences')
                ->setPermission('ROLE_COLLABORATEUR'),
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
            ->setPermission(Action::DETAIL, 'ROLE_COLLABORATEUR')
            ->setPermission(Action::DETAIL, 'ROLE_ADMIN')
            ->setPermission(Action::NEW, 'ROLE_ADMIN')
            ;
    }
}
