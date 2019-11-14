<?php

namespace App\Service\Avatar;

use App\Service\Tools\ColorTools;

class SvgAvatarFactory
{
    const AVATAR_DIR = 'avatar';
    private $template;

    public function __construct($template)
    {
        $this->template = $template;

    }

    public function getAvatar(int $nbColors, int $size)
    {
      $colors = ColorTools::getRandomColors($nbColors);

      $matrix = new AvatarMatrix;
      $matrix->setSize($size);
      $matrix->setColors($colors);

      $svgRenderer = new SvgAvatarRenderer($this->template);

      return $svgRenderer->render($matrix);
    }


}
