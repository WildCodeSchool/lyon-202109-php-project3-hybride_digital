<?php

namespace App\Service;

use App\Entity\Ressource;

class ControlUpload
{
    public function extensionValidity(Ressource $ressource): ?string
    {
        if ($ressource) {
            $mimeType = $ressource->getimageFile()->getMimeType();
        }
        $fileTypes = [
            'image' => ['jpg', 'jpeg', 'png',],
            'application' => ['pdf',],
            'video' => ['mp4',],
        ];

        foreach ($fileTypes as $type => $extensionArray) {
            foreach ($extensionArray as $extension) {
                if ($mimeType === "$type/$extension") {
                    return $type === 'application' ? 'pdf' : $type;
                }
            }
        }
        return 'Veuillez sélectionner le bon format de fichier (Jpg,Jpeg,Png,pdf,mp4) !';
    }
}
