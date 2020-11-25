<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Entity\Coment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
class ComentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Coment::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('komemtarz'),
            
        ];
    }
   
}
