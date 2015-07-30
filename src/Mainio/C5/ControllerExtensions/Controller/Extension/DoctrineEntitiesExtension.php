<?php
namespace Mainio\C5\ControllerExtensions\Controller\Extension;

use ORM;
use Package;

/**
 * @author Antti Hukkanen <antti.hukkanen@mainiotech.fi>
 */
trait DoctrineEntitiesExtension
{

    protected $entityRepositories = array();

    protected function getEntityManager()
    {
        $pkgID = $this->c->getPackageID();
        if ($pkgID > 0) {
            return Package::getByID($pkgID)->getEntityManager();
        } else {
            return ORM::entityManager('app');
        }
    }

    protected function registerRepository($key, $repository)
    {
        $this->entityRepositories[$key] = $repository;
    }

    protected function getRepository($key)
    {
        $rep = $this->entityRepositories[$key];
        if ($rep) {
            return $this->getEntityManager()->getRepository($rep);
        }
    }

}
