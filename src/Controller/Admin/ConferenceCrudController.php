<?php

namespace App\Controller\Admin;

use App\Entity\Conference;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class ConferenceCrudController extends AbstractCrudController
{
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Conferences")
            ->setEntityLabelInSingular("Conferences")
            ->setSearchFields(['city', 'slug', 'year'])
            ->setDefaultSort(['year' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('comment'));
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new("city");
        yield NumberField::new("year")->setStoredAsString();
        yield BooleanField::new("isInternational");

    }

    public static function getEntityFqcn(): string
    {
        return Conference::class;
    }

}
