<?php

declare(strict_types=1);

namespace MangoSylius\SyliusContactFormPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class ContactFormMessageRepository extends EntityRepository
{
    public function findAllByCustomerId(int $customerId): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->join('o.customer', 'customer')
            ->andWhere('customer.id = :customerId')
            ->setParameter('customerId', $customerId);
    }
}
