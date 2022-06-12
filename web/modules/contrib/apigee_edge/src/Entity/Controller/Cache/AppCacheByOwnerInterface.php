<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

/**
 * Base definition of a cache store for apps of a specific owner.
 *
 * This cache is used by the developer- and company app controllers.
 *
 * Here all ids are an app names and not app UUIDs.
 *
 * @see \Apigee\Edge\Api\Management\Controller\DeveloperAppControllerInterface
 * @see \Apigee\Edge\Api\Management\Controller\CompanyAwareControllerInterface
 */
interface AppCacheByOwnerInterface extends EntityCacheInterface {

}
