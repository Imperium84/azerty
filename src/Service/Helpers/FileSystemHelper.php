<?php

namespace App\Service\Helpers;

class FileSystemHelper {

    public function write(string $path, string $content)
    {
        // On supprimer le nom du fichier au bout du chemin pour ne garder que les dossiers
        $folders = substr($path, 0, strrpos($path, '/'));

        // Vérification de l'existence des dossiers, création le cas échéant
        $this->checkAndCreateFolders($folders);

        // Ouverture du fichier en mode écriture
        $file = fopen($path, 'w');

        // Ecriture du contenu dans le fichier
        fwrite($file, $content);

        // Fermeture du fichier
        fclose($file);
    }

    private function checkAndCreateFolders(string $path)
    {
        if(!is_dir($path)){
            mkdir($path, 755, true);
        }
    }
}
