<?php

namespace App\Test\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ItemControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ItemRepository $repository;
    private string $path = '/item/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Item::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Item index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'item[displayName]' => 'Testing',
            'item[movable]' => 'Testing',
            'item[place]' => 'Testing',
            'item[owner]' => 'Testing',
            'item[type]' => 'Testing',
            'item[size]' => 'Testing',
            'item[material]' => 'Testing',
            'item[theme]' => 'Testing',
            'item[Color]' => 'Testing',
        ]);

        self::assertResponseRedirects('/item/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Item();
        $fixture->setDisplayName('My Title');
        $fixture->setMovable('My Title');
        $fixture->setPlace('My Title');
        $fixture->setOwner('My Title');
        $fixture->setType('My Title');
        $fixture->setSize('My Title');
        $fixture->setMaterial('My Title');
        $fixture->setTheme('My Title');
        $fixture->setColor('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Item');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Item();
        $fixture->setDisplayName('My Title');
        $fixture->setMovable('My Title');
        $fixture->setPlace('My Title');
        $fixture->setOwner('My Title');
        $fixture->setType('My Title');
        $fixture->setSize('My Title');
        $fixture->setMaterial('My Title');
        $fixture->setTheme('My Title');
        $fixture->setColor('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'item[displayName]' => 'Something New',
            'item[movable]' => 'Something New',
            'item[place]' => 'Something New',
            'item[owner]' => 'Something New',
            'item[type]' => 'Something New',
            'item[size]' => 'Something New',
            'item[material]' => 'Something New',
            'item[theme]' => 'Something New',
            'item[Color]' => 'Something New',
        ]);

        self::assertResponseRedirects('/item/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDisplayName());
        self::assertSame('Something New', $fixture[0]->getMovable());
        self::assertSame('Something New', $fixture[0]->getPlace());
        self::assertSame('Something New', $fixture[0]->getOwner());
        self::assertSame('Something New', $fixture[0]->getType());
        self::assertSame('Something New', $fixture[0]->getSize());
        self::assertSame('Something New', $fixture[0]->getMaterial());
        self::assertSame('Something New', $fixture[0]->getTheme());
        self::assertSame('Something New', $fixture[0]->getColor());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Item();
        $fixture->setDisplayName('My Title');
        $fixture->setMovable('My Title');
        $fixture->setPlace('My Title');
        $fixture->setOwner('My Title');
        $fixture->setType('My Title');
        $fixture->setSize('My Title');
        $fixture->setMaterial('My Title');
        $fixture->setTheme('My Title');
        $fixture->setColor('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/item/');
    }
}
