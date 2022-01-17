<?php declare(strict_types=1);

namespace OpenDaje\BcCanva;

use SVG\Nodes\Shapes\SVGCircle;
use SVG\SVG;

class Generator
{
    public function generate(): void
    {
        $image = new SVG(100, 100);
        $doc = $image->getDocument();

        // circle with radius 20 and green border, center at (50, 50)
        $doc->addChild(
            (new SVGCircle(50, 50, 20))
                ->setStyle('fill', 'none')
                ->setStyle('stroke', '#0F0')
                ->setStyle('stroke-width', '2px')
        );


        $imageContent = $image->toXMLString();
        $path = './var/sample-svg.svg';
        try {
            $fp = @fopen($path, 'x');
        } catch (\Exception $e) {
            $fp = false;
        }

        if (false === $fp) {
            throw new \Exception("Error on creating the file maybe file [$path] already exists?");
        }
        $written = @fwrite($fp, $imageContent);
        if ($written < 1 || $written !== \strlen($imageContent)) {
            throw new \Exception('Error on writing to file.');
        }
        @fclose($fp);
    }
}
