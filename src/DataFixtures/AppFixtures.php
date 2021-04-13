<?php

namespace App\DataFixtures;

use App\Entity\Maker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $listOfMakers = [

["Vitaly Abalakov" ,"(1906–1986)",  " Russia – camming devices, Abalakov thread (or V-thread) gearless ice climbing anchor",],
["Ernst Karl Abbe"  ,"(1840–1905)",  " Germany – Condenser (microscope), apochromatic lens, refractometer",],
["Hovannes Adamian" ,"(1879–1932)",  " USSR/Russia – tricolor principle of the color television",],
["Samuel W. Alderson"  ,"(1914–2005)",  " U.S. – Crash test dummy",],
["Alexandre Alexeieff" ,"(1901–1982)",  " Russia/France – Pinscreen animation (with his wife Claire Parker)",],
["Rostislav Alexeyev" ,"(1916–1980)",  " Russia/USSR – Ekranoplan",],
["Giovanni Battista Amici" ,"(1786–1863)",  " Italy – Dipleidoscope, Amici prism",],
["Mary Anderson" ,"(1866–1953)",  " U.S. – windshield wiper blade",],
["Momofuku Ando" ,"(1910–2007)",  " Japan – Instant noodles",],
["Hal Anger" ,"(1920–2005)",  " U.S. – Well counter (radioactivity measurements), gamma camera",],
["Anders Knutsson Ångström" ,"(1888–1981)",  " Sweden – Pyranometer",],
["Ottomar Anschütz" ,"(1846–1907)",  " Germany – single-curtain focal-plane shutter, electrotachyscope",],
["Hermann Anschütz-Kaempfe" ,"(1872–1931)",  " Germany – Gyrocompass",],
["Virginia Apgar" ,"(1909–1974)",  " U.S. – Apgar score (for newborn babies)",],
["Nicolas Appert" ,"(1749–1841)",  " France – canning (food preservation) using glass bottles, see also Peter Durand",],
["Ami Argand" ,"(1750–1803)",  " France – Argand lamp",],
["William George Armstrong" ,"(1810–1900)",  " UK – hydraulic accumulator",],
["Neil Arnott" ,"(1788–1874)",  " UK – waterbed",],
["Joseph Aspdin" ,"(1788–1855)",  " UK – Portland cement",],
["John Vincent Atanasoff" ,"(1903–1995)",  " Bulgaria/U.S. – electronic digital computer",],

        ];
        foreach ($listOfMakers as $key => $m) {
            $maker = new Maker();

            $maker->setCreatedAt(new \DateTimeImmutable('now - ' . $key . 'days'));
            $maker->setName($m[0]);
            $manager->persist($maker);
        }

        $manager->flush();
    }
}
