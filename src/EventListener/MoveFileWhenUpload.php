<?php
namespace App\EventListener;

use App\Entity\Etablissement;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class MoveFileWhenUpload implements EventSubscriberInterface {

    public function getSubscribedEvents()
    {
        return [
            Events::postPersist,
            Events::postUpdate
        ];
    }

    public function postPersist(LifecycleEventArgs $args):void
    {
        $this->moveFile('persist', $args);
    }

    private function moveFile(string $action, LifecycleEventArgs $args): void {
        $entity = $args->getObject();
        if (!$entity instanceof Etablissement){
            return;
        }
        if (!file_exists('..\\public\\images\\restaurants\\'.$entity->getSlugFolderImage().'\\'.$entity->getSlugMenu())){
            rename('..\\public\\images\\restaurants\\'.$entity->getSlugMenu(), '..\\public\\images\\restaurants\\'.$entity->getSlugFolderImage().'\\'.$entity->getSlugMenu());
        }

    }
}