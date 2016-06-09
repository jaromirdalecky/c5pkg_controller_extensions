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

    /**
     * Gets the controller specific entity manager. If the controller belongs
     * to a package, returns the package's entity manager. Otherwise returns
     * the application specific entity manager.
     */
    public function getEntityManager()
    {
        if (isset($this->entityManager) && is_object($this->entityManager)) {
            // 5.8 ->
            return $this->entityManager;
        }
        $pkgID = $this->c->getPackageID();
        if ($pkgID > 0) {
            return Package::getByID($pkgID)->getEntityManager();
        } else {
            return ORM::entityManager('app');
        }
    }

    /**
     * Registers an entity repository for the given $key for easy fetching of
     * the specific repository.
     *
     * @param $key string
     * @param $repository string
     */
    protected function registerRepository($key, $repository)
    {
        $this->entityRepositories[$key] = $repository;
    }

    /**
     * Gets the repository from the entity manager that is mapped to the given
     * $key with the registerRepository() method. If the $key is not mapped,
     * returns null.
     *
     * @param $key string
     * @return \Doctrine\ORM\EntityRepository|null
     */
    protected function getRepository($key)
    {
        $rep = $this->entityRepositories[$key];
        if ($rep) {
            return $this->getEntityManager()->getRepository($rep);
        }
    }

}
